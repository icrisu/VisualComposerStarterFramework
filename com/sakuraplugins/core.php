<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

require_once(dirname(__FILE__) . '/blocks/blocks.php');
/**
* core class
*/
class BlocksWPCore
{
	private $pluginFile;

	protected static $instance;
	protected static $blocks = array();

	function __construct() {
		foreach (BlocksWP_Isotope::getBlocks() as $block) {
			require_once(dirname(__FILE__) . '/blocks' . $block['blockPath']);
			$blockInstance = new $block['class']($block['options']);
			array_push(self::$blocks, $blockInstance);
		}
	}

	public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
	}

	/* prevent clone */
	private function __clone() {}	

	//init handler
	public function initializeHandler() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array($this, 'vcVersionNotice'));
            return;
        }
	}

	public function vcMapsInit() {
        foreach (self::$blocks as $block) {
        	$block->map();
        }
	}

    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function vcVersionNotice() {
        $plugin_data = get_plugin_data($this->pluginFile);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'vc_extend'), $plugin_data['Name']).'</p>
        </div>';
    }	

    public function wpEnqueueScriptsHandler() {
		wp_register_script('appetit_packery', APPETIT_FRONT_URI.'/libs/packery/packery.min.js', array('jquery'), FALSE, TRUE);
		wp_enqueue_script('appetit_packery');	    	
    }

	public function run($pluginFile) {
		$this->pluginFile = $pluginFile;
		add_action('init', array($this, 'initializeHandler'));
		add_action('vc_after_init', array($this, 'vcMapsInit'));
		//add_action('wp_enqueue_scripts', array($this, 'wpEnqueueScriptsHandler'));
		//add_action('admin_enqueue_scripts', array($this, 'adminEnqueueScriptsHandler'));
	}	
}
?>