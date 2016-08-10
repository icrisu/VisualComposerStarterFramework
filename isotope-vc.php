<?php
/*
Plugin Name: Isotope VC
Plugin URI: http://sakuraplugins.com/
Description: Isotope gallery for Visual Composer
Author: SakuraPlugins
Version: 1.0.0
Author URI: http://sakuraplugins.com/
*/


// don't load directly
if (!defined('ABSPATH')) die('-1');


require_once(__DIR__.'/com/sakuraplugins/core.php');
BlocksWPCore::getInstance()->run(__FILE__);

?>