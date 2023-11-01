<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'add_meta_boxes' , 'sfba_add_meta_boxes');

/* META BOXES */

function sfba_add_meta_boxes(){
// Shortcode meta box
	add_meta_box( 'sfba_shortcode_meta_box' , 'Shortcode' , 'sfba_shortcode_meta_box_UI' , 'sfba_subscribe_form','side');

// Subscribe Form Showcase meta box
	add_meta_box( 'sfba_form_showcase_meta_box' , 'Step 1: Select Subscribe Form Template' , 'sfba_form_showcase_meta_box_UI' , 'sfba_subscribe_form');

// Meta Box to Load Subscribe Form Template
	add_meta_box( 'sfba_form_load_form' , 'Customization & Subscription Settings' , 'sfba_form_load_form_UI' , 'sfba_subscribe_form');


}
function sfba_shortcode_meta_box_UI( $post ){
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	$sfba_generated_shortcode = get_post_meta($post->ID, '_sfba_shortcode_value', true);
	?>
	<p id="sfba_shortcode_label">Use this shortcode to add Subscribe Form in your posts & pages: </p>
	<input type="text" readonly id="sfba_shortcode_value" name="sfba_shortcode_value" value="[arrow_forms id='<?php echo esc_attr($post->ID); ?>']" />
	<p id="sfba_shortcode_label" >To add Subscribe Form into your Widget area use this shortcode:</p>
	<input type="text" readonly style="font-size: 14px;" id="sfba_shortcode_value" name="sfba_widget_shortcode_value" value="[arrow_forms id='<?php echo esc_attr($post->ID); ?>' widget='true']" />
	<?php
}

function sfba_form_showcase_meta_box_UI( $post ){




	wp_nonce_field( 'sfba_form_options_data' , 'sfba_form_options_nonce_meta_box' );

	$sfba_form_template = get_post_meta($post->ID, '_sfba_form_template', true);
	?>
	<div id="sfba-loading-div" style="display: none;"><img id="sfba-gears" src='<?php echo plugins_url('images/gears.gif',__FILE__);?>'/></div>

	<div id="sfba_form_template_container" class="sfba_form_template_container">
		<input id="sfba_form1_template"  type="radio" name='sfba_form_template' value='subscribeform1'<?php checked( "subscribeform1", $sfba_form_template); ?> />
		<label for="sfba_form1_template"><strong><?php _e('Form 1', 'sfba'); ?></strong></label><br/>
		<label for="sfba_form1_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form1.png'; ?>"/>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form2_template" disabled  type="radio" name='sfbap_form_template'/>
		<label for="sfbap_form2_template"><strong><?php _e('Form 2 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form2_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form2.png'; ?>"/>
		</label>
		<div class="sfba_upgrade_to_pro">
			<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
		</div>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form3_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form3_template"><strong><?php _e('Form 3 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form3_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form3.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form4_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form4_template"><strong><?php _e('Form 4 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form4_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form4.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form5_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form5_template"><strong><?php _e('Form 5 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form5_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form5.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form6_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form6_template"><strong><?php _e('Form 6 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form6_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form6.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form7_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form7_template"><strong><?php _e('Form 7 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form7_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form7.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form8_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form8_template"><strong><?php _e('Form 8 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form8_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form8.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form9_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form9_template"><strong><?php _e('Form 9 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form9_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form9.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form10_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form10_template"><strong><?php _e('Form 10 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form10_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form10.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form11_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form11_template"><strong><?php _e('Form 11 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form11_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form11.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<div id="sfba_form_template_container" class="sfba_form_template_container_pro">
		<input id="sfbap_form12_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form12_template"><strong><?php _e('Form 12 <a href="'.P_UPGRADE_LINK.'" target="_blank" class="upgrade-sfba">'.P_UPGRADE_VERSION_TEXT.'</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form12_template" class="sfbapro_form_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form12.png'; ?>"/>

			<div class="sfba_upgrade_to_pro">
				<?php echo '<a href="'.P_UPGRADE_LINK.'" target="_blank" class="button button-upgrade-pro">'.P_UPGRADE_VERSION_TEXT.'</a>'; ?>
			</div>
		</label>
	</div>
	<input style="opacity: 0;" type="submit" name="submit" id="sfba_submit" class="button button-primary" value="Save Changes"  />
	<?php
	/*include('/../forms/subscribeform1.php');*/
}

function sfba_form_load_form_UI( $post ){
	wp_nonce_field( 'sfba_form_options_data' , 'sfba_form_options_nonce_meta_box' );

	$sfba_selected_form_template = get_post_meta($post->ID, '_sfba_form_template', true);
	$sfba_subscription_selection_dd = get_post_meta($post->ID, '_sfba_subscription_selection_dd', true);
	$sfba_sent_to_email = get_post_meta($post->ID, '_sfba_sent_to_email', true);
	if(isset($sfba_selected_form_template) && $sfba_selected_form_template != ''){

		?>
		<div id="sfba_subscriber_selection_container">
			<table>
				<tr>
					<td>
						<label><strong style="font-size:22px;">Step 2: Select where to save Subscriber info:</strong> </label>
					</td>
					<td>
						<select id="sfba_subscription_selection_dd" name="sfba_subscription_selection_dd">
							<option value="database" <?php selected( $sfba_subscription_selection_dd, 'database' ); ?> data-href="">Local Database</option>
							<option value="" <?php selected( $sfba_subscription_selection_dd, 'mail' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">Sent to Mail  (Upgrade to Pro)</option>
							<option value="mailchimp" <?php selected( $sfba_subscription_selection_dd, 'mailchimp' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">MailChimp  (Upgrade to Pro)</option>
							<option value="getresponse" <?php selected( $sfba_subscription_selection_dd, 'getresponse' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">GetResponse  (Upgrade to Pro)</option>
							<option value="activecampaign" <?php selected( $sfba_subscription_selection_dd, 'activecampaign' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">Active Campaign  (Upgrade to Pro)</option>
							<option value="constantcontact" <?php selected( $sfba_subscription_selection_dd, 'constantcontact' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">Constant Contact  (Upgrade to Pro)</option>
							<option value="convertkit" <?php selected( $sfba_subscription_selection_dd, 'convertkit' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">ConvertKit (Upgrade to Pro)</option>
							<option value="icontact" <?php selected( $sfba_subscription_selection_dd, 'icontact' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">iContact (Upgrade to Pro)</option>
							<option value="hubspot" <?php selected( $sfba_subscription_selection_dd, 'hubspot' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">HubSpot CRM (Upgrade to Pro)</option>
							<option value="mailerlite" <?php selected( $sfba_subscription_selection_dd, 'mailerlite' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">MailerLite (Upgrade to Pro)</option>
							<option value="mailpoet" <?php selected( $sfba_subscription_selection_dd, 'mailpoet' ); ?> data-href="<?php echo P_UPGRADE_LINK; ?>">MailPoet (Upgrade to Pro)</option>
							<option value="sendinblue" <?php selected($sfba_subscription_selection_dd, 'sendinblue'); ?> data-href="<?php echo P_UPGRADE_LINK; ?>"><?php esc_html_e( 'SendinBlue (Upgrade to Pro)' );?></option>
							<option value="gist" <?php selected($sfba_subscription_selection_dd, 'gist'); ?> data-href="<?php echo P_UPGRADE_LINK; ?>"><?php esc_html_e( 'Gist (Upgrade to Pro)' );?></option>
							<option value="sendfox" <?php selected($sfba_subscription_selection_dd, 'sendfox'); ?> data-href="<?php echo P_UPGRADE_LINK; ?>"><?php esc_html_e( 'SendFox (Upgrade to Pro)' );?></option>
							<option value="pipedrive" <?php selected($sfba_subscription_selection_dd, 'pipedrive'); ?> data-href="<?php echo P_UPGRADE_LINK; ?>"><?php esc_html_e( 'Pipedrive (Upgrade to Pro)' );?></option>
						</select>
					</td>
					<td>
					<div id="sfba_mail_selection" style="display: none;">
						<label>Enter email address: </label>
						<input type="email" id="sfba_sent_to_email" name="sfba_sent_to_email" value="<?php echo esc_attr($sfba_sent_to_email); ?>" placeholder="name@domain.com" />
					</div>
						<div id="sfba_mailchimp_selection" style="display: none;">

						<?php
						$get_mc_lists = get_option('sfba_mc_api_key');
						if ($get_mc_lists == '') {
							?>
								<p style="margin: 0;font-size: 17px;">Please set your MailChimp API Key in <a href="<?php echo admin_url( 'edit.php?post_type=sfba_subscribe_form&page=sfba_subscription_settings'); ?>">Subscription Settings Page</a>
								<?php
						}else{
						?>
							<lable>Select your MailChimp List: </lable><span class="sfba-loader-spinner1"></span>
							<?php
							global $wpdb;
					        $sfba_subscription_table = $wpdb->prefix.'sfba_subscription_lists';
					        $service_list = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $sfba_subscription_table WHERE sfba_service_name = %s",'mailchimp'));
					        $selected_mc_service = get_post_meta($post->ID, '_sfba_mailchimp_lists', true);
					        ?>
					        <select name="sfba_mailchimp_lists">
					        	 <?php
								foreach ($service_list as $list) {
							    $id  = $list->sfba_service_list_id;
							    $name  = $list->sfba_service_list_name;
							    ?>
							    <option value="<?php echo esc_attr($id); ?>" <?php selected( $selected_mc_service, $id ); ?>><?php echo esc_attr($name); ?></option>
							    <?php
								}
							?>
					        </select>
					        <?php } ?>
						</div>
						<div id="sfba_getresponse_selection" style="display: none;">
						<?php
						$get_gr_lists = get_option('sfba_gr_api_key');
						if (isset($get_gr_lists) && $get_gr_lists =='') {
							?>
								<p style="margin: 0;font-size: 17px;">Please set your GetResponse API Key in <a href="<?php echo admin_url( 'edit.php?post_type=sfba_subscribe_form&page=sfba_subscription_settings'); ?>">Subscription Settings Page</a>
								<?php
						}else{
							?>
							<lable>Select your GetResponse Campgin Name: </lable>
							<?php
							global $wpdb;
					        $sfba_subscription_table = $wpdb->prefix.'sfba_subscription_lists';
					        $service_list = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $sfba_subscription_table WHERE sfba_service_name = %s",'getresponse'));
					        $selected_gr_service = get_post_meta($post->ID, '_sfba_getresponse_lists', true);

					        ?>
					        <select name="sfba_getresponse_lists">
					        	 <?php
								foreach ($service_list as $list) {
							    $id  = $list->sfba_service_list_id;
							    $name  = $list->sfba_service_list_name;
							    ?>
							    <option value="<?php echo esc_attr($id); ?>" <?php selected( $selected_gr_service, $id ); ?>><?php echo esc_attr($name); ?></option>
							    <?php
								}
							?>
					        </select>
					        <?php } ?>
						</div>
						<div id="sfba_activecampaign_selection" style="display: none;">
							<?php
							$sfba_ac_url = get_option('sfba_ac_url');
							$sfba_ac_api_key = get_option('sfba_ac_api_key');
							if ( isset($sfba_ac_url) && isset($sfba_ac_api_key) && $sfba_ac_url == '') {
								?>
								<p style="margin: 0;font-size: 17px;">Please set your Active Campaign API URL & API Key in <a href="<?php echo admin_url( 'edit.php?post_type=sfba_subscribe_form&page=sfba_subscription_settings' ); ?>">Subscription Settings Page</a>
								<?php
								}else{
								?>
							<lable>Select your Active Campagin List: </lable>
							<?php
							global $wpdb;
					        $sfba_subscription_table = $wpdb->prefix.'sfba_subscription_lists';
					        $service_list = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $sfba_subscription_table WHERE sfba_service_name = %s",'activecampaign'));
					        $selected_ac_service = get_post_meta($post->ID, '_sfba_activecampaign_lists', true);
					        ?>
					        <select name="sfba_activecampaign_lists">
					        	 <?php
								foreach ($service_list as $list) {
							    $id  = $list->sfba_service_list_id;
							    $name  = $list->sfba_service_list_name;
							    ?>
							    <option value="<?php echo esc_attr($id); ?>" <?php selected( $selected_ac_service, $id ); ?>><?php echo esc_attr($name); ?></option>
							    <?php
								}
							?>
					        </select>
					        <?php } ?>


						</div>
					</td>
				</tr>
			</table>
		</div>
	<style type="text/css">
		#sfbap_shortcode_value{
			width: 100%;
			text-align: center;
			color: black;			
			margin-bottom: 10px;
			font-size: 20px;
			margin: 0 auto;
			display: block;
			border: 2px solid #e0e0e0;
			padding: 0;
			margin: 0;
			padding: 22px 0;
		}
		#sfba_shortcode_value{
			width: 100%;
			text-align: center;
			color: black;
			font-weight: bold;
			margin-bottom: 10px;
			font-size: 20px;
			margin: 0 auto;
			display: block;
			border: 2px solid #e0e0e0;
			padding: 0;
			margin: 0;
			padding: 22px 0;
		}		
		</style>
<p readonly id="sfbap_shortcode_value" name="sfbap_shortcode_value" style="text-align: ;">
	Step 3: Save Form & Copy this shortcode and paste into your post or page where you want to show the form </br>        <span id="sfba-subscribe-shortcode">[arrow_forms id='<?php echo esc_attr($post->ID); ?>']</span>
	<button class="copy-to-clipboard button" data-clipboard-action="copy"  data-clipboard-target="#sfba-subscribe-shortcode"><?php _e( 'Copy'); ?></button>
</p>
<div id="sfba-form-customizer-container" style="">
	<div id="sfba_option_subcontainer">
		<?php include( SFBA_PLUGIN_PATH . 'forms/'.$sfba_selected_form_template.'-options.php'); ?>
	</div>
	<div id="sfba_form_view_container">
		<?php
			include( SFBA_PLUGIN_PATH . 'forms/'.$sfba_selected_form_template.'.php');
		?>
	</div>

	<p class="sfba-update-button" style="text-align:center">
		<input name="save" type="submit" class="sfba-update-form-button button button-primary button-large" id="publish" value="Save Changes">
	</p>
</div> <?php
} else {
	?>
		<input type="hidden" name="sfba_subscription_selection_dd" value="database" />
		<?php
}
}

add_filter( 'gettext', 'change_publish_button', 10, 2 );

function change_publish_button( $translation, $text ) {
	if ( 'sfba_subscribe_form' == get_post_type())
		switch($text) {
			case "Publish":                    
				return "Save Form";
			case "Published on: <b>%s</b>":  
				return "Saved on: <b>%s</b>";
			case "Publish <b>immediately</b>": 
				return "Approve <b>immediately</b>";
			case "Publish on: <b>%s</b>":    
				return "Approve on: <b>%s</b>";
			case "Privately Published":        
				return "Privately Saved";
			case "Published":                  
				return "Form Saved";
			case "Save & Publish":            
				return "Save & Publish Form"; //"Double-save"? :)
			default:                           
				return $translation;
		}
return $translation;
}