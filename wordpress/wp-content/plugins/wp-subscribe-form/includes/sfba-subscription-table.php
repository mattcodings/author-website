<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $sfba_db_version;
$sfba_db_version = '1.0';

function sfba_create_table_function() {
	update_option("subscribe_forms_redirect_status", "on");
	global $wpdb;
	global $sfba_db_version;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	$charset_collate = $wpdb->get_charset_collate();

	$subscription_lists_table = $wpdb->prefix . 'sfba_subscription_lists';
   if($wpdb->get_var("show tables like '$subscription_lists_table'") != $subscription_lists_table) {

	$subscription_lists_table_sql = "CREATE TABLE $subscription_lists_table (
		sfba_id mediumint(9) NOT NULL AUTO_INCREMENT,
		sfba_service_name varchar(255) NOT NULL,
		sfba_service_list_id text NOT NULL,
		sfba_service_list_name text NOT NULL,
		PRIMARY KEY  (sfba_id)
	) $charset_collate;";
	dbDelta( $subscription_lists_table_sql );

}

	$subscribers_table = $wpdb->prefix . "sfba_subscribers_lists";
   if($wpdb->get_var("show tables like '$subscribers_table'") != $subscribers_table) {

      $sfba_subscribers_table_sql = "CREATE TABLE " . $subscribers_table . " (
     id mediumint(9) NOT NULL AUTO_INCREMENT,
     name tinytext NOT NULL,
     email text NOT NULL,
     UNIQUE KEY id (id)
   ) $charset_collate;";
	dbDelta( $sfba_subscribers_table_sql );

}

	add_option( 'sfba_db_version', $sfba_db_version );
}