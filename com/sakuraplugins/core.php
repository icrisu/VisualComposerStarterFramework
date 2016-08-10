<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');
/**
* core class
*/
class Class_IsotopeVC
{
	private $pluginFile;
	protected static $instance;

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



	public function run($pluginFile) {
		$this->pluginFile = $pluginFile;
		add_action('init', array($this, 'initializeHandler'));
		
	}	
}
?>