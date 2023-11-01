<?php
/*
Plugin Name: Subscribe Forms
Plugin URI: https://wordpress.org/plugins/wp-subscribe-form/
Description: Add beautiful and elegant subscribe forms in your Posts, Pages and Widget area to convert visitors into subscibers.
Author: Premio
Text Domain: subscribe-forms
Domain Path: /languages
Author URI: https://premio.io/downloads/subscribe-forms/
Version: 1.6
License: GplV2
*/

/* PLUGIN VAR */
define('P_SUBSCRIBE_PLUGIN_FILE', __FILE__ );
define('P_SUBSCRIBE_PLUGIN_BASE', plugin_basename(P_SUBSCRIBE_PLUGIN_FILE));
define("P_DS", DIRECTORY_SEPARATOR);
define('P_SUBSCRIBE_URL',plugin_dir_url(__FILE__));
$upgrade_link = admin_url("edit.php?post_type=sfba_subscribe_form&page=upgrade_to_pro");
define("P_UPGRADE_LINK", $upgrade_link);
define("P_UPGRADE_VERSION_TEXT","Upgrade to Pro");
define("P_SUBSCRIBE_PLUGIN_VERSION", "1.6");


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'SFBA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
require_once("subscribe.class.php");
require('includes/sfba-enqueue-scripts.php');
require('includes/sfba-fonts.php');
require('includes/sfba-post-type.php');
require('includes/sfba-custom-columns.php');
require('includes/sfba-post-meta-boxes.php');
require('includes/sfba-save-post-meta.php');
require('includes/sfba-shortcode.php');
require('includes/sfba-ajax-handler.php');
require('includes/sfba-subscription-ajax.php');
require('includes/sfba-subscription-table.php');
register_activation_hook( __FILE__, 'sfba_create_table_function' );

if(is_admin()) {
    include_once 'class-affiliate.php';
    include_once 'class-review-box.php';
}

/**
 * Redirect to plugin setting page after activate the plugin.
 *
 * @since 1.3
 */
function sfba_activation_redirect( $plugin ) {
	
    if( $plugin == plugin_basename( __FILE__ ) ) {
        $is_shown = get_option("subscribe_forms_update_status");
        if($is_shown === false) {
            wp_redirect(admin_url("edit.php?post_type=sfba_subscribe_form&page=sfba_subscribers_list&type=update"));
        } else {
            wp_redirect(admin_url('edit.php?post_type=sfba_subscribe_form'));
        }
		exit;
    }
}
add_action( 'activated_plugin', 'sfba_activation_redirect' );


/**
 * Show blank slate.
 *
 * @param string $which String which tablenav is being shown.
 *
 * @since 1.3
 */
function maybe_sfba_render_blank_state( $which ){
	global $post_type;

	if ( $post_type === 'sfba_subscribe_form' && 'bottom' === $which ) {
		$counts = (array) wp_count_posts( $post_type );		
		unset( $counts['auto-draft'] );
		$count = array_sum( $counts );
		if ( 0 < $counts['publish'] ) {
			return;
		}

		/* */
		?>
		<table class="wp-list-table1 sfba-list-table widefat fixed striped posts">
			<thead>
				<tr>
					<th>Subscribe From Title</th>
					<th>Shortcode</th>
					<th>Selected Form Template</th>
					<th>Date</th>
					<th>Created by</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="5" align="center">
						<h2>Create Your First Form</h2>
						<?php
						echo '<a class="sfba-BlankState-cta button-primary" href="' . esc_url( admin_url( 'post-new.php?post_type=sfba_subscribe_form' ) ) . '">+ New Form</a>';
						?>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th>Subscribe From Title</th>
					<th>Shortcode</th>
					<th>Selected Form Template</th>
					<th>Date</th>
					<th>Created by</th>
				</tr>
			</tfoot>
		</table>
		<?php
		/* */
		echo '<style type="text/css">#posts-filter .search-box, #posts-filter .wp-list-table, #posts-filter .tablenav.top, .tablenav.bottom .actions, .wrap .subsubsub  { display: none; } .sfba-list-table .sfba-BlankState-cta.button-primary{
			background: #F51366;
			color: #fff;
			border: solid 1px #F51366;
			box-shadow: 0 3px 5px -3px #333333;
			text-shadow: none;
		}
		.sfba-list-table .sfba-BlankState-cta.button-primary:hover, .sfba-list-table .sfba-BlankState-cta.button-primary:focus {
			background: #bc0f50;
			color: #ffffff;
			border: solid 1px #bc0f50;
		}
		.sfba-list-table{margin: 15px 0 0;}
		.sfba-list-table h2{font-size: 24px;}
		</style>';
	}
}
add_action( 'manage_posts_extra_tablenav', 'maybe_sfba_render_blank_state' ) ;

/*
 * Plugin Update 
 *
 * @since 1.3
 */
add_action( 'admin_init', 'sfba_plugin_update' );
function sfba_plugin_update() {
	global $wpdb, $pagenow;
	
	if ( $pagenow == 'plugins.php' || $pagenow == 'update-core.php' ) {
		
		if ( !get_option( 'update_sfba_version_1_3') ) {
			
			$args = array(
				'post_type'		=> 'sfba_subscribe_form',
				'posts_per_page'=> -1,			
			);
			$sfba_subscribe_post = new WP_Query($args);			
			
			if ( $sfba_subscribe_post->have_posts() ) :
				
				while ( $sfba_subscribe_post->have_posts() ) : $sfba_subscribe_post->the_post();
					$_sfba_form_template = get_post_meta( get_the_ID() , '_sfba_form_template', true );
					
					/* subscribeform1 */
					if ( $_sfba_form_template == 'subscribeform1' ) {					
						update_post_meta(get_the_ID(), '_sfba-form1-display-name', 'yes' );
					}
					/* subscribeform2 */
					if ( $_sfba_form_template == 'subscribeform2' ) {					
						update_post_meta(get_the_ID(), '_sfba-form2-display-name', 'yes' );
					}
					/* subscribeform5 */
					if ( $_sfba_form_template == 'subscribeform5' ) {					
						update_post_meta(get_the_ID(), '_sfba-form5-display-name', 'yes' );
					}
					/* subscribeform8 */
					if ( $_sfba_form_template == 'subscribeform8' ) {					
						update_post_meta(get_the_ID(), '_sfba-form8-display-name', 'yes' );
					}
					/* subscribeform11 */
					if ( $_sfba_form_template == 'subscribeform11' ) {					
						update_post_meta(get_the_ID(), '_sfba-form11-display-name', 'yes' );
					}
				endwhile;
			endif;
			
			update_option( 'update_sfba_version_1_3', true );
		}
	}
	if ( $pagenow == 'edit.php' || ( isset($_GET['post_type']) && $_GET['post_type'] == 'sfba_subscribe_form' ) ) {
		$wpdb->query("ALTER TABLE {$wpdb->prefix}sfba_subscribers_lists CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci");
		/* add Page Link field */
		$field_check = $wpdb->get_var( "SHOW COLUMNS FROM {$wpdb->prefix}sfba_subscribers_lists LIKE 'page_link'" );
		if ( 'page_link' != $field_check ) {
			$wpdb->query( "ALTER TABLE {$wpdb->prefix}sfba_subscribers_lists ADD page_link TEXT NULL DEFAULT NULL" );
		}
	}
}

add_action('admin_footer', 'subscribers_form_admin_footer');
if ( !function_exists( 'subscribers_form_admin_footer') ) {
	function subscribers_form_admin_footer() {	
		if( (isset( $_GET['post_type'] ) && $_GET['post_type'] == "sfba_subscribe_form" ) || get_post_type() == 'sfba_subscribe_form') {		
			include_once dirname(__FILE__)."/help.php";
		}
	}
}

/* Send message to owner */
add_action( 'wp_ajax_nopriv_subscribe_form_send_message_to_owner', 'subscribe_form_send_message_to_owner' );
add_action( 'wp_ajax_subscribe_form_send_message_to_owner', 'subscribe_form_send_message_to_owner' );
//register_uninstall_hook(__FILE__, 'wpssi_delete_options');

if ( !function_exists( 'subscribe_form_send_message_to_owner') ) {
	function subscribe_form_send_message_to_owner() {
		
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die(0); 
		}		
		
		if ( !isset( $_POST['sfba'] ) || ( isset( $_POST['sfba'] ) && !wp_verify_nonce( $_POST['sfba'], 'wpnonce' ) ) ) {
			wp_die(0); 
		}
		
		$response = array();
		$response['status'] = 0;
		$response['error'] = 0;
		$response['errors'] = array();
		$response['message'] = "";
		$errorArray = [];
		$errorMessage = "%s is required";
		$postData = $_POST;
		if(!isset($postData['textarea_text']) || trim($postData['textarea_text']) == "") {
			$error = array(
				"key"   => "textarea_text",
				"message" => __("Please enter your message","wcp")
			);
			$errorArray[] = $error;
		}
		if(!isset($postData['user_email']) || trim($postData['user_email']) == "") {
			$error = array(
				"key"   => "user_email",
				"message" => sprintf($errorMessage,__("Email","wcp"))
			);
			$errorArray[] = $error;
		} else if(!filter_var($postData['user_email'], FILTER_VALIDATE_EMAIL)) {
			$error = array(
				'key' => "user_email",
				"message" => "Email is not valid"
			);
			$errorArray[] = $error;
		}
		if(empty($errorArray)) {
			global $current_user;
			$text_message = $postData['textarea_text'];
			$email = $postData['user_email'];
			$domain = site_url();
			$user_name = $current_user->first_name." ".$current_user->last_name;

			$response['status'] = 1;

			/* sending message to Crisp */
			$post_message = array();

			$message_data = array();
			$message_data['key'] = "Plugin";
			$message_data['value'] = "Subscribe forms";
			$post_message[] = $message_data;

			$message_data = array();
			$message_data['key'] = "Domain";
			$message_data['value'] = $domain;
			$post_message[] = $message_data;

			$message_data = array();
			$message_data['key'] = "Email";
			$message_data['value'] = $email;
			$post_message[] = $message_data;

			$message_data = array();
			$message_data['key'] = "Message";
			$message_data['value'] = $text_message;
			$post_message[] = $message_data;

			$api_params = array(
				'domain' => $domain,
				'email' => $email,
				'url' => site_url(),
				'name' => $user_name,
				'message' => $post_message,
				'plugin' => "Subscribe forms",
				'type' => "Need Help",
			);

			/* Sending message to Crisp API */
			$crisp_response = wp_safe_remote_post("https://go.premio.io/crisp/crisp-send-message.php", array('body' => $api_params, 'timeout' => 15, 'sslverify' => true));

			if (is_wp_error($crisp_response)) {
				wp_safe_remote_post("https://go.premio.io/crisp/crisp-send-message.php", array('body' => $api_params, 'timeout' => 15, 'sslverify' => false));
			}
		} else {
			$response['error'] = 1;
			$response['errors'] = $errorArray;
		}
		echo json_encode($response);
	}
}


add_action( 'wp_loaded', 'subscribe_form_export_subscribers_list', 0 );
if ( !function_exists( 'subscribe_form_export_subscribers_list') ) {
	function subscribe_form_export_subscribers_list() {
		if (current_user_can('activate_plugins') && isset($_GET['page']) && $_GET['page'] == 'sfba_subscribers_list' && isset( $_GET['export'] ) && $_GET['export'] == '1' && isset( $_GET['download_file'] ) && $_GET['download_file'] != '') {
		
			global $wpdb;
			$ssm_db = $wpdb->prefix.'sfba_subscribers_lists';
			$ssm_results_to_write = $wpdb->get_results( "SELECT * FROM $ssm_db");
			$all_data = '';
			foreach ($ssm_results_to_write as $res) {
				$res_ID  = $res->id;
				$res_name  = $res->name;
				$res_email  = $res->email;


				$current_row = $res_ID.' , '.$res_name.' , '.$res_email. PHP_EOL;
				$all_data = $all_data." ".$current_row;
			}
			
			// change the path to fit your websites document structure
			$upload = wp_upload_dir();
			$path = plugin_dir_path(__FILE__); // change the path to fit your websites document structure
			$path = $upload['basedir'].'/'; // change the path to fit your websites document structure
			$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
			$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
			$file = $fullPath = $path.$dl_file;		

			//$file = "sfba_subcribers_list.csv";
			$fp = fopen($file, "a")or die("Error Couldn't open $file for writing!");
			fwrite($fp, $all_data)or die("Error Couldn't write values to file!"); 
			fclose($fp); 
			ignore_user_abort(true);
			set_time_limit(0); // disable the time limit for this script

			// change the path to fit your websites document structure
			$upload = wp_upload_dir();
			$path = plugin_dir_path(__FILE__); // change the path to fit your websites document structure
			$path = $upload['basedir'].'/'; // change the path to fit your websites document structure
			$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
			$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
			$fullPath = $path.$dl_file;		
			if ($fd = fopen ($fullPath, "r")) {
				$path_parts = pathinfo($fullPath);
				$ext = strtolower($path_parts["extension"]);
				switch ($ext) {
					case "csv":
					header("Content-type: application/csv");
					header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
					break;
					// add more headers for other content types here
					default;
					header("Content-type: application/octet-stream");
					header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
					break;
				}
				header("Cache-control: private"); //use this to open files directly
				while(!feof($fd)) {
					$buffer = fread($fd, 2048);
					echo esc_attr($buffer);
				}
			}
			fclose ($fd);

			//$file = "sfba_subcribers_list.csv";
			unlink($file);

			exit;

		}
	}
}
