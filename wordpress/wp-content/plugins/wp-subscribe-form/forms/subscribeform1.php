<?php
include('subscribeform1-settings.php');
$sfba_subscribe_fields_class = ( $field_position == 'email_first' ) ? 'sfba_email_first' : '';
if( $sfba_form1_fonts !='' )
	$form_fonts = $sfba_form1_fonts;
else
	$form_fonts = 'Poppins';
?>
<link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($form_fonts);?>:400,600,700" rel="stylesheet" type="text/css" class="sfba-google-font">
<style>
	#sfba-form2-container #sfba_thanks_container {
		font-family: '<?php echo esc_attr($form_fonts);?>';
	}
	#sfba-form2-container{
		width: <?php echo esc_attr($form_width);?>px;
		border: <?php echo esc_attr($border_size); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($border_color); ?>;
		font-family: '<?php echo esc_attr($form_fonts);?>';
		display: block;
		text-align: center;
		padding: 20px 20px 15px;
		background-color: <?php echo esc_attr($form_background_color); ?>;
		<?php if ( $form_background_image != '' ):?>
		background-image: url('<?php echo esc_attr($form_background_image); ?>');
		<?php endif;?>
		background-size: cover;
		background-repeat: no-repeat;
	}
	.subscribeform1_sub_heading {
	    margin: 0;
	    color: <?php echo esc_attr($form_sub_heading_color); ?>;
	    font-size: 14px;
	    line-height: 21px;
	    font-family: inherit;
	}
	#sfba-form2-container #sfba-form2-heading {
	    margin: 0 0 10px;
	    line-height: 48px;
	    font-weight: bold;
	    font-size: 32px;
	    color: <?php echo esc_attr($form_heading_color); ?>;
	    font-family: inherit;
	    padding: 0;
	}
	.sfba_subscribe_form__fields_wrap {
	    width: 100%;
	    margin: 0 auto;
	    max-width: 320px;
	}
	.sfba_subscribe_form__fields .sfba-form2-fields {
		width: 100%;
		box-shadow: none;
		padding-left: 15px;
		margin-top: 8px;
		font-size: 11px;
		background-color: #ffffff;
		border: 1px solid <?php echo esc_attr($field_border_color); ?>;
		border-radius: 0;
		color: #7E7E7E;
		height: 32px;
		font-weight: 400;
		outline: none;
	}
	.sfba-form2-consent-fields-main {
	    text-align: left;
	    margin: 12px auto 5px;
	    color: <?php echo esc_attr($form_heading_color); ?>;
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
	#sfba-form2-button {
	    width: 100%;
	    display: block;
	    border: none;
	    margin-top: 10px;
	    background-color: <?php echo esc_attr($button_background_color); ?>;
	    color: <?php echo esc_attr($button_text_color); ?>;
	    font-size: <?php echo esc_attr($button_text_size);?>px;
	    padding: 10px;
	    line-height: 1.2;
	    font-weight: 600;
	    cursor: pointer;
	    outline: none;
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
	.subscribeform1_consent_txt {
		color: <?php echo esc_attr($form_consent_color); ?>
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
</style>
<form id="sfba_subscribe_form" action="" method="POST">
	<div id="sfba-form2-container" class="sfba-main-form-container subscribeform1 sfba-attention-effect-<?php echo esc_attr($attention_effect); ?>">
		<p class="subscribeform1_sub_heading"><?php echo esc_attr($form_sub_heading);?></p>
		<h2 id="sfba-form2-heading" class="subscribeform1_heading"><?php echo esc_attr($form_heading);?></h2>
		<div class="sfba_subscribe_form__fields_wrap">
			<div class="sfba_subscribe_form__fields <?php echo esc_attr($sfba_subscribe_fields_class);?>">
				<input id="sfba-form2-name" name="sfba-form-name" class="sfba-form2-fields sfba-form-name" type="text" value="" placeholder="Your Name" <?php if ($display_name == 'yes'):?> style="display: none;" <?php endif;?>>
				<input id="sfba-form2-email" name="sfba-form-email" class="sfba-form2-fields sfba-form-email subscribeform1_form_email" type="email" value="" placeholder="<?php echo esc_attr($email_placeholder); ?>">
			</div>
			<p id="sfba-consent-fields-main" class="sfba-form2-consent-fields-main" <?php if ($consent_on != 'yes'):?> style="display: none;" <?php endif;?>>
				<label>
					<input type="checkbox" name="sfba-form2-consent-field" value="1" />
					<span class="subscribeform1_consent_txt"><?php echo esc_attr($form_conset_field);?></span>
				</label>
			</p>
			<input type="submit" id="sfba-form2-button" class="sfba-form-submit-button subscribeform1_subscribe_btn subscribeform_subscribe_btn" value="<?php echo esc_attr($button_text);?>" />
		</div>
		<div id="sfba_thanks_container" style="display: none;">
			<div>
				<p id="sfba_thanks_image" class="sfba-noempty"><img src="<?php echo esc_url(plugins_url('../images/tick.png',__FILE__));?>"></p>
				<p id="sfba_thanks_message" class="subscribeform1_thanks_message">You Have Successfully Subscribed to the Newsletter</p>
			</div>
		</div>		
	</div>
</form>