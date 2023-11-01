<?php
/*
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
delete_option('sfba_mc_api_key');
delete_option('sfba_gr_api_key');
delete_option('sfba_ac_url');
delete_option('sfba_ac_api_key');
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->prefix}posts WHERE post_type='sfba_subscribe_form'");
$wpdb->query("DELETE FROM {$wpdb->prefix}postmeta WHERE meta_key LIKE '%_sfba%';");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}sfba_subscribers_lists");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}sfba_subscription_lists");
*/