<?php
class p_subscribe {
    private static $instance;

    private function __construct() {
        add_filter('plugin_action_links_' . P_SUBSCRIBE_PLUGIN_BASE, [$this, 'plugin_action_links']);
        add_action('admin_enqueue_scripts', array($this, 'admin_styles'));
        //add_action('admin_init', array($this, 'admin_init'));
        add_action("wp_ajax_subscribe_forms_update_status", array($this, 'subscribe_forms_update_status'));

        add_action('admin_footer', array($this, 'add_deactivate_modal'));
        add_action('wp_ajax_subscribe_form_plugin_deactivate', array($this, 'subscribe_form_plugin_deactivate'));
    }

    public function add_deactivate_modal()
    {
        global $pagenow;

        if ('plugins.php' !== $pagenow) {
            return;
        }

        include 'includes/deactivate-form.php';
    }

    /* subscribe_form_plugin_deactivate start */
    public function subscribe_form_plugin_deactivate()
    {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die(0); 
		}
		check_ajax_referer( 'subscribe_form_deactivate_nonce', 'nonce' );
        $postData = $_POST;
        $errorCounter = 0;
        $response = array();
        $response['status'] = 0;
        $response['message'] = "";
        $response['valid'] = 1;
        $reason = filter_input(INPUT_POST, 'reason');
        $nonce = filter_input(INPUT_POST, 'nonce');
        if (empty($reason)) {
            $errorCounter++;
            $response['message'] = "Please provide reason";
        } else if (empty($nonce)) {
            $response['message'] = esc_attr__("Your request is not valid");
            $errorCounter++;
            $response['valid'] = 0;
        } else {
            if (!wp_verify_nonce($nonce, 'subscribe_form_deactivate_nonce')) {
                $response['message'] = esc_attr__("Your request is not valid");
                $errorCounter++;
                $response['valid'] = 0;
            }
        }
        if ($errorCounter == 0) {
            global $current_user;
            $email = "none@none.none";
            if (isset($postData['email_id']) && !empty($postData['email_id']) && filter_var($postData['email_id'], FILTER_VALIDATE_EMAIL)) {
                $email = $postData['email_id'];
            }
            $domain = site_url();
            $user_name = $current_user->first_name . " " . $current_user->last_name;

	        $response['status'] = 1;

	        /* sending message to Crisp */
	        $post_message = array();

	        $message_data = array();
	        $message_data['key'] = "Plugin";
	        $message_data['value'] = "Subscribe";
	        $post_message[] = $message_data;

	        $message_data = array();
	        $message_data['key'] = "Plugin Version";
	        $message_data['value'] = P_SUBSCRIBE_PLUGIN_VERSION;
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
	        $message_data['key'] = "WordPress Version";
	        $message_data['value'] = esc_attr(get_bloginfo('version'));
	        $post_message[] = $message_data;

	        $message_data = array();
	        $message_data['key'] = "PHP Version";
	        $message_data['value'] = PHP_VERSION;
	        $post_message[] = $message_data;

	        $message_data = array();
	        $message_data['key'] = "Message";
	        $message_data['value'] = $reason;
	        $post_message[] = $message_data;

	        $api_params = array(
		        'domain' => $domain,
		        'email' => $email,
		        'url' => site_url(),
		        'name' => $user_name,
		        'message' => $post_message,
		        'plugin' => "Subscribe",
		        'type' => "Uninstall",
	        );

	        /* Sending message to Crisp API */
	        $crisp_response = wp_safe_remote_post("https://go.premio.io/crisp/crisp-send-message.php", array('body' => $api_params, 'timeout' => 15, 'sslverify' => true));

	        if (is_wp_error($crisp_response)) {
		        wp_safe_remote_post("https://go.premio.io/crisp/crisp-send-message.php", array('body' => $api_params, 'timeout' => 15, 'sslverify' => false));
	        }
        }
        echo json_encode($response);
        wp_die();
    }

    public function subscribe_forms_update_status() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die(0); 
		}

        $response = [];
        $response['status'] = 0;
        $nonce = filter_input(INPUT_POST, 'nonce');
        if (!empty($nonce) && wp_verify_nonce($nonce, 'subscribe_forms_update_status')) {
            $status = filter_input(INPUT_POST, 'status');
            $email  = filter_input(INPUT_POST, 'email');
            update_option("subscribe_forms_update_status", 2);
            if ($status == 1) {
                $email = sanitize_email($email);

                $url = 'https://premioapps.com/premio/signup/email.php';
                $apiParams = [
                    'plugin' => 'subscribe_form',
                    'email'  => $email,
                ];

                // Signup Email for Subscribe forms
                $apiResponse = wp_safe_remote_post($url, ['body' => $apiParams, 'timeout' => 15, 'sslverify' => true]);

                if (is_wp_error($apiResponse)) {
                    wp_safe_remote_post($url, ['body' => $apiParams, 'timeout' => 15, 'sslverify' => false]);
                }

                $response['status'] = 1;
            }
        }//end if

        echo json_encode($response);
        die;
    }

    public function plugin_action_links($links)
    {
        $links['pro'] = '<a class="upgrade-button" href="'.admin_url("edit.php?post_type=sfba_subscribe_form&page=upgrade_to_pro").'" >'.__( 'Upgrade', 'subscribe-form').'</a>';
        return $links;
    }

    public static function get_instance() {
        if (empty(self::$instance)) {
            self::$instance = new p_subscribe();
        }
        return self::$instance;
    }

    function admin_styles()
    {
        wp_register_style('wcp-css-handle', false);
        wp_enqueue_style('wcp-css-handle');
        $css = "
				.upgrade-button {color: #FF5983; font-weight: bold;}
			";
        wp_add_inline_style('wcp-css-handle', $css);
    }

    function admin_init() {
        $option = get_option("subscribe_forms_redirect_status", true);
        if ($option == "on") {
            update_option("subscribe_forms_redirect_status", "off");
            //wp_redirect(admin_url("post-new.php?post_type=sfba_subscribe_form"));
            //exit;
        }
    }
}
p_subscribe::get_instance();
