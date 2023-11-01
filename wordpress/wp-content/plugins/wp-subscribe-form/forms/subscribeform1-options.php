<?php
include('subscribeform1-settings.php');
?>
<div id="sfba-form1-options-contaner" class="sfba-form-options-contaner">
	<table>
		<tr>
			<td>
				<h2><?php esc_html_e('Consent Checkbox' );?></h2>
			</td>
			<td>
				<label class="switch">
					<input type="checkbox" id="sfba-display-consent" name="sfba-form1-consent-on" value="yes" <?php checked( $consent_on, 'yes' ); ?> />
					<span class="slider round"></span>
				</label>
				<br /><br />
				<label id="show_conset" class="description"  <?php if ($consent_on != 'yes' ): ?> style="display: none;" <?php endif;?>>
					<input type="text" name="sfba-form1-consent-field"  class="sfba-form-consent-field" value="<?php echo htmlentities($form_conset_field);?>" style="width:100%;"/>
					
				</label>
				
				
			</td>
		</tr>
		<tr id="sfba-form-consent-errormsg" <?php if ( $consent_on != 'yes' ): ?> style="display: none;" <?php endif;?>>
			<td><h2><?php esc_html_e( 'Error message', 'subscribe-forms-pro' );?></h2></td>
			<td>
				<input type="text" id="sfba-form1-consent-errortxt" class="sfba-form-consent-errortxt" name="sfba-form1-consent-errortxt" value="<?php echo htmlspecialchars($consent_errortxt); ?>" placeholder="Enter Consent Error Message" />	
			</td>
		</tr>
		
		<tr id="sfba-form-consent-color" <?php if ( $consent_on != 'yes' ): ?> style="display: none;" <?php endif;?>>
			<td><h2><?php esc_html_e( 'Consent Color', 'subscribe-forms-pro' );?></h2></td>
			<td>
				<ul class="sfba-color-ul">
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix active" name="sfba-form1-consent-color" value="#61BD6D" <?php checked( $form_consent_color, '#61BD6D' ); ?> style="background-color:#61BD6D"/></label></li>
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix" name="sfba-form1-consent-color" value="#FAC51C" <?php checked( $form_consent_color, '#FAC51C' ); ?> style="background-color:#FAC51C"/></label></li>
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix" name="sfba-form1-consent-color" value="#E25041" <?php checked( $form_consent_color, '#E25041' ); ?> style="background-color:#E25041"/></label></li>
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix" name="sfba-form1-consent-color" value="#2C82C9" <?php checked( $form_consent_color, '#2C82C9' ); ?> style="background-color:#2C82C9"/></label></li>
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix" name="sfba-form1-consent-color" value="#9365B8" <?php checked( $form_consent_color, '#9365B8' ); ?> style="background-color:#9365B8"/></label></li>
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix" name="sfba-form1-consent-color" value="#B5BBBF" <?php checked( $form_consent_color, '#B5BBBF' ); ?> style="background-color:#B5BBBF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix" name="sfba-form1-consent-color" value="#ffffff" <?php checked( $form_consent_color, '#ffffff' ); ?> style="background-color:#ffffff"/></label></li>					
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix" name="sfba-form1-consent-color" value="#102341" <?php checked( $form_consent_color, '#102341' ); ?> style="background-color:#102341"/></label></li>
					<li><label><input type="radio" id="sfba-form1-consent-color" class="sfba-color-fix" name="sfba-form1-consent-color" value="#2DE8BF" <?php checked( $form_consent_color, '#2DE8BF' ); ?> style="background-color:#2DE8BF"/></label></li>
				</ul>
				<p class="sfba-form1-background-color">Custom Color (<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba">Upgrade to Pro</a>)</p>
			</td>
		</tr>		
		<tr>
			<td>
				<h2><?php esc_html_e('Display Name field?' );?></h2>
			</td>
			<td>
				<label class="switch">
					<input type="checkbox" id="sfba-display-name" name="sfba-form1-display-name" value="yes" <?php checked( $display_name, '' ); ?> disabled />&nbsp; <?php //esc_html_e( 'Enable', 'domain-name' )?>
					<span class="slider round"></span>
				</label>&nbsp;<span><a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba upgrade-sfba-btn">Upgrade to Pro</a></span>
				<p class="description"><?php esc_html_e( 'Enable this option to display name field inside the subscribe form.');?></p>				
			</td>
		</tr>
		<?php if ($display_name != 'yes' ): ?>
		<tr id="sfba-form-field-position" <?php if ($display_name == 'yes' ): ?> style="display: none;" <?php endif;?>>
			<td>
				<h2><?php esc_html_e('Field Position' );?></h2>
			</td>
			<td>
				<select name="sfba-form1-field-position" id="sfba-form1-field-position">
					<option value="name-first" <?php selected( $field_position, 'name-first' ); ?>><?php esc_html_e( 'Name field first' );?></option>
					<option value="email_first" <?php selected( $field_position, 'email_first' ); ?>><?php esc_html_e( 'Email field first' );?></option>
				</select>				
				
			</td>
		</tr>
		<?php endif;?>
		<tr id="sfba-form-email-placeholder">
			<td>
				<h2><?php esc_html_e('Email Placeholder' );?></h2>
			</td>
			<td>
				<input type="text" id="sfba-form1-email-placeholder" class="sfba-form-email-placeholder" name="sfba-form1-email-placeholder" value="<?php echo esc_attr($email_placeholder); ?>" placeholder="Enter Email Placeholder" />
			</td>
		</tr>
		
		<tr>
			<td><h2><?php esc_html_e( 'Email Required Error Message', 'subscribe-forms' );?></h2></td>
			<td>
				<input type="text" id="sfba-form1-email-required-msg" class="sfba-form-email-required-msg" name="sfba-form1-email-required-msg" value="<?php echo esc_attr($email_required_msg); ?>" placeholder="Enter Email Rrquired Message" />
			</td>
		</tr>
		<?php if ( $display_name != 'yes'):?>
		<tr id="sfba-form-blank-field" style="display:none;">
			<td colspan="2"></td>
		</tr>
		<?php endif;?>
		<tr>
			<td><h2>Button Submission</h2></td>
			<td>
				<select id="sfba-after-submittion" name="sfba-form1-after-submittion">
					<option value="thankyou-screen">Thank you screen</option>
					<option value="redirect-url" data-href="<?php echo P_UPGRADE_LINK; ?>">Redirect To URL (Pro)</option>
					<option value="hide-form" data-href="<?php echo P_UPGRADE_LINK; ?>">Hide the form (Pro)</option>
				</select>
				<div class="thankyou-screen">
					<a href="#" class="sfba-thankyou-screen">Click here to show/hide thank you screen</a>
					<p>Upgrade to the Pro version to edit the thank you screen <a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba upgrade-sfba-btn">Upgrade to Pro</a></p>								
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<h2><?php esc_html_e( 'Button Attention Effect' );?></h2>
			</td>
			<td>
				<select id="sfba-form1-attention-effect" class="sfba-form-attention-effect" name="sfba-form1-attention-effect">
					<option value="default" <?php selected( $attention_effect, 'default' ); ?> ><?php esc_html_e( 'None' );?></option>
					<option value="flash" <?php selected( $attention_effect, 'flash' ); ?> ><?php esc_html_e( 'Flash' );?></option>
					<option value="shake" <?php selected( $attention_effect, 'shake' ); ?> ><?php esc_html_e( 'Shake' );?></option>
					<option value="swing" <?php selected( $attention_effect, 'swing' ); ?> ><?php esc_html_e( 'Swing' );?></option>
					<option value="tada" <?php selected( $attention_effect, 'tada' ); ?> ><?php esc_html_e( 'Tada' );?></option>
					<option value="heartbeat" <?php selected( $attention_effect, 'heartbeat' ); ?> ><?php esc_html_e( 'Heartbeat' );?></option>
					<option value="wobble" <?php selected( $attention_effect, 'wobble' ); ?> ><?php esc_html_e( 'Wobble' );?></option>
				</select>
			</td>
		</tr>		
		<tr>
			<td>
				<h2>Form Width</h2>
			</td>
			<td>
				<input type="number" id="sfba-form1-width" class="sfba-form-width" name="sfba-form1-width" value="<?php echo esc_attr($form_width); ?>" placeholder="Form Width (px)" />
			</td>
		</tr>
		<tr>
			<td>
				<h2>Form Background Image</h2>
			</td>
			<td>
				<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba upgrade-sfba-btn">Upgrade to Pro</a>
			</td>

		</tr>
		<tr>
			<td>
				<h2>Form Background Color</h2>
			</td>
			<td>
				<ul class="sfba-color-ul">
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix active" name="sfba-form1-background-color" value="#61BD6D" <?php checked( $form_background_color, '#61BD6D' ); ?> style="background-color:#61BD6D"/></label></li>
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix" name="sfba-form1-background-color" value="#FAC51C" <?php checked( $form_background_color, '#FAC51C' ); ?> style="background-color:#FAC51C"/></label></li>
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix" name="sfba-form1-background-color" value="#E25041" <?php checked( $form_background_color, '#E25041' ); ?> style="background-color:#E25041"/></label></li>
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix" name="sfba-form1-background-color" value="#2C82C9" <?php checked( $form_background_color, '#2C82C9' ); ?> style="background-color:#2C82C9"/></label></li>
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix" name="sfba-form1-background-color" value="#9365B8" <?php checked( $form_background_color, '#9365B8' ); ?> style="background-color:#9365B8"/></label></li>
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix" name="sfba-form1-background-color" value="#B5BBBF" <?php checked( $form_background_color, '#B5BBBF' ); ?> style="background-color:#B5BBBF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix" name="sfba-form1-background-color" value="#ffffff" <?php checked( $form_background_color, '#ffffff' ); ?> style="background-color:#ffffff"/></label></li>					
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix" name="sfba-form1-background-color" value="#102341" <?php checked( $form_background_color, '#102341' ); ?> style="background-color:#102341"/></label></li>
					<li><label><input type="radio" id="sfba-form1-background-color" class="sfba-color-fix" name="sfba-form1-background-color" value="#2DE8BF" <?php checked( $form_background_color, '#2DE8BF' ); ?> style="background-color:#2DE8BF"/></label></li>
				</ul>
				<p class="sfba-form1-background-color">Custom Color (<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba">Upgrade to Pro</a>)</p>
			</td>
		</tr>
		<tr>
			<td>
				<h2>Font Family</h2>
			</td>
			<td>
				<select name="sfba-form1-fonts" class="sfba-form-fonts">
					<option value="">Select font family</option>
					<?php $group= ''; foreach( sfba_fonts() as $key=>$value):  
								if ($value != $group){
									echo '<optgroup label="' . $value . '">';
									$group = $value;
								}
							?>
						<option value="<?php echo esc_attr($key);?>" <?php selected( $sfba_form1_fonts, $key ); ?>><?php echo esc_attr($key);?></option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<h2>Form Heading</h2>
			</td>
			<td>
				<input type="text" id="sfba-form1-heading" class="sfba-form-main-heading" name="sfba-form1-heading" value="<?php echo esc_attr($form_heading); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<h2>Heading Color</h2>
			</td>
			<td>
				<ul class="sfba-color-ul">
					<li><label><input type="radio" id="sfba-form1-heading-color" name="sfba-form1-heading-color" class="sfba-color-fix active"  value="#61BD6D" <?php checked( $form_heading_color, '#61BD6D' ); ?> style="background-color:#61BD6D"/></label></li>
					<li><label><input type="radio" id="sfba-form1-heading-color" name="sfba-form1-heading-color" class="sfba-color-fix" value="#FAC51C" <?php checked( $form_heading_color, '#FAC51C' ); ?> style="background-color:#FAC51C"/></label></li>
					<li><label><input type="radio" id="sfba-form1-heading-color" name="sfba-form1-heading-color" class="sfba-color-fix" value="#E25041" <?php checked( $form_heading_color, '#E25041' ); ?> style="background-color:#E25041"/></label></li>
					<li><label><input type="radio" id="sfba-form1-heading-color" name="sfba-form1-heading-color" class="sfba-color-fix" value="#2C82C9" <?php checked( $form_heading_color, '#2C82C9' ); ?> style="background-color:#2C82C9"/></label></li>
					<li><label><input type="radio" id="sfba-form1-heading-color" name="sfba-form1-heading-color" class="sfba-color-fix" value="#9365B8" <?php checked( $form_heading_color, '#9365B8' ); ?> style="background-color:#9365B8"/></label></li>
					<li><label><input type="radio" id="sfba-form1-heading-color" name="sfba-form1-heading-color" class="sfba-color-fix" value="#B5BBBF" <?php checked( $form_heading_color, '#B5BBBF' ); ?> style="background-color:#B5BBBF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-heading-color" name="sfba-form1-heading-color" class="sfba-color-fix" value="#FFFFFF" <?php checked( $form_heading_color, '#FFFFFF' ); ?> style="background-color:#FFFFFF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-heading-color" class="sfba-color-fix" name="sfba-form1-heading-color" value="#102341" <?php checked( $form_heading_color, '#102341' ); ?> style="background-color:#102341"/></label></li>
					<li><label><input type="radio" id="sfba-form1-heading-color" class="sfba-color-fix" name="sfba-form1-heading-color" value="#2DE8BF" <?php checked( $form_heading_color, '#2DE8BF' ); ?> style="background-color:#2DE8BF"/></label></li>
				</ul>
				<p class="sfba-form1-heading-color">Custom Color (<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba">Upgrade to Pro</a>)</p>				
			</td>
		</tr>
		<tr>
			<td>
				<h2>Form Sub Heading</h2>
			</td>
			<td>
				<input type="text" id="sfba-form1-sub-heading" class="sfba-form-sub-heading" name="sfba-form1-sub-heading" value="<?php echo esc_attr($form_sub_heading); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<h2>Sub Heading Color</h2>
			</td>
			<td>
				<ul class="sfba-color-ul">
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" name="sfba-form1-sub-heading-color" class="sfba-color-fix active"  value="#61BD6D" <?php checked( $form_sub_heading_color, '#61BD6D' ); ?> style="background-color:#61BD6D"/></label></li>
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" name="sfba-form1-sub-heading-color" class="sfba-color-fix" value="#FAC51C" <?php checked( $form_sub_heading_color, '#FAC51C' ); ?> style="background-color:#FAC51C"/></label></li>
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" name="sfba-form1-sub-heading-color" class="sfba-color-fix" value="#E25041" <?php checked( $form_sub_heading_color, '#E25041' ); ?> style="background-color:#E25041"/></label></li>
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" name="sfba-form1-sub-heading-color" class="sfba-color-fix" value="#2C82C9" <?php checked( $form_sub_heading_color, '#2C82C9' ); ?> style="background-color:#2C82C9"/></label></li>
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" name="sfba-form1-sub-heading-color" class="sfba-color-fix" value="#9365B8" <?php checked( $form_sub_heading_color, '#9365B8' ); ?> style="background-color:#9365B8"/></label></li>
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" name="sfba-form1-sub-heading-color" class="sfba-color-fix" value="#B5BBBF" <?php checked( $form_sub_heading_color, '#B5BBBF' ); ?> style="background-color:#B5BBBF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" name="sfba-form1-sub-heading-color" class="sfba-color-fix" value="#FFFFFF" <?php checked( $form_sub_heading_color, '#FFFFFF' ); ?> style="background-color:#FFFFFF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" class="sfba-color-fix" name="sfba-form1-sub-heading-color" value="#102341" <?php checked( $form_sub_heading_color, '#102341' ); ?> style="background-color:#102341"/></label></li>
					<li><label><input type="radio" id="sfba-form1-sub-heading-color" class="sfba-color-fix" name="sfba-form1-sub-heading-color" value="#2DE8BF" <?php checked( $form_sub_heading_color, '#2DE8BF' ); ?> style="background-color:#2DE8BF"/></label></li>
				</ul>
				<p class="sfba-form1-sub-heading-color">Custom Color (<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba">Upgrade to Pro</a>)</p>
			</td>
		</tr>
		<tr>
			<td>
				<h2>Subscribe Button Text</h2>
			</td>
			<td>
				<input type="text" id="sfba-form1-subscribe-button-text" class="sfba-form-subscribe-button" name="sfba-form1-subscribe-button-text" value="<?php echo esc_attr($button_text); ?>" />
			</td>
		</tr>		
		<tr>
			<td>
				<h2>Form Border</h2>
			</td>
			<td>
				<input type="number" id="sfba-form1-border-size" class="sfba-form-border-size" name="sfba-form1-border-size" value="<?php echo esc_attr($border_size); ?>" min="0" placeholder="Border Width Size (px)" /><br/>
				<select id="sfba-form1-border-style" class="sfba-form-border-style" name="sfba-form1-border-style">
					<option value="none" <?php selected( $border_style, 'none' ); ?> >Select Border Style</option>
					<option value="solid" <?php selected( $border_style, 'solid' ); ?> >Solid</option>
					<option value="dashed" <?php selected( $border_style, 'dashed' ); ?> >Dashed</option>
					<option value="dotted" <?php selected( $border_style, 'dotted' ); ?> >Dotted</option>
					<option value="double" <?php selected( $border_style, 'double' ); ?> >Double</option>
					<option value="groove" <?php selected( $border_style, 'groove' ); ?> >Groove</option>
					<option value="inset" <?php selected( $border_style, 'inset' ); ?> >Inset</option>
					<option value="outset" <?php selected( $border_style, 'outset' ); ?> >Outset</option>
					<option value="ridge" <?php selected( $border_style, 'ridge' ); ?> >Ridge</option>
				</select>	<br/>				
				
				<ul class="sfba-color-ul">
					<li><label><input type="radio" id="sfba-form1-border-color" name="sfba-form1-border-color" class="sfba-color-fix active"  value="#61BD6D" <?php checked( $border_color, '#61BD6D' ); ?> style="background-color:#61BD6D"/></label></li>
					<li><label><input type="radio" id="sfba-form1-border-color" name="sfba-form1-border-color" class="sfba-color-fix" value="#FAC51C" <?php checked( $border_color, '#FAC51C' ); ?> style="background-color:#FAC51C"/></label></li>
					<li><label><input type="radio" id="sfba-form1-border-color" name="sfba-form1-border-color" class="sfba-color-fix" value="#E25041" <?php checked( $border_color, '#E25041' ); ?> style="background-color:#E25041"/></label></li>
					<li><label><input type="radio" id="sfba-form1-border-color" name="sfba-form1-border-color" class="sfba-color-fix" value="#2C82C9" <?php checked( $border_color, '#2C82C9' ); ?> style="background-color:#2C82C9"/></label></li>
					<li><label><input type="radio" id="sfba-form1-border-color" name="sfba-form1-border-color" class="sfba-color-fix" value="#9365B8" <?php checked( $border_color, '#9365B8' ); ?> style="background-color:#9365B8"/></label></li>
					<li><label><input type="radio" id="sfba-form1-border-color" name="sfba-form1-border-color" class="sfba-color-fix" value="#B5BBBF" <?php checked( $border_color, '#B5BBBF' ); ?> style="background-color:#B5BBBF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-border-color" name="sfba-form1-border-color" class="sfba-color-fix" value="#FFFFFF" <?php checked( $border_color, '#FFFFFF' ); ?> style="background-color:#FFFFFF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-border-color" class="sfba-color-fix" name="sfba-form1-border-color" value="#102341" <?php checked( $border_color, '#102341' ); ?> style="background-color:#102341"/></label></li>
					<li><label><input type="radio" id="sfba-form1-border-color" class="sfba-color-fix" name="sfba-form1-border-color" value="#2DE8BF" <?php checked( $border_color, '#2DE8BF' ); ?> style="background-color:#2DE8BF"/></label></li>
				</ul>
				<p class="sfba-form1-border-color">Custom Color (<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba">Upgrade to Pro</a>)</p>

			</td>
		</tr>
		<tr>
			<td>
				<h2>Field Border Color</h2>
			</td>
			<td>
				<ul class="sfba-color-ul">
					<li><label><input type="radio" id="sfba-form1-field-border-color" name="sfba-form1-field-border-color" class="sfba-color-fix active"  value="#61BD6D" <?php checked( $field_border_color, '#61BD6D' ); ?> style="background-color:#61BD6D"/></label></li>
					<li><label><input type="radio" id="sfba-form1-field-border-color" name="sfba-form1-field-border-color" class="sfba-color-fix" value="#FAC51C" <?php checked( $field_border_color, '#FAC51C' ); ?> style="background-color:#FAC51C"/></label></li>
					<li><label><input type="radio" id="sfba-form1-field-border-color" name="sfba-form1-field-border-color" class="sfba-color-fix" value="#E25041" <?php checked( $field_border_color, '#E25041' ); ?> style="background-color:#E25041"/></label></li>
					<li><label><input type="radio" id="sfba-form1-field-border-color" name="sfba-form1-field-border-color" class="sfba-color-fix" value="#2C82C9" <?php checked( $field_border_color, '#2C82C9' ); ?> style="background-color:#2C82C9"/></label></li>
					<li><label><input type="radio" id="sfba-form1-field-border-color" name="sfba-form1-field-border-color" class="sfba-color-fix" value="#9365B8" <?php checked( $field_border_color, '#9365B8' ); ?> style="background-color:#9365B8"/></label></li>
					<li><label><input type="radio" id="sfba-form1-field-border-color" name="sfba-form1-field-border-color" class="sfba-color-fix" value="#B5BBBF" <?php checked( $field_border_color, '#B5BBBF' ); ?> style="background-color:#B5BBBF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-field-border-color" name="sfba-form1-field-border-color" class="sfba-color-fix" value="#FFFFFF" <?php checked( $field_border_color, '#FFFFFF' ); ?> style="background-color:#FFFFFF"/></label></li>
					<li><label><input type="radio" id="sfba-form1-field-border-color" class="sfba-color-fix" name="sfba-form1-field-border-color" value="#102341" <?php checked( $field_border_color, '#102341' ); ?> style="background-color:#102341"/></label></li>
					<li><label><input type="radio" id="sfba-form1-field-border-color" class="sfba-color-fix" name="sfba-form1-field-border-color" value="#2DE8BF" <?php checked( $field_border_color, '#2DE8BF' ); ?> style="background-color:#2DE8BF"/></label></li>
				</ul>
				<p class="sfba-form1-field-border-color">Custom Color (<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba">Upgrade to Pro</a>)</p>
			</td>
		</tr>		
		<tr>
			<td>
				<h2>Subscribe Button Background Color</h2>
				</td>
				<td>
					<ul class="sfba-color-ul">
						<li><label><input type="radio" id="sfba-form1-button-background-color" name="sfba-form1-button-background-color" class="sfba-color-fix active"  value="#61BD6D" <?php checked( $button_background_color, '#61BD6D' ); ?> style="background-color:#61BD6D"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-background-color" name="sfba-form1-button-background-color" class="sfba-color-fix" value="#FAC51C" <?php checked( $button_background_color, '#FAC51C' ); ?> style="background-color:#FAC51C"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-background-color" name="sfba-form1-button-background-color" class="sfba-color-fix" value="#E25041" <?php checked( $button_background_color, '#E25041' ); ?> style="background-color:#E25041"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-background-color" name="sfba-form1-button-background-color" class="sfba-color-fix" value="#2C82C9" <?php checked( $button_background_color, '#2C82C9' ); ?> style="background-color:#2C82C9"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-background-color" name="sfba-form1-button-background-color" class="sfba-color-fix" value="#9365B8" <?php checked( $button_background_color, '#9365B8' ); ?> style="background-color:#9365B8"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-background-color" name="sfba-form1-button-background-color" class="sfba-color-fix" value="#B5BBBF" <?php checked( $button_background_color, '#B5BBBF' ); ?> style="background-color:#B5BBBF"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-background-color" name="sfba-form1-button-background-color" class="sfba-color-fix" value="#FFFFFF" <?php checked( $button_background_color, '#FFFFFF' ); ?> style="background-color:#FFFFFF"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-background-color" class="sfba-color-fix" name="sfba-form1-button-background-color" value="#102341" <?php checked( $button_background_color, '#102341' ); ?> style="background-color:#102341"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-background-color" class="sfba-color-fix" name="sfba-form1-button-background-color" value="#2DE8BF" <?php checked( $button_background_color, '#2DE8BF' ); ?> style="background-color:#2DE8BF"/></label></li>
					</ul>
					<p class="sfba-form1-button-background-color">Custom Color (<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba">Upgrade to Pro</a>)</p>
				</td>
			</tr>
			<tr>
				<td>
					<h2>Subscribe Button Text Size</h2>
				</td>
				<td>
					<input type="number" id="sfba-form1-button-text-size" class="sfba-form-subscribe-btn-txt-size" name="sfba-form1-button-text-size" value="<?php echo esc_attr($button_text_size); ?>" placeholder="Test Size (px)" />
				</td>
			</tr>
			<tr>
				<td>
					<h2>Subscribe Button Text Color</h2>
				</td>
				<td>
					<ul class="sfba-color-ul">
						<li><label><input type="radio" id="sfba-form1-button-text-color" name="sfba-form1-button-text-color" class="sfba-color-fix active" style="background-color:#61BD6D" value="#61BD6D" <?php checked( $button_text_color, '#61BD6D' ); ?> /></label></li>
						<li><label><input type="radio" id="sfba-form1-button-text-color" name="sfba-form1-button-text-color" class="sfba-color-fix" style="background-color:#FAC51C" value="#FAC51C" <?php checked( $button_text_color, '#FAC51C' ); ?>/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-text-color" name="sfba-form1-button-text-color" class="sfba-color-fix" style="background-color:#E25041" value="#E25041" <?php checked( $button_text_color, '#E25041' ); ?>/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-text-color" name="sfba-form1-button-text-color" class="sfba-color-fix" value="#2C82C9" <?php checked( $button_text_color, '#2C82C9' ); ?> style="background-color:#2C82C9"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-text-color" name="sfba-form1-button-text-color" class="sfba-color-fix" value="#9365B8" <?php checked( $button_text_color, '#9365B8' ); ?> style="background-color:#9365B8"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-text-color" name="sfba-form1-button-text-color" class="sfba-color-fix" value="#B5BBBF" <?php checked( $button_text_color, '#B5BBBF' ); ?> style="background-color:#B5BBBF"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-text-color" name="sfba-form1-button-text-color" class="sfba-color-fix" value="#FFFFFF" <?php checked( $button_text_color, '#FFFFFF' ); ?> style="background-color:#FFFFFF"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-text-color" class="sfba-color-fix" name="sfba-form1-button-text-color" value="#102341" <?php checked( $button_text_color, '#102341' ); ?> style="background-color:#102341"/></label></li>
						<li><label><input type="radio" id="sfba-form1-button-text-color" class="sfba-color-fix" name="sfba-form1-button-text-color" value="#2DE8BF" <?php checked( $button_text_color, '#2DE8BF' ); ?> style="background-color:#2DE8BF"/></label></li>
					</ul>
					<p class="sfba-form1-button-text-color">Custom Color (<a href="<?php echo P_UPGRADE_LINK;?>" target="_blank" class="upgrade-sfba">Upgrade to Pro</a>)</p>
				</td>
			</tr>			
		</table>

	</div>