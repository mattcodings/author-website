<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function sfba_ajax_process() {
	
	check_ajax_referer( 'sfba', 'wpnonce' );
	$sfba_page_link = sanitize_text_field($_POST['sfba_page_link']);
    $post_type_id = sanitize_text_field($_POST['post_id']);
    $name = ( isset( $_POST['subscribername'] ) && $_POST['subscribername'] != '' ) ? sanitize_text_field($_POST['subscribername']) :  '';
    $email = sanitize_text_field($_POST['subscriberemail']);
    $where_to_send_subscriber = get_post_meta($post_type_id, '_sfba_subscription_selection_dd', true);

// Sending Subscriber's data to AC
    if( $where_to_send_subscriber == 'activecampaign'){

        define("ACTIVECAMPAIGN_URL", get_option('sfba_ac_url'));
        define("ACTIVECAMPAIGN_API_KEY", get_option('sfba_ac_api_key'));
        require_once("ActiveCampaignAPI/ActiveCampaign.class.php");
        $ac = new ActiveCampaign(ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY);
        $list_id = get_post_meta($post_type_id, '_sfba_activecampaign_lists', true);

        $contact = array(
            "email"              => sanitize_text_field($_POST['subscriberemail']).'',
            "first_name"         => sanitize_text_field($_POST['subscribername']),
            "last_name"          => "",
            "p[$list_id]"        => $list_id,
            "status[$list_id]"   => 1, 
            );
        $contact_sync = $ac->api("contact/sync", $contact);
        if (!(int)$contact_sync->success) {

            echo "<p>Syncing contact failed. Error returned: " . $contact_sync->error . "</p>";
            wp_die();

        }


        $contact_id = (int)$contact_sync->subscriber_id;
        echo "<p>Contact synced successfully (ID {$contact_id})!</p>";

        wp_die();

    }

// Sending Subscriber's data to GR
    if( $where_to_send_subscriber == 'getresponse'){

        require_once('jsonRPCClient.php');
        $api_key = esc_attr( get_option('sfba_gr_api_key') );
        $api_url = 'http://api2.getresponse.com';
        $client = new jsonRPCClient($api_url);

        $campaign_id_is = get_post_meta($post_type_id, '_sfba_getresponse_lists', true);
        try {
            $result = $client->add_contact(
                $api_key,
                array (
                    'campaign'  => $campaign_id_is,
                    'name'      => $name." ",
                    'email'     => $email,
                    )
                );
            echo "Success!&nbsp; Check your inbox or spam folder for a message containing a confirmation link.";
            wp_die();
        } catch (Exception $e) {
            echo esc_attr($e->getMessage());
            wp_die();
        }
        wp_die();

    }
// Sending Subscriber's data to MailChimp
    if( $where_to_send_subscriber == 'mailchimp'){

        require_once('MCAPI.class.php');
        $sfba_api_key = esc_attr(get_option('sfba_mc_api_key'));
        $api = new WPAPPP_MCAPI($sfba_api_key);
        $list_id = get_post_meta($post_type_id, '_sfba_mailchimp_lists', true);
        $merge_vars = array('FNAME' => $name, 'EMAIL' => $email);
        if($api->listSubscribe($list_id, sanitize_text_field($_POST['subscriberemail']), $merge_vars , sanitize_text_field($_POST['subscriberemail'])) === true){
            echo 'Success!&nbsp; Check your inbox or spam folder for a message containing a confirmation link.';
            wp_die();
        }
        else{
            echo  $api->errorMessage;
            wp_die();
        }

        wp_die();

    }

    if( $where_to_send_subscriber == 'mail'){

// send user email with subscriber detail
        $blog_name = get_bloginfo( 'name' );
        $blog_email = get_bloginfo( 'admin_email' );

        $headers = 'From: ' .$blog_name.' <'.$blog_email.'>'. "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $to = get_post_meta($post_type_id, '_sfba_sent_to_email', true);
        $subject = 'New Subscriber from Subscribe Form Plugin by Arrow Plugins';
        $message = 'Subscriber Name: '.$name.'<br/>Subscriber Email: '.$email . '<br/>Submission URL: ' . $sfba_page_link;
        wp_mail($to,$subject,$message,$headers);
        echo 'Thanl You, you are successfully subscribed.';
        wp_die();


    }
    if( $where_to_send_subscriber == 'database'){

// send subscriber detail into database

        $resultss='';
        global $wpdb;
        $table_name = $wpdb->prefix . 'sfba_subscribers_lists';
        $check_existing = $wpdb->get_results(
            "SELECT * FROM `$table_name` WHERE `email` = '$email'" 
            );
        if (empty($check_existing)) {
            $resultss = $wpdb->insert( 
                $table_name, 
                array( 
                    'name' => $name, 
                    'email' => $email, 
					'page_link' => $sfba_page_link,
                    ) 
                );
            echo 'Thank You!. Successfully Subscribed';
            wp_die();

        }else{
            echo 'Subscriber Already Exists';
            wp_die();

        }
        wp_die();

    }
    wp_die();
}
function sfba_delete_db_record(){
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die(0); 
	}
	check_ajax_referer( 'sfba', 'wpnonce' );
    $id = sanitize_text_field($_POST['id']);
    global $wpdb;
    $table  = $wpdb->prefix . 'sfba_subscribers_lists';
	$delete_sql = $wpdb->prepare("DELETE FROM {$table} WHERE id = %d",$id);
    $delete = $wpdb->query( $delete_sql );		

    wp_die();
}

function sfba_delete_db_data(){
    global $wpdb;
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die(0); 
	}
	check_ajax_referer( 'sfba', 'wpnonce' );
    $table  = $wpdb->prefix . 'sfba_subscribers_lists';
    $delete = $wpdb->query("TRUNCATE TABLE $table");
    wp_die();

}

add_action('wp_ajax_sfba_ajax', 'sfba_ajax_process');
add_action('wp_ajax_nopriv_sfba_ajax', 'sfba_ajax_process');

add_action('wp_ajax_sfba_delete_db_record', 'sfba_delete_db_record');
add_action('wp_ajax_nopriv_sfba_delete_db_record', 'sfba_delete_db_record');


add_action('wp_ajax_sfba_delete_db_data', 'sfba_delete_db_data');
add_action('wp_ajax_nopriv_sfba_delete_db_data', 'sfba_delete_db_data');