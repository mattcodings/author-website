jQuery(document).ready( function($) {
	/*Play button animation with duration */
	$( '.sfba-main-form-container' ).on(
		"animationend MSAnimationEnd webkitAnimationEnd oAnimationEnd",
		function() {
			$( this ).removeClass( 'animation-start' );
		}
	);
	var set_animation = setInterval( function() {
		$( '.sfba-main-form-container' ).addClass( 'animation-start' );
	}, 3500 );
	
	$( ".sfba_subscribe_form" ).on('submit', function() {
		var form_id 		= jQuery(this).attr('id');
		var sfba_page_link	= jQuery( '#' + form_id + ' .sfba_page_link' ).val();
		var post_id 		= jQuery( '#' + form_id + ' .sfba_post_type_id' ).val();
		var name 			= jQuery( '#' + form_id + ' .sfba-form-name' ).val();
  		var email 			= jQuery( '#' + form_id + ' .sfba-form-email' ).val();
  		if(name == null){
  			data = {
				action : 'sfba_ajax', 'subscriberemail':email,'post_id':post_id,'sfba_page_link':sfba_page_link,"wpnonce":the_ajax_script.ajax_nonce
			};
		}else{
			data = {
				action : 'sfba_ajax', 'subscribername':name,'subscriberemail':email,'post_id':post_id,'sfba_page_link':sfba_page_link,"wpnonce":the_ajax_script.ajax_nonce
				
			};
		}
		$.post(the_ajax_script.ajaxurl , data , function (response){		
			$( '#' + form_id + ' .sfba_thanks_container' ).css({
				"opacity":"0",
				"display":"flex",
			}).show().animate({opacity:1})
			clearInterval( set_animation );
		});
		return false;	
	});
	
	jQuery( document ).on('click', ".sfba_delete_entry",  function(){
		var deleterowid = $( this ).attr( "data-delete" );
		var wpappp_confirm_delete = window.confirm("Are you sure you want to delete Record with ID# "+deleterowid);
		var wpapp_redirect_refresh = window.location.href;
		if (wpappp_confirm_delete == true) {
			jQuery.ajax({
				type: 'POST',
				url: the_ajax_script.ajaxurl,
				data: {"action": "sfba_delete_db_record","id":deleterowid, "wpnonce": the_ajax_script.ajax_nonce},
				success: function(data){
					location.href = wpapp_redirect_refresh;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) { 
					alert("Status: " + textStatus); alert("Error: " + errorThrown); 
				} 
			});
		} 
		// Prevents default submission of the form after clicking on the submit button. 
		return false;   
	});
	
	jQuery( document ).on('click', "#sfba_delete_all_data",  function(){
		var wpappp_confirm_delete = window.confirm("Are you sure you want to delete all subscribers from the database?");
		var wpapp_redirect_refresh = window.location.href;
		if (wpappp_confirm_delete == true) {
			jQuery.ajax({
				type: 'POST',
				url: the_ajax_script.ajaxurl,
				data: {"action": "sfba_delete_db_data", "wpnonce":the_ajax_script.ajax_nonce},
				success: function(data){
					location.href = wpapp_redirect_refresh;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) { 
					alert("Status: " + textStatus); alert("Error: " + errorThrown); 
				} 
			});
		} 
		// Prevents default submission of the form after clicking on the submit button. 
		return false;   
	});

	$('.sfba-form-submit-button').on( 'click', function (event){
		var form_id = jQuery(this).data('form-id');		
		if ( typeof $('#' + form_id + ' input[type=checkbox]').prop("checked") !== 'undefined' &&   $('#' + form_id + ' input[type=checkbox]').prop("checked") !== true){
			$('#' + form_id + ' .sfba-conset-field-error').show();			 
			event.preventDefault();
			return false;
		} else {
			$('#' + form_id + ' .sfba-conset-field-error').hide();
		}
		
		if ( $( 'form#' + form_id + ' .sfba-form-email' ).val() == '' ){
			$( 'form#' + form_id + ' .sfba-email-field-error' ).show();
			event.preventDefault();
		} else {
			$( 'form#' + form_id + ' .sfba-email-field-error' ).hide();
		}
	});
	$( 'a.sfba-form-close' ).on( 'click', function( event ){		
		$('#' + $(this).data('form-id') ).slideToggle();
	});
	
	$("#sfba_subscription_selection_dd").select2({
        closeOnSelect : false,
        placeholder : "Integrations list",
        allowHtml: false,
        tags: false
    });
});