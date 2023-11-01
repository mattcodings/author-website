<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'admin_enqueue_scripts', 'sfba_enqueue_styles');
add_action( 'admin_enqueue_scripts', 'sfba_media_files' );

function sfba_enqueue_styles($page = "") {
	global $post;
	if ( isset($_GET['post_type']) ) {
		$post_type = $_GET['post_type'] ;	
	} else {
		$post_type = get_post_type() ;	
	}
	if( 'sfba_subscribe_form' == $post_type && $page != "sfba_subscribe_form_page_upgrade_to_pro"){
		wp_enqueue_script('jquery');
		wp_enqueue_style( 'wp-color-picker' ); 
		wp_enqueue_script( 'sfba-cp', plugins_url( 'js/sfba-color-picker.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), P_SUBSCRIBE_PLUGIN_VERSION, true  );
		wp_register_script( 'jquery-sticky-kit', plugins_url( 'js/jquery.sticky-kit.min.js', __FILE__ ), array( 'jquery'), P_SUBSCRIBE_PLUGIN_VERSION, true  );
		wp_register_script( 'clipboard-js', plugins_url( 'js/clipboard.min.js', __FILE__ ), array( 'jquery' ), P_SUBSCRIBE_PLUGIN_VERSION, true );
		wp_enqueue_script( 'sfba-select2', plugins_url( 'js/select2.min.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), P_SUBSCRIBE_PLUGIN_VERSION, true );
		wp_enqueue_script( 'sfba-select2-checkboxes', plugins_url( 'js/select2.multi-checkboxes.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), P_SUBSCRIBE_PLUGIN_VERSION, true );
		wp_register_script( 'sfba_script', plugins_url( 'js/sfba-script.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), P_SUBSCRIBE_PLUGIN_VERSION, true  );
		

    	wp_localize_script( 'sfba_script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_register_style( 'sfba_select2', plugin_dir_url( __FILE__ ) . 'css/select2.min.css', false, P_SUBSCRIBE_PLUGIN_VERSION );
		wp_register_style( 'sfba_style', plugin_dir_url( __FILE__ )  . 'css/sfba-style.css', false, P_SUBSCRIBE_PLUGIN_VERSION );
		
		wp_enqueue_style( 'sfba_style');
		wp_enqueue_style( 'sfba_select2');
   		wp_enqueue_script( 'jquery-sticky-kit');
   		wp_enqueue_script( 'clipboard-js');
   		wp_enqueue_script( 'sfba_script');
	}
}

function sfba_media_files() {
	global $post;
	if ( isset($_GET['post_type']) ) {
		$post_type = $_GET['post_type'] ;	
	} else {
		$post_type = get_post_type() ;	
	}
	if( 'sfba_subscribe_form' == $post_type )
		wp_enqueue_media();
}

function sfba_ajax_load_scripts() {
	
	wp_register_script( 'sfba-select2', plugin_dir_url( __FILE__ ) . 'js/select2.min.js' , array( 'jquery') );
	wp_register_script( 'sfba-select2-checkboxes', plugins_url( 'js/select2.multi-checkboxes.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), P_SUBSCRIBE_PLUGIN_VERSION, true );
	wp_register_script( 'sfba-form-ajax', plugin_dir_url( __FILE__ ) . 'js/sfba-form-ajax.js', array( 'jquery' ) );
	wp_localize_script( 'sfba-form-ajax', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),'ajax_nonce' => wp_create_nonce('sfba') ) );	
	
	wp_enqueue_script( 'sfba-select2' );
	wp_enqueue_script( 'sfba-select2-checkboxes' );
   	wp_enqueue_script( 'sfba-form-ajax');

}
add_action('wp_print_scripts', 'sfba_ajax_load_scripts');