<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Allow shortcodes in widget areas */
add_filter('widget_text','do_shortcode');
add_shortcode( 'arrow_forms', 'sfba_arrow_forms_shortcode' );
function sfba_arrow_forms_shortcode($atts , $content){

	extract( shortcode_atts( array( 'id' => null , 'widget' => 'false' ) , $atts ) );
	
	$default_fonts = array('Arial', 'Tahoma', 'Verdana', 'Helvetica', 'Times New Roman', 'Trebuchet MS', 'Georgia');
	$sfba_subscribe_form = get_post_meta( $id,'_sfba_form_template',true);
	ob_start();
	if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform1') {
		$form_conset_field = get_post_meta($id, '_sfba-form1-consent-field', true);
		$consent_on = get_post_meta($id, '_sfba-form1-consent-on', true);
		
		if ( get_post_meta( $id, '_sfba-form1-consent-errortxt', true ) != '' ){
			$consent_errortxt = get_post_meta( $id, '_sfba-form1-consent-errortxt', true );
		} else {
			$consent_errortxt = 'Please Select "I agree to get email updates" options.';
		}
		if ( get_post_meta($id, '_sfba-form1-consent-color', true)  ){
			$form_consent_color = get_post_meta($id, '_sfba-form1-consent-color', true);
		} else {
			$form_consent_color = '#ffffff';
		}
		
		$display_name = get_post_meta($id, '_sfba-form1-display-name', true);
		
		if( get_post_meta($id, '_sfba-form1-field-position', true) !='' )
			$field_position = get_post_meta($id, '_sfba-form1-field-position', true);
		else
			$field_position = 'name-first';
		$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';		
			
		if( get_post_meta($id, '_sfba-form1-fonts', true ) !='' )
			$form_fonts = get_post_meta($id, '_sfba-form1-fonts', true );
		else
			$form_fonts = 'Poppins';
		
		if( get_post_meta($id, '_sfba-form1-email-required-msg', true ) !='' )
			$email_required_msg = get_post_meta($id, '_sfba-form1-email-required-msg', true );
		else
			$email_required_msg = 'Email field is required to subscribe.';
		
		if( get_post_meta( $id, '_sfba-form1-email-placeholder', true ) != '' )
			$email_placeholder = get_post_meta( $id, '_sfba-form1-email-placeholder', true );
		else
			$email_placeholder = 'Your Email';
		
		if( get_post_meta($id, '_sfba-form1-width', true) !='' )
			$form_width = get_post_meta($id, '_sfba-form1-width', true);
		else
			$form_width = '450';

		if( get_post_meta($id, '_sfba-form1-background-image', true) !='' )
			$form_background_image = get_post_meta($id, '_sfba-form1-background-image', true);
		else
			$form_background_image = '';

		if( get_post_meta($id, '_sfba-form1-background-color', true) !='' )
			$form_background_color = get_post_meta($id, '_sfba-form1-background-color', true);
		else
			$form_background_color = '#102341';

		if( get_post_meta($id, '_sfba-form1-heading', true) || metadata_exists('post', $id, '_sfba-form1-heading') )
			$form_heading = get_post_meta($id, '_sfba-form1-heading', true);
		else
			$form_heading = 'Offers & Crazy Deal';

		if( get_post_meta($id, '_sfba-form1-heading-color', true) !='' )
			$form_heading_color = get_post_meta($id, '_sfba-form1-heading-color', true);
		else
			$form_heading_color = '#ffffff';

		if( get_post_meta($id, '_sfba-form1-sub-heading', true) || metadata_exists('post', $id, '_sfba-form1-sub-heading') )
			$form_sub_heading = get_post_meta($id, '_sfba-form1-sub-heading', true);
		else
			$form_sub_heading = 'JOIN OUR MAIL LIST FOR EXCLUSIVE';

		if( get_post_meta($id, '_sfba-form1-sub-heading-color', true) !='' )
			$form_sub_heading_color = get_post_meta($id, '_sfba-form1-sub-heading-color', true);
		else
			$form_sub_heading_color = '#2DE8BF';

		if( get_post_meta($id, '_sfba-form1-subscribe-button-text', true) || metadata_exists('post', $id, '_sfba-form1-subscribe-button-text')  )
			$button_text = get_post_meta($id, '_sfba-form1-subscribe-button-text', true);
		else
			$button_text = 'SUBSCRIBE NOW!';

		if( get_post_meta($id, '_sfba-form1-border-size', true) !='' )
			$border_size = get_post_meta($id, '_sfba-form1-border-size', true);
		else
			$border_size = '1';

		if( get_post_meta($id, '_sfba-form1-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form1-border-style', true) !='' )
			$border_style = get_post_meta($id, '_sfba-form1-border-style', true);
		else
			$border_style = 'solid';

		if( get_post_meta($id, '_sfba-form1-border-color', true) !='' )
			$border_color = get_post_meta($id, '_sfba-form1-border-color', true);
		else
			$border_color = 'transparent';

		if( get_post_meta($id, '_sfba-form1-field-border-color', true) !='' )
			$field_border_color = get_post_meta($id, '_sfba-form1-field-border-color', true);
		else
			$field_border_color = 'transparent';

		if( get_post_meta($id, '_sfba-form1-button-background-color', true) !='' )
			$button_background_color = get_post_meta($id, '_sfba-form1-button-background-color', true);
		else
			$button_background_color = '#2DE8BF';

		if( get_post_meta($id, '_sfba-form1-button-text-size', true) !='' )
			$button_text_size = get_post_meta($id, '_sfba-form1-button-text-size', true);
		else
			$button_text_size = '11';

		if( get_post_meta($id, '_sfba-form1-button-text-color', true) !='' )
			$button_text_color = get_post_meta($id, '_sfba-form1-button-text-color', true);
		else
			$button_text_color = '#102341';

		if( get_post_meta($id, '_sfba-form1-button-border-color', true) !='' )
			$button_border_color = get_post_meta($id, '_sfba-form1-button-border-color', true);
		else
			$button_border_color = 'transparent';
		
		if( get_post_meta( $id, '_sfba-form1-attention-effect', true ) )
			$attention_effect = get_post_meta( $id, '_sfba-form1-attention-effect', true );
		else
			$attention_effect = 'default';
		
		$sfba_post_fix = rand( 10, 1000 );
		if ( !in_array( $form_fonts, $default_fonts)):?>
		<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet" type="text/css" class="sfba-google-font">
		<?php endif;?>
		<style>
			#sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?> #sfba-form2-container{
				width: <?php echo esc_attr($form_width);?>px;
				border: <?php echo esc_attr($border_size); ?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color) ?>;
				font-family: '<?php echo esc_attr($form_fonts);?>';
				display: block;
				text-align: center;
				padding: 20px 20px 15px;
				background-color: <?php echo esc_attr($form_background_color); ?>;
				background-image: url('<?php echo esc_attr($form_background_image); ?>');
				background-size: cover;
				background-repeat: no-repeat;
			    margin: 0 auto;
			    position: relative;
			}
			#sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?> .subscribeform1_sub_heading {
			    margin: 0;
			    color: <?php echo esc_attr($form_sub_heading_color) ?>;
			    font-size: 14px;
			    line-height: 21px;
			    font-family: inherit;
			}
			#sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?> #sfba-form2-container #sfba-form2-heading {
			    margin: 0 0 10px;
			    line-height: 48px;
			    font-weight: bold;
			    font-size: 32px;
			    color: <?php echo esc_attr($form_heading_color) ?>;
			    font-family: inherit;
			    padding: 0;
			}
			#sfba-form2-container #sfba-form2-heading:before,
			#sfba-form2-container #sfba-form2-heading:after{
				display:none;
			}
			.sfba_subscribe_form__fields_wrap {
			    width: 100%;
			    margin: 0 auto;
			    max-width: 320px;
			}
			#sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?> .sfba_subscribe_form__fields .sfba-form2-fields {
				width: 100%;
				box-shadow: none;
				padding-left: 15px;
				margin-top: 8px;
				font-size: 11px;
				background-color: #ffffff;
				border: 1px solid <?php echo esc_attr($field_border_color) ?>;
				border-radius: 0;
				color: #7E7E7E;
				height: 32px;
				font-weight: 400;
				font-family: inherit;
				outline: none;
				margin-bottom: 0;
			}
			#sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?> .sfba-form2-consent-fields-main {
			    text-align: left;
			    margin: 12px auto 5px;
			    color: <?php echo esc_attr($form_consent_color) ?>;
		        line-height: 1;
			}
			.sfba-form2-consent-fields-main label {
			    margin-bottom: 0;
			    font-weight: 400;
				font-size: 13px
			}
			.sfba-form2-consent-fields-main label input[type="checkbox"] {
			    margin: 0 10px 0 0;
			    display: inline-block;
			    vertical-align: middle;
			}
			.sfba-conset-field-error {
			    text-align: left;
			    line-height: 1.2;
			    margin-top: 10px;
			}
			#sfba-success-message{
				display: none;
				margin: 0;
				width: 100%;
				text-align: center;
				padding: 10px 20px;
				font-family: monospace;
				font-size: 14px;
				letter-spacing: 1px;
			}
			#sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?> #sfba-form2-button {
			    width: 100%;
			    display: block;
			    border: none;
			    margin-top: 10px;
			    background-color: <?php echo esc_attr($button_background_color); ?>;
			    color: <?php echo esc_attr($button_text_color); ?>;
			    font-size: <?php echo esc_attr($button_text_size);?>px;
			    padding: 10px;
			    font-weight: 600;
				font-family: inherit;
			    cursor: pointer;
			    outline: none;
			    line-height: 1.2;
			    border-radius: 0;
			}	
			.sfba_subscribe_form__fields.sfba_email_first{
				display: flex;
				flex-direction: column;		
			}	
			.sfba_subscribe_form__fields.sfba_email_first .sfba-form-email{
				order: 1;
			}
			.sfba_subscribe_form__fields.sfba_email_first .sfba-form-name{
				order: 2;
			}
			#sfba_thanks_container {
			    display: flex;
			    align-items: center;
			    width: 100%;
			    height: 100%;
			    position: absolute;
			    background: rgba(0, 0, 0, 0.8);
			    top: 0px;
			    left: 0px;
			    opacity: 1;
			}
			#sfba_thanks_image {
			    margin: 0;
			}
			#sfba_thanks_message {
			    margin: 0;
			    text-align: center;
			    font-size: 22px;
			    color: #fff;
			    font-family: inherit;
			    padding: 0 15px;
			    line-height: 1.2;
			}
			@media only screen and (max-width: 600px) { 
				#sfba-form2-container {
					width: 100%;				
				}
			} 
			.sfba-form-credit {
				margin: 25px 0 -5px -10px;
				padding: 10px 0 0 0;
				font-size: 12px;
				text-align: left;
				text-decoration: none;
			}
			.sfba-form-credit a {
			   color: #FFFFFF;
			   text-decoration: none !important;
			   background: rgba(140,140,140,0.5);
			   border-radius: 8px;
			   padding: 3px;
			}

			.sfba-form-credit a:hover {
			   color: #e6e6e6;
			}
			form#sfba_subscribe_form #sfba_thanks_image.sfba-noempty {
				margin: 0 auto 20px;
				max-width: 128px;
				max-height: 128px;
				overflow: hidden;
			}
			/* Animated Buttons */
			#sfba-form2-button {
				-webkit-animation: 1s;
				animation-duration: 1s;
			}
			@-webkit-keyframes flash {
				from,
				50%,
				to {
					opacity: 1;
				}

				25%,
				75% {
					opacity: 0;
				}
			}
			@keyframes flash {
				from,
				50%,
				to {
					opacity: 1;
				}

				25%,
				75% {
					opacity: 0;
				}
			}
			.sfba-attention-effect-flash.animation-start #sfba-form2-button {
				-webkit-animation-name: flash;
				animation-name: flash;
			}

			@keyframes shake {
				from,
				to {
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}

				10%,
				30%,
				50%,
				70%,
				90% {
					-webkit-transform: translate3d(-10px, 0, 0);
					transform: translate3d(-10px, 0, 0);
				}

				20%,
				40%,
				60%,
				80% {
					-webkit-transform: translate3d(10px, 0, 0);
					transform: translate3d(10px, 0, 0);
				}
			}

			.sfba-attention-effect-shake.animation-start #sfba-form2-button {
				-webkit-animation-name: shake;
				animation-name: shake;
			}

			@-webkit-keyframes swing {
				20% {
					-webkit-transform: rotate3d(0, 0, 1, 15deg);
					transform: rotate3d(0, 0, 1, 15deg);
				}

				40% {
					-webkit-transform: rotate3d(0, 0, 1, -10deg);
					transform: rotate3d(0, 0, 1, -10deg);
				}

				60% {
					-webkit-transform: rotate3d(0, 0, 1, 5deg);
					transform: rotate3d(0, 0, 1, 5deg);
				}

				80% {
					-webkit-transform: rotate3d(0, 0, 1, -5deg);
					transform: rotate3d(0, 0, 1, -5deg);
				}

				to {
					-webkit-transform: rotate3d(0, 0, 1, 0deg);
					transform: rotate3d(0, 0, 1, 0deg);
				}
			}

			@keyframes swing {
				20% {
					-webkit-transform: rotate3d(0, 0, 1, 15deg);
					transform: rotate3d(0, 0, 1, 15deg);
				}

				40% {
					-webkit-transform: rotate3d(0, 0, 1, -10deg);
					transform: rotate3d(0, 0, 1, -10deg);
				}

				60% {
					-webkit-transform: rotate3d(0, 0, 1, 5deg);
					transform: rotate3d(0, 0, 1, 5deg);
				}

				80% {
					-webkit-transform: rotate3d(0, 0, 1, -5deg);
					transform: rotate3d(0, 0, 1, -5deg);
				}

				to {
					-webkit-transform: rotate3d(0, 0, 1, 0deg);
					transform: rotate3d(0, 0, 1, 0deg);
				}
			}

			.sfba-attention-effect-swing.animation-start #sfba-form2-button {
				-webkit-transform-origin: top center;
				transform-origin: top center;
				-webkit-animation-name: swing;
				animation-name: swing;
			}

			@-webkit-keyframes tada {
				from {
					-webkit-transform: scale3d(1, 1, 1);
					transform: scale3d(1, 1, 1);
				}

				10%,
				20% {
					-webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
					transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
				}

				30%,
				50%,
				70%,
				90% {
					-webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
					transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
				}

				40%,
				60%,
				80% {
					-webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
					transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
				}

				to {
					-webkit-transform: scale3d(1, 1, 1);
					transform: scale3d(1, 1, 1);
				}
			}

			@keyframes tada {
				from {
					-webkit-transform: scale3d(1, 1, 1);
					transform: scale3d(1, 1, 1);
				}

				10%,
				20% {
					-webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
					transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
				}

				30%,
				50%,
				70%,
				90% {
					-webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
					transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
				}

				40%,
				60%,
				80% {
					-webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
					transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
				}

				to {
					-webkit-transform: scale3d(1, 1, 1);
					transform: scale3d(1, 1, 1);
				}
			}

			.sfba-attention-effect-tada.animation-start #sfba-form2-button {
				-webkit-animation-name: tada;
				animation-name: tada;
			}

			@-webkit-keyframes heartBeat {
				0% {
					-webkit-transform: scale(1);
					transform: scale(1);
				}

				14% {
					-webkit-transform: scale(1.3);
					transform: scale(1.3);
				}

				28% {
					-webkit-transform: scale(1);
					transform: scale(1);
				}

				42% {
					-webkit-transform: scale(1.3);
					transform: scale(1.3);
				}

				70% {
					-webkit-transform: scale(1);
					transform: scale(1);
				}
			}

			@keyframes heartBeat {
				0% {
					-webkit-transform: scale(1);
					transform: scale(1);
				}

				14% {
					-webkit-transform: scale(1.3);
					transform: scale(1.3);
				}

				28% {
					-webkit-transform: scale(1);
					transform: scale(1);
				}

				42% {
					-webkit-transform: scale(1.3);
					transform: scale(1.3);
				}

				70% {
					-webkit-transform: scale(1);
					transform: scale(1);
				}
			}

			.sfba-attention-effect-heartbeat.animation-start #sfba-form2-button {
			  -webkit-animation-name: heartBeat;
			  animation-name: heartBeat;
			  -webkit-animation-duration: 1.3s;
			  animation-duration: 1.3s;
			  -webkit-animation-timing-function: ease-in-out;
			  animation-timing-function: ease-in-out;
			}

			@-webkit-keyframes wobble {
				from {
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}

				15% {
					-webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
					transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
				}

				30% {
					-webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
					transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
				}

				45% {
					-webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
					transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
				}

				60% {
					-webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
					transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
				}

				75% {
					-webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
					transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
				}

				to {
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
			}

			@keyframes wobble {
				from {
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}

				15% {
					-webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
					transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
				}

				30% {
					-webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
					transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
				}

				45% {
					-webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
					transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
				}

				60% {
					-webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
					transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
				}

				75% {
					-webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
					transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
				}

				to {
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
			}

			.sfba-attention-effect-wobble.animation-start #sfba-form2-button {
				-webkit-animation-name: wobble;
				animation-name: wobble;
			}
			.sfba-main-form-container .sfba-email-field-error,
			.sfba-main-form-container .sfba-conset-field-error {
				text-align: left;
				line-height: 1.2;
				margin-top: 10px;
				font-family: inherit;
				font-size: 15px;
			}
			@media only screen and (max-width: 991px) {
				.sfba_subscribe_form .sfba-main-form-container {
					width: 100% !important;
				}
			}
			input.sfba-form-fields::placeholder { / Chrome, Firefox, Opera, Safari 10.1+ /
			  color: #7E7E7E;
			  opacity: 1; / Firefox /
			}
			input.sfba-form-fields:-ms-input-placeholder { / Internet Explorer 10-11 /
			  color: #7E7E7E;
			}
			input.sfba-form-fields::-ms-input-placeholder { / Microsoft Edge /
			  color: #7E7E7E;
			}
			form.sfba_subscribe_form,
			form.sfba_subscribe_form * {
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}	
			#sfba_thanks_image.sfba-noempty {
				margin: 0 auto 10px;
				max-width: 100px;
				max-height: 100px;
				overflow: hidden;
			}
			#sfba_thanks_image img {
				width: auto;
				height: auto;
				max-width: 100%;
				max-height: 100%;
				margin: 0 auto;
			}
			#sfba_thanks_message {
				margin: 0;
				text-align: center;
				font-size: 20px;
				color: #fff;
				font-family: inherit;
				padding: 0 15px;
				line-height: 1.2;
			}
			.sfba_thanks_container a.sfba-form-close {
				width: 16px;
				height: 16px;
				line-height: 16px;
				position: absolute;
				top: 6px;
				right: 6px;
				z-index: 1;
				opacity: .75;
				color: #ffffff;
				text-decoration: none;
				font-size: 36px;
			}			
		</style>
		<form id="sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?>" class="sfba_subscribe_form" action="" method="POST">
			<div id="sfba-form2-container" class="sfba-main-form-container <?php echo esc_attr($sfba_subscribe_form) . ' sfba-attention-effect-' . $attention_effect; ?>">
				<p class="subscribeform1_sub_heading"><?php echo esc_attr($form_sub_heading);?></p>
				<h2 id="sfba-form2-heading"><?php echo esc_attr($form_heading);?></h2>
				<div class="sfba_subscribe_form__fields_wrap">
					<div class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
						<?php if ( $display_name != 'yes' ):?>
							<input id="sfba-form2-name" name="sfba-form-name" class="sfba-form2-fields sfba-form-name" type="text" value="" placeholder="Your Name">
						<?php endif;?>
							<input id="sfba-form2-email" name="sfba-form-email" class="sfba-form2-fields sfba-form-email" type="email" value="" placeholder="<?php echo esc_attr($email_placeholder); ?>">
					</div>
					<?php if ( $consent_on == 'yes' ) { ?>
						<p class="sfba-form2-consent-fields-main">
							<label>
								<input type="checkbox" name="sfba-form2-consent-field" value="1" />
								<span><?php echo esc_attr($form_conset_field);?></span>
							</label>
						</p>					
						<p class="sfba-form2-fields sfba-conset-field-error error" style="display:none; color:#ff0606;"><?php echo wp_kses($consent_errortxt, array());?></p>
					<?php }?>
					
					<p class="sfba-email-field-error error" style="display:none; color:#ff0606;"><?php echo esc_html($email_required_msg);?></p>
					<input type="submit" id="sfba-form2-button" data-form-id="sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?>" class="sfba-form-submit-button" value="<?php echo esc_attr($button_text);?>" />
				</div>
				<div id="sfba_thanks_container" class="sfba_thanks_container" style="display:none;">
					<a href="javascript:void(0);" class="sfba-form-close" data-form-id="sfba_subscribe_form_<?php echo esc_attr($sfba_post_fix); ?>">x</a>
					<div>
						<p id="sfba_thanks_image" class="sfba-noempty"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
						<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
					</div>
				</div>				
			</div>
			<input type="hidden" id="sfba_page_link" class="sfba_page_link" name="sfba-page-link" value="<?php echo esc_url(get_permalink())?>" />
			<input type='hidden' id='sfba_post_type_id' class="sfba_post_type_id" name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" />
		</form>
		<?php 
	}


	if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform2') {
		
		$form_conset_field = get_post_meta($id, '_sfba-form2-consent-field', true);
		$consent_on = get_post_meta($id, '_sfba-form2-consent-on', true);
		
		$display_name = get_post_meta($id, '_sfba-form2-display-name', true);
		
		if( get_post_meta($id, '_sfba-form2-field-position', true) !='' )
			$field_position = get_post_meta($id, '_sfba-form2-field-position', true);
		else
			$field_position = 'name-first';
		$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';
		
		if( get_post_meta($id, '_sfba-form2-fonts', true ) !='' )
			$form_fonts = get_post_meta($id, '_sfba-form2-fonts', true );
		else
			$form_fonts = 'Poppins';
		
		if( get_post_meta($id, '_sfba-form2-width', true) !='' )
			$form_width = get_post_meta($id, '_sfba-form2-width', true);
		else
			$form_width = '450';

		if( get_post_meta($id, '_sfba-form2-background-image', true) !='' )
			$form_background_image = get_post_meta($id, '_sfba-form2-background-image', true);

		if( get_post_meta($id, '_sfba-form2-background-color', true) !='' )
			$form_background_color = get_post_meta($id, '_sfba-form2-background-color', true);
		else
			$form_background_color = '#4FF4E3';

		if( get_post_meta($id, '_sfba-form2-heading', true) !='' )
			$form_heading = get_post_meta($id, '_sfba-form2-heading', true);
		else
			$form_heading = 'Get New Posts Delivered to Your Inbox';

		if( get_post_meta($id, '_sfba-form2-sub-heading', true) !='' )
			$form_sub_heading = get_post_meta($id, '_sfba-form2-sub-heading', true);
		else
			$form_sub_heading = 'Signup now and receive an email once! Publish new content';

		if( get_post_meta($id, '_sfba-form2-subscribe-button-text', true) !='' )
			$button_text = get_post_meta($id, '_sfba-form2-subscribe-button-text', true);
		else
			$button_text = 'SUBSCRIBE NOW!';

		if( get_post_meta($id, '_sfba-form2-border-size', true) !='' )
			$border_size = get_post_meta($id, '_sfba-form2-border-size', true);
		else
			$border_size = '1';

		if( get_post_meta($id, '_sfba-form2-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form2-border-style', true) !='' )
			$border_style = get_post_meta($id, '_sfba-form2-border-style', true);
		else
			$border_style = 'solid';

		if( get_post_meta($id, '_sfba-form2-border-color', true) !='' )
			$border_color = get_post_meta($id, '_sfba-form2-border-color', true);
		else
			$border_color = 'transparent';

		if( get_post_meta($id, '_sfba-form2-field-border-color', true) !='' )
			$field_border_color = get_post_meta($id, '_sfba-form2-field-border-color', true);
		else
			$field_border_color = 'transparent';		

		if( get_post_meta($id, '_sfba-form2-button-background-color', true) !='' )
			$button_background_color = get_post_meta($id, '_sfba-form2-button-background-color', true);
		else
			$button_background_color = '#080808';

		if( get_post_meta($id, '_sfba-form2-button-text-size', true) !='' )
			$button_text_size = get_post_meta($id, '_sfba-form2-button-text-size', true);
		else
			$button_text_size = '11';

		if( get_post_meta($id, '_sfba-form2-button-text-color', true) !='' )
			$button_text_color = get_post_meta($id, '_sfba-form2-button-text-color', true);
		else
			$button_text_color = 'ffffff';

		if( get_post_meta($id, '_sfba-form2-heading-color', true) !='' )
			$form_heading_color = get_post_meta($id, '_sfba-form2-heading-color', true);
		else
			$form_heading_color = '010100';

		if( get_post_meta($id, '_sfba-form2-sub-heading-color', true) !='' )
			$form_sub_heading_color = get_post_meta($id, '_sfba-form2-sub-heading-color', true);
		else
			$form_sub_heading_color = '202020';

		?>
		<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet">
		<style>
			#sfba-form3-container{        
		        text-align: center;
		        margin: 0 auto;
		        border: <?php echo esc_attr($border_size); ?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color) ?>;
		        width: <?php echo esc_attr($form_width); ?>px;
		        background-color: <?php echo esc_attr($form_background_color); ?>;
		        background-image: url('<?php echo esc_attr($form_background_image); ?>');
		        background-size: cover;
		        font-family:'<?php echo esc_attr($form_fonts); ?>';
		        padding: 20px;
		        position: relative;
		    }
		    #sfba-form3-container .sfba-form2-login-block h2 {
		        font-size: 26px;
		        color: <?php echo esc_attr($form_heading_color)?>;
		        font-weight: bold;
		        font-family: inherit;
		        line-height: 36px;
		        padding: 0;
		        margin: 0 0 13px;
		    }
		    #sfba_form2_subheading {
		        margin: 0px 0 14px;
		        font-size: 12px;
		        font-weight: 400;
		        color: <?php echo esc_attr($form_sub_heading_color) ?>;
		        font-family: inherit;
		        line-height: 18px;
		    }
		    .sfba_subscribe_form__fields_wrap {
		        max-width: 358px;
		        margin: 0 auto;
		    }
		    .sfba-form2-login-block input {
		        background-color: #ffffff;
		        width: 100%;
		        height: 36px;
		        border-radius: 0;
		        border: 1px solid <?php echo esc_attr($field_border_color) ?>;
		        margin-bottom: 10px;
		        font-size: 12px;
		        padding: 0 20px 0 15px;
		        outline: none;
		        box-shadow: none;
		        font-weight: 400;
		        color: #7E7E7E;
		        font-family: inherit;
		    }
		    .sfba-form3-consent-fields-main {
		        text-align: left;
		        margin: 0px auto 10px;
		        color: #333;
		    }
		    .sfba-form3-consent-fields-main label {
			    color: #333;
			    font-weight: 400;
			    margin-bottom: 0;
			}
		    .sfba-form3-consent-fields-main label input[type="checkbox"] {
			    height: 17px;
			    margin-bottom: 0;
			    margin-top: 0px !important;
			    width: 17px;
			    -webkit-appearance: none;
			    padding: 0;
			    display: inline-block;
			    vertical-align: middle;
			    margin-right: 10px;
			    border: 0;
			}	
		    .sfba-form2-login-block .sfba-form-submit-button {
		        width: auto;
		        height: auto;
		        background-color: <?php echo esc_attr($button_background_color);?>;
		        border-radius: 0;
		        border: none;
		        color: <?php echo esc_attr($button_text_color);?>;
		        font-weight: 600;
		        font-size: <?php echo esc_attr($button_text_size);?>px;
		        outline: none;
		        cursor: pointer;
		        padding: 10px 34px 9px;
		        margin-bottom: 0;
		        line-height: 17px;
		    }
		    .sfba-conset-field-error {
			    text-align: left;
			    line-height: 1.2;
			    margin-top: 10px;
			}
			#sfba-success-message{
				display: none;
				margin: 0;
				width: 100%;
				text-align: center;
				padding: 10px 20px;
				font-family: monospace;
				font-size: 14px;
				letter-spacing: 1px;
			}
			.sfba_subscribe_form__fields.sfba_email_first{
				display: flex;
				flex-direction: column;		
			}		
			.sfba_subscribe_form__fields.sfba_email_first .sfba-form-email{
				order: 1;		
			}
			.sfba_subscribe_form__fields.sfba_email_first .sfba-form-name{
				order: 2;
			}
			#sfba_thanks_container {
			    display: flex;
			    align-items: center;
			    width: 100%;
			    height: 100%;
			    position: absolute;
			    background: rgba(0, 0, 0, 0.8);
			    top: 0px;
			    left: 0px;
			    opacity: 1;
			}
			#sfba_thanks_image {
			    margin: 0;
			}
			#sfba_thanks_message {
			    margin: 0;
			    text-align: center;
			    font-size: 22px;
			    color: #fff;
			    font-family: inherit;
			    padding: 0 15px;
			    line-height: 1.2;
			}
			input[type=checkbox]:checked:before {
			    float: left;
			    display: inline-block;
			    vertical-align: middle;
			    width: 16px;
			    font: normal 21px/1 dashicons;
			    speak: none;
			    -webkit-font-smoothing: antialiased;
			    -moz-osx-font-smoothing: grayscale;
			}
			input[type=checkbox]:checked:before {
			    content: "\f147";
			    margin: -2px 0 0 -2px;
			    color: #1e8cbe;
			}
			@media only screen and (max-width: 600px){
				#sfba-form3-container {
				    width: 100%;
				}	
			}
			

		</style>
		<form id="sfba_subscribe_form" action="" method="POST">
			<div id="sfba-form3-container">
				<div class="sfba-form2-login-block">
					<h2><?php echo esc_attr($form_heading); ?></h2>
					<p id="sfba_form2_subheading" ><?php echo esc_attr($form_sub_heading); ?></p>
					<div class="sfba_subscribe_form__fields_wrap">
						<div class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
							<input type="text" value="" placeholder="Enter your name" id="sfba_form2_name" name="sfba-form-name" class="sfba-form-name" <?php if ($display_name == 'yes'):?> style="display: none;" <?php endif;?>/>
							<input type="email" value="" placeholder="Enter your email" id="sfba_form2_email" name="sfba-form-email" class="sfba-form-email" />		
						</div>
						<?php if ( $consent_on == 'yes' ) { ?>
							<p class="sfba-form3-consent-fields-main">
								<label>
									<input type="checkbox" name="sfba-form2-consent-field" value="1" />
									<span class="subscribeform2_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
								</label>
							</p>					
							<p class="sfba-form2-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
						<?php }?>
						<input type="submit" class="sfba-form-submit-button" data-form-id="sfba_subscribe_form" id="sfba-form3-button" value="<?php echo esc_attr($button_text); ?>" />
					</div>
				</div>
				<div id="sfba_thanks_container" style="display:none;">
					<div>
						<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
						<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
					</div>
				</div>
			</div>
		</form>
		<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
		<?php
	}


	if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform3') {
		$form_conset_field = get_post_meta($id, '_sfba-form3-consent-field', true);
		$consent_on = get_post_meta($id, '_sfba-form3-consent-on', true);
		
		if( get_post_meta($id, '_sfba-form3-fonts', true ) !='' )
			$form_fonts = get_post_meta($id, '_sfba-form3-fonts', true );
		else
			$form_fonts = 'Poppins';
		
		if( get_post_meta($id, '_sfba-form3-width', true) !='' )
			$form_width = get_post_meta($id, '_sfba-form3-width', true);
		else
			$form_width = '700';

		if( get_post_meta($id, '_sfba-form3-background-image', true) !='' )
			$form_background_image = get_post_meta($id, '_sfba-form3-background-image', true);

		if( get_post_meta($id, '_sfba-form3-background-color', true) !='' )
			$form_background_color = get_post_meta($id, '_sfba-form3-background-color', true);
		else
			$form_background_color = '#600E8C';

		if( get_post_meta($id, '_sfba-form3-heading-color', true) !='' )
			$form_heading_color = get_post_meta($id, '_sfba-form3-heading-color', true);
		else
			$form_heading_color = '#FFFFFF';

		if( get_post_meta($id, '_sfba-form3-sub-heading-color', true) !='' )
			$form_sub_heading_color = get_post_meta($id, '_sfba-form3-sub-heading-color', true);
		else
			$form_sub_heading_color = 'rgba(255,255,255,0.8)';

		if( get_post_meta($id, '_sfba-form3-heading', true) !='' )
			$form_heading = get_post_meta($id, '_sfba-form3-heading', true);
		else
			$form_heading = 'We are building a new fantastic website';

		if( get_post_meta($id, '_sfba-form3-sub-heading', true) !='' )
			$form_sub_heading = get_post_meta($id, '_sfba-form3-sub-heading', true);
		else
			$form_sub_heading = 'Leave your e-mail and we let you know when we started';

		if( get_post_meta($id, '_sfba-form3-subscribe-button-text', true) !='' )
			$button_text = get_post_meta($id, '_sfba-form3-subscribe-button-text', true);
		else
			$button_text = 'SUBSCRIBE';

		if( get_post_meta($id, '_sfba-form3-border-size', true) !='' )
			$border_size = get_post_meta($id, '_sfba-form3-border-size', true);
		else
			$border_size = '1';

		if( get_post_meta($id, '_sfba-form3-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form3-border-style', true) !='' )
			$border_style = get_post_meta($id, '_sfba-form3-border-style', true);
		else
			$border_style = 'solid';

		if( get_post_meta($id, '_sfba-form3-border-color', true) !='' )
			$border_color = get_post_meta($id, '_sfba-form3-border-color', true);
		else
			$border_color = 'transparent';

		if( get_post_meta($id, '_sfba-form3-field-border-color', true) !='' )
			$field_border_color = get_post_meta($id, '_sfba-form3-field-border-color', true);
		else
			$field_border_color = 'transparent';

		if( get_post_meta($id, '_sfba-form3-button-background-color', true) !='' )
			$button_background_color = get_post_meta($id, '_sfba-form3-button-background-color', true);
		else
			$button_background_color = '#FFC000';

		if( get_post_meta($id, '_sfba-form3-button-text-size', true) !='' )
			$button_text_size = get_post_meta($id, '_sfba-form3-button-text-size', true);
		else
			$button_text_size = '14';

		if( get_post_meta($id, '_sfba-form3-button-text-color', true) !='' )
			$button_text_color = get_post_meta($id, '_sfba-form3-button-text-color', true);
		else
			$button_text_color = '#380454';
		?>
		<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet">
		<style>
			#sfba-form2-container {
			    background-color: <?php echo esc_attr($form_background_color);?>;
			    border: <?php echo esc_attr($border_size); ?>px <?php echo esc_attr($border_style);?> <?php echo esc_attr($border_color);?>;
			    background-image: url('<?php echo esc_attr($form_background_image); ?>');
			    background-size: cover;
			    width: <?php echo esc_attr($form_width);?>px;
			    font-family: '<?php echo esc_attr($form_fonts); ?>';
			    padding: 30px 30px 50px;
			    position: relative;
    			margin: 0 auto;
			}
			#sfba-form2-container #sfba-form3-container h2 {
			    font-size: 26px;
			    line-height: 36px;
			    font-weight: bold;
			    margin: 0 0 11px;
			    font-family: inherit;
			    color: <?php echo esc_attr($form_heading_color);?>;
			    padding: 0;
			}
			#sfba-form3-heading2 {
			    font-size: 14px;
			    font-weight: normal;
			    color: <?php echo esc_attr($form_sub_heading_color);?>;
			    line-height: 21px;
			    margin: 0 0 19px;
			}
			#sfba-form2-container .sfba_subscribe_form__fields:after {
			    content: "";
			    display: block;
			    clear: both;
			}
			#sfba-form3-email-text {
			    background-color: #fff;
			    border-radius: 4px;
			    border: 1px solid <?php echo esc_attr($field_border_color); ?>;
			    color: #7E7E7E;
			    font-size: 14px;
			    padding-left: 10px;
			    width: 72.5%;
			    height: 46px;
			    font-weight: 400;
			    font-family: inherit;
			    float: left;
			    margin-right: 1%;
			    margin-bottom: 0;
			}
			#sfba-form3-button {
			    width: 25.4%;
			    background-color: <?php echo esc_attr($button_background_color)?>;
			    font-size: 14px;
			    color: <?php echo esc_attr($button_text_color);?>;
			    cursor: pointer;
			    padding: 0 10px;
			    height: 46px;
			    border: 1px solid transparent;
			    border-radius: 4px;
			    float: left;
			    font-weight: 600;
			    line-height: 21px;
			}
			.sfba-form3-consent-fields-main {
			    text-align: left;
			    margin: 10px auto 0;
			}
			.sfba-form3-consent-fields-main label {
			    color: #fff;
			    font-weight: 400;
			    margin-bottom: 0;
			}
		    .sfba-form3-consent-fields-main label input[type="checkbox"] {
		    	background-color: #fff;
			    height: 17px;
			    margin-bottom: 0;
			    margin-top: 0px !important;
			    width: 17px;
			    -webkit-appearance: none;
			    padding: 0;
			    display: inline-block;
			    vertical-align: middle;
			    margin-right: 10px;
			    border: 0;
			}
			#sfba-success-message{
			    display: none;
			    margin: 0;
			    width: 100%;
			    text-align: center;
			    padding: 10px 20px;
			    font-family: monospace;
			    font-size: 14px;
			    letter-spacing: 1px;
			}
			#sfba_thanks_container {
			    display: flex;
			    align-items: center;
			    width: 100%;
			    height: 100%;
			    position: absolute;
			    background: rgba(0, 0, 0, 0.8);
			    top: 0px;
			    left: 0px;
			    opacity: 1;
		        text-align: center;
			}
			#sfba_thanks_container > div {
			    margin: 0 auto;
			}
			#sfba_thanks_image {
			    margin: 0;
			}
			#sfba_thanks_message {
			    margin: 0;
			    text-align: center;
			    font-size: 22px;
			    color: #fff;
			    font-family: inherit;
			    padding: 0 15px;
			    line-height: 1.2;
			}
			input[type=checkbox]:checked:before {
			    float: left;
			    display: inline-block;
			    vertical-align: middle;
			    width: 16px;
			    font: normal 21px/1 dashicons;
			    speak: none;
			    -webkit-font-smoothing: antialiased;
			    -moz-osx-font-smoothing: grayscale;
			}
			input[type=checkbox]:checked:before {
			    content: "\f147";
			    margin: -2px 0 0 -2px;
			    color: #1e8cbe;
			}
			@media only screen and (max-width: 767px){
				#sfba-form2-container {
				    width: 100%;
				}
			}
			@media only screen and (max-width: 480px){
				#sfba-form3-email-text {
				    width: 100%;
			        float: none;
				    margin-right: 0;
				}
				#sfba-form3-button {
				    width: auto;
				    padding: 0 20px;
				    float: none;
				    margin-top: 10px;
				    display: inline-block;
				    vertical-align: top;
				}
				#sfba-form2-container .sfba_subscribe_form__fields {
				    text-align: center;
				}
			}
		</style>
		<?php  ?>
		<form id="sfba_subscribe_form" action="" method="POST" >
			<div id="sfba-form2-container" class="sfba-main-form-container">
				<div id="sfba-form3-container">
					<h2 id="sfba-form3-heading1"><?php echo esc_attr($form_heading); ?></h2>
					<p id="sfba-form3-heading2"><?php echo esc_attr($form_sub_heading); ?></p>
					<div class="sfba_subscribe_form__fields">
						<input type="email" id="sfba-form3-email-text" name="sfba-form-email" class="sfba-form-email" value="" placeholder="Your Email">
						<input type="submit" id="sfba-form3-button" data-form-id="sfba_subscribe_form" class="sfba-form-submit-button" name="" value="<?php echo esc_attr($button_text); ?>">
					</div>
					<?php if ( $consent_on == 'yes' ) { ?>
						<p class="sfba-form3-consent-fields-main">
							<label>
								<input type="checkbox" name="sfba-form3-consent-field" value="1" />
								<span class="subscribeform3_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
							</label>
						</p>					
						<p class="sfba-form3-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
					<?php } ?>
						<div id="sfba_thanks_container" style="display:none;">
							<div>
								<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
								<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
							</div>
						</div>
				</div>
			</div>
		</form>
		<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
		<?php

	}


	if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform4') {
		$form_conset_field = get_post_meta($id, '_sfba-form4-consent-field', true);
		$consent_on = get_post_meta($id, '_sfba-form4-consent-on', true);
		
		if( get_post_meta($id, '_sfba-form4-fonts', true ) !='' )
			$form_fonts = get_post_meta($id, '_sfba-form4-fonts', true );
		else
			$form_fonts = "Poppins";
		
		if( get_post_meta($id, '_sfba-form4-width', true) !='' )
			$form_width = get_post_meta($id, '_sfba-form4-width', true);
		else
			$form_width = '550';

		if( get_post_meta($id, '_sfba-form4-background-image', true) !='' )
			$form_background_image = get_post_meta($id, '_sfba-form4-background-image', true);
		else
			$form_background_image = plugins_url('../images/04_bg.png',__FILE__);

		if( get_post_meta($id, '_sfba-form4-background-color', true) !='' )
			$form_background_color = get_post_meta($id, '_sfba-form4-background-color', true);
		else
			$form_background_color = 'transparent';

		if( get_post_meta($id, '_sfba-form4-heading-color', true) !='' )
			$form_heading_color = get_post_meta($id, '_sfba-form4-heading-color', true);
		else
			$form_heading_color = '#ffffff';

		if( get_post_meta($id, '_sfba-form4-sub-heading-color', true) !='' )
			$form_sub_heading_color = get_post_meta($id, '_sfba-form4-sub-heading-color', true);
		else
			$form_sub_heading_color = '#E8E8E8';

		if( get_post_meta($id, '_sfba-form4-heading', true) !='' )
			$form_heading = get_post_meta($id, '_sfba-form4-heading', true);
		else
			$form_heading = 'SIGN UP FOR BETA';

		if( get_post_meta($id, '_sfba-form4-sub-heading', true) !='' )
			$form_sub_heading = get_post_meta($id, '_sfba-form4-sub-heading', true);
		else
			$form_sub_heading = 'Milkshake is almost ready if you are interested in testing it out, Then sign up below to get exclusive access.';

		if( get_post_meta($id, '_sfba-form4-subscribe-button-text', true) !='' )
			$button_text = get_post_meta($id, '_sfba-form4-subscribe-button-text', true);
		else
			$button_text = 'Subscribe';

		if( get_post_meta($id, '_sfba-form4-border-size', true) !='' )
			$border_size = get_post_meta($id, '_sfba-form4-border-size', true);
		else
			$border_size = '1';

		if( get_post_meta($id, '_sfba-form4-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form4-border-style', true) !='' )
			$border_style = get_post_meta($id, '_sfba-form4-border-style', true);
		else
			$border_style = 'solid';

		if( get_post_meta($id, '_sfba-form4-border-color', true) !='' )
			$border_color = get_post_meta($id, '_sfba-form4-border-color', true);
		else
			$border_color = 'transparent';

		if( get_post_meta($id, '_sfba-form4-field-border-color', true) !='' )
			$field_border_color = get_post_meta($id, '_sfba-form4-field-border-color', true);
		else
			$field_border_color = 'transparent';

		if( get_post_meta($id, '_sfba-form4-button-background-color', true) !='' )
			$button_background_color = get_post_meta($id, '_sfba-form4-button-background-color', true);
		else
			$button_background_color = '#FDBF15';

		if( get_post_meta($id, '_sfba-form4-button-text-size', true) !='' )
			$button_text_size = get_post_meta($id, '_sfba-form4-button-text-size', true);
		else
			$button_text_size = '16';

		if( get_post_meta($id, '_sfba-form4-button-text-color', true) !='' )
			$button_text_color = get_post_meta($id, '_sfba-form4-button-text-color', true);
		else
			$button_text_color = '#3B3434';
		?>
		<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet">
		<style>
			#sfba-form4-container {
			    background-color: <?php echo esc_attr($form_background_color);?>;
			    width: <?php echo esc_attr($form_width); ?>px;    
			    color: #FDFCFB;
			    padding: 65px 25px 65px;
			    text-align: center;
			    background-image: url('<?php echo esc_attr($form_background_image); ?>');
			    border: <?php echo esc_attr($border_size); ?>px <?php echo esc_attr($border_style);?> <?php echo esc_attr($border_color);?>;
			    background-size: cover;
			    margin: 0 auto;   
			    font-family: <?php echo esc_attr($form_fonts); ?>; 
			    position: relative;
			}
			#sfba-form4-container #sfba-form4-heading {
			    font-size: 30px;
			    line-height: 36px;
			    color: <?php echo esc_attr($form_heading_color);?>;
			    font-weight: bold;
			    margin: 0 0 10px;
			    padding: 0;
			    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
			    letter-spacing: 0.6px;
			    font-family: inherit;
			}
			#sfba-form4-subheading {
			    font-size: 12px;
			    line-height: 20px;
			    color: <?php echo esc_attr($form_sub_heading_color); ?>;
			    margin: 0 0 29px;
			    font-family: inherit;
			    text-shadow: 0 1px 2px rgba(0,0,0,0.16);
			}
			#sfba-form4-container .input {
			    position: relative;
			}
			#sfba-form4-container .input input {
			    border: 1px solid <?php echo esc_attr($field_border_color); ?>;
			    border-radius: 23px;
			    height: 46px;
			    padding: 0 162px 0 25px;
			    width: 100%;
			    font-size: 14px;
			    color: #7E7E7E;
			    line-height: 21px;
			    margin: 0;
			}
			#sfba-form4-container #submit {
			    width: auto;
			    height: 42px;
			    background-color: <?php echo esc_attr($button_background_color); ?>;
			    font-weight: 600;
			    color: <?php echo esc_attr($button_text_color); ?>;
			    font-size: <?php echo esc_attr($button_text_size); ?>px;
			    border-radius: 23px;
			    cursor: pointer;
			    padding: 0 40px;
			    position: absolute;
			    top: 0;
			    right: 2px;
			    bottom: 0;
			    margin: auto 0;
			}
			.sfba-form4-consent-fields-main {
			    text-align: left;
			    margin: 10px 0 0;
			}
			.sfba-conset-field-error {
			    text-align: left;
			    margin: 10px 0 0;
			}
			.sfba-form4-consent-fields-main label {
			    font-weight: 400;
			    margin-bottom: 0;
			}
			.sfba-form4-consent-fields-main label input[type="checkbox"] {
				background-color: #fff;
			    height: 17px;
			    margin-bottom: 0;
			    margin-top: 0px !important;
			    width: 17px;
			    -webkit-appearance: none;
			    padding: 0;
			    display: inline-block;
			    vertical-align: middle;
			    margin-right: 10px;
			    border: 0;
			}
			#sfba-success-message{
			    display: none;
			    margin: 0;
			    width: 100%;
			    text-align: center;
			    padding: 10px 20px;
			    font-family: monospace;
			    font-size: 14px;
			    letter-spacing: 1px;
			}
			#sfba_thanks_container {
			    display: flex;
			    align-items: center;
			    width: 100%;
			    height: 100%;
			    position: absolute;
			    background: rgba(0, 0, 0, 0.8);
			    top: 0px;
			    left: 0px;
			    opacity: 1;
			}
			#sfba_thanks_image {
			    margin: 0;
			}
			#sfba_thanks_message {
			    margin: 0;
			    text-align: center;
			    font-size: 22px;
			    color: #fff;
			    font-family: inherit;
			    padding: 0 15px;
			    line-height: 1.2;
			}
			input[type=checkbox]:checked:before {
			    float: left;
			    display: inline-block;
			    vertical-align: middle;
			    width: 16px;
			    font: normal 21px/1 dashicons;
			    speak: none;
			    -webkit-font-smoothing: antialiased;
			    -moz-osx-font-smoothing: grayscale;
			}
			input[type=checkbox]:checked:before {
			    content: "\f147";
			    margin: -2px 0 0 -2px;
			    color: #1e8cbe;
			}
			@media only screen and (max-width: 600px){
				#sfba-form4-container {
				    width: 100%;
				}
				#sfba-form4-container #submit {
				    position: relative;
				    top: auto;
				    right: auto;
				    bottom: auto;
				    margin: 10px auto 0;
				}
				#sfba-form4-container .input input {
				    padding: 0 16px 0 25px;
				}
			}
		</style>
		<form id="sfba_subscribe_form" action="" method="POST">
			<div id="sfba-form4-container" class="sfba-main-form-container">
				<h2 id="sfba-form4-heading"><?php echo esc_attr($form_heading); ?></h2>
				<p id="sfba-form4-subheading"><?php echo esc_attr($form_sub_heading); ?></p>
				<div class="input">
					<input id="sfba-form4-email" type="email" class="sfba-button sfba-form-email" name="sfba-form-email" placeholder="Your email id">
					<input type="submit" class="sfba-button sfba-form-submit-button" data-form-id="sfba_subscribe_form" id="submit" value="<?php echo esc_attr($button_text); ?>">					
				</div>
				<?php if ( $consent_on == 'yes' ) { ?>
					<p class="sfba-form4-consent-fields-main">
						<label>
							<input type="checkbox" name="sfba-form4-consent-field" value="1" />
							<span class="subscribeform4_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
						</label>
					</p>					
					<p class="sfba-form4-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
				<?php }?>
				<div id="sfba_thanks_container" style="display:none;">
					<div>
						<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
						<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
					</div>
				</div>
			</div>
		</form>

	<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
	<?php


}


if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform5') {
	$form_conset_field = get_post_meta($id, '_sfba-form5-consent-field', true);
	$consent_on = get_post_meta($id, '_sfba-form5-consent-on', true);
	$display_name = get_post_meta($id, '_sfba-form5-display-name', true);
		
	if( get_post_meta($id, '_sfba-form5-field-position', true) !='' )
		$field_position = get_post_meta($id, '_sfba-form5-field-position', true);
	else
		$field_position = 'name-first';
	$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';
	
	
	if( get_post_meta($id, '_sfba-form5-fonts', true ) !='' )
		$form_fonts = get_post_meta($id, '_sfba-form5-fonts', true );
	else
		$form_fonts = "Poppins";
	
	if( get_post_meta($id, '_sfba-form5-width', true) !='' )
		$form_width = get_post_meta($id, '_sfba-form5-width', true);
	else
		$form_width = '550';

	if( get_post_meta($id, '_sfba-form5-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfba-form5-background-image', true);

	if( get_post_meta($id, '_sfba-form5-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfba-form5-background-color', true);
	else
		$form_background_color = '#792942';

	if( get_post_meta($id, '_sfba-form5-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfba-form5-heading', true);
	else
		$form_heading = 'SUBSCRIBE NOW';

	if( get_post_meta($id, '_sfba-form5-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfba-form5-sub-heading', true);
	else
		$form_sub_heading = 'To sign-up for a free and amazing offers and other cool things, stay with us and Please subscribe us';

	if( get_post_meta($id, '_sfba-form5-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfba-form5-subscribe-button-text', true);
	else
		$button_text = 'SUBSCRIBE NOW!';

	if( get_post_meta($id, '_sfba-form5-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfba-form5-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfba-form5-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form5-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfba-form5-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfba-form5-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfba-form5-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form5-field-border-color', true) !='' )
		$field_border_color = get_post_meta($id, '_sfba-form5-field-border-color', true);
	else
		$field_border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form5-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfba-form5-button-text-size', true);
	else
		$button_text_size = '16';

	if( get_post_meta($id, '_sfba-form5-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfba-form5-button-background-color', true);
	else
		$button_background_color = '#F6BA20';

	if( get_post_meta($id, '_sfba-form5-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfba-form5-button-text-color', true);
	else
		$button_text_color = '#792942';

	if( get_post_meta($id, '_sfba-form5-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfba-form5-heading-color', true);
	else
		$form_heading_color = '#F6BA20';

	if( get_post_meta($id, '_sfba-form5-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfba-form5-sub-heading-color', true);
	else
		$form_sub_heading_color = '#FFFFFF';
	?>
	<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet">
	<style>	
		#sfba-form5-wrapper {
			width: <?php echo esc_attr($form_width);?>px;
			background-color: <?php echo esc_attr($form_background_color);?>;  
			background-image: url('<?php echo esc_attr($form_background_image); ?>');
			background-size: cover;
			padding: 31px 45px 52px;
			border: <?php echo esc_attr($border_size);?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color)?>;
			margin: 0 auto;
		 	font-family: '<?php echo esc_attr($form_fonts); ?>';
		  	text-align: center;
		  	position: relative;
		}
		#sfba-form5-wrapper #sfba-form5-heading {
		    font-size: 36px;
		    line-height: 51px;
		    font-weight: bold;
		    color: <?php echo esc_attr($form_heading_color) ?>;
		    padding: 0;
		    margin: 0 0 11px;
		    font-family: inherit;
		}
		#sfba-form5-subheading {
		    font-size: 14px;
		    color: <?php echo esc_attr($form_sub_heading_color) ?>;
		    font-weight: 400;
		    margin: 0 0 25px;
		    line-height: 20px;
		    font-family: inherit;
		}
		.sfba_subscribe_form__fields_wrap {
		    max-width: 430px;
		    margin: 0 auto;
		}
		#sfba-form5-wrapper input[type="text"], #sfba-form5-wrapper input[type="email"] {
		    width: 100%;
		    padding: 0 15px 0;
		    border-radius: 4px;
		    background-color: #fff;
		    outline: none;
		    border: 1px solid <?php echo esc_attr($field_border_color) ?>;
		    margin-bottom: 10px;
		    color: #7E7E7E;
		    font-size: 14px;
		    line-height: 21px;
		    height: 42px;
		}
		#sfba-form5-wrapper input[type="submit"] {
		    width: auto;
		    padding: 11px 37px 10px;
		    cursor: pointer;
		    border-radius: 23px;
		    outline: none;
		    border: none;
		    font-size: <?php echo esc_attr($button_text_size); ?>px;
		    color: <?php echo esc_attr($button_text_color); ?>;
		    margin: 0;
		    font-weight: 600;
		    line-height: 25px;
		    background-color: <?php echo esc_attr($button_background_color); ?>;
		}
		.sfba_subscribe_form__fields.sfba_email_first{
			display: flex;
			flex-direction: column;		
		}		
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-email{
			order: 1;	
		}
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-name{
			order: 2;
		}
		.sfba-form5-consent-fields-main {
		    margin: 0 0 10px;
		    text-align: left;
		}
		.sfba-form5-consent-fields-main label {
		    color: #fff;
		    font-weight: 400;
		}
		.sfba-form5-consent-fields-main label input[type="checkbox"] {
			background-color: #fff;
		    height: 17px;
		    margin-bottom: 0;
		    margin-top: 0px !important;
		    width: 17px;
		    -webkit-appearance: none;
		    padding: 0;
		    display: inline-block;
		    vertical-align: middle;
		    margin-right: 10px;
		    border: 0;
		}
		#sfba-success-message{
		    display: none;
		    margin: 0;
		    width: 100%;
		    text-align: center;
		    padding: 10px 20px;
		    font-family: monospace;
		    font-size: 14px;
		    letter-spacing: 1px;
		}
		#sfba_thanks_container {
		    display: flex;
		    align-items: center;
		    width: 100%;
		    height: 100%;
		    position: absolute;
		    background: rgba(0, 0, 0, 0.8);
		    top: 0px;
		    left: 0px;
		    opacity: 1;
		}
		#sfba_thanks_image {
		    margin: 0;
		}
		#sfba_thanks_message {
		    margin: 0;
		    text-align: center;
		    font-size: 22px;
		    color: #fff;
		    font-family: inherit;
		    padding: 0 15px;
		    line-height: 1.2;
		}
		input[type=checkbox]:checked:before {
		    float: left;
		    display: inline-block;
		    vertical-align: middle;
		    width: 16px;
		    font: normal 21px/1 dashicons;
		    speak: none;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		input[type=checkbox]:checked:before {
		    content: "\f147";
		    margin: -2px 0 0 -2px;
		    color: #1e8cbe;
		}
		.sfba-conset-field-error {
		    text-align: left;
		    margin: 0 0 10px;
		}
		@media only screen and (max-width: 600px){
			#sfba-form5-wrapper {
			    width: 100%;
			}	
		}
	</style>
	<?php  ?>
	<form id="sfba_subscribe_form" action="" method="POST">
		<div id="sfba-form5-wrapper" class="sfba-main-form-container">
			<h2 id="sfba-form5-heading" name="sfba-form5-heading"><?php echo esc_attr($form_heading); ?></h2>
			<p id="sfba-form5-subheading" name="sfba-form5-subheading"><?php echo esc_attr($form_sub_heading); ?></p>
			<div class="sfba_subscribe_form__fields_wrap">
				<div class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
					<input type="text" id="sfba-form5-name" name="sfba-form-name"  class="sfba-form-name" placeholder="Name" <?php if ($display_name == 'yes'):?> style="display: none;" <?php endif;?>>
					<input type="email" id="sfba-form5-email" name="sfba-form-email"  class="sfba-form-email" placeholder="Email">
				</div>
				<?php if ( $consent_on == 'yes' ) { ?>
					<p class="sfba-form5-consent-fields-main">
						<label>
							<input type="checkbox" name="sfba-form5-consent-field" value="1" />
							<span class="subscribeform5_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
						</label>
					</p>					
					<p class="sfba-form5-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
				<?php }?>
				<input type="submit" class="submit sfba-form-submit-button" data-form-id="sfba_subscribe_form" value="<?php echo esc_attr($button_text); ?>">
			</div>
			<div id="sfba_thanks_container" style="display:none;">
				<div>
					<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>
	</form>

<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
<?php


}


if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform6') {
	$form_conset_field = get_post_meta($id, '_sfba-form6-consent-field', true);
	$consent_on = get_post_meta($id, '_sfba-form6-consent-on', true);
		
	if( get_post_meta($id, '_sfba-form6-fonts', true ) !='' )
		$form_fonts = get_post_meta($id, '_sfba-form6-fonts', true );
	else
		$form_fonts = "Poppins";
	
	if( get_post_meta($id, '_sfba-form6-width', true) !='' )
		$form_width = get_post_meta($id, '_sfba-form6-width', true);
	else
		$form_width = '700';

	if( get_post_meta($id, '_sfba-form6-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfba-form6-background-image', true);
	else
		$form_background_image = plugins_url('../images/06_bg.png',__FILE__);

	if( get_post_meta($id, '_sfba-form6-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfba-form6-background-color', true);
	else
		$form_background_color = 'transparent';

	if( get_post_meta($id, '_sfba-form6-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfba-form6-heading', true);
	else
		$form_heading = 'Now in town? Here is 20% off.';

	if( get_post_meta($id, '_sfba-form6-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfba-form6-sub-heading', true);
	else
		$form_sub_heading = 'Enter your email to receive your warm welcome. Enjoy your stay (and you fit)';

	if( get_post_meta($id, '_sfba-form6-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfba-form6-subscribe-button-text', true);
	else
		$button_text = 'Send';

	if( get_post_meta($id, '_sfba-form6-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfba-form6-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfba-form6-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form6-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfba-form6-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfba-form6-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfba-form6-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form6-field-border-color', true) !='' )
		$field_border_color = get_post_meta($id, '_sfba-form6-field-border-color', true);
	else
		$field_border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form6-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfba-form6-button-background-color', true);
	else
		$button_background_color = '#F76B6C';

	if( get_post_meta($id, '_sfba-form6-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfba-form6-button-text-size', true);
	else
		$button_text_size = '15';

	if( get_post_meta($id, '_sfba-form6-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfba-form6-button-text-color', true);
	else
		$button_text_color = '#ffffff';

	if( get_post_meta($id, '_sfba-form6-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfba-form6-heading-color', true);
	else
		$form_heading_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form6-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfba-form6-sub-heading-color', true);
	else
		$form_sub_heading_color = 'rgba(255,255,255,0.8)';
	?>
	<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,500,600,700" rel="stylesheet">
	<style>
		#sfba-form7-container {
			width: <?php echo esc_attr($form_width);?>px;
			background-color: <?php echo esc_attr($form_background_color); ?>;
			background-image: url('<?php echo esc_attr($form_background_image); ?>');
			background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
			border: <?php echo esc_attr($border_size);?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color)?>;
		    font-family: '<?php echo esc_attr($form_fonts); ?>';
		    text-align: center;
		    padding: 44px 50px 19px;
	        position: relative;
    		margin: 0 auto;
		}
		#sfba-form6-container #sfba-form6-heading1 {
		    padding: 0;
		    margin: 0 0 15px;
		    font-size: 40px;
		    line-height: 51px;
		    font-weight: bold;
		    font-family: inherit;
		    color: <?php echo esc_attr($form_heading_color) ?>;
		}
		#sfba-form6-heading2 {
		    font-size: 16px;
		    font-weight: normal;
		    color: <?php echo esc_attr($form_sub_heading_color)?>;
		    line-height: 25px;
		    margin: 0 0 28px;
		}
		#sfba-form6-privacy {
		    font-size: 12px;
		    font-weight: 400;
		    color: rgba(255,255,255,0.7);
		    margin: 54px auto 0;
		    line-height: 18px;
		    margin-bottom: 0px;
		    font-style: italic;
		}
		#sfba-form6-email-text {
		    background-color: #fff;
		    border-radius: 2px;
		    border: 1px solid <?php echo esc_attr($field_border_color) ?>;
		    color: #7E7E7E;
		    font-size: 16px;
		    margin: 0;
		    padding-left: 10px;
		    width: 100%;
		    height: 52px;
		    line-height: 25px;
		    font-family: inherit;
		    font-weight: 500;
		}
		#sfba-form6-button {
		    width: auto;
		    margin: auto 0;
		    background-image: url(<?php echo plugins_url('../images/sent.png',__FILE__); ?>);
		    background-color: <?php echo esc_attr($button_background_color);?>;
		    font-size: <?php echo esc_attr($button_text_size); ?>px;
		    color: <?php echo esc_attr($button_text_color); ?>;
		    cursor: pointer;
		    padding: 0 16px 0 43px;
		    height: 44px;
		    border: 0;
		    position: absolute;
		    top: 0;
		    right: 3px;
		    bottom: 0;
		    border-radius: 6px;
		    background-repeat: no-repeat;
		    background-position: 16px center;
		    font-weight: 500;
		    line-height: 23px;
		}
		#sfba-form6-container .sfba_subscribe_form__fields {
		    position: relative;
		    max-width: 550px;
		    margin: 0 auto;
		}
		.sfba-form6-consent-fields-main {
		    margin: 10px auto 10px;
		    text-align: left;
		    max-width: 550px;
		}
		.sfba-form6-consent-fields-main label {
		    color: #fff;
		    font-weight: 400;
		    margin-bottom: 0;
		}
		.sfba-form6-consent-fields-main label input[type="checkbox"] {
			background-color: #fff;
		    height: 17px;
		    margin-bottom: 0;
		    margin-top: 0px !important;
		    width: 17px;
		    -webkit-appearance: none;
		    padding: 0;
		    display: inline-block;
		    vertical-align: middle;
		    margin-right: 10px;
		    border: 0;
		}
		#sfba-success-message{
		    display: none;
		    margin: 0;
		    width: 100%;
		    text-align: center;
		    padding: 10px 20px;
		    font-family: monospace;
		    font-size: 14px;
		    letter-spacing: 1px;
		}
		#sfba_thanks_container {
		    display: flex;
		    align-items: center;
		    width: 100%;
		    height: 100%;
		    position: absolute;
		    background: rgba(0, 0, 0, 0.8);
		    top: 0px;
		    left: 0px;
		    opacity: 1;
		}
		#sfba_thanks_image {
		    margin: 0;
		}
		#sfba_thanks_message {
		    margin: 0;
		    text-align: center;
		    font-size: 22px;
		    color: #fff;
		    font-family: inherit;
		    padding: 0 15px;
		    line-height: 1.2;
		}
		input[type=checkbox]:checked:before {
		    float: left;
		    display: inline-block;
		    vertical-align: middle;
		    width: 16px;
		    font: normal 21px/1 dashicons;
		    speak: none;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		input[type=checkbox]:checked:before {
		    content: "\f147";
		    margin: -2px 0 0 -2px;
		    color: #1e8cbe;
		}
		#sfba_thanks_container > div {
		    margin: 0 auto;
		}
		.sfba-conset-field-error {
		    text-align: left;
		    margin: 0 auto 10px;
		    max-width: 550px;
		}
		@media only screen and (max-width: 767px){
			#sfba-form7-container {
			    width: 100%;
			}	
		}
	</style>
	<?php  ?>
	<form id="sfba_subscribe_form" action="" method="POST">
		<div id="sfba-form7-container" class="sfba-main-form-container">
			<div id="sfba-form6-container">
				<h2 id="sfba-form6-heading1"><?php echo esc_attr($form_heading); ?></h2>
				<p id="sfba-form6-heading2"><?php echo esc_attr($form_sub_heading); ?></p>
				<div class="sfba_subscribe_form__fields">
					<input type="email" id="sfba-form6-email-text" name="" class="sfba-form-email" value="" placeholder="Your Email">					
					<input type="submit" class="sfba-form-submit-button" data-form-id="sfba_subscribe_form" id="sfba-form6-button" name="" value="<?php echo esc_attr($button_text); ?>">
				</div>
				<?php if ( $consent_on == 'yes' ) { ?>
					<p class="sfba-form6-consent-fields-main">
						<label>
							<input type="checkbox" name="sfba-form6-consent-field" value="1" />
							<span class="subscribeform6_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
						</label>
					</p>					
					<p class="sfba-form6-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
				<?php }?>
				<p id="sfba-form6-privacy">By signing up, you agree to receive emails and promotions. You can unsubscribe at any time.</p>
				<div id="sfba_thanks_container" style="display:none;">
					<div>
						<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
						<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
					</div>
				</div>
			</div>
		</div>
	</form>

	<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
	<?php

}


if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform7') {
	$form_conset_field = get_post_meta($id, '_sfba-form7-consent-field', true);
	$consent_on = get_post_meta($id, '_sfba-form7-consent-on', true);
		
	if( get_post_meta($id, '_sfba-form7-fonts', true ) !='' )
		$form_fonts = get_post_meta($id, '_sfba-form7-fonts', true );
	else
		$form_fonts = "Poppins";
	
	$display_name = get_post_meta($id, '_sfba-form7-display-name', true);
		
	if( get_post_meta($id, '_sfba-form7-field-position', true) !='' )
		$field_position = get_post_meta($id, '_sfba-form7-field-position', true);
	else
		$field_position = 'name-first';
	$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';
	
	if( get_post_meta($id, '_sfba-form7-width', true) !='' )
		$form_width = get_post_meta($id, '_sfba-form7-width', true);
	else
		$form_width = '550';

	if( get_post_meta($id, '_sfba-form7-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfba-form7-background-image', true);

	if( get_post_meta($id, '_sfba-form7-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfba-form7-background-color', true);
	else
		$form_background_color = '#F7A537';

	if( get_post_meta($id, '_sfba-form7-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfba-form7-heading', true);
	else
		$form_heading = 'DID YOU LIKE THIS ARTICLE?';

	if( get_post_meta($id, '_sfba-form7-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfba-form7-sub-heading', true);
	else
		$form_sub_heading = 'Sign up to get the latest content first.';

	if( get_post_meta($id, '_sfba-form7-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfba-form7-subscribe-button-text', true);
	else
		$button_text = 'SUBSCRIBE NOW!';

	if( get_post_meta($id, '_sfba-form7-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfba-form7-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfba-form7-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form7-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfba-form7-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfba-form7-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfba-form7-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form7-field-border-color', true) !='' )
		$field_border_color = get_post_meta($id, '_sfba-form7-field-border-color', true);
	else
		$field_border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form7-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfba-form7-button-background-color', true);
	else
		$button_background_color = '#432657';

	if( get_post_meta($id, '_sfba-form7-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfba-form7-button-text-size', true);
	else
		$button_text_size = '14';

	if( get_post_meta($id, '_sfba-form7-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfba-form7-button-text-color', true);
	else
		$button_text_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form7-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfba-form7-heading-color', true);
	else
		$form_heading_color = '#432657';

	if( get_post_meta($id, '_sfba-form7-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfba-form7-sub-heading-color', true);
	else
		$form_sub_heading_color = '#FFFFFF';

	?>
	<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet">
	<style>
		#sfba-form7-container {
		    width: <?php echo esc_attr($form_width); ?>px;
		    background-color: <?php echo esc_attr($form_background_color); ?>;
		    background-image: url('<?php echo esc_attr($form_background_image); ?>');
		    background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
		    border: <?php echo esc_attr($border_size);?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color)?>;
		    margin: 0 auto;
		    font-family: '<?php echo esc_attr($form_fonts);?>';
		    text-align: center;
		    padding: 61px 40px 20px;
		    position: relative;
		}
		#sfba-form7-container #sfba-form7-heading {
		    font-size: 34px;
		    font-weight: bold;
		    line-height: 51px;
		    padding: 0;
		    margin: 0 0 6px;
		    color: <?php echo esc_attr($form_heading_color) ?>;
		    font-family: inherit;
		}
		#sfba-form7-subheading {
		    font-size: 16px;
		    line-height: 25px;
		    color: <?php echo esc_attr($form_sub_heading_color) ?>;
		    margin: 0 0 21px;
		    font-weight: 400;
		    font-family: inherit;
		}
		.sfba_subscribe_form__fields input {
		    width: 100%;
		    height: 54px;
		    border-radius: 27px;
		    border: 1px solid <?php echo esc_attr($field_border_color) ?>;
		    box-shadow: none;
		    margin-bottom: 15px;
		    padding: 0 15px;
		    font-size: 14px;
		    color: #AFA4B7;
		    line-height: 21px;
		    text-align: center;
		}
		#sfba-form7-container input[type="submit"] {
		    width: 100%;
		    background-color: <?php echo esc_attr($button_background_color);?>;
		    color: <?php echo esc_attr($button_text_color); ?>;
		    font-size: <?php echo esc_attr($button_text_size); ?>px;
		    cursor: pointer;
		    border-radius: 27px;
		    box-shadow: none;
		    border: none;
		    line-height: 21px;
		    font-weight: 600;
		    padding: 17px 10px 16px;
		    font-family: inherit;
		}
		.form_nospam {
		    font-size: 12px;
		    line-height: 18px;
		    color: #fff;
		    font-family: inherit;
		    margin: 22px 0 0;
		    font-weight: 400;
		}
		.sfba_subscribe_form__fields.sfba_email_first{
			display: flex;
			flex-direction: column;		
		}	
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-email{
			order: 1;	
		}
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-name{
			order: 2;
		}
		.sfba-form7-consent-fields-main {
		    text-align: left;
		    margin: 0 0 10px;
		}
		.sfba-form7-consent-fields-main label {
		    font-weight: 400;
		    color: #fff;
		}
		.sfba-form7-consent-fields-main label input[type="checkbox"] {
			background-color: #fff;
		    height: 17px;
		    margin-bottom: 0;
		    margin-top: 0px !important;
		    width: 17px;
		    -webkit-appearance: none;
		    padding: 0;
		    display: inline-block;
		    vertical-align: middle;
		    margin-right: 10px;
		    border: 0;
		}
		#sfba-success-message{
		    display: none;
		    margin: 0;
		    width: 100%;
		    text-align: center;
		    padding: 10px 20px;
		    font-family: monospace;
		    font-size: 14px;
		    letter-spacing: 1px;
		}
		#sfba_thanks_container {
		    display: flex;
		    align-items: center;
		    width: 100%;
		    height: 100%;
		    position: absolute;
		    background: rgba(0, 0, 0, 0.8);
		    top: 0px;
		    left: 0px;
		    opacity: 1;
		}
		#sfba_thanks_image {
		    margin: 0;
		}
		#sfba_thanks_message {
		    margin: 0;
		    text-align: center;
		    font-size: 22px;
		    color: #fff;
		    font-family: inherit;
		    padding: 0 15px;
		    line-height: 1.2;
		}
		input[type=checkbox]:checked:before {
		    float: left;
		    display: inline-block;
		    vertical-align: middle;
		    width: 16px;
		    font: normal 21px/1 dashicons;
		    speak: none;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		input[type=checkbox]:checked:before {
		    content: "\f147";
		    margin: -2px 0 0 -2px;
		    color: #1e8cbe;
		}
		.sfba-conset-field-error {
		    text-align: left;
		    margin: 0 0 10px;
		}
		@media only screen and (max-width: 767px){
			#sfba-form7-container {
			    width: 100%;
			}	
		}
	</style>
	<form id="sfba_subscribe_form" action="" method="POST">
		<div id="sfba-form7-container" class="sfba-main-form-container">
			<h2 id="sfba-form7-heading"><?php echo esc_attr($form_heading); ?></h2>
			<p id="sfba-form7-subheading"><?php echo esc_attr($form_sub_heading); ?></p>
			<div class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
				<input type="text" value="" name="sfba-form-name" class="required name form-control  sfba-form-name" id="sfba-form7-name" placeholder="Enter your name" <?php if ($display_name != 'yes'):?> style="display: none;" <?php endif;?>>
				<input type="email" value="" name="sfba-form-email" class="required email form-control  sfba-form-email" id="sfba-form7-email" placeholder="Enter your email">								
			</div>
			<?php if ( $consent_on == 'yes' ) { ?>
				<p class="sfba-form7-consent-fields-main">
					<label>
						<input type="checkbox" name="sfba-form7-consent-field" value="1"/>
						<span class="subscribeform7_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
					</label>
				</p>					
				<p class="sfba-form7-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
			<?php }?>
			<input type="submit" value="<?php echo esc_attr($button_text); ?>" data-form-id="sfba_subscribe_form" name="subscribe" id="sfba-form7-button" class="btn btn__bottom--border mailchimp__btn sfba-form-submit-button" >
			<p class="form_nospam">No spam - pinky promise</p> 
			<div id="sfba_thanks_container" style="display:none;">
				<div>
					<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>
	</div> <!-- End of container-->
</form>

<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
<?php


}


if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform8') {
	$form_conset_field = get_post_meta($id, '_sfba-form8-consent-field', true);
	$consent_on = get_post_meta($id, '_sfba-form8-consent-on', true);
		
	$display_name = get_post_meta($id, '_sfba-form8-display-name', true);
		
	if( get_post_meta($id, '_sfba-form8-field-position', true) !='' )
		$field_position = get_post_meta($id, '_sfba-form8-field-position', true);
	else
		$field_position = 'name-first';
	$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';
	
	
	if( get_post_meta($id, '_sfba-form8-fonts', true ) !='' )
		$form_fonts = get_post_meta($id, '_sfba-form8-fonts', true );
	else
		$form_fonts = "Poppins";
	
	if( get_post_meta($id, '_sfba-form8-width', true) !='' )
		$form_width = get_post_meta($id, '_sfba-form8-width', true);
	else
		$form_width = '650';

	if( get_post_meta($id, '_sfba-form8-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfba-form8-background-image', true);

	if( get_post_meta($id, '_sfba-form8-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfba-form8-background-color', true);
	else
		$form_background_color = '#FF7998';

	if( get_post_meta($id, '_sfba-form8-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfba-form8-heading', true);
	else
		$form_heading = 'Free Daily Options Video Newsletter';

	if( get_post_meta($id, '_sfba-form8-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfba-form8-sub-heading', true);
	else
		$form_sub_heading = 'Sign up today to get free Daily options videos';

	if( get_post_meta($id, '_sfba-form8-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfba-form8-subscribe-button-text', true);
	else
		$button_text = 'Subscribe Now';

	if( get_post_meta($id, '_sfba-form8-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfba-form8-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfba-form8-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form8-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfba-form8-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfba-form8-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfba-form8-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form8-field-border-color', true) !='' )
		$field_border_color = get_post_meta($id, '_sfba-form8-field-border-color', true);
	else
		$field_border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form8-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfba-form8-button-background-color', true);
	else
		$button_background_color = '#432657';

	if( get_post_meta($id, '_sfba-form8-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfba-form8-button-text-size', true);
	else
		$button_text_size = '14';

	if( get_post_meta($id, '_sfba-form8-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfba-form8-button-text-color', true);
	else
		$button_text_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form8-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfba-form8-heading-color', true);
	else
		$form_heading_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form8-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfba-form8-sub-heading-color', true);
	else
		$form_sub_heading_color = '#FFFFFF';

	?>
	<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet">
	<style>
		#sfba-form9-newsletter {
		    width: <?php echo esc_attr($form_width); ?>px;
		    background-color: <?php echo esc_attr($form_background_color); ?>;
		    background-image: url('<?php echo esc_attr($form_background_image); ?>');
		    background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
		    border: <?php echo esc_attr($border_size);?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color)?>;
		    margin: 0 auto;
		    font-family: '<?php echo esc_attr($form_fonts);?>';
		    text-align: center;
		    padding: 43px 40px 48px;
		    position: relative;
		}
		#sfba-form9-newsletter #sfba-form9-heading {
		    font-size: 30px;
		    font-weight: bold;
		    line-height: 51px;
		    padding: 0;
		    margin: 0 0 7px;
		    color: <?php echo esc_attr($form_heading_color) ?>;
		    font-family: inherit;
		}
		.subscribeform8_sub_heading {
		    font-size: 16px;
		    line-height: 25px;
		    color: <?php echo esc_attr($form_sub_heading_color) ?>;
		    margin: 0 0 29px;
		    font-weight: 400;
		    font-family: inherit;
		}
		.sfba_subscribe_form__fields input {
			background-color: rgba(255,255,255,0.5);
		    width: 100%;
		    height: 48px;
		    border-radius: 4px;
		    border: 1px solid <?php echo esc_attr($field_border_color) ?>;
		    box-shadow: none;
		    margin-bottom: 15px;
		    padding: 0 15px;
		    font-size: 14px;
		    color: #7E7E7E;
		    line-height: 21px;
		}
		#sfba-form9-newsletter input[type="submit"] {
		    width: 100%;
		    background-color: <?php echo esc_attr($button_background_color);?>;
		    color: <?php echo esc_attr($button_text_color); ?>;
		    font-size: <?php echo esc_attr($button_text_size); ?>px;
		    cursor: pointer;
		    border-radius: 4px;
		    box-shadow: none;
		    border: none;
		    line-height: 21px;
		    font-weight: 600;
		    padding: 17px 10px 16px;
		    font-family: inherit;
		}
		.sfba_subscribe_form__fields.sfba_email_first{
			display: flex;
			flex-direction: column;		
		}			
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-email{
			order: 1;
		}
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-name{
			order: 2;
		}
		.sfba-form8-consent-fields-main {
		    margin: 0 0 10px;
		    text-align: left;
		}
		.sfba-form8-consent-fields-main label {
		    color: #fff;
	        font-weight: 400;
		}
		.sfba-form8-consent-fields-main label input[type="checkbox"] {
		    background-color: rgba(255,255,255,0.5);
		    height: 17px;
		    margin-bottom: 0;
		    margin-top: 0px !important;
		    width: 17px;
		    -webkit-appearance: none;
		    padding: 0;
		    display: inline-block;
		    vertical-align: middle;
		    margin-right: 10px;
		    border: 0;
		    border-radius: 4px;
		}
		#sfba-success-message{
		    display: none;
		    margin: 0;
		    width: 100%;
		    text-align: center;
		    padding: 10px 20px;
		    font-family: monospace;
		    font-size: 14px;
		    letter-spacing: 1px;
		}
		#sfba_thanks_container {
		    display: flex;
		    align-items: center;
		    width: 100%;
		    height: 100%;
		    position: absolute;
		    background: rgba(0, 0, 0, 0.8);
		    top: 0px;
		    left: 0px;
		    opacity: 1;
		}
		#sfba_thanks_image {
		    margin: 0;
		}
		#sfba_thanks_message {
		    margin: 0;
		    text-align: center;
		    font-size: 22px;
		    color: #fff;
		    font-family: inherit;
		    padding: 0 15px;
		    line-height: 1.2;
		}
		input[type=checkbox]:checked:before {
		    float: left;
		    display: inline-block;
		    vertical-align: middle;
		    width: 16px;
		    font: normal 21px/1 dashicons;
		    speak: none;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		input[type=checkbox]:checked:before {
		    content: "\f147";
		    margin: -2px 0 0 -2px;
		    color: #1e8cbe;
		}
		.sfba-conset-field-error {
		    text-align: left;
		    margin: 0 0 10px;
		}
		#sfba_thanks_container > div {
		    margin: 0 auto;
		}
		@media only screen and (max-width: 767px){
			#sfba-form9-newsletter {
			    width: 100%;
			}	
		}
	</style>
	<form id="sfba_subscribe_form" action="" method="POST">
		<div id="sfba-form9-newsletter" class="newsletter-grid newsletter-clearfix sfba-main-form-container" >
			<h2 id="sfba-form9-heading"><?php echo esc_attr($form_heading); ?></h2>
			<p class="subscribeform8_sub_heading"><?php echo esc_attr($form_sub_heading); ?></p>
			
			<div class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
				<input id="sfba-form9-name" name="sfba-form-name" class="sfba-form-name" type="text" placeholder="Enter your name" <?php if ($display_name == 'yes'):?> style="display: none;" <?php endif;?> />
				<input id="sfba-form9-email" name="sfba-form-email" class="sfba-form-email" type="email" placeholder="Enter your email"  />
			</div>			
			<div class="controls-container">
				<?php if ( $consent_on == 'yes' ) { ?>
					<p class="sfba-form8-consent-fields-main">
						<label>
							<input type="checkbox" name="sfba-form9-consent-field" value="1" />
							<span class="subscribeform8_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
						</label>
					</p>					
					<p class="sfba-form9-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
				<?php }?>
				<input id="sfba-form-submit-button" class="sfba-form-submit-button" data-form-id="sfba_subscribe_form" type="submit" value="<?php echo esc_attr($button_text); ?>" />
			</div>

			<div id="sfba_thanks_container" style="display:none;">
				<div>
					<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>

	</div>
</form>

<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
<?php


}


if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform9') {
	$form_conset_field = get_post_meta($id, '_sfba-form9-consent-field', true);
	$consent_on = get_post_meta($id, '_sfba-form9-consent-on', true);
		
	$display_name = get_post_meta($id, '_sfba-form9-display-name', true);
		
	if( get_post_meta($id, '_sfba-form9-field-position', true) !='' )
		$field_position = get_post_meta($id, '_sfba-form9-field-position', true);
	else
		$field_position = 'name-first';
	$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';
	
	if( get_post_meta($id, '_sfba-form9-fonts', true ) !='' )
		$form_fonts = get_post_meta($id, '_sfba-form9-fonts', true );
	else
		$form_fonts = "Poppins";

	if( get_post_meta($id, '_sfba-form9-width', true) !='' )
		$form_width = get_post_meta($id, '_sfba-form9-width', true);
	else
		$form_width = '500';

	if( get_post_meta($id, '_sfba-form9-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfba-form9-background-image', true);
	else
		$form_background_image = plugins_url('../images/09_bg.png',__FILE__);

	if( get_post_meta($id, '_sfba-form9-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfba-form9-background-color', true);
	else
		$form_background_color = 'transparent';

	if( get_post_meta($id, '_sfba-form9-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfba-form9-heading', true);
	else
		$form_heading = 'Newsletter';

	if( get_post_meta($id, '_sfba-form9-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfba-form9-sub-heading', true);
	else
		$form_sub_heading = 'Send us your email, we will make sure you never miss a thing!';

	if( get_post_meta($id, '_sfba-form9-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfba-form9-subscribe-button-text', true);
	else
		$button_text = 'Subscribe Now';

	if( get_post_meta($id, '_sfba-form9-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfba-form9-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfba-form9-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form9-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfba-form9-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfba-form9-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfba-form9-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form9-field-border-color', true) !='' )
		$field_border_color = get_post_meta($id, '_sfba-form9-field-border-color', true);
	else
		$field_border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form9-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfba-form9-button-text-size', true);
	else
		$button_text_size = '12';

	if( get_post_meta($id, '_sfba-form9-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfba-form9-button-background-color', true);
	else
		$button_background_color = '#ffffff';

	if( get_post_meta($id, '_sfba-form9-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfba-form9-button-text-color', true);
	else
		$button_text_color = '#1173B8';

	if( get_post_meta($id, '_sfba-form9-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfba-form9-heading-color', true);
	else
		$form_heading_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form9-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfba-form9-sub-heading-color', true);
	else
		$form_sub_heading_color = '#FFFFFF';
	?>
	<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet">
	<style>
		#sfba-form9-newsletter {
		    width: <?php echo esc_attr($form_width); ?>px;
		    background-color: <?php echo esc_attr($form_background_color); ?>;
		    background-image: url('<?php echo esc_attr($form_background_image); ?>');
		    background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
		    border: <?php echo esc_attr($border_size);?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color)?>;
		    margin: 0 auto;
		    font-family: '<?php echo esc_attr($form_fonts);?>';
		    text-align: center;
		    padding: 16px 22px 18px;
		    position: relative;
		}
		#sfba-form9-newsletter h2#sfba-form9-heading {
		    font-size: 30px;
		    font-weight: bold;
		    line-height: 51px;
		    padding: 0;
		    margin: 0 0 1px;
		    color: <?php echo esc_attr($form_heading_color) ?>;
		    font-family: inherit;
		}
		#sfba-form9-subheading {
		    font-size: 14px;
		    line-height: 21px;
		    color: <?php echo esc_attr($form_sub_heading_color) ?>;
		    margin: 0 0 7px;
		    font-weight: 400;
		    font-family: inherit;
		}

		#sfba-form9-newsletter .sfba_subscribe_form__fields input {
			background-color: rgba(0,0,0,0.2);
			color: #fff;
			line-height: 16px;
			height:38px;
			font-size:<?php echo esc_attr($button_text_size); ?>px;
			width:100%;
			border-radius:4px;
			border:1px solid <?php echo esc_attr($field_border_color) ?>;
		    padding: 0 15px;
		    margin-bottom: 15px;
		    box-shadow: none;
		}
		#sfba-form9-newsletter .sfba_subscribe_form__fields input::-webkit-input-placeholder {
			color: #fff;
			opacity: 1;
		}
		#sfba-form9-newsletter .sfba_subscribe_form__fields input::-moz-placeholder {
			color: #fff;
			opacity: 1;
		}
		#sfba-form9-newsletter .sfba_subscribe_form__fields input:-ms-input-placeholder {
			color: #fff;
			opacity: 1;
		}
		#sfba-form9-newsletter .sfba_subscribe_form__fields input:-moz-placeholder {
			color: #fff;
			opacity: 1;
		}
		#sfba-form9-newsletter input[type="submit"] {
		    color: <?php echo esc_attr($button_text_color);?>;
		    font-weight: 600;
		    border: 0;
		    cursor: pointer;
		    width: 100%;
		    margin: 0;
		    background-color: <?php echo esc_attr($button_background_color);?>;
		    font-size: <?php echo esc_attr($button_text_size);?>px;
		    border-radius: 4px;
		    padding: 10px 10px;
		    line-height: 18px;
		}
		.sfba_subscribe_form__fields.sfba_email_first{
			display: flex;
			flex-direction: column;		
		}			
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-email{
			order: 1;	
		}
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-name{
			order: 2;
		}
		.sfba-form9-consent-fields-main {
		    margin: 0 0 10px;
		    text-align: left;
		}
		.sfba-form9-consent-fields-main label {
		    color: #fff;
		    font-weight: 400;
		    margin-bottom: 0;
		}
		.sfba-form9-consent-fields-main label input[type="checkbox"] {
			background-color: #fff;
		    height: 17px;
		    margin-bottom: 0;
		    margin-top: 0px !important;
		    width: 17px;
		    -webkit-appearance: none;
		    padding: 0;
		    display: inline-block;
		    vertical-align: middle;
		    margin-right: 10px;
		    border: 0;
		}
		#sfba-success-message{
		    display: none;
		    margin: 0;
		    width: 100%;
		    text-align: center;
		    padding: 10px 20px;
		    font-family: monospace;
		    font-size: 14px;
		    letter-spacing: 1px;
		}
		#sfba_thanks_container {
		    display: flex;
		    align-items: center;
		    width: 100%;
		    height: 100%;
		    position: absolute;
		    background: rgba(0, 0, 0, 0.8);
		    top: 0px;
		    left: 0px;
		    opacity: 1;
		}
		#sfba_thanks_image {
		    margin: 0;
		}
		#sfba_thanks_message {
		    margin: 0;
		    text-align: center;
		    font-size: 22px;
		    color: #fff;
		    font-family: inherit;
		    padding: 0 15px;
		    line-height: 1.2;
		}
		input[type=checkbox]:checked:before {
		    float: left;
		    display: inline-block;
		    vertical-align: middle;
		    width: 16px;
		    font: normal 21px/1 dashicons;
		    speak: none;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		input[type=checkbox]:checked:before {
		    content: "\f147";
		    margin: -2px 0 0 -2px;
		    color: #1e8cbe;
		}
		.sfba-conset-field-error {
		    text-align: left;
		    margin: 0 0 10px;
		}
		#sfba_thanks_container > div {
		    margin: 0 auto;
		}
		@media only screen and (max-width: 600px){
			#sfba-form9-newsletter {
			    width: 100%;
			}	
		}
	</style>
	<form id="sfba_subscribe_form" action="" method="POST">
		<div id="sfba-form9-newsletter" class="sfba-main-form-container">
			<h2 id="sfba-form9-heading" class="title"><?php echo esc_attr($form_heading); ?></h2>
    		<p id="sfba-form9-subheading"><?php echo esc_attr($form_sub_heading); ?></p>
			<div id="sfba-form9-fields-elements" class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
				<input id="sfba-form9-name" class="sfba-form-name" name="sfba-form9-name" type="text" placeholder="Enter your name" <?php if ($display_name != 'yes'):?> style="display: none;" <?php endif;?> />
				<input id="sfba-form9-email" class="sfba-form-email" name="sfba-form9-email" type="text" placeholder="Enter your Email" />
			</div>
			<?php if ( $consent_on == 'yes' ) { ?>
				<p class="sfba-form9-consent-fields-main">
					<label>
						<input type="checkbox" name="sfba-form9-consent-field" value="1"/>
						<span class="subscribeform9_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
					</label>
				</p>					
				<p class="sfba-form9-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
			<?php }?>
			<input id="sfba-form-submit-button" class="sfba-form-submit-button" data-form-id="sfba_subscribe_form" type="submit" value="<?php echo esc_attr($button_text); ?>" />
			<div id="sfba_thanks_container" style="display:none;">
				<div>
					<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>
	</form>

<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
<?php

}


if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform10') {
	$form_conset_field = get_post_meta($id, '_sfba-form10-consent-field', true);
	$consent_on = get_post_meta($id, '_sfba-form10-consent-on', true);
	$display_name = get_post_meta($id, '_sfba-form10-display-name', true);
		
	if( get_post_meta($id, '_sfba-form10-field-position', true) !='' )
		$field_position = get_post_meta($id, '_sfba-form10-field-position', true);
	else
		$field_position = 'name-first';
	$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';
	
	
	if( get_post_meta($id, '_sfba-form10-fonts', true ) !='' )
		$form_fonts = get_post_meta($id, '_sfba-form10-fonts', true );
	else
		$form_fonts = "Poppins";
	
	if( get_post_meta($id, '_sfba-form10-width', true) !='' )
		$form_width = get_post_meta($id, '_sfba-form10-width', true);
	else
		$form_width = '550';

	if( get_post_meta($id, '_sfba-form10-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfba-form10-background-image', true);
	else
		$form_background_image = plugins_url('../images/10_bg.png',__FILE__);

	if( get_post_meta($id, '_sfba-form10-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfba-form10-background-color', true);
	else
		$form_background_color = 'transparent';

	if( get_post_meta($id, '_sfba-form10-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfba-form10-heading', true);
	else
		$form_heading = 'Subscribe Now';

	if( get_post_meta($id, '_sfba-form10-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfba-form10-sub-heading', true);
	else
		$form_sub_heading = 'Get informed about the next updates';

	if( get_post_meta($id, '_sfba-form10-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfba-form10-subscribe-button-text', true);
	else
		$button_text = 'SUBSCRIBE';

	if( get_post_meta($id, '_sfba-form10-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfba-form10-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfba-form10-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form10-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfba-form10-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfba-form10-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfba-form10-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form10-field-border-color', true) !='' )
		$field_border_color = get_post_meta($id, '_sfba-form10-field-border-color', true);
	else
		$field_border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form10-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfba-form10-button-background-color', true);
	else
		$button_background_color = '#FBAD26';

	if( get_post_meta($id, '_sfba-form10-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfba-form10-button-text-size', true);
	else
		$button_text_size = '14';

	if( get_post_meta($id, '_sfba-form10-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfba-form10-button-text-color', true);
	else
		$button_text_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form10-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfba-form10-heading-color', true);
	else
		$form_heading_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form10-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfba-form10-sub-heading-color', true);
	else
		$form_sub_heading_color = '#FFFFFF';
	?>
	<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,500,700" rel="stylesheet">
	<style>
		#sfba-form10-container {
		    width: <?php echo esc_attr($form_width); ?>px;
		    background-color: <?php echo esc_attr($form_background_color); ?>;
		    background-image: url('<?php echo esc_attr($form_background_image); ?>');
		    background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
		    border: <?php echo esc_attr($border_size);?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color)?>;
		    margin: 0 auto;
		    font-family: '<?php echo esc_attr($form_fonts);?>';
		    text-align: center;
		    padding: 19px 45px 28px;
		    position: relative;
		}
		#sfba-form10-container #sfba-form10-heading {
		    font-size: 24px;
		    font-weight: bold;
		    line-height: 34px;
		    padding: 0;
		    margin: 0 0 4px;
		    color: <?php echo esc_attr($form_heading_color) ?>;
		    font-family: inherit;
		}
		#sfba-form10-subheading {
		    font-size: 14px;
		    line-height: 21px;
		    color: <?php echo esc_attr($form_sub_heading_color) ?>;
		    margin: 0 0 16px;
		    font-weight: 400;
		    font-family: inherit;
		}
		.sfba_subscribe_form__fields input {
			background-color: rgb(0,0,0,0.2);
		    width: 100%;
		    height: 44px;
		    border-radius: 21px;
		    border: 1px solid <?php echo esc_attr($field_border_color) ?>;
		    box-shadow: none;
		    margin-bottom: 10px;
		    padding: 0 15px;
		    font-size: 12px;
		    color: #fff;
		    line-height: 18px;
		}
		#sfba-form10-container .sfba_subscribe_form__fields input::-webkit-input-placeholder {
			color: #fff;
			opacity: 1;
		}
		#sfba-form10-container .sfba_subscribe_form__fields input::-moz-placeholder {
			color: #fff;
			opacity: 1;
		}
		#sfba-form10-container .sfba_subscribe_form__fields input:-ms-input-placeholder {
			color: #fff;
			opacity: 1;
		}
		#sfba-form10-container .sfba_subscribe_form__fields input:-moz-placeholder {
			color: #fff;
			opacity: 1;
		}
		#sfba-form10-container input[type="submit"] {
		    width: 100%;
		    background-color: <?php echo esc_attr($button_background_color);?>;
		    color: <?php echo esc_attr($button_text_color); ?>;
		    font-size: <?php echo esc_attr($button_text_size); ?>px;
		    cursor: pointer;
		    border-radius: 22px;
		    box-shadow: none;
		    border: none;
		    line-height: 21px;
		    font-weight: 500;
		    padding: 12px 10px 11px;
		    font-family: inherit;
		}

		.sfba_subscribe_form__fields.sfba_email_first{
			display: flex;
			flex-direction: column;		
		}	
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-email{
			order: 1;
		}
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-name{
			order: 2;
		}
		.sfba-form10-consent-fields-main {
		    margin: 0 0 10px;
		    text-align: left;
		}
		.sfba-form10-consent-fields-main label {
		    color: #fff;
		    font-weight: 400;
		    margin-bottom: 0;
		}
		.sfba-conset-field-error {
		    text-align: left;
		    margin: 0 0 10px;
		}
		.sfba-form10-consent-fields-main label input[type="checkbox"] {
			background-color: #fff;
		    height: 17px;
		    margin-bottom: 0;
		    margin-top: 0px !important;
		    width: 17px;
		    -webkit-appearance: none;
		    padding: 0;
		    display: inline-block;
		    vertical-align: middle;
		    margin-right: 10px;
		    border: 0;
		}
		#sfba-success-message{
		    display: none;
		    margin: 0;
		    width: 100%;
		    text-align: center;
		    padding: 10px 20px;
		    font-family: monospace;
		    font-size: 14px;
		    letter-spacing: 1px;
		}
		#sfba_thanks_container {
		    display: flex;
		    align-items: center;
		    width: 100%;
		    height: 100%;
		    position: absolute;
		    background: rgba(0, 0, 0, 0.8);
		    top: 0px;
		    left: 0px;
		    opacity: 1;
		}
		#sfba_thanks_image {
		    margin: 0;
		}
		#sfba_thanks_message {
		    margin: 0;
		    text-align: center;
		    font-size: 22px;
		    color: #fff;
		    font-family: inherit;
		    padding: 0 15px;
		    line-height: 1.2;
		}
		input[type=checkbox]:checked:before {
		    float: left;
		    display: inline-block;
		    vertical-align: middle;
		    width: 16px;
		    font: normal 21px/1 dashicons;
		    speak: none;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		input[type=checkbox]:checked:before {
		    content: "\f147";
		    margin: -2px 0 0 -2px;
		    color: #1e8cbe;
		}
		@media only screen and (max-width: 600px){
			#sfba-form10-container {
			    width: 100%;
			}	
		}
	</style>
	<?php  ?>
	<form id="sfba_subscribe_form" action="" method="POST">
		<div id="sfba-form10-container" class="sfba-main-form-container">
			<h2 id="sfba-form10-heading"><?php echo esc_attr($form_heading); ?></h2>
			<p id="sfba-form10-subheading"><?php echo esc_attr($form_sub_heading); ?></p>
			<div class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
				<input id="sfba-form10-name" name="sfba-form-name" class="sfba-form-name" type="text" placeholder="Your Name" <?php if ($display_name != 'yes'):?> style="display: none;" <?php endif;?> />
				<input id="sfba-form10-email" name="sfba-form-email" class="sfba-form-email" type="email" placeholder="Your Email" name="email"/>
			</div>
			<?php if ( $consent_on == 'yes' ) { ?>
				<p class="sfba-form10-consent-fields-main">
					<label>
						<input type="checkbox" name="sfba-form10-consent-field" value="1"/>
						<span class="subscribeform10_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
					</label>
				</p>					
				<p class="sfba-form10-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
			<?php }?>
			<input id="sfba-form-submit-button" class="sfba-form-submit-button" data-form-id="sfba_subscribe_form" type="submit" value="<?php echo esc_attr($button_text); ?>" name="button"/>
			
			<div id="sfba_thanks_container" style="display:none;">
				<div>
					<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>
	</form>


<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
<?php


}


if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform11') {
	$form_conset_field = get_post_meta($id, '_sfba-form11-consent-field', true);
	$consent_on = get_post_meta($id, '_sfba-form11-consent-on', true);
		
	$display_name = get_post_meta($id, '_sfba-form11-display-name', true);
		
	if( get_post_meta($id, '_sfba-form11-field-position', true) !='' )
		$field_position = get_post_meta($id, '_sfba-form11-field-position', true);
	else
		$field_position = 'name-first';
	$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : 'sfba_name_first';
	
	
	$form_fonts = get_post_meta($id, '_sfba-form11-fonts', true );	
	
	if( get_post_meta($id, '_sfba-form11-width', true) !='' )
		$form_width = get_post_meta($id, '_sfba-form11-width', true);
	else
		$form_width = '600';

	if( get_post_meta($id, '_sfba-form11-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfba-form11-background-image', true);

	if( get_post_meta($id, '_sfba-form11-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfba-form11-background-color', true);
	else
		$form_background_color = '#00B880';

	if( get_post_meta($id, '_sfba-form11-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfba-form11-heading', true);
	else
		$form_heading = 'Get Free Email updates';

	if( get_post_meta($id, '_sfba-form11-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfba-form11-sub-heading', true);
	else
		$form_sub_heading = 'Signup now and receive an email once! I publish new content';

	if( get_post_meta($id, '_sfba-form11-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfba-form11-subscribe-button-text', true);
	else
		$button_text = 'SUBSCRIBE';

	if( get_post_meta($id, '_sfba-form11-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfba-form11-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfba-form11-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form11-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfba-form11-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfba-form11-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfba-form11-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form11-field-border-color', true) !='' )
		$field_border_color = get_post_meta($id, '_sfba-form11-field-border-color', true);
	else
		$field_border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form11-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfba-form11-button-background-color', true);
	else
		$button_background_color = '#FF3A3A';

	if( get_post_meta($id, '_sfba-form11-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfba-form11-button-text-size', true);
	else
		$button_text_size = '12';

	if( get_post_meta($id, '_sfba-form11-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfba-form11-button-text-color', true);
	else
		$button_text_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form11-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfba-form11-heading-color', true);
	else
		$form_heading_color = '#FFFFFF';

	if( get_post_meta($id, '_sfba-form11-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfba-form11-sub-heading-color', true);
	else
		$form_sub_heading_color = '#FFFFFF';
	?>
	<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet">
	<style>
		#sfba-form11-container{
			width: <?php echo esc_attr($form_width); ?>px;
			border: <?php echo esc_attr($border_size); ?>px <?php echo esc_attr($border_style) ?> <?php echo esc_attr($border_color) ?>;
			padding: 20px;
			background-color: <?php echo esc_attr($form_background_color); ?>;
		    background-image: url('<?php echo esc_attr($form_background_image); ?>');
		    background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
			text-align: center;
			margin: 0 auto;
			font-family: <?php echo esc_attr($form_fonts); ?>;
			position: relative;
		}
		#sfba-form11-container #sfba-form11-heading {
		    font-family: inherit;
		    color: <?php echo esc_attr($form_heading_color) ?>;
		    font-size: 22px;
		    margin: 0 0 8px;
		    font-weight: bold;
		    line-height: 34px;
		    padding: 0;
		}
		#sfba-form11-subheading {
		    color: <?php echo esc_attr($form_sub_heading_color)?>;
		    font-size: 12px;
		    line-height: 18px;
		    margin: 0 0 18px;
		    font-family: inherit;
		}
		.sfba_subscribe_form__fields_wrap:after {
		    display: block;
		    content: "";
		    clear: both;
		}
		.sfba_subscribe_form__fields {
		    display: flex;
		    float: left;
		    width: 77%;
		    padding-right: 10px;
		}
		.sfba_subscribe_form__fields input {
		    height: 40px;
		    border: 1px solid <?php echo esc_attr($field_border_color) ?>;
		    border-radius: 4px;
		    box-shadow: none;
		    width: 48.6%;
		    font-size: 12px;
		    color: #7E7E7E;
		    padding: 0 15px;
	        margin: 0;
	        float: left;
		}
		.sfba_subscribe_form__fields input#sfba-form11-name {
		    margin-right: 10px;
		}
		.sfba_subscribe_form__fields.sfba_email_first input#sfba-form11-name {
		    order: 2;
		    margin-right: 0;
		}
		.sfba_subscribe_form__fields.sfba_email_first input#sfba-form11-email {
		    order: 1;
		    margin-right: 10px;
		}
		.sfba_subscribe_form__fields.sfba-form-email-full input#sfba-form11-email {
			width: 100%;
			margin-right: 0;
		}
		#sfba-form11-button {
		    width: 22.3%;
		    cursor: pointer;
		    height: 40px;
		    background-color: #20a64c;
		    color: white;
		    border-radius: 4px;
		    border: 1px solid transparent;
		    background-color: <?php echo esc_attr($button_background_color); ?>;
		    color: <?php echo esc_attr($button_text_color); ?>;
		    font-size: <?php echo esc_attr($button_text_size);?>px;
		    line-height: 18px;
		    font-weight: 600;
		    padding: 0 10px;
		    float: right;
		}
		.sfba-form11-consent-fields-main {
		    margin: 10px 0 0;
		    text-align: left;
		}
		.sfba-form11-consent-fields-main label {
		    color: #fff;
		    margin-bottom: 0;
		    font-weight: 400;
		}
		.sfba-form11-consent-fields-main label input[type="checkbox"] {
			background-color: #fff;
		    height: 17px;
		    margin-bottom: 0;
		    margin-top: 0px !important;
		    width: 17px;
		    -webkit-appearance: none;
		    padding: 0;
		    display: inline-block;
		    vertical-align: middle;
		    margin-right: 10px;
		    border: 0;
		}
		#sfba-success-message{
		    display: none;
		    margin: 0;
		    width: 100%;
		    text-align: center;
		    padding: 10px 20px;
		    font-family: monospace;
		    font-size: 14px;
		    letter-spacing: 1px;
		}
		#sfba_thanks_container {
		    display: flex;
		    align-items: center;
		    width: 100%;
		    height: 100%;
		    position: absolute;
		    background: rgba(0, 0, 0, 0.8);
		    top: 0px;
		    left: 0px;
		    opacity: 1;
		}
		#sfba_thanks_image {
		    margin: 0;
		}
		#sfba_thanks_message {
		    margin: 0;
		    text-align: center;
		    font-size: 22px;
		    color: #fff;
		    font-family: inherit;
		    padding: 0 15px;
		    line-height: 1.2;
		}
		input[type=checkbox]:checked:before {
		    float: left;
		    display: inline-block;
		    vertical-align: middle;
		    width: 16px;
		    font: normal 21px/1 dashicons;
		    speak: none;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		input[type=checkbox]:checked:before {
		    content: "\f147";
		    margin: -2px 0 0 -2px;
		    color: #1e8cbe;
		}
		.sfba-conset-field-error {
		    text-align: left;
		    margin: 10px 0 0;
		}
		@media only screen and (max-width: 767px){
			#sfba-form11-container {
			    width: 100%;
			}	
		}
	</style>
	<form id="sfba_subscribe_form" action="" method="POST">
		<div id="sfba-form11-container" class="sfba-main-form-container">
			<h2 id="sfba-form11-heading"><?php echo esc_attr($form_heading); ?></h2>
			<p id="sfba-form11-subheading"><?php echo esc_attr($form_sub_heading); ?></p>
			<div class="sfba_subscribe_form__fields_wrap">
				<div class="sfba_subscribe_form__fields <?php if ($display_name != 'yes'): echo esc_attr($sfba_subscribe_fields_class); else: echo 'sfba-form-email-full'; endif;?>">
					<input id="sfba-form11-name" type="text" name="sfba-form-name" class="sfba-form-name" placeholder="Enter Your Name" <?php if ($display_name == 'yes'):?> style="display: none;" <?php endif;?>>
					<input id="sfba-form11-email" type="text" name="sfba-form-email" class="sfba-form-email" placeholder="Enter Your Email">
				</div>
				<input id="sfba-form11-button" type="submit" data-form-id="sfba_subscribe_form" class="sfba-form-submit-button" value="<?php echo esc_attr($button_text); ?>">
			</div>
			<?php if ( $consent_on == 'yes' ) { ?>
				<p class="sfba-form11-consent-fields-main">
					<label>
						<input type="checkbox" name="sfba-form11-consent-field" value="1"/>
						<span class="subscribeform11_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
					</label>
				</p>					
				<p class="sfba-form11-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
			<?php }?>
			<div id="sfba_thanks_container" style="display:none;">
				<div>
					<p id="sfba_thanks_image"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfba_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>

	</div>
</form>
<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
<?php


}


if (!empty($sfba_subscribe_form) && $sfba_subscribe_form == 'subscribeform12') {
	$form_conset_field = get_post_meta($id, '_sfba-form12-consent-field', true);
	$consent_on = get_post_meta($id, '_sfba-form12-consent-on', true);
		
	$display_name = get_post_meta($id, '_sfba-form12-display-name', true);
		
	if( get_post_meta($id, '_sfba-form12-field-position', true) !='' )
		$field_position = get_post_meta($id, '_sfba-form12-field-position', true);
	else
		$field_position = 'name-first';
	$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';
	
	if( get_post_meta($id, '_sfba-form12-fonts', true ) !='' )
		$form_fonts = get_post_meta($id, '_sfba-form12-fonts', true );
	else
		$form_fonts = "Nunito";
	
	if( get_post_meta($id, '_sfba-form12-width', true) !='' )
		$form_width = get_post_meta($id, '_sfba-form12-width', true);
	else
		$form_width = '550';

	if( get_post_meta($id, '_sfba-form12-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfba-form12-background-image', true);
	else
		$form_background_image = ''. plugins_url('../images/prism.jpg',__FILE__);

	if( get_post_meta($id, '_sfba-form12-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfba-form12-background-color', true);
	else
		$form_background_color = '';

	if( get_post_meta($id, '_sfba-form12-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfba-form12-heading', true);
	else
		$form_heading = 'Get new posts delivered to your inbox!';

	if( get_post_meta($id, '_sfba-form12-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfba-form12-sub-heading', true);
	else
		$form_sub_heading = 'Be the first one to find out more about our awesome themes!';

	if( get_post_meta($id, '_sfba-form12-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfba-form12-subscribe-button-text', true);
	else
		$button_text = 'Subscribe';

	if( get_post_meta($id, '_sfba-form12-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfba-form12-border-size', true);
	else
		$border_size = '';

	if( get_post_meta($id, '_sfba-form12-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfba-form12-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfba-form12-border-style', true);
	else
		$border_style = '';

	if( get_post_meta($id, '_sfba-form12-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfba-form12-border-color', true);
	else
		$border_color = '';

	if( get_post_meta($id, '_sfba-form12-email-field-border-color', true) !='' )
		$email_border_color = get_post_meta($id, '_sfba-form12-email-field-border-color', true);
	else
		$email_border_color = 'transparent';

	if( get_post_meta($id, '_sfba-form12-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfba-form12-button-background-color', true);
	else
		$button_background_color = '#57b557';

	if( get_post_meta($id, '_sfba-form12-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfba-form12-button-text-size', true);
	else
		$button_text_size = '';

	if( get_post_meta($id, '_sfba-form12-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfba-form12-button-text-color', true);
	else
		$button_text_color = 'white';

	if( get_post_meta($id, '_sfba-form12-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfba-form12-heading-color', true);
	else
		$form_heading_color = 'white';

	if( get_post_meta($id, '_sfba-form12-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfba-form12-sub-heading-color', true);
	else
		$form_sub_heading_color = 'white';
	?>	
	<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>" rel="stylesheet">
	<style>
		#sfba-form12-container,
		#sfba-form12-container #sfba-form12-heading,
		#sfba-form12-container #sfba-form12-subheading,
		#sfba-form12-container #sfba-form12-subscribe,
		#sfba-form12-container #sfba-form12-email,
		#sfba-form12-container #sfba-form12-name {
			font-family: '<?php echo esc_attr($form_fonts);?>' !important;
		}
		#sfba-form12-envelope-container{
			text-align:left !important;
			width:100% !important;
		}
		#sfba-form12-container{
			background: <?php echo esc_attr($form_background_color); ?> !important;
			background-image: url('<?php echo esc_attr($form_background_image); ?>') !important;
			background-size: cover !important;
			width:<?php if($widget != 'true'){ echo esc_attr($form_width).'px';}else{echo '250px';} ?> !important;
			text-align:center !important;
			border-radius: 10px !important;
			position:relative !important;
			padding:15px !important;
			margin: 0 auto !important;
			border: <?php echo esc_attr($border_size); ?>px <?php echo esc_attr($border_style)?> <?php echo esc_attr($border_color) ?> !important;
			position: relative !important;
		}
		#sfba-form12-heading{
			width:100% !important;
			font-size: 25px !important;
			line-height: 1 !important;
			display:block !important;
			color:<?php echo esc_attr($form_heading_color) ?> !important;
			font-family: 'Nunito', sans-serif !important;
		}
		#sfba-form12-subheading{
			width:100% !important;
			font-size: 14px !important;			
			line-height: 1 !important;
			display:block !important;
			margin: 10px !important;
			color:<?php echo esc_attr($form_sub_heading_color) ?> !important;
			text-align: center;
		}
		#sfba-form12-email,
		#sfba-form12-name{
		    width: 80% !important;
		    border-radius: 5px !important;
		    font-size: 15px !important;
		    font-weight: bold !important;
		    padding: 0px !important;
		    border: 1px solid <?php echo esc_attr($email_border_color); ?>;
		    box-shadow: none !important;
		    margin: 0 auto !important;
		    padding-left: 15px !important;
		    height: 40px !important;
		    margin-top: 5px !important;
		}
		#sfba-form12-closing-note{
			font-size:12px !important;
			color:white !important;
			font-style:italic !important;
			margin: 10px !important;
			text-align: center;
		}
		#sfba-form12-subscribe{
			height:auto !important;
			color:white !important;
			background-color: #57b557 !important;
			font-family: 'Nunito', sans-serif !important;
			box-shadow:none !important;
			border:none !important;
			border-radius:5px !important;
			font-weight:bold !important;
			display:block !important;
			margin:30px auto !important;
			cursor: pointer !important;
			background-color: <?php echo esc_attr($button_background_color); ?> !important;
			color: <?php echo esc_attr($button_text_color); ?> !important;
			font-size: <?php echo esc_attr($button_text_size);?>px !important;
			padding: 10px 20px !important;
		}
		.sfba_subscribe_form__fields.sfba_email_first{
			display: flex;
			flex-direction: column;		
		}
		.sfba_subscribe_form__fields{
			width:90%;
			margin: 0 auto;
		}	
		.sfba_subscribe_form__fields input{
			width:100%;
		}		
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-email{
			order: 1;			
		}
		.sfba_subscribe_form__fields.sfba_email_first .sfba-form-name{
			order: 2;
		}
		.sfba-form12-consent-fields-main {
		    margin-top: 10px;
		}
	</style>
	
	<form id="sfba_subscribe_form" action="" method="POST">
		<div id="sfba-form12-container" class="sfba-main-form-container">
			<div id="sfba-form12-envelope-container">
				<img id="sfba-form12-envelope" src="<?php echo plugins_url('../images/sfba-envelope.png',__FILE__);?>" width="50px">
			</div>
			<h1 id="sfba-form12-heading">
				<?php echo esc_attr($form_heading);?>
			</h1>
			<p id="sfba-form12-subheading">
				<?php echo esc_attr($form_sub_heading);?>
			</p>
			
			<div class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
				<input id="sfba-form12-name" name="sfba-form-name" class="sfba-form-name" type="text" placeholder="Enter your name" <?php if ($display_name != 'yes'):?> style="display: none;" <?php endif;?>>
				<input id="sfba-form12-email" name="sfba-form-email" class="sfba-form-email" type="text" placeholder="youremail@gmail.com">				
			</div>		
			<?php if ( $consent_on == 'yes' ) { ?>
				<p class="sfba-form12-consent-fields-main">
					<label>
						<input type="checkbox" name="sfba-form12-consent-field" value="1" style="width: 20px !important;"/>&nbsp;<?php echo esc_attr($form_conset_field);?>
					</label>
				</p>					
				<p class="sfba-form12-fields sfba-conset-field-error error" style="display:none !important; color:#ff0606;"><?php echo wp_kses('Please select "'. $form_conset_field .'" option.', array());?></p>
			<?php }?>			
			<p id="sfba-form12-closing-note">
				We value your privacy. Your email address will not be shared.
			</p>
			<input id="sfba-form12-subscribe" type="submit" data-form-id="sfba_subscribe_form" class="sfba-form-submit-button" value="Subscribe">
			<div id="sfba_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
				<div style="width:100%;padding: 15%">
					<p id="sfba_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfba_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>
	</div>
</form>
<input type='hidden' id='sfba_post_type_id' name="sfba_post_type_id" value="<?php echo esc_attr($id); ?>" /> 
<?php



}
return ob_get_clean();
}