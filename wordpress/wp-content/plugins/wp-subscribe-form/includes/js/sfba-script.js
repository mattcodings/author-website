(function($){
	$(document).ready(function() {


		$('.sfba-image-upload-button').on('click', function(e) {
			e.preventDefault();
			var image = wp.media({
				title: 'Upload Image',
				// mutiple: true if you want to upload multiple files at once
				multiple: false
		}).open()
			.on('select', function(e){
// This will return the selected image from the Media Uploader, the result is an object
var uploaded_image = image.state().get('selection').first();
// We convert uploaded_image to a JSON object to make accessing it easier
// Output to the console uploaded_image
var image_url = uploaded_image.toJSON().url;
// Let's assign the url value to the input field
if ($("#sfba_form1_template").prop("checked"))
	$('#sfba-form1-background-image').val(image_url);
	$( '.subscribeform1' ).css( 'background-image', 'url("'+ image_url +'")' );

if ($("#sfba_form2_template").prop("checked"))
	$('#sfba-form2-background-image').val(image_url);
	$( '.subscribeform2' ).css( 'background-image', 'url("'+ image_url +'")' );

if ($("#sfba_form3_template").prop("checked"))
	$('#sfba-form3-background-image').val(image_url);
	$( '.subscribeform3' ).css( 'background-image', 'url("'+ image_url +'")' );

if ($("#sfba_form4_template").prop("checked"))
	$('#sfba-form4-background-image').val(image_url);
	$( '.subscribeform4' ).css( 'background-image', 'url("'+ image_url +'")' );

if ($("#sfba_form5_template").prop("checked"))
	$('#sfba-form5-background-image').val(image_url);
	$( '.subscribeform5' ).css( 'background-image', 'url("'+ image_url +'")' );

if ($("#sfba_form6_template").prop("checked"))
	$('#sfba-form6-background-image').val(image_url);
	$( '.subscribeform6' ).css( 'background-image', 'url("'+ image_url +'")' );

if ($("#sfba_form7_template").prop("checked"))
	$('#sfba-form7-background-image').val(image_url);
	$( '.subscribeform7' ).css( 'background-image', 'url("'+ image_url +'")' );

if ($("#sfba_form8_template").prop("checked"))
	$('#sfba-form8-background-image').val(image_url);

if ($("#sfba_form9_template").prop("checked"))
	$('#sfba-form9-background-image').val(image_url);

if ($("#sfba_form10_template").prop("checked"))
	$('#sfba-form10-background-image').val(image_url);
	$( '.subscribeform10' ).css( 'background-image', 'url("'+ image_url +'")' );

if ($("#sfba_form11_template").prop("checked"))
	$('#sfba-form11-background-image').val(image_url);

if ($("#sfba_form12_template").prop("checked"))
	$('#sfba-form12-background-image').val(image_url);
	$( '.subscribeform12' ).css( 'background-image', 'url("'+ image_url +'")' );

$('#sfba-preview-background-image').attr('src' , image_url);




});
		});




		$('.sfba_form_template_container').on('click', function() {
			if($('input[name="sfba_form_template"]').is(':checked')) {
				$( "#sfba-loading-div" ).addClass( "sfba-loading-div" );
				$( "#sfba-gears" ).addClass( "sfba-loading-gears" );
				$( "#publish" ).trigger( "click" );
			}

		});

		if($('input[name="sfba_form_template"]').is(':checked')) {
			$('html, body').animate({
				scrollTop: $("#sfba_form_load_form").offset().top
			}, 1000);
//$(window).scrollTop($('#sfba-form-customizer-container').offset().top);
}

$('#sfba-remove-image').on('click', function(e) {
	if ($("#sfba_form1_template").prop("checked")){
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form1-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form2_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form2-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form3_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form3-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form4_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form4-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form5_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form5-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form6_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form6-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form7_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form7-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form8_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form8-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form9_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form9-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form10_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form10-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form11_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form11-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}

	if ($("#sfba_form12_template").prop("checked")) {
		$('.sfba-form-background-image').attr('src','');
		$('#sfba-form12-background-image').val('');
		$('.sfba-main-form-container').css('background-image','none');
	}


});

	if($('select#sfba_subscription_selection_dd option:selected').val() == 'database'){

	}


	/*Consent Checkbox */
	$( '#sfba-display-consent' ).on( 'click', function(){
		if ($(this).prop("checked") == true){
			$('#show_conset').show();
			$('#sfba-consent-fields-main').show();
			$( '#sfba-form-consent-errormsg' ).show();
			$( '#sfba-form-consent-color' ).show();
			//$( '#sfba-form-consent-color' ).after( '<tr id="#sfba-blank-tr"></tr>' );
		} else {
			$('#show_conset').hide();
			$('#sfba-consent-fields-main').hide();
			$('#sfba-consent-on-error').hide();
			$( '#sfba-form-consent-errormsg' ).hide();
			$( '#sfba-form-consent-color' ).hide();

			$( '#sfba-blank-tr' ).remove();
		}
	});

	/* Display Field Position*/
	$( '#sfba-display-name' ).on( 'click', function(){
		if ($(this).prop("checked") == true){
			$('#sfba-form-field-position').show();
			$('.sfba-form-name').show();
			$( "#sfba-form1-field-position" ).trigger( "change" );
			$('.sfba_subscribe_form__fields').removeClass( 'sfba-form-email-full ' );

			$( "#sfba-form-blank-field" ).remove();
		} else {
			$('#sfba-form-field-position').hide();
			$('.sfba-form-name').hide();
			$('.sfba_subscribe_form__fields').removeClass( 'sfba_name_first' );
			$('.sfba_subscribe_form__fields').removeClass( 'sfba_name_first' );
			$('#sfba-form11-container .sfba_subscribe_form__fields').addClass( 'sfba-form-email-full ' );

			$( "#sfba-form-field-position" ).after('<tr id="sfba-form-blank-field" style="display:none;"><td colspan="2"></td></tr>');
		}
	});

	$( '#sfba-form1-field-position' ).on( 'change', function(){
		if ( $(this).val() == 'email_first' ){
			$('.sfba_subscribe_form__fields').addClass( 'sfba_email_first' );
			$('.sfba_subscribe_form__fields').removeClass( 'sfba_name_first' );
		} else {
			$('.sfba_subscribe_form__fields').removeClass( 'sfba_email_first' );
			$('.sfba_subscribe_form__fields').addClass( 'sfba_name_first' );
		}
	});
	/*27-02-2019*/
	if ( $( '.sfba_form_template_container input[type="radio"]:checked' ).length != 0 ) {
		var selected_templete = $( '.sfba_form_template_container input[type="radio"]:checked' ).val();
	}
	/*font family Privew*/
	$( '.sfba-form-fonts' ).on( 'change', function(){
		var sfba_font_val = $(this).val();
		$( '.sfba-google-font' ).remove();
		$( 'head' ).append( '<link href="https://fonts.googleapis.com/css?family='+ sfba_font_val +'" rel="stylesheet" type="text/css" class="sfba-google-font">' );
		$( '.'+ selected_templete ).css( 'font-family',sfba_font_val );
	} );
	/*Consent Checkbox privew*/
	$( '.sfba-form-consent-field' ).on( 'keyup', function(){
		var sfba_form_consent_field_val = $( this ).val();
		$( '.' + selected_templete + '_consent_txt').text( sfba_form_consent_field_val );

	} );
	/*Email Placeholder privew*/
	$( '.sfba-form-email-placeholder' ).on( 'keyup', function(){
		var sfba_form_email_placeholder_val = $( this ).val();
		$( '.' + selected_templete + '_form_email').attr( 'placeholder', sfba_form_email_placeholder_val );

	} );
	/*Main heading privew*/
	$( '.sfba-form-main-heading' ).on( 'keyup', function(){
		var sfba_form_main_heading_val = $( this ).val();
		$( '.' + selected_templete + '_heading').text( sfba_form_main_heading_val );

	} );
	/*Sub heading privew*/
	$( '.sfba-form-sub-heading' ).on( 'keyup', function(){
		var sfba_form_sub_heading_val = $( this ).val();
		$( '.' + selected_templete + '_sub_heading').text( sfba_form_sub_heading_val );
	} );
	/*Subscribe button privew*/
	$( '.sfba-form-subscribe-button' ).on( 'keyup', function(){
		var sfba_form_subscribe_button_val = $( this ).val();
		$( '.' + selected_templete + '_subscribe_btn').val( sfba_form_subscribe_button_val );
	} );
	/*Subscribe button text size privew*/
	$( '.sfba-form-subscribe-btn-txt-size' ).on( 'keyup click', function(){
		var sfba_form_subscribe_btn_txt_size_val = $( this ).val();
		$( '.' + selected_templete + '_subscribe_btn').css( 'font-size', sfba_form_subscribe_btn_txt_size_val + 'px' );
	} );
	/*Form border size privew*/
	$( '.sfba-form-border-size' ).on( 'keyup click', function(){
		var sfba_form_border_size_val = $( this ).val();
		$( '.' + selected_templete ).css( 'border-width', sfba_form_border_size_val + 'px' );
	} );
	$( '#sfba-form3-border-size' ).on( 'keyup click', function(){
		var sfba_form3_border_size_val = $( this ).val();
		$( '.subscribeform3 #sfba-form3-container' ).css( 'border-left-width', sfba_form3_border_size_val + 'px' );
	} );
	$( '#sfba-form8-border-size' ).on( 'keyup click', function(){
		var sfba_form8_border_size_val = $( this ).val();
		$( '.subscribeform8' ).css( 'border-top-width', sfba_form8_border_size_val + 'px' );
	} );
	/*Form border style privew*/
	$( '.sfba-form-border-style' ).on( 'change', function(){
		var sfba_form_border_style_val = $(this).val();
		$( '.' + selected_templete ).css( 'border-style', sfba_form_border_style_val );
	} );
	$( '#sfba-form3-border-style' ).on( 'change', function(){
		var sfba_form3_border_style_val = $(this).val();
		$( '.subscribeform3 #sfba-form3-container' ).css( 'border-left-style', sfba_form3_border_style_val );
	} );
	$( '#sfba-form6-border-style' ).on( 'change', function(){
		var sfba_form6_border_style_val = $(this).val();
		$( '.subscribeform6 #sfba-form6-container' ).css( 'border-style', sfba_form6_border_style_val );
	} );
	$( '#sfba-form8-border-style' ).on( 'change', function(){
		var sfba_form8_border_style_val = $(this).val();
		$( '.subscribeform8' ).css( 'border-top-style', sfba_form8_border_style_val );
	} );
	/*Font width privew*/
	$( '.sfba-form-width' ).on( 'keyup click', function(){
		var sfba_form_width_val = $( this ).val();
		$( '.' + selected_templete ).width( sfba_form_width_val );
	} );
	/*Attention Effect privew*/
	$( '.sfba-form-attention-effect' ).on( 'change', function(){
		var sfba_form_attention_effect_val = $( this ).val();
		$( '.sfba-main-form-container' ).removeClass ( function ( index, className ) {
			return ( className.match (/(^|\s)sfba-attention-effect-\S+/g) || [] ).join( ' ' );
		});
		$( '.sfba-main-form-container' ).addClass( 'sfba-attention-effect-' + sfba_form_attention_effect_val );
	});
	$( '.sfba-main-form-container' ).on(
		"animationend MSAnimationEnd webkitAnimationEnd oAnimationEnd",
		function() {
			$( this ).removeClass( 'animation-start' );
		}
	);
	var refreshId = setInterval( function() {
		$( '.sfba-main-form-container' ).addClass( 'animation-start' );
	}, 3500 );

	/* Add Upgrade to Pro Button */
	var $sfba_subscribe_form_screen = $( '.edit-php.post-type-sfba_subscribe_form' ),
	$title_action   = $sfba_subscribe_form_screen.find( '.page-title-action:first' );
	$title_action.after('<a href="' + window.location.href + '&page=upgrade_to_pro" class="page-title-action sfba-pro sfba-upgrade-to-pro">Upgrade to Pro </a>');


	$( '.sfba-thankyou-screen' ).on( 'click', function(e){
		e.preventDefault();
		$('#sfba_thanks_container').toggle();
	});

	/*$('#sfba-form-customizer-container .sfba-update-form-button.button.button-primary').on( 'click', function (event){
		console.log($('#sfba-display-consent').prop("checked") + " = " + $('#sfba-consent-on').prop("checked"));
		if ( $('#sfba-display-consent').prop("checked") == true && $('#sfba-consent-on').prop("checked") !== true ){
			$('#sfba-consent-on-error').show();
			 $('html, body').animate({
				scrollTop: $("#sfba-form1-options-contaner").offset().top
			}, 2000);
			event.preventDefault();
		}
	});*/
	$( '#sfba-after-submittion' ).on( 'change', function(){
		if ( $('#sfba-after-submittion option:selected').attr('data-href') !== '' && ( $(this).val() == 'redirect-url' || $(this).val() == 'hide-form' ) ) {
			window.open( $( '#sfba-after-submittion option:selected' ).attr('data-href') , '_blank');
		}
	});
	$("#sfba_form_view_container").stick_in_parent().on("sticky_kit:stick", function(e) {
				$(this).addClass('sfba-form-view-sticky');
		  }).on("sticky_kit:unstick", function(e) {
				$(this).removeClass('sfba-form-view-sticky');
		  });
	});

	$('ul.sfba-color-ul li').each( function() {
		var element_id = $(this).find('.sfba-color-fix').attr('id');
		var element_name = $(this).attr('name');
		if ( $(this).find('.sfba-color-fix').hasClass("active") == true ){
			$(this).show();
		} else {
			$(this).hide();
		}

		if ( $(this).find('.sfba-color-fix').prop("checked") == true ){
			$( 'input[name='+ element_id + ']' ).parent().parent().hide();
			$(this).show();
			$(this).find('.sfba-color-fix').prop("checked", '' );
		}


		$( '.' + element_id ).hide();
	});

	$( '.sfba-color-fix' ).on( 'click', function(e) {
		var element_id = $(this).attr('id');
		var element_name = $(this).attr('name');
		$( 'input[name='+ element_id + ']' ).parent().parent().show();
		$( '.' + element_id ).show();
	})
	$( '.subscribeform_subscribe_btn' ).on( 'click', function (e){
		e.preventDefault();
		return false;
	});
	$( '.copy-to-clipboard').on( 'click', function(e){
		e.preventDefault();
		var clipboard = new ClipboardJS('.copy-to-clipboard');

		clipboard.on('success', function(e) {
			console.log(e);
		});

		clipboard.on('error', function(e) {
			console.log(e);
		});
	});

})(jQuery);