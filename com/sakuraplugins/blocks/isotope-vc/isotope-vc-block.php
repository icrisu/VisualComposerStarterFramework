<?php
require_once(dirname(__FILE__) . '/../iblock.php');
require_once(dirname(__FILE__) . '/../generic-block.php');
/**
* Isotope VC Block
*/
class IsotopeVCBlock extends BlocksWPGenericBlock implements iGenericBlockWP
{
	function __construct($options = NULL) {
		parent::__construct($options);
        
	}

	//vc_map implementation
	public function map() {
		//build base map @see GenericBlock class
		$baseMap = $this->buildBaseMap(__FILE__);
		$baseMap['params'] = $this->buildParams();
		vc_map($baseMap);
	}

	//build params
	protected function buildParams() {
		//example of one param
		return array(
            array(
              'type' => 'textfield',
              'holder' => 'div',
              'class' => '',
              'heading' => __('Text', 'vc_extend'),
              'param_name' => 'foo',
              'value' => __('hello text', 'vc_extend'),
              'description' => __('Description for foo param.', 'vc_extend'),
              'group' => 'test'
          	)				
		);
	}

	public function renderShortcode($atts, $content = null) {
		 extract(shortcode_atts(array('foo' => 'something'), $atts));
		 return '<p>' . $foo . '</p>';
	}

	//override
	public function wpEnqueueScriptsHandler() {
		wp_enqueue_script('jquery');
		wp_register_script($this->options['shortcodeKey'], plugins_url('assets/frontend.js', __FILE__), array('jquery'), FALSE, TRUE);
		wp_enqueue_script($this->options['shortcodeKey']);		
	}

}
?>