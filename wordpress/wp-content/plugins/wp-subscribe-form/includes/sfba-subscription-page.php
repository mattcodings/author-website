<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( isset($_GET["settings-updated"]) ) { ?>
<div id="message" class="updated">
	<p><strong><?php _e("Settings saved.") ?></strong></p>
</div>
<?php } ?>



<style>
	#sfba-int-container{
		width: 30%;
		background: #ffffff;
		padding: 0px;
		border: 2px solid #dcdcdc;
		display: inline-block;
		margin: 10px;
		vertical-align: top;
		min-height: 350px;
	}
	#sfba-mc-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #fceacc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/mc-logo.png',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 43%;
	}
	#sfba-gr-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #262626;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/gr-logo.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 49%;
	}
	#sfba-ac-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #4073b5;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/ac-logo.png',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
	}
	#sfba-constantcontact-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/logo-ctct-color.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
	}
	#sfba-convertkit-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/convertkit-long.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 44%;
	}
	#sfba-icontact-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/icontact-logo.png',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;		
	}
	#sfba-hubspot-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/hubspot-crm-logo.png',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 70%;
	}
	#sfba-mailerlite-header{
		margin: 0;
		padding: 5px 10px 13px 0;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/mailerlite-logo.png',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 38%;
	}
	#sfba-mailpoet-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #fe5301;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/mailpoet-logo.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 35%;
	}
	#sfba-sendinblue-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/logo-sendinblue.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 60%;
	}
	#sfba-gist-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/gist-logo.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		
	}
	#sfba-sendfox-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/sendfox-logo.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 50%;
	}
	#sfba-pipedrive-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #bcbcbc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/pipedrive-logo.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 50%;
	}
	#sfba-mm-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #aed8f2;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/mm-logo.png',__FILE__);?>');
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
	}
	#sfba_form_load_form{
		position: absolute;
		width: 98%;
	}
	#sfba-int-container-content{
		padding: 10px;
	}
	#sfba-int-container-content label{
		color: black;
		font-size: 13px;
		font-weight: bold;
	}
	#sfba-int-container-content input{
		color: black;
		font-size: 13px;
		font-weight: bold;
		border: 2px solid black;
		margin-top: 10px;
		width: 100%;
		height: 40px;
	}
	
	.sfba-initegration-wapper{
		position:relative;
	}
	.sfba-initegration-wapper::after {		
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(255,255,255,0.6);
	}
	.sfbap-integration-button {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		z-index: 9;
	}
	.sfba-pro-button.button-primary{
		background: #F51366;
		color: #fff;
		border: solid 1px #F51366;
		box-shadow: 0 3px 5px -3px #333333;
		text-shadow: none;
		padding: 15px 30px;
		display: inline;
		font-size: 20px;
	}
	.sfba-pro-button.button-primary:hover, .sfba-pro-button.button-primary:focus {
		background: #bc0f50;
		color: #ffffff;
		border: solid 1px #bc0f50;
	}
</style>
<div class="wrap">
	<form method="post" action="options.php">
		<?php 	
		settings_fields( 'sfba_integration_options_group' );
		do_settings_sections( 'sfba_integration_options_group' );
		?>
		<h1>Integrations</h1>
		<div  class="sfba-initegration-wapper">
			<div id="sfba-int-container">
				<p id="sfba-mc-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-mc-api-key">Enter Your MailChimp API Key:</label>
					<br/>
					<input type="text" id="sfba-mc-api-key" name="sfba_mc_api_key" class="" value="<?php echo esc_attr(get_option('sfba_mc_api_key')); ?>" placeholder="MailChimp API Key" />
					<p>Your <strong>List ID's</strong> will auto generate when you will create new Subscribe form to send users info to specific MailChimp's List ID.</p>
					<a href="https://premio.io/help/subscribe-forms/how-to-integrate-mailchimp-with-subscribe-forms/" target="_blank">Help: How to find your MailChimp API Key</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-gr-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-gr-api-key">Enter Your GetResponse API Key:</label>
					<br/>
					<input type="text" id="sfba-gr-api-key" name="sfba_gr_api_key" class="" value="<?php echo esc_attr( get_option('sfba_gr_api_key') ); ?>" placeholder="GetResponse API Key" />
					<p>Your <strong>Campaign Names</strong> will auto generate when you will create new Subscribe form to send users info to specific GetResponse Campaign.</p>
					<a href="https://support.getresponse.com/faq/where-i-find-api-key" target="_blank">Help: How to find your GetResponse API Key</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-ac-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-ac-url">Enter Your Active Campaign URL:</label>
					<br/>
					<input type="text" id="sfba-ac-url" class="" name="sfba_ac_url" value="<?php echo esc_attr( get_option('sfba_ac_url') ); ?>" placeholder="https://<account-name>.api-us1.com" />
					<br/><br/>
					<label for="sfba-ac-api-key">Enter Your Active Campaign API Key:</label>
					<br/>
					<input type="text" id="sfba-ac-api-key" name="sfba_ac_api_key" class="" value="<?php echo esc_attr( get_option('sfba_ac_api_key') ); ?>" placeholder="Active Campaign API Key" />
					<p>Your <strong>List ID's</strong> will auto generate when you will create new Subscribe form to send users info to specific Active Campaign's List ID.</p>
					<a href="http://www.activecampaign.com/help/using-the-api/" target="_blank">Help: How to find your Active Campaig URL & API KEY</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-constantcontact-header"></p>
				<div id="sfba-int-container-content">				
					<label for="sfba-constantcontact-api-key">Enter Your Constant Contact API Key:</label>
					<br/>
					<input type="text" id="sfba-constantcontact-api-key" name="sfba_constantcontact_api_key" class="" value="<?php echo esc_attr( get_option('sfba_constantcontact_api_key') ); ?>" placeholder="API Key" />
					<br /><br />
					<label for="sfba-constantcontact-access-token">Enter Your Constant Contact Access Token:</label>
					<br/>
					<input type="text" id="sfba-constantcontact-access-token" name="sfba_constantcontact_access_token" class="" value="<?php echo esc_attr( get_option('sfba_constantcontact_access_token') ); ?>" placeholder="Access Token" />
					<p>Your <strong>List ID's</strong> will auto generate when you will create new Subscribe forms to send users info to specific Constant Contact's List ID.</p>
					<a href="https://community.constantcontact.com/t5/Product-News/How-to-generate-an-API-Key-and-Access-Token/ba-p/293856" target="_blank">Help: How to find Constant Contact API Key & Access Token</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-convertkit-header"></p>
				<div id="sfba-int-container-content">				
					<label for="sfba-convertkit-api-key">Enter Your ConvertKit API Key:</label>
					<br/>
					<input type="text" id="sfba-convertkit-api-key" name="sfba_convertkit_api_key" class="" value="<?php echo esc_attr( get_option('sfba_convertkit_api_key') ); ?>" placeholder="API Key" />
					<br /><br />
					<label for="sfba-convertkit-api-secret">Enter Your ConvertKit API Secret:</label>
					<br/>
					<input type="text" id="sfba-convertkit-api-secret" name="sfba_convertkit_api_secret" class="" value="<?php echo esc_attr( get_option('sfba_convertkit_api_secret') ); ?>" placeholder="API Secret" />
					<p>Your <strong>Forms IDs</strong> will auto-generate when you create or edit a form.</p>
					<a href="https://premio.io/help/subscribe-forms/how-to-integrate-subscribe-forms-with-convertkit/" target="_blank">Help: How to find ConvertKit API Key & API Secret</a>
				</div>
			</div>
			
			<div id="sfba-int-container">
				<p id="sfba-icontact-header"></p>
				<div id="sfba-int-container-content">				
					<label for="sfba-icontact-app-id">Enter Your iContact App ID:</label>
					<br/>
					<input type="text" id="sfba-icontact-app-id" name="sfba_icontact_app_id" class="" value="<?php echo esc_attr( get_option('sfba_icontact_app_id') ); ?>" placeholder="Application ID (AppId)" />
					<br />				
					<label for="sfba-icontact-username">Enter Your iContact API Username:</label>
					<br/>
					<input type="text" id="sfba-icontact-username" name="sfba_icontact_username" class="" value="<?php echo esc_attr( get_option('sfba_icontact_username') ); ?>" placeholder="Username / Email Address" />
					<br />				
					<label for="sfba-icontact-password">Enter Your iContact API Password:</label>
					<br/>
					<input type="text" id="sfba-icontact-password" name="sfba_icontact_password" class="" value="<?php echo esc_attr( get_option('sfba_icontact_password') ); ?>" placeholder="API Password" />
					<br />				
					<label for="sfba-icontact-api-url">Enter Your iContact API URL:</label>
					<br/>
					<input type="text" id="sfba-icontact-api-url" name="sfba_icontact_api_url" class="" value="<?php echo esc_attr( get_option('sfba_icontact_api_url') ); ?>" placeholder="API URL" />
					<br />				
					<p>Your <strong>Lists ID's</strong> will auto generate when you will create new Subscribe forms to send users info to specific iContact's Lists ID.</p>
					<a href="https://www.icontact.com/developerportal/pro/documentation/register-your-app" target="_blank">Help: How to find iContact APP ID, Username, Paddword & API URL</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-hubspot-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-hubspot-api-key">Enter Your Hubspot API Key:</label>
					<br/>
					<input type="text" id="sfba-hubspot-api-key" class="" name="sfba_hubspot_api_key" value="<?php echo esc_attr( get_option('sfba_hubspot_api_key') ); ?>" placeholder="API Key" />				
					<p>All your subscribers will be added as contacts to your HubSpot CRM account</p>
					<a href="https://premio.io/help/subscribe-forms/how-to-integrate-subscribe-forms-with-hubspot-crm/" target="_blank">Help: How to find your Hubspot API KEY</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-mailerlite-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-mailerlite-api-key">Enter Your MailerLite API Key:</label>
					<br/>
					<input type="text" id="sfba-mailerlite-api-key" class="" name="sfba_mailerlite_api_key" value="<?php echo esc_attr( get_option('sfba_mailerlite_api_key') ); ?>" placeholder="API Key" />				
					<p>Your <strong>Group ID's</strong> will auto-generate when you create or edit a form.</p>
					<a href="https://app.mailerlite.com/integrations/api/" target="_blank">Help: How to find your MailerLite API KEY</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-mailpoet-header"></p>
				<div id="sfba-int-container-content">
					<?php
					$plugin = 'mailpoet/mailpoet.php';
					$installed_plugins = get_plugins();	
					if ( isset($installed_plugins[$plugin]) && !is_plugin_active($plugin)) {
			
						if ( ! current_user_can( 'activate_plugins' ) ) {
							return; 
						}
						$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
						
						$admin_message = '<p>' . esc_html__( 'Activate MailPoet plugin to use MailPoet Subscriber.' ) . '</p>';
						$admin_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__( 'Activate MailPoet Now' ) ) . '</p>';
						
					} elseif ( ! class_exists( '\MailPoet\API\API' ) ) {
						
						$install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=mailpoet' ), 'install-plugin_mailpoet' );
						$admin_message = '<p>' . esc_html__( 'Install MailPoet plugin to use MailPoet Subscriber.' ) . '</p>';
						$admin_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__( 'Install MailPoet Now' ) ) . '</p>';
					} else {
						$admin_message = '<strong>MailPoet</strong> is connected to Subscribe Forms';
					}
                    $plugins_allowedtags = array(
                        'a' => array(
                            'href' => array(),
                            'title' => array(),
                            'target' => array(),
                        ),
                        'abbr' => array('title' => array()),
                        'acronym' => array('title' => array()),
                        'code' => array(),
                        'pre' => array(),
                        'em' => array(),
                        'strong' => array(),
                        'ul' => array(),
                        'ol' => array(),
                        'li' => array(),
                        'p' => array(),
                        'br' => array(),
                    );
                    echo wp_kses($admin_message, $plugins_allowedtags);

					?>
					
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-sendinblue-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-sendinblue-api-key">Enter Your SendinBlue API Key (V2 API):</label>
					<br/>
					<input type="text" id="sfba-sendinblue-api-key" name="sfba_sendinblue_api_key" class="" value="<?php echo esc_attr(get_option('sfba_sendinblue_api_key')); ?>" placeholder="SendinBlue API Key" />
					<p>Your <strong>List IDs</strong> will be displayed when you create a new form and select the SendinBlue integration</p>
					<a href="https://premio.io/help/subscribe-forms/how-to-integrate-subscribe-forms-with-sendinblue/" target="_blank">Help: How to find your SendinBlue API Key</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-gist-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-gist-api-key">Enter Your Gist API Key:</label>
					<br/>
					<input type="text" id="sfba-gist-api-key" name="sfba_gist_api_key" class="" value="<?php echo esc_attr(get_option('sfba_gist_api_key')); ?>" placeholder="Gist API Key" />
					<p>You'll be able to set specific tags for your email subscribers when you create a new form.</p>
					<a href="https://premio.io/help/subscribe-forms/how-to-find-your-gist-api-key/" target="_blank">Help: How to find your Gist API Key</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-sendfox-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-sendfox-api-key">Enter Your SendFox Access Token:</label>
					<br/>
					<input type="text" id="sfba-sendfox-api-key" name="sfba_sendfox_access_tokens" class="" value="<?php echo esc_attr(get_option('sfba_sendfox_access_tokens')); ?>" placeholder="SendFox Access Tokens" />
					<p>Your <strong>List IDs</strong> will be displayed when you create a new form and select the SendFox integration</p>
					<a href="https://sendfox.helpscoutdocs.com/article/133-access-tokens" target="_blank">Help: How to find your SendFox Access Tokens</a>
				</div>
			</div>
			<div id="sfba-int-container">
				<p id="sfba-pipedrive-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-pipedrive-api-key">Enter Your Pipedrive API Token:</label>
					<br/>
					<input type="text" id="sfba-pipedrive-api-key" name="sfba_pipedrive_api_token" class="" value="<?php echo esc_attr(get_option('sfba_pipedrive_api_token')); ?>" placeholder="pipedrive API Token" />
					<p>Your <strong>Organization IDs</strong> will be displayed when you create a new form and select the pipedrive integration</p>
					<a href="https://pipedrive.readme.io/docs/how-to-find-the-api-token?ref=api_reference" target="_blank">Help: How to find your Pipedrive API Token</a>
				</div>
			</div>
			<!-- <div id="sfba-int-container">
				<p id="sfba-mm-header"></p>
				<div id="sfba-int-container-content">
					<label for="sfba-mm-username">Enter Your MadMimi Username ( OR Email Address ):</label>
					<br/>
					<input type="text" id="sfba-mm-username" class="" name="sfba_mm_username" value="<?php echo esc_attr( get_option('sfba_mm_username') ); ?>" placeholder="example@domain.com" />
					<br/><br/>
					<label for="sfba-mm-api-key">Enter Your MadMimi API Key:</label>
					<br/>
					<input type="text" id="sfba-mm-api-key" name="sfba_mm_api_key" class="" value="<?php echo esc_attr( get_option('sfba_mm_api_key') ); ?>" placeholder="MadMimi API Key" />
					<p>Your MadMimi <strong>Lists</strong> will auto generate when you will create new Subscribe form to send users info to specific MadMimi List.</p>
					<a href="https://help.madmimi.com/where-can-i-find-my-api-key/" target="_blank">Help: How to find your MadMimi API KEY</a>
				</div>
			</div>
	 -->
			<div class="sfbap-integration-button">
				<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=sfba_subscribe_form&page=upgrade_to_pro' ) );?>" class="sfba-pro sfba-pro-button button button-primary">Upgrade to Pro </a>
			</div>
		</div>
		<?php 
		$get_mc_lists = get_option('sfba_mc_api_key');
		if (isset($get_mc_lists) && $get_mc_lists != '') {
			global $wpdb;
			$table_name = $wpdb->prefix . 'sfba_subscription_lists';
			$sfba_service_name = 'mailchimp';
			require_once 'MCAPI.class.php';
			$apikey= get_option('sfba_mc_api_key'); // Enter your MailChimp API key here
			$api = new WPAPPP_MCAPI($apikey);
			$retval = $api->lists();
			foreach ($retval['data'] as $list){
				$sfba_service_list_id   = $list['id'];
				$sfba_service_list_name = $list['name'];
				$sql = "INSERT INTO {$wpdb->prefix}sfba_subscription_lists (sfba_service_name,sfba_service_list_id,sfba_service_list_name) SELECT * FROM (SELECT 'mailchimp' , '$sfba_service_list_id' ,'$sfba_service_list_name' ) AS tmp WHERE NOT EXISTS (SELECT sfba_service_list_id FROM {$wpdb->prefix}sfba_subscription_lists WHERE sfba_service_list_id = '$sfba_service_list_id')  LIMIT 1";
			//var_dump($sql); // debug
				$sql = $wpdb->prepare($sql,$post_id,$sfba_service_list_id,$sfba_service_list_id);
			// var_dump($sql); // debug
				$wpdb->query($sql);
				}
			}

			$get_gr_lists = get_option('sfba_gr_api_key');
			if (isset($get_gr_lists) && $get_gr_lists !='') {
				global $wpdb;
				$table_name = $wpdb->prefix . 'subscription_lists';
				$sfba_service_name = 'getresponse';
			$api_key = $get_gr_lists; //Place API key here
			$api_url = 'http://api2.getresponse.com';
			require_once 'jsonRPCClient.php';
			# initialize JSON-RPC client
			$client = new jsonRPCClient($api_url);

				$result = $client->get_campaigns($api_key);

			//Get Campaigns name and id.
				foreach($result as $r){
					
					$name = $r['name'];
					$result2 = $client->get_campaigns(
						$api_key,
						array (
							'name' => array ( 'EQUALS' => $name )
							)
						);
					$res = array_keys($result2);
					$CAMPAIGN_IDs = array_pop($res);
					$sfba_service_list_id   = $CAMPAIGN_IDs;
					$sfba_service_list_name = $name;
					$sql = "INSERT INTO {$wpdb->prefix}sfba_subscription_lists (sfba_service_name,sfba_service_list_id,sfba_service_list_name) SELECT * FROM (SELECT 'getresponse' , '$sfba_service_list_id' ,'$sfba_service_list_name' ) AS tmp WHERE NOT EXISTS (SELECT sfba_service_list_id FROM {$wpdb->prefix}sfba_subscription_lists WHERE sfba_service_list_id = '$sfba_service_list_id') LIMIT 1";
			//var_dump($sql); // debug
					$sql = $wpdb->prepare($sql,$post_id,$sfba_service_list_id,$sfba_service_list_id);
			// var_dump($sql); // debug
					$wpdb->query($sql);
				}
			}


			$sfba_ac_url = get_option('sfba_ac_url');
			$sfba_ac_api_key = get_option('sfba_ac_api_key');
			if ( isset($sfba_ac_url) && isset($sfba_ac_api_key) && $sfba_ac_url != '') {
				global $wpdb;
				$table_name = $wpdb->prefix . 'sfba_subscription_lists';
				$sfba_service_name = 'getresponse';

				require_once("ActiveCampaignAPI/ActiveCampaign.class.php");
				$ac = new ActiveCampaign($sfba_ac_url, $sfba_ac_api_key);
				/*
				 * TEST API CREDENTIALS.
				 */
				if (!(int)$ac->credentials_test()) {
					echo "<p>Access denied: Invalid Active Campaign credentials (URL and/or API key).</p>";
					exit();
				}
				
				$url = $sfba_ac_url.'/admin/api.php?api_key='.$sfba_ac_api_key.'&api_action=list_list&api_output=xml&ids=all&full=1';
				$sxml = simplexml_load_file($url);
				foreach($sxml->row as $id){
					$sfba_service_list_id   =  $id->id;
					$sfba_service_list_name = $id->name;
				   
					$sql = "INSERT INTO {$wpdb->prefix}sfba_subscription_lists (sfba_service_name,sfba_service_list_id,sfba_service_list_name) SELECT * FROM (SELECT 'activecampaign' , '$sfba_service_list_id' ,'$sfba_service_list_name' ) AS tmp WHERE NOT EXISTS (SELECT sfba_service_list_id FROM {$wpdb->prefix}sfba_subscription_lists WHERE sfba_service_list_id = '$sfba_service_list_id') LIMIT 1";
			//var_dump($sql); // debug
					$sql = $wpdb->prepare($sql,$post_id,$sfba_service_list_id,$sfba_service_list_id);
			// var_dump($sql); // debug
					$wpdb->query($sql);
				}
			}

/*require('MadMimiAPI/MadMimi.class.php');
$mailer = new MadMimi('mutiullah7@gmail.com', '0c52aeebf18f6ddfd114b2e88ac1426b'); 
$user = array('email' => 'emailaddress@example.com', 'firstName' => 'nicholas', 'add_list' => 'Test');
$mailer->AddUser($user);
$lists = $mailer->Lists();
$xml = simplexml_load_string($lists);
foreach($xml->list->attributes() as $a => $b) {
    echo $a,'="',$b,"\"\n";
}*/
submit_button(); ?>
</form>

</div>