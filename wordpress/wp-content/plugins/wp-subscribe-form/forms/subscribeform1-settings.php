<?php
$consent_on = get_post_meta($post->ID, '_sfba-form1-consent-on', true);

if ( get_post_meta($post->ID, '_sfba-form1-consent-field', true)  ){
	$form_conset_field = get_post_meta($post->ID, '_sfba-form1-consent-field', true);
} else {
	$form_conset_field = 'I agree to get email updates';
}

if ( get_post_meta($post->ID, '_sfba-form1-consent-errortxt', true)  ){
	$consent_errortxt = get_post_meta($post->ID, '_sfba-form1-consent-errortxt', true);
} else {
	$consent_errortxt = 'Please Select "I agree to get email updates" options.';
}

if ( get_post_meta($post->ID, '_sfba-form1-consent-color', true)  ){
	$form_consent_color = get_post_meta($post->ID, '_sfba-form1-consent-color', true);
} else {
	$form_consent_color = '#ffffff';
}

$display_name = get_post_meta($post->ID, '_sfba-form1-display-name', true);

if( get_post_meta($post->ID, '_sfba-form1-fonts', true)  )
	$sfba_form1_fonts = get_post_meta($post->ID, '_sfba-form1-fonts', true);
else
	$sfba_form1_fonts = 'Poppins';

if( get_post_meta($post->ID, '_sfba-form1-field-position', true) )
	$field_position = get_post_meta($post->ID, '_sfba-form1-field-position', true);
else
	$field_position = 'name-first';

if( get_post_meta( $post->ID, '_sfba-form1-email-placeholder', true ) )
	$email_placeholder = get_post_meta( $post->ID, '_sfba-form1-email-placeholder', true );
else
	$email_placeholder = 'Your Email';

if( get_post_meta( $post->ID, '_sfba-form1-email-required-msg', true ) )
	$email_required_msg = get_post_meta( $post->ID, '_sfba-form1-email-required-msg', true );
else
	$email_required_msg = 'Email field is required to subscribe.';

$redirect_after_submission = get_post_meta($post->ID, '_sfba-form1-redirect-after-submission', true);
$redirect_after_submission_url = get_post_meta($post->ID, '_sfba-form1-redirect-after-submission-url', true);
$open_new_tab = get_post_meta($post->ID, '_sfba-form1-open-new-tab', true);

if( get_post_meta($post->ID, '_sfba-form1-width', true) )
$form_width = get_post_meta($post->ID, '_sfba-form1-width', true);
else
$form_width = '450';

if( get_post_meta($post->ID, '_sfba-form1-background-image', true))
$form_background_image = get_post_meta($post->ID, '_sfba-form1-background-image', true);

if( get_post_meta($post->ID, '_sfba-form1-background-color', true))
$form_background_color = get_post_meta($post->ID, '_sfba-form1-background-color', true);
else
$form_background_color = '#102341';

if( get_post_meta($post->ID, '_sfba-form1-heading', true) || metadata_exists('post', $post->ID, '_sfba-form1-heading'))
$form_heading = get_post_meta($post->ID, '_sfba-form1-heading', true);
else
$form_heading = 'Offers & Crazy Deal';

if( get_post_meta($post->ID, '_sfba-form1-heading-color', true))
$form_heading_color = get_post_meta($post->ID, '_sfba-form1-heading-color', true);
else
$form_heading_color = '#FFFFFF';

if( get_post_meta($post->ID, '_sfba-form1-sub-heading', true) || metadata_exists('post', $post->ID, '_sfba-form1-sub-heading') )
$form_sub_heading = get_post_meta($post->ID, '_sfba-form1-sub-heading', true);
else
$form_sub_heading = 'JOIN OUR MAIL LIST FOR EXCLUSIVE';

if( get_post_meta($post->ID, '_sfba-form1-sub-heading-color', true))
$form_sub_heading_color = get_post_meta($post->ID, '_sfba-form1-sub-heading-color', true);
else
$form_sub_heading_color = '#2DE8BF';

if( get_post_meta($post->ID, '_sfba-form1-subscribe-button-text', true) || metadata_exists('post', $post->ID, '_sfba-form1-subscribe-button-text'))
$button_text = get_post_meta($post->ID, '_sfba-form1-subscribe-button-text', true);
else
$button_text = 'SUBSCRIBE NOW!';

if( get_post_meta($post->ID, '_sfba-form1-border-size', true) || metadata_exists('post', $post->ID, '_sfba-form1-border-size') )
$border_size = get_post_meta($post->ID, '_sfba-form1-border-size', true);
else
$border_size = '1';

if( get_post_meta($post->ID, '_sfba-form1-border-style', true) !='Select Border Style' && get_post_meta($post->ID, '_sfba-form1-border-style', true) || metadata_exists('post', $post->ID, '_sfba-form1-border-style') )
$border_style = get_post_meta($post->ID, '_sfba-form1-border-style', true);
else
$border_style = 'solid';

if( get_post_meta($post->ID, '_sfba-form1-border-color', true))
$border_color = get_post_meta($post->ID, '_sfba-form1-border-color', true);
else
$border_color = '#61BD6D';

if( get_post_meta($post->ID, '_sfba-form1-field-border-color', true ))
$field_border_color = get_post_meta($post->ID, '_sfba-form1-field-border-color', true);
else
$field_border_color = 'transparent';

if( get_post_meta($post->ID, '_sfba-form1-button-background-color', true))
$button_background_color = get_post_meta($post->ID, '_sfba-form1-button-background-color', true);
else
$button_background_color = '#2DE8BF';

if( get_post_meta($post->ID, '_sfba-form1-button-text-size', true))
$button_text_size = get_post_meta($post->ID, '_sfba-form1-button-text-size', true);
else
$button_text_size = '11';

if( get_post_meta($post->ID, '_sfba-form1-button-text-color', true) )
$button_text_color = get_post_meta($post->ID, '_sfba-form1-button-text-color', true);
else
$button_text_color = '#102341';

if( get_post_meta($post->ID, '_sfba-form1-button-border-color', true))
$button_border_color = get_post_meta($post->ID, '_sfba-form1-button-border-color', true);
else
$button_border_color = 'transparent';

if( get_post_meta( $post->ID, '_sfba-form1-attention-effect', true ) )
$attention_effect = get_post_meta( $post->ID, '_sfba-form1-attention-effect', true );
else
$attention_effect = 'default';