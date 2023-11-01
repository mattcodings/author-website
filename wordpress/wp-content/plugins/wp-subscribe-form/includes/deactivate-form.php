<style>
    .subscribe-form-hidden {
        overflow: hidden;
    }
    .subscribe-form-popup-overlay .subscribe-form-internal-message {
        margin: 3px 0 3px 22px;
        display: none;
    }
    .subscribe-form-reason-input {
        margin: 3px 0 3px 22px;
        display: none;
    }
    .subscribe-form-reason-input input[type="text"] {
        width: 100%;
        display: block;
    }
    .subscribe-form-popup-overlay {
        background: rgba(0, 0, 0, .8);
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 1000;
        overflow: auto;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease-in-out :
    }
    .subscribe-form-popup-overlay.subscribe-form-active {
        opacity: 1;
        visibility: visible;
    }
    .subscribe-form-serveypanel {
        width: 600px;
        background: #fff;
        margin: 65px auto 0;
    }
    .subscribe-form-popup-header {
        background: #f1f1f1;
        padding: 20px;
        border-bottom: 1px solid #ccc;
    }
    .subscribe-form-popup-header h2 {
        margin: 0;
    }
    .subscribe-form-popup-body {
        padding: 10px 20px;
    }
    .subscribe-form-popup-footer {
        background: #f9f3f3;
        padding: 10px 20px;
        border-top: 1px solid #ccc;
    }
    .subscribe-form-popup-footer:after {
        content: "";
        display: table;
        clear: both;
    }
    .action-btns {
        float: right;
    }
    .subscribe-form-anonymous {
        display: none;
    }
    .attention, .error-message {
        color: red;
        font-weight: 600;
        display: none;
    }
    .subscribe-form-spinner {
        display: none;
    }
    .subscribe-form-spinner img {
        margin-top: 3px;
    }
    .subscribe-form-hidden-input {
        padding: 10px 0 0;
        display: none;
    }
    .subscribe-form-hidden-input input[type='text'] {
        padding: 0 10px;
        width: 100%;
        height: 26px;
        line-height: 26px;
    }
    .subscribe-form--popup-overlay textarea {
        padding: 10px;
        width: 100%;
        height: 100px;
        margin: 0 0 15px 0;
    }
    span.subscribe-form-error-message {
        color: #dd0000;
        font-weight: 600;
    }
    .subscribe-form-popup-body h3 {
        line-height: 24px;
    }
    .subscribe-form-popup-body textarea {
        width: 100%;
        height: 80px;
    }
    .subscribe-form--popup-overlay .form-control input {
        width: 100%;
        margin: 0 0 15px 0;
    }
    .subscribe-form-serveypanel .form-control input {
        width: 100%;
        margin: 0 0 15px 0;
    }
</style>
<!-- modal for plugin deactivation popup -->
<div class="subscribe-form-popup-overlay">
    <div class="subscribe-form-serveypanel">
        <!-- form start -->
        <form action="#" method="post" id="subscribe-form-deactivate-form">
            <div class="subscribe-form-popup-header">
                <h2><?php esc_attr_e('Quick feedback about Subscribe Forms'); ?> 🙏</h2>
            </div>
            <div class="subscribe-form-popup-body">
                <h3><?php esc_attr_e('Your feedback will help us improve the product, please tell us why did you decide to deactivate Subscribe Forms:)'); ?></h3>
                <div class="form-control">
                    <input type="email" value="<?php echo get_option( 'admin_email' ) ?>" placeholder="<?php echo _e("Email address") ?>" id="subscribe-form-deactivation-email_id">
                </div>
                <div class="form-control">
                    <label></label>
                    <textarea placeholder="<?php esc_attr_e("Your comment") ?>" id="subscribe-form-deactivation-comment"></textarea>
                </div>
            </div>
            <div class="subscribe-form-popup-footer">
                <label class="subscribe-form-anonymous">
                    <input type="checkbox"/><?php esc_attr_e('Anonymous feedback'); ?>
                </label>
                <input type="button" class="button button-secondary button-skip subscribe-form-popup-skip-feedback" value="Skip &amp; Deactivate">
                <div class="action-btns">
                    <span class="subscribe-form-spinner"><img src="<?php echo esc_url(admin_url('/images/spinner.gif')); ?>" alt=""></span>
                    <input type="submit" class="button button-secondary button-deactivate subscribe-form-popup-allow-deactivate" value="Submit &amp; Deactivate" disabled="disabled">
                    <a href="#" class="button button-primary subscribe-form-popup-button-close"><?php esc_attr_e('Cancel'); ?></a>
                </div>
            </div>
        </form>
        <!-- form end -->
    </div>
</div>
<script>
    (function ($) {
        $(function () {
            var premioSubForm = 'wp-subscribe-form';
            // Code to fire when the DOM is ready.
            $(document).on('click', 'tr[data-slug="' + premioSubForm + '"] .deactivate', function (e) {
                e.preventDefault();
                $('.subscribe-form-popup-overlay').addClass('subscribe-form-active');
                $('body').addClass('subscribe-form-hidden');
            });
            $(document).on('click', '.subscribe-form-popup-button-close', function () {
                close_popup();
            });
            $(document).on('click', ".subscribe-form-serveypanel,tr[data-slug='" + premioSubForm + "'] .deactivate", function (e) {
                e.stopPropagation();
            });
            $(document).on('click', function () {
                close_popup();
            });
            $('.subscribe-form-reason label').on('click', function () {
                $(".subscribe-form-hidden-input").hide();
                jQuery(".subscribe-form-error-message").remove();
                if ($(this).find('input[type="radio"]').is(':checked')) {
                    $(this).closest("li").find('.subscribe-form-hidden-input').show();
                }
            });
            $(document).on("keyup", "#subscribe-form-deactivation-comment", function(){
                if($.trim($(this).val()) == "") {
                    $(".subscribe-form-popup-allow-deactivate").attr("disabled", true);
                } else {
                    $(".subscribe-form-popup-allow-deactivate").attr("disabled", false);
                }
            });
            $('input[type="radio"][name="subscribe-form-selected-reason"]').on('click', function (event) {
                $(".subscribe-form-popup-allow-deactivate").removeAttr('disabled');
            });
            $(document).on('submit', '#subscribe-form-deactivate-form', function (event) {
                event.preventDefault();
                _reason = "";
                if(jQuery.trim(jQuery("#subscribe-form-deactivation-comment").val()) == "") {
                    jQuery("#alt_plugin").after("<span class='subscribe-form-error-message'>Please provide your feedback</span>");
                    return false;
                } else {
                    _reason = jQuery.trim(jQuery("#subscribe-form-deactivation-comment").val());
                }
                jQuery('[name="subscribe-form-selected-reason"]:checked').val();
                var email_id = jQuery.trim(jQuery("#subscribe-form-deactivation-email_id").val());
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'subscribe_form_plugin_deactivate',
                        reason: _reason,
                        email_id: email_id,
                        nonce: '<?php esc_attr_e(wp_create_nonce("subscribe_form_deactivate_nonce")) ?>'
                    },
                    beforeSend: function () {
                        $(".subscribe-form-spinner").show();
                        $(".subscribe-form-popup-allow-deactivate").attr("disabled", "disabled");
                    }
                }).done(function () {
                    $(".subscribe-form-spinner").hide();
                    $(".subscribe-form-popup-allow-deactivate").removeAttr("disabled");
                    window.location.href = $("tr[data-slug='" + premioSubForm + "'] .deactivate a").attr('href');
                });
            });
            $('.subscribe-form-popup-skip-feedback').on('click', function (e) {
                window.location.href = $("tr[data-slug='" + premioSubForm + "'] .deactivate a").attr('href');
            });
            function close_popup() {
                $('.subscribe-form-popup-overlay').removeClass('subscribe-form-active');
                $('#subscribe-form-deactivate-form').trigger("reset");
                $(".subscribe-form-popup-allow-deactivate").attr('disabled', 'disabled');
                $(".subscribe-form-reason-input").hide();
                $('body').removeClass('subscribe-form-hidden');
                $('.message.error-message').hide();
            }
        });
    })(jQuery); // This invokes the function above and allows us to use '$' in place of 'jQuery' in our code.
</script>
