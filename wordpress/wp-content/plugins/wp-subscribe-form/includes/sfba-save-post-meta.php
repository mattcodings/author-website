<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'save_post', 'sfba_save_form' );

function sfba_save_form( $post_id) {
	/*// Check the value of nonce, if it's Set or not
	if ( ! isset( $_POST['sfba_form_options_nonce_meta_box'] ) ){
		return;
	}
	// Verifying the value of nonce, if it's comes sfba_options_nonce meta box 
	//nonce value and the function name which is saving the for options
	if ( ! wp_verify_nonce( $_POST['sfba_form_options_nonce_meta_box'] , 'sfba_save_form' ) ){
		return;
	}*/
	
	if ( ! isset( $_POST['sfba_form_options_nonce_meta_box'] ) ){
		return;
	}
	$post_type = get_post_type($post_id);
	// If this isn't a 'sfba_subscribe_form' post, don't update it.
	if ( "sfba_subscribe_form" != $post_type ) {
		return;
	}

	// Stop WP from clearing custom fields on autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	// Prevent quick edit from clearing custom fields
	if (defined('DOING_AJAX') && DOING_AJAX){
		return;
	}
	// - Update the post's metadata.

	if ( isset( $_POST['sfba_shortcode_value'] ) ) {
		update_post_meta( $post_id, '_sfba_shortcode_value', sanitize_text_field( $_POST['sfba_shortcode_value'] ) );
	}
	if ( isset( $_POST['sfba_widget_shortcode_value'] ) ) {
		update_post_meta( $post_id, '_sfba_widget_shortcode_value', sanitize_text_field( $_POST['sfba_widget_shortcode_value'] ) );
	}
	if (isset($_POST['sfba_form_template'])) {
		update_post_meta($post_id, '_sfba_form_template', sanitize_text_field( $_POST['sfba_form_template'] ) );
	} 
	if (isset($_POST['sfba_subscription_selection_dd'])) {
		update_post_meta($post_id, '_sfba_subscription_selection_dd', sanitize_text_field( $_POST['sfba_subscription_selection_dd'] ) );
	} 
	if (isset($_POST['sfba_sent_to_email'])) {
		update_post_meta($post_id, '_sfba_sent_to_email', sanitize_text_field( $_POST['sfba_sent_to_email'] ) );
	} 
	if (isset($_POST['sfba_mailchimp_lists'])) {
		update_post_meta($post_id, '_sfba_mailchimp_lists', sanitize_text_field( $_POST['sfba_mailchimp_lists'] ) );
	} 
	if (isset($_POST['sfba_getresponse_lists'])) {
		update_post_meta($post_id, '_sfba_getresponse_lists', sanitize_text_field( $_POST['sfba_getresponse_lists'] ) );
	} 
	if (isset($_POST['sfba_activecampaign_lists'])) {
		update_post_meta($post_id, '_sfba_activecampaign_lists', sanitize_text_field( $_POST['sfba_activecampaign_lists'] ) );
	} 

	// Updating Form Data according to the form selection
	// Form1 Saving Data
	update_post_meta($post_id, '_sfba-form1-consent-on', @$_POST['sfba-form1-consent-on'] );
	update_post_meta($post_id, '_sfba-form1-consent-field', @$_POST['sfba-form1-consent-field'] );

	if ( isset( $_POST['sfba-form1-consent-errortxt'] ) ) {
		update_post_meta( $post_id, '_sfba-form1-consent-errortxt', $_POST['sfba-form1-consent-errortxt'] );
	}
	
	if ( isset( $_POST['sfba-form1-consent-color'] ) ) {
		update_post_meta( $post_id, '_sfba-form1-consent-color', $_POST['sfba-form1-consent-color'] );
	}
	if ( isset( $_POST['sfba-form1-email-required-msg'] ) ) {
		update_post_meta( $post_id, '_sfba-form1-email-required-msg', $_POST['sfba-form1-email-required-msg'] );
	}
	
	
	if ( isset($_POST['sfba-form1-display-name'])) {
		update_post_meta($post_id, '_sfba-form1-display-name', '' );
	} else {
		update_post_meta($post_id, '_sfba-form1-display-name', 'yes' );
	}

	if (isset($_POST['sfba-form1-field-position'])) {
		update_post_meta($post_id, '_sfba-form1-field-position', sanitize_text_field( $_POST['sfba-form1-field-position'] ) );
	}

	if (isset($_POST['sfba-form1-redirect-after-submission'])) {
		update_post_meta($post_id, '_sfba-form1-redirect-after-submission', sanitize_text_field( $_POST['sfba-form1-redirect-after-submission'] ) );
	} else {
		update_post_meta($post_id, '_sfba-form1-redirect-after-submission', '');
	}
	update_post_meta($post_id, '_sfba-form1-redirect-after-submission-url', sanitize_text_field( @$_POST['sfba-form1-redirect-after-submission-url'] ) );
	update_post_meta($post_id, '_sfba-form1-open-new-tab', sanitize_text_field( @$_POST['sfba-form1-open-new-tab'] ) );


	if (isset($_POST['sfba-form1-fonts'])) {
		update_post_meta($post_id, '_sfba-form1-fonts', sanitize_text_field( $_POST['sfba-form1-fonts'] ) );
	} 
	update_post_meta( $post_id, '_sfba-form1-email-placeholder', @$_POST['sfba-form1-email-placeholder'] );


	if (isset($_POST['sfba-form1-width'])) {
		update_post_meta($post_id, '_sfba-form1-width', sanitize_text_field( $_POST['sfba-form1-width'] ) );
	} 
	if (isset($_POST['sfba-form1-background-image'])) {
		update_post_meta($post_id, '_sfba-form1-background-image', sanitize_text_field( $_POST['sfba-form1-background-image'] ) );
	} 
	if (isset($_POST['sfba-form1-background-color'])) {
		update_post_meta($post_id, '_sfba-form1-background-color', sanitize_text_field( $_POST['sfba-form1-background-color'] ) );
	} 
	if (isset($_POST['sfba-form1-heading'])) {
		update_post_meta($post_id, '_sfba-form1-heading', sanitize_text_field( $_POST['sfba-form1-heading'] ) );
	} 
	if (isset($_POST['sfba-form1-heading-color'])) {
		update_post_meta($post_id, '_sfba-form1-heading-color', sanitize_text_field( $_POST['sfba-form1-heading-color'] ) );
	} 
	if (isset($_POST['sfba-form1-sub-heading'])) {
		update_post_meta($post_id, '_sfba-form1-sub-heading', sanitize_text_field( $_POST['sfba-form1-sub-heading'] ) );
	}
	if (isset($_POST['sfba-form1-sub-heading-color'])) {
		update_post_meta($post_id, '_sfba-form1-sub-heading-color', sanitize_text_field( $_POST['sfba-form1-sub-heading-color'] ) );
	} 
	if (isset($_POST['sfba-form1-subscribe-button-text'])) {
		update_post_meta($post_id, '_sfba-form1-subscribe-button-text', sanitize_text_field( $_POST['sfba-form1-subscribe-button-text'] ) );
	} 
	if (isset($_POST['sfba-form1-border-size'])) {
		update_post_meta($post_id, '_sfba-form1-border-size', sanitize_text_field( $_POST['sfba-form1-border-size'] ) );
	} 
	if (isset($_POST['sfba-form1-border-style'])) {
		update_post_meta($post_id, '_sfba-form1-border-style', sanitize_text_field( $_POST['sfba-form1-border-style'] ) );
	} 
	if (isset($_POST['sfba-form1-border-color'])) {
		update_post_meta($post_id, '_sfba-form1-border-color', sanitize_text_field( $_POST['sfba-form1-border-color'] ) );
	} 
	if (isset($_POST['sfba-form1-field-border-color'])) {
		update_post_meta($post_id, '_sfba-form1-field-border-color', sanitize_text_field( $_POST['sfba-form1-field-border-color'] ) );
	}	  
	if (isset($_POST['sfba-form1-button-background-color'])) {
		update_post_meta($post_id, '_sfba-form1-button-background-color', sanitize_text_field( $_POST['sfba-form1-button-background-color'] ) );
	} 
	if (isset($_POST['sfba-form1-button-text-size'])) {
		update_post_meta($post_id, '_sfba-form1-button-text-size', sanitize_text_field( $_POST['sfba-form1-button-text-size'] ) );
	} 
	if (isset($_POST['sfba-form1-button-text-color'])) {
		update_post_meta($post_id, '_sfba-form1-button-text-color', sanitize_text_field( $_POST['sfba-form1-button-text-color'] ) );
	} 
	if (isset($_POST['sfba-form1-button-border-color'])) {
		update_post_meta($post_id, '_sfba-form1-button-border-color', sanitize_text_field( $_POST['sfba-form1-button-border-color'] ) );
	} 
	/* Update attention effect field */
	if ( isset( $_POST['sfba-form1-attention-effect'] ) ) {
		update_post_meta( $post_id, '_sfba-form1-attention-effect', $_POST['sfba-form1-attention-effect'] );
	}


	// End Form1 Saving Data

}