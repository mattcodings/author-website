<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter( 'manage_sfba_subscribe_form_posts_columns', 'sfba_custom_posts_columns' );

// Hook to custom data in Custom Columns
add_action( 'manage_sfba_subscribe_form_posts_custom_column' , 'sfba_custom_form_columns' , 10 , 2 );

function sfba_custom_posts_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Subscribe From Title';
	$newColumns['shortcode'] = 'Shortcode';
	$newColumns['form_template'] = 'Selected Form Template';
	$newColumns['date'] = 'Date';
	$newColumns['author'] = 'Created by';
	return $newColumns;
}


function sfba_custom_form_columns( $column , $post_id ){
	switch( $column ){
		case 'shortcode' : 
// print shortcode here
				$sfba_cpt_generated_shortcode = get_post_meta($post_id, '_sfba_shortcode_value', true);
                $sfba_cpt_widget_generated_shortcode = get_post_meta($post_id, '_sfba_widget_shortcode_value', true);
				echo "<div class='sfba-subscribe-shortcode'>";
                echo '<span id="sfba-subscribe-shortcode-'.$post_id.'" style="font-size:16px;display:inline-block;padding-top:7px;">' . $sfba_cpt_generated_shortcode . '</span>';
				?>
				<button class="copy-to-clipboard button" data-clipboard-action="copy"  data-clipboard-target="#sfba-subscribe-shortcode-<?php echo esc_attr($post_id);?>"><?php _e( 'Copy'); ?></button>				
				<?php
				echo "</div>";
				echo "<div class='sfba-subscribe-shortcode'>";
                echo '<span id="sfba-subscribe-shortcode-widget-'.$post_id.'" style="font-size:16px;display:inline-block;padding-top:7px;">' . $sfba_cpt_widget_generated_shortcode . '</span>';
				?>
				<button class="copy-to-clipboard button" data-clipboard-action="copy"  data-clipboard-target="#sfba-subscribe-shortcode-widget-<?php echo esc_attr($post_id);?>"><?php _e( 'Copy'); ?></button>
				<?php
				echo "</div>";
			break;

		case 'form_template' :
// print form template number user selected 
		$sfba_form_template = get_post_meta($post_id, '_sfba_form_template', true);

		if($sfba_form_template == 'subscribeform1')
			echo '<img src="'.plugins_url('images/form1.png',__FILE__).'" width="150px"/>';

		if($sfba_form_template == 'subscribeform2')
			echo '<img src="'.plugins_url('images/form2.png',__FILE__).'" width="150px"/>';

		else if($sfba_form_template == 'subscribeform3')
			echo '<img src="'.plugins_url('images/form3.png',__FILE__).'" width="150px"/>';

		else if($sfba_form_template == 'subscribeform4')
			echo '<img src="'.plugins_url('images/form4.png',__FILE__).'" width="150px"/>';
			
		else if($sfba_form_template == 'subscribeform5')
			echo '<img src="'.plugins_url('images/form5.png',__FILE__).'" width="150px"/>';
			
		else if($sfba_form_template == 'subscribeform6')
			echo '<img src="'.plugins_url('images/form6.png',__FILE__).'" width="150px"/>';
			
		else if($sfba_form_template == 'subscribeform7')
			echo '<img src="'.plugins_url('images/form7.png',__FILE__).'" width="150px"/>';
			
		else if($sfba_form_template == 'subscribeform8')
			echo '<img src="'.plugins_url('images/form8.png',__FILE__).'" width="150px"/>';
			
		else if($sfba_form_template == 'subscribeform9')
			echo '<img src="'.plugins_url('images/form9.png',__FILE__).'" width="150px"/>';
			
		else if($sfba_form_template == 'subscribeform10')
			echo '<img src="'.plugins_url('images/form10.png',__FILE__).'" width="150px"/>';

		else if($sfba_form_template == 'subscribeform11')
			echo '<img src="'.plugins_url('images/form11.png',__FILE__).'" width="220px"/>';

		else if($sfba_form_template == 'subscribeform12')
			echo '<img src="'.plugins_url('images/form12.png',__FILE__).'" width="150px"/>';

		break;
	}

}