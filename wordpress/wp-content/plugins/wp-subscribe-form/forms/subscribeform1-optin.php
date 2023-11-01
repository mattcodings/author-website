<?php 
include('subscribeform1-settings.php');
?>
<style>
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

	#sfba-form2-container{
		width: <?php echo esc_attr($form_width);?>px;
		border: <?php echo esc_attr($border_size); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($border_color); ?>;
		display: block;
		text-align: center;
		padding: 15px;
		border-radius: 2px;
		font-family: 'Arial';
		background: <?php echo esc_attr($form_background_color); ?>;
		background-image: url('<?php echo esc_attr($form_background_image); ?>');
		background-size: cover;
		margin: 0 auto;


	}
	.sfba-form2-fields{
		width: 90%;
		display: inline-block;
		padding-left: 15px;
		margin-top: 10px;
		font-size: 16px;
		background-color: rgba(128, 126, 126, 0.04);
		border: 1px solid rgba(128, 126, 126, 0.12);
		border-radius: 2px;
		height: 40px;
		font-weight: bold;
		outline: none;
		outline-color: transparent;
	}

	#sfba-form2-button{
		border-radius: 2px;
		width: 90%;
		display: inline-block;
		float: none;
		border: none;
		margin-top: 10px;
		background-color: <?php echo esc_attr($button_background_color); ?>;
		color: <?php echo esc_attr($button_text_color); ?>;
		font-size: <?php echo esc_attr($button_text_size);?>;
		transition-duration: 0.4s;
		height: 40px;
		font-weight: bold;
		cursor: pointer;
		outline: none;
		outline-color: transparent;
	}
	#sfba-form2-button:hover {
	}
	#sfba-form2-heading{
		margin: 0;
		line-height: 1.5;
		font-weight: bold;
		color:<?php echo esc_attr($form_heading_color); ?>;
	}
	.sfba-form-name{
		border: 1px solid <?php echo esc_attr($name_border_color); ?> !important;
	}
	.sfba-form-email{
		border: 1px solid <?php echo esc_attr($email_border_color); ?> !important;
	}
	#sfba_form2_thanks{
		width: 60% !important;
		margin: 0 auto !important;
		font-size: 24px !important;
		font-weight: bold !important;
		font-family: 'Arial' !important;
	}
	
</style>
	<div id="sfba-form2-container" class="sfba-main-form-container">
		<img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"/>
		<p id="sfba_form2_thanks">Thank you for signing up for our newsletter</p>
	</div>