<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


add_action( 'init', 'sfba_subscribe_form_function' );
add_action('admin_menu', 'sfba_custom_menu_pages');
add_action('admin_init','sfba_register_integration_options');
register_activation_hook( __FILE__ , 'sfba_add_integration_options' );

function sfba_subscribe_form_function() {
	$labels = array(
		'name'               => _x( 'Subscribe Forms', 'post type general name' ),
		'singular_name'      => _x( 'Subscribe Form', 'post type singular name' ),
		'menu_name'          => _x( 'Subscribe Forms', 'admin menu' ),
		'name_admin_bar'     => _x( 'Subscribe Form', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Form' ),
		'add_new_item'       => __( 'Add New Subscribe Form' ),
		'new_item'           => __( 'New Subscribe Form' ),
		'edit_item'          => __( 'Edit Subscribe Form' ),
		'view_item'          => __( 'View Subscribe Form' ),
		'all_items'          => __( 'All Subscribe Forms' ),
		'search_items'       => __( 'Search Subscribe Forms' ),
		'parent_item_colon'  => __( 'Parent Subscribe Forms:' ),
		'not_found'          => __( 'No Subscribe Forms found.' ),
		'not_found_in_trash' => __( 'No Subscribe Forms found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Add beautiful Subsscribe Forms into your Posts, Pages & Widget area' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'rewrite'            => array( 'slug' => 'arrow_subscribe_forms' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 25,
		'menu_icon'		 	 => 'dashicons-email-alt',
		'supports'           => array( 'title' , 'custom_fields')
	);

	register_post_type( 'sfba_subscribe_form', $args );
}

 
function sfba_custom_menu_pages() {
	if ( isset($_GET['hide_sfba_recommended_plugin']) && $_GET['hide_sfba_recommended_plugin'] == 1) {
		update_option('hide_sfba_recommended_plugin',true);
	}
	$hide_sfba_recommended_plugin = get_option('hide_sfba_recommended_plugin');
	
    add_submenu_page(
        'edit.php?post_type=sfba_subscribe_form',
        'Subscription Settings',
        'Integrations',
        'manage_options',
        'sfba_subscription_settings',
        'sfba_subscriber_options_menu' );
    add_submenu_page(
        'edit.php?post_type=sfba_subscribe_form',
        'Subscribers List',
        'Subscribers List',
        'manage_options',
        'sfba_subscribers_list',
        'sfba_subscribers_list_menu' );
		
	if ( !$hide_sfba_recommended_plugin ) {
		
		 add_submenu_page(
					'edit.php?post_type=sfba_subscribe_form',
					'sfba Recommended Plugins',
					'Recommended Plugins',
					'manage_options',
					'sfba-recommended-plugins',
					'sfba_recommended_plugins' 
			);		
	}
    add_submenu_page(
        'edit.php?post_type=sfba_subscribe_form',
        'Upgrade To Pro',
        'Upgrade To Pro',
        'manage_options',
        'upgrade_to_pro',
        'upgrade_to_pro' );
}

if(!function_exists("premio_subscribe_admin_scripts")) {
	function premio_subscribe_admin_scripts($page) {
		if($page == "sfba_subscribe_form_page_upgrade_to_pro") {
			wp_enqueue_style('wcp-folders-fa', P_SUBSCRIBE_URL . 'includes/js/select2.min.js', array(), P_SUBSCRIBE_PLUGIN_VERSION);
			wp_enqueue_style('wcp-folders-admin', P_SUBSCRIBE_URL . 'includes/css/select2.min.css', array(), P_SUBSCRIBE_PLUGIN_VERSION);
			wp_enqueue_style('wcp-folders-jstree', P_SUBSCRIBE_URL . 'includes/css/admin-setting.css', array(), P_SUBSCRIBE_PLUGIN_VERSION);
		}
	}
	add_action("admin_enqueue_scripts", "premio_subscribe_admin_scripts");
}

function sfba_recommended_plugins() {
	require('recommended-plugins.php');
}

function upgrade_to_pro() {
    require('upgrade-to-pro.php');
}

function sfba_subscriber_options_menu() {
    require('sfba-subscription-page.php');
}

function sfba_subscribers_list_menu() {
    $is_shown = get_option("subscribe_forms_update_status");
    if($is_shown === false && (isset($_GET['type']) && $_GET['type'] == "update")) {
        require('update-form.php');
    } else {
        require('sfba-subscribers-list.php');
    }
}

function sfba_support_page(){
    require('sfba-support-page.php');
}
function sfba_add_integration_options() {
    add_option('sfba_mc_api_key','');
    add_option('sfba_gr_api_key','');
    add_option('sfba_ac_url','');
    add_option('sfba_ac_api_key','');
}

function sfba_register_integration_options(){
    register_setting('sfba_integration_options_group','sfba_mc_api_key');
    register_setting('sfba_integration_options_group','sfba_gr_api_key');
    register_setting('sfba_integration_options_group','sfba_ac_url');
    register_setting('sfba_integration_options_group','sfba_ac_api_key');
    register_setting('sfba_integration_options_group','sfba_mm_username');
    register_setting('sfba_integration_options_group','sfba_mm_api_key');
}

/**
 * Change title boxes in admin.
 *
 * @param string  $text Text to shown.
 * @param WP_Post $post Current post object.
 * @return string
 *
 * @since 1.3
 */

function sfba_enter_title_here($title, $post) {
	if ($post->post_type == 'sfba_subscribe_form' ) {
		$count_posts = wp_count_posts( 'sfba_subscribe_form' )->publish;
		if ( $post->post_name != '' ) {
			$title = "Form #" . ( $count_posts  );
		} else {
			$title = "Form #" . ( $count_posts + 1 );
		}
	}	
	return $title;
}

add_filter( 'enter_title_here', 'sfba_enter_title_here', 1, 2 );