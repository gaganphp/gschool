<?php
function g_custom_js_css() {
	wp_enqueue_script( 'gs-form-validator-js', plugins_url('/js/jquery.validate.js', dirname(__FILE__)), array( 'jquery' ), '1.19.0' );	
	wp_enqueue_script( 'gs-custom-js', plugins_url('/js/gs-custom.js', dirname(__FILE__)), array( 'jquery' ), '1.38' );
	wp_enqueue_media();
	wp_enqueue_style( 'g-class-form-styles', plugins_url('/css/gs-style.css',dirname(__FILE__)), array(), '1.40' );
}
add_action('admin_enqueue_scripts', 'g_custom_js_css');
