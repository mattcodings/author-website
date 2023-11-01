(function( $ ) {
    $(function() {
        // Add Color Picker to all inputs that have 'color-field' class
        var myOptions = {
			change: function(event, ui){
				if ( $( '.sfba_form_template_container input[type="radio"]:checked' ).length != 0 ) {
					var selected_templete = $( '.sfba_form_template_container input[type="radio"]:checked' ).val();
				}
				var color_id = $(this).attr('id');
				var color_code = ui.color.toString();				
				/*form background color*/
				if ( color_id.indexOf('background') > -1 && color_id.indexOf('button-background') == -1 ) {
				  $( '.' + selected_templete ).css( 'background-color', color_code );
				}
				/*form heading color*/
				if ( color_id.indexOf('heading') > -1 && color_id.indexOf('sub-heading') == -1 ) {
				  $( '.' + selected_templete + '_heading' ).css( 'color', color_code );				  
				}
				/*form sub heading color*/
				if ( color_id.indexOf('sub-heading') > -1 ) {
				  $( '.' + selected_templete + '_sub_heading' ).css( 'color', color_code );
				}
				/*form border color*/
				if ( color_id.indexOf('border') > -1 && color_id.indexOf('name-field-border') == -1 && color_id.indexOf('email-field-border') == -1 && color_id.indexOf('field-border-color') == -1 ) {
				  $( '.' + selected_templete ).css( 'border-color', color_code );
				}
				/*form email field border color*/
				if ( color_id.indexOf('email-field-border') > -1 ) {
				  $( '.' + selected_templete + ' .sfba-form-email').css( 'border-color', color_code );
				}
				/*form name field border color*/
				if ( color_id.indexOf('name-field-border') > -1 ) {
				  $( '.' + selected_templete + ' .sfba-form-name').css( 'border-color', color_code );
				}
				/*form field border color*/
				if ( color_id.indexOf('field-border-color') > -1 ) {
				  $( '.' + selected_templete + ' .sfba-form-name').css( 'border-color', color_code );
				  $( '.' + selected_templete + ' .sfba-form-email').css( 'border-color', color_code );
				}
				/*form button background color*/
				if ( color_id.indexOf('button-background') > -1 ) {
				  $( '.' + selected_templete + '_subscribe_btn').css( 'background-color', color_code );
				  $( '.subscribeform6_subscribe_btn').css( 'border-bottom-color', color_code );
				}
				/*form button background color*/
				if ( color_id.indexOf('button-text') > -1 ) {
				  $( '.' + selected_templete + '_subscribe_btn').css( 'color', color_code );
				}
				
			},
	    };
		$('.sfba-color-picker').wpColorPicker(myOptions);
         
    });
	
	$('.sfba-color-fix').on( 'change', function(){
		if ( $( '.sfba_form_template_container input[type="radio"]:checked' ).length != 0 ) {
			var selected_templete = $( '.sfba_form_template_container input[type="radio"]:checked' ).val();
		}
		var color_id = $(this).attr('id');
		var color_code = $('#' + color_id+':checked' ).val();
		
		/*form background color*/
		if ( color_id.indexOf('background') > -1 && color_id.indexOf('button-background') == -1 ) {
		  $( '.' + selected_templete ).css( 'background-color', color_code );
		}
		/*form heading color*/
		if ( color_id.indexOf('heading') > -1 && color_id.indexOf('sub-heading') == -1 ) {
		  $( '.' + selected_templete + '_heading' ).css( 'color', color_code );		 
		}
		/*form sub heading color*/
		if ( color_id.indexOf('sub-heading') > -1 ) {
		  $( '.' + selected_templete + '_sub_heading' ).css( 'color', color_code );
		}
		/*form border color*/
		if ( color_id.indexOf('border') > -1 && color_id.indexOf('name-field-border') == -1 && color_id.indexOf('email-field-border') == -1 && color_id.indexOf('field-border-color') == -1 ) {
		  $( '.' + selected_templete ).css( 'border-color', color_code );
		}
		/*form email field border color*/
		if ( color_id.indexOf('email-field-border') > -1 ) {
		  $( '.' + selected_templete + ' .sfba-form-email').css( 'border-color', color_code );
		}
		/*form name field border color*/
		if ( color_id.indexOf('name-field-border') > -1 ) {
		  $( '.' + selected_templete + ' .sfba-form-name').css( 'border-color', color_code );
		}
		/*form field border color*/
		if ( color_id.indexOf('field-border-color') > -1 ) {
		  $( '.' + selected_templete + ' .sfba-form-name').css( 'border-color', color_code );
		  $( '.' + selected_templete + ' .sfba-form-email').css( 'border-color', color_code );
		}
		/*form button background color*/
		if ( color_id.indexOf('button-background') > -1 ) {
		  $( '.' + selected_templete + '_subscribe_btn').css( 'background-color', color_code );
		  $( '.subscribeform6_subscribe_btn').css( 'border-bottom-color', color_code );
		}
		/*form button background color*/
		if ( color_id.indexOf('button-text') > -1 ) {
		  $( '.' + selected_templete + '_subscribe_btn').css( 'color', color_code );
		}
		
		/*form consent_color background color*/				
		if ( color_id.indexOf('-consent-color') > -1 ) {				  
		  $( '.' + selected_templete + '_consent_txt' ).css( 'color', color_code );
		}
	});
})( jQuery );