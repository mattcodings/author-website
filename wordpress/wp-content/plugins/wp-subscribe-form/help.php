<style>

    .subscribe-form-help-btn {
        position: fixed;
        right: 20px;
        bottom: 20px;
        z-index: 1001
    }
    html[dir="rtl"] .subscribe-form-help-btn {
        left: 20px;
        right: auto;
    }

    .subscribe-form-help-btn a {
        display: block;
        border: 3px solid #FFF;
        width: 50px;
        height: 50px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        position: relative
    }

    .subscribe-form-help-btn a img {
        width: 100%;
        height: auto;
        display: block;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%
    }

    .subscribe-form-help-form {
        position: fixed;
        right: 85px;
        border: 1px solid #e9edf0;
        bottom: 25px;
        background: #fff;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        width: 320px;
        z-index: 1001;
        direction: ltr;
        opacity: 0;
		visibility: hidden;
        transition: .4s;
        -webkit-transition: .4s;
        -moz-transition: .4s
    }

    html[dir="rtl"] .subscribe-form-help-form {
        right: auto;
        left: 85px;
    }

    .subscribe-form-help-form.active {
        opacity: 1;
        pointer-events: inherit;
		visibility: visible;
    }

    .subscribe-form-help-header {
        background: #f4f4f4;
        border-bottom: solid 1px #e9edf0;
        padding: 5px 20px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px 10px 0 0;
        font-size: 16px;
        text-align: right
    }

    .subscribe-form-help-header b {
        float: left
    }

    .subscribe-form-help-content {
        margin-bottom: 10px;
        padding: 20px 20px 10px
    }

    .subscribe-form-help-form p {
        margin: 0 0 1em
    }

    .chaty-form-field {
        margin-bottom: 10px
    }

    .chaty-form-field input, .chaty-form-field textarea {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 5px;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #c5c5c5
    }

    .chaty-form-field textarea {
        height: 70px
    }

    .subscribe-form-help-button {
        border: none;
        padding: 8px 0;
        width: 100%;
        background: #ff6624;
        color: #fff;
        border-radius: 18px
    }

    .subscribe-form-help-form .error-message {
        font-weight: 400;
        font-size: 14px
    }

    .subscribe-form-help-form input.input-error, .subscribe-form-help-form textarea.input-error {
        border-color: #dc3232
    }

    .subscribe-form-help-btn span.tooltiptext {
        position: absolute;
        background: #000;
        font-size: 12px;
        color: #fff;
        top: -35px;
        width: 140%;
        text-align: center;
        left: -20%;
        border-radius: 5px;
        direction: ltr
    }

    p.error-p, p.success-p {
        margin: 0;
        font-size: 14px;
        text-align: center
    }

    .subscribe-form-help-btn span.tooltiptext:after {
        bottom: -9px;
        content: "";
        transform: translateX(-50%);
        height: 10px;
        /* width: 10px; */
        border-width: 10px 5px 0;
        border-style: solid;
        border-color: #000 transparent transparent;
        left: 50%;
        position: absolute;
        margin: 0;
        padding: 0;
        top: 18px;
    }
</style>
<div class="subscribe-form-help-form">
    <form action="<?php echo admin_url( 'admin-ajax.php' ) ?>" method="post" id="subscribe-form-help-form">
        <div class="subscribe-form-help-header">
            <b>Gal Dubinski</b> Co-Founder at Premio
        </div>
        <div class="subscribe-form-help-content">
            <p>Hello! Are you experiencing any problems with Subscribe Forms? Please let me know :)</p>
            <div class="chaty-form-field">
                <input type="text" name="user_email" id="user_email" placeholder="Email">
            </div>
            <div class="chaty-form-field">
                <textarea type="text" name="textarea_text" id="textarea_text" placeholder="How can I help you?"></textarea>
            </div>
            <div class="form-button">
                <button type="submit" class="subscribe-form-help-button" ><?php echo __("Chat") ?></button>
                <input type="hidden" name="action" value="subscribe_form_send_message_to_owner"  />
				<?php wp_nonce_field( 'wpnonce', 'sfba' );?>
            </div>
        </div>
    </form>
</div>
<div class="subscribe-form-help-btn">
    <a class="subscribe-form-help-tooltip" href="javascript:;"><img src="<?php echo plugins_url('images/owner.png', __FILE__); ?>" alt="Need help?"  /></a>
    <span class="tooltiptext">Need help?</span>
</div>
<script>
    jQuery(document).ready(function(){
        jQuery("#subscribe-form-help-form").submit(function(){
            jQuery(".subscribe-form-help-button").attr("disabled",true);
            jQuery(".subscribe-form-help-button").text("<?php echo __("Sending Request...") ?>");
            formData = jQuery(this).serialize();
            jQuery.ajax({
                url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                data: formData,
                type: "post",
                success: function(responseText){
                    jQuery("#subscribe-form-help-form").find(".error-message").remove();
                    jQuery("#subscribe-form-help-form").find(".input-error").removeClass("input-error");
                    responseText = responseText.slice(0, - 1);
                    responseArray = jQuery.parseJSON(responseText);
                    if(responseArray.error == 1) {
                        jQuery(".subscribe-form-help-button").attr("disabled",false);
                        jQuery(".subscribe-form-help-button").text("Chat");
                        for(i=0;i<responseArray.errors.length;i++) {
                            jQuery("#"+responseArray.errors[i]['key']).addClass("input-error");
                            jQuery("#"+responseArray.errors[i]['key']).after('<span class="error-message">'+responseArray.errors[i]['message']+'</span>');
                        }
                    } else if(responseArray.status == 1) {
                        jQuery(".subscribe-form-help-button").text("Done!");
                        setTimeout(function(){
                            jQuery(".subscribe-form-help-header").remove();
                            jQuery(".subscribe-form-help-content").html("<p class='success-p'>Your message was sent successfully.</p>");
                        },1000);
                    } else if(responseArray.status == 0) {
                        jQuery(".subscribe-form-help-content").html("<p class='error-p'>There is some problem in sending request. Please send us mail on <a href='mailto:contact@premio.io'>contact@premio.io</a></p>");
                    }
                }
            });
            return false;
        });
        jQuery(".subscribe-form-help-tooltip").on('click', function(e){
            e.stopPropagation();
            jQuery(".subscribe-form-help-form").toggleClass("active");
        });
        jQuery(".subscribe-form-help-form").on('click', function(e){
            e.stopPropagation();
        });
        jQuery("body").on('click', function(){
            jQuery(".subscribe-form-help-form").removeClass("active");
        });
    });
</script>