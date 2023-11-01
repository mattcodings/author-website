<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<?php
$is_shown = get_option("subscribe_forms_update_status");
if($is_shown === false && (isset($_GET['type']) && $_GET['type'] == "update")) { ?>
    <style>
        .updates-form-form {
            min-height: calc(100vh - 280px);
        }
        .popup-form-content {
            background: #ffffff;
            min-height: 100px;
            width: 450px;
            text-align: center;
            margin-top: 50px;
            border: solid 1px #c1c1c1;
        }
        .updates-content-buttons button {
            margin: 10px 3px !important;
            float: left;
        }
        .updates-content-buttons a span {
            -webkit-animation: fa-spin 0.75s infinite linear;
            animation: fa-spin 0.75s infinite linear;
        }
        .updates-content-buttons a:hover, .updates-content-buttons a:focus {
            color: #ffffff;
            background-image: linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1));
        }
        .updates-content-buttons a:focus {
            outline: 0;
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px rgba(50,100,150,.4);
        }
        .updates-content-buttons button.form-cancel-btn {
            float: right !important;
        }
        .form-submit-btn {
            background-color: #3085d6;
        }
        .updates-content-buttons a span {
            -webkit-animation: fa-spin 0.75s infinite linear;
            animation: fa-spin 0.75s infinite linear;
        }
        .add-update-folder-title {
            font-size: 20px;
            line-height: 30px;
            padding: 20px 20px 0;
        }
        .folder-form-input {
            padding: 10px 20px;
        }
        .folder-form-input input {
            width: 100%;
            transition: border-color .3s,box-shadow .3s;
            border: 1px solid #d9d9d9;
            border-radius: .1875em;
            font-size: 1.125em;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.06);
            box-sizing: border-box;
            height: 2.625em;
            margin: 1em auto;
        }
        .updates-content-buttons {
            background: #c1c1c1;
            padding: 0 20px;
        }
        #adminmenu .wp-submenu li.current a {
            color: #b4b9be;
            color: rgba(240,245,250,.7);
            font-weight: normal;
        }
    </style>
    <div class="updates-form-form" >
        <div class="popup-form-content">
            <div id="add-update-folder-title" class="add-update-folder-title">
                Would you like to get feature updates for Subscribe Forms in real-time?
            </div>
            <div class="folder-form-input">
                <input id="chaty_update_email" autocomplete="off" value="<?php echo get_option( 'admin_email' ) ?>" placeholder="Email address">
            </div>
            <div class="updates-content-buttons">
                <button href="javascript:;" class="button button-primary form-submit-btn yes">Yes, I want</button>
                <button href="javascript:;" class="button button-secondary form-cancel-btn no">Skip</button>
                <div style="clear: both"></div>
            </div>
            <input type="hidden" id="subscribe_forms_update_status" value="<?php echo wp_create_nonce("subscribe_forms_update_status") ?>">
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $(document).on("click", ".updates-content-buttons button", function () {
                var updateStatus = 0;
                if ($(this).hasClass("yes")) {
                    updateStatus = 1;
                }
                $(".updates-content-buttons button").attr("disabled", true);
                $.ajax({
                    url: ajaxurl,
                    data: "action=subscribe_forms_update_status&status=" + updateStatus + "&nonce=" + $("#subscribe_forms_update_status").val() + "&email=" + $("#chaty_update_email").val(),
                    type: 'post',
                    cache: false,
                    success: function () {
                        window.location = "<?php echo admin_url("post-new.php?post_type=sfba_subscribe_form") ?>";
                    }
                })
            });
        });
    </script>
<?php } else { ?>
<style>
    /*
    RESPONSTABLE 2.0 by jordyvanraaij
      Designed mobile first!

    If you like this solution, you might also want to check out the 1.0 version:
      https://gist.github.com/jordyvanraaij/9069194

    */
    .responstable {
      margin: 1em 0;
      width: 100%;
      overflow: hidden;
      background: #FFF;
      color: #024457;
      border-radius: 10px;
      border: 1px solid #039389 ;
    }
    .responstable tr {
      border: 1px solid #D9E4E6;
    }
    .responstable tr:nth-child(odd) {
      background-color: #EAF3F3;
    }
    .responstable th {
      display: none;
      border: 1px solid #FFF;
      background-color: #039389 ;
      color: #FFF;
      padding: 1em;
    }
    .responstable th:first-child {
      display: table-cell;
      text-align: center;
    }
    .responstable th:nth-child(2) {
      display: table-cell;
    }
    .responstable th:nth-child(2) span {
      display: none;
    }
    .responstable th:nth-child(2):after {
      content: attr(data-th);
    }
    @media (min-width: 480px) {
      .responstable th:nth-child(2) span {
        display: block;
      }
      .responstable th:nth-child(2):after {
        display: none;
      }
    }
    .responstable td {
      display: block;
      word-wrap: break-word;
      max-width: 7em;
    }
    .responstable td:first-child {
      display: table-cell;
      text-align: center;
      border-right: 1px solid #D9E4E6;
    }
    @media (min-width: 480px) {
      .responstable td {
        border: 1px solid #D9E4E6;
      }
    }
    .responstable th, .responstable td {
      text-align: left;
      margin: .5em 1em;
    }
    @media (min-width: 480px) {
      .responstable th, .responstable td {
        display: table-cell;
        padding: 1em;
      }
    }

    .wpappp_sub_text{
      text-align: center;
      font-size: 3em;
      margin-top: 20px;
    }
    #upc_subscriber_tab tr td{
      padding:20px;
      padding-left:0;
    }


    .wpappp_buton {
        overflow: hidden !important;
        padding: 12px 12px !important;
        cursor: pointer !important;
        -webkit-user-select: none !important;
        -moz-user-select: none !important;
        -ms-user-select: none !important;
        user-select: none !important;
        -webkit-transition: all 60ms ease-in-out !important;
        transition: all 60ms ease-in-out !important;
        text-align: center !important;
        white-space: nowrap !important;
        text-decoration: none !important;
        text-transform: none !important;
        text-transform: capitalize !important;
        color: #fff !important;
        border: 0 none !important;
        border-radius: 4px !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        line-height: 1.3 !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        appearance: none !important;
        -webkit-box-pack: center !important;
        -webkit-justify-content: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -webkit-align-items: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        -webkit-box-flex: 0 !important;
        -webkit-flex: 0 0 160px !important;
        -ms-flex: 0 0 160px !important;
        flex: 0 0 160px !important;
        color: #FFFFFF !important;
        background: #039389 !important;
    }

    .wpappp_buton:hover{
        -webkit-transition: all 60ms ease !important;
        transition: all 60ms ease !important;
        opacity: .85 !important;
    }

    .wpappp_buton:active{
        -webkit-transition: all 60ms ease !important;
        transition: all 60ms ease !important;
        -webkit-transform: scale(0.97) !important;
        transform: scale(0.97) !important;
        opacity: .75 !important;
    }

    #upc_subscriber_tab{
        font-size: 18px;
    }
    .responstable td a {
        text-decoration: none;
    }
    .wpappp-popup-tab-content {
        margin-right: 15px;
    }

    </style>
    <div id="wpappp-popup-tab-content4" class="wpappp-popup-tab-content wrap">
        <h1>Subscriber List</h1>
        <p class="description"><strong>Subscriber's data is saved locally do make backup or export before uninstalling plugin</strong></p>
        <div>
            <table id="upc_subscriber_tab">
                <tr>
                    <td><strong>Download & Export All Subscriber to CSV file: </strong></td>
                    <td>						
						<a href="<?php echo admin_url('edit.php?post_type=sfba_subscribe_form&page=sfba_subscribers_list&export=1&download_file=sfba_subcribers_list.csv'); ?>" class="wpappp_buton" id="wpappp_export_to_csv" value="Export to CSV" href="#">Download & Export to CSV</a>
					</td>
                    <td><strong>Delete All Subscibers from Database: </strong></td>
                    <td><input type="button" class="wpappp_buton" id="sfba_delete_all_data" value="Delete All Data" /></td>
                </tr>
            </table>
        </div>
        <div>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . "sfba_subscribers_lists";
            $result = $wpdb->get_results ( "SELECT * FROM ".$table_name );
            if( $result ) { ?>
                <table border="1" class="responstable">
                    <tr>
                        <th width="15%">ID</th>
                        <th width="25%">Name</th>
                        <th width="45%">Email</th>
                        <th width="">URL</th>
                        <th width="25%">Edit</th>
                    </tr>
                    <?php
                    foreach ( $result as $print ) { ?>
                        <tr>
                            <td><?php echo esc_attr($print->id);?></td>
                            <td><?php echo esc_attr($print->name);?></td>
                            <td><?php echo esc_attr($print->email);?></td>
                            <td>
                                <?php
                                if ( $print->page_link ) : ?>
                                    <a href="<?php echo esc_url($print->page_link);?>" target="_blank" title="<?php echo esc_attr($print->page_link); ?>">
                                        <img width="20" height="20" src="<?php echo esc_url(plugin_dir_url(__FILE__)."images/link_icon.png") ?>" />
                                    </a>
                                <?php endif;?>
                            </td>
                            <td><input type="button" data-delete="<?php echo esc_attr($print->id);?>" class="upc_delete_entry wpappp_buton sfba_delete_entry" id="upc_delete_entry" value="Delete Record" style="margin:0 auto;display:block;"/>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else {
                ?><p style="font-size: 18px;font-weight: bold;margin: 0 auto;">No Subscriber Found!</p><?php
            }
            ?>
        </div>

    </div>
<?php } ?>
<?php include_once dirname(__FILE__)."../../help.php"; ?>