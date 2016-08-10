<?php
/**
* describe blocks
*/
class BlocksWP {
	
	public static function getBlocks() {
		return array(
			array(
				'blockPath' => '/isotope-vc/isotope-vc-block.php',
				'class' => 'IsotopeVCBlock',
				'options' => array(
					'shortcodeKey' => 'barcode',
					'name' => 'Isotope Gallery',
					'description' => 'Create Isotope Galleries for Visual Composer',
					'category' => 'Blocks WP'	
				)
			)
		);
	}
}
?>