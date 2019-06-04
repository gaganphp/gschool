<?php
/**
* Plugin Name: G School
* Description: Plugin for Educational Institute management
* Version: 1.0.0
* Author: Gurcharan Singh
* Author URI: http://codeinitiator.com
* License: GPL2
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}


require_once(dirname(__FILE__) . "/includes/g-assets-register.php");
//require_once(dirname(__FILE__) . "/includes/g-class-short-code.php");
require_once(dirname(__FILE__) . "/includes/g-class-settings.php");
require_once(dirname(__FILE__) . "/includes/g-class-database.php");
require_once(dirname(__FILE__) . "/includes/g-class-helper.php");

register_activation_hook( __FILE__, array(new Gdatabase(),'create') );
register_deactivation_hook( __FILE__, array(new Gdatabase(),'drop'));
new GSettings();
?>