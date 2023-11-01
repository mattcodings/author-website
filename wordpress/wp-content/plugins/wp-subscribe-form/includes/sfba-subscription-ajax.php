<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'admin_footer', 'my_action_javascript' ); // Write our JS below here

function my_action_javascript() { ?>
<script type="text/javascript" >
	jQuery(document).ready(function($) {
		$("#sfba_subscription_selection_dd").on('change', function() {			
			if ( $('select#sfba_subscription_selection_dd option:selected').attr('data-href') !== '' ) {
				window.open( $('select#sfba_subscription_selection_dd option:selected').attr('data-href') , '_blank');
			}
			$(this).prop('selected', false);			
			$('select#sfba_subscription_selection_dd').find('option').first().prop( 'selected', true );
			$('#select2-sfba_subscription_selection_dd-container').html($('select#sfba_subscription_selection_dd').find('option').first().text());
			$('#select2-sfba_subscription_selection_dd-container').attr('title', $('select#sfba_subscription_selection_dd').find('option').first().text());
		});
	});
</script> <?php
}