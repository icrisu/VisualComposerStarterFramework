<?php
/**
* generic class for block
*/
class BlocksWPGenericBlock
{
	protected $options;
	function __construct($options = NULL) {
		$this->options = $options;
		add_shortcode($this->options['shortcodeKey'], array($this, 'renderShortcode'));
		add_action('wp_enqueue_scripts', array($this, 'wpEnqueueScriptsHandler'));
	}

	//build base map
	protected function buildBaseMap($FILE) {
		return array(
            'name' => $this->options['name'],
            'description' => $this->options['description'],
            'base' => $this->options['shortcodeKey'],
            'class' => '',
            'controls' => 'full',
            'icon' => plugins_url('assets/icon.png', $FILE), // or css class name which you can reffer in your css file later. Example: 'vc_extend_my_class'
            'category' => $this->options['category'],
            'admin_enqueue_js' => array(plugins_url('assets/admin.js', $FILE)), // This will load js file in the VC backend editor
            'admin_enqueue_css' => array(plugins_url('assets/admin.css', $FILE)), // This will load css file in the VC backend editor
            'front_enqueue_js' => array(plugins_url('assets/front_admin.js', $FILE)),
            'front_enqueue_css' => array(plugins_url('assets/front_admin.css', $FILE))           
		);
	}
}
?>