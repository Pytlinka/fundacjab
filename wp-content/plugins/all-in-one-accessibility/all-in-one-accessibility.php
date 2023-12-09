<?php

/**
 * Plugin Name:         All in One Accessibility
 * Plugin URI:          https://www.skynettechnologies.com/add-ons/product/all-in-one-accessibility-pro-yearly-wp-subscription-50k/
 * Description:         A plugin to create ADA Accessibility
 * Version:             1.5
 * Requires at least:   4.9
 * Requires PHP:        7.0
 * Author:              Skynet Technologies USA LLC
 * Author URI:          https://www.skynettechnologies.com
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 */
add_action("admin_menu", "ada_accessibility_menu");
if (!function_exists("ada_accessibility_menu")) {
    function ada_accessibility_menu() {
        $page_title = "ADA Accessibility Info";
        $menu_title = "ADA Accessibility";
        $capability = "manage_options";
        $menu_slug = "ada-accessibility-info";
        $function = "ADAC_info_page";
        $icon_url = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyNi4wLjMsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAxNiAxNiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTYgMTY7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiM5Q0EyQTc7fQ0KPC9zdHlsZT4NCjxnPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik04LDNDNS4zLDMsMyw1LjIsMyw4czIuMiw1LDUsNXM1LTIuMiw1LTVTMTAuNywzLDgsM3ogTTgsNC4xYzAuNSwwLDAuOCwwLjQsMC44LDAuOFM4LjUsNS44LDgsNS44DQoJCVM3LjIsNS40LDcuMiw1QzcuMiw0LjUsNy41LDQuMSw4LDQuMXogTTEwLjYsNi41TDguNyw3LjFjLTAuMSwwLTAuMiwwLjEtMC4yLDAuMmMwLDAuMywwLDEsMC4xLDEuMmMwLjIsMC43LDEsMi42LDEsMi42DQoJCWMwLjEsMC4yLDAsMC41LTAuMiwwLjZjLTAuMSwwLTAuMSwwLTAuMiwwYy0wLjIsMC0wLjMtMC4xLTAuNC0wLjNMOCw5LjdsLTAuOSwxLjhjLTAuMSwwLjItMC4yLDAuMy0wLjQsMC4zYy0wLjEsMC0wLjEsMC0wLjIsMA0KCQljLTAuMi0wLjEtMC4zLTAuNC0wLjItMC42YzAsMCwwLjgtMS45LDEtMi42YzAuMS0wLjIsMC4xLTAuOSwwLjEtMS4yYzAtMC4xLTAuMS0wLjItMC4yLTAuMkw1LjQsNi41QzUuMiw2LjUsNSw2LjIsNS4xLDYNCgkJczAuMy0wLjMsMC42LTAuM2MwLDAsMS43LDAuNSwyLjMsMC41czIuMy0wLjYsMi4zLTAuNmMwLjItMC4xLDAuNSwwLjEsMC41LDAuM0MxMC45LDYuMiwxMC44LDYuNSwxMC42LDYuNXoiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNOCwwQzMuNiwwLDAsMy42LDAsOHMzLjYsOCw4LDhzOC0zLjYsOC04UzEyLjQsMCw4LDB6IE04LDE0Yy0zLjMsMC02LTIuNy02LTZzMi43LTYsNi02czYsMi43LDYsNg0KCQlTMTEuMywxNCw4LDE0eiIvPg0KPC9nPg0KPC9zdmc+DQo=";
        $position = 4;
        add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
    }
    // Call update_ADAC_info function to update database
    add_action("admin_init", "update_ADAC_info");
}
if (!function_exists("ADAC_info_page")) {
    function ADAC_info_page() {
        wp_enqueue_script("ADA_Accessibility_Validation_js", plugins_url("js/validation.js", __FILE__));
        wp_enqueue_script("ADA_Accessibility_Color_js", plugins_url("/js/jscolor.js", __FILE__));
        $userid = get_option("userid") ? get_option("userid") : "";
        $highlighted_color = get_option("highlight_color") ? get_option("highlight_color") : "#f15a22";
        $position = get_option("position") ? get_option("position") : "bottom_right";
        $extra_info_icon_type = get_option("aioa_icon_type") ? get_option("aioa_icon_type") : "aioa-icon-type-1";
        $extra_info_icon_size = get_option("aioa_icon_size") ? get_option("aioa_icon_size") : "aioa-medium-icon";

        $protocols = array('http://', 'http://www.', 'www.', 'https://', 'https://www.');
        $store_url = str_replace($protocols, '', get_bloginfo('wpurl'));
?>

        <style>
            [type="radio"]:checked,
            [type="radio"]:not(:checked) {
                position: absolute;
                left: -9999px;
            }

            [type="radio"]:checked+label,
            [type="radio"]:not(:checked)+label {
                position: relative;
                padding-left: 28px;
                cursor: pointer;
                line-height: 20px;
                display: inline-block;
                color: #666;
            }

            [type="radio"]:checked+label:before,
            [type="radio"]:not(:checked)+label:before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                width: 18px;
                height: 18px;
                border: 1px solid #ced4da;
                border-radius: 100%;
                background: #fff;
            }

            [type="radio"]:checked+label:after,
            [type="radio"]:not(:checked)+label:after {
                content: "";
                width: 10px;
                height: 10px;
                background: #420083;
                position: absolute;
                top: 4px;
                left: 4px;
                border-radius: 100%;
                -webkit-transition: all 0.2s ease;
                transition: all 0.2s ease;
            }

            [type="radio"]:not(:checked)+label:after {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            [type="radio"]:checked+label:after {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }

            .col-form-label {
                font-weight: bold;
            }

            .icon-size-wrapper .option,
            .icon-type-wrapper .option {
                width: 130px;
                height: 130px;
                padding: 10px !important;
                text-align: center;
                background-color: #fff;
                outline: 4px solid #fff;
                outline-offset: -4px;
                border-radius: 10px;
            }

            .icon-size-wrapper .option::after,
            .icon-type-wrapper .option::after {
                content: none !important;
                display: none !important;
            }

            .icon-size-wrapper .option img,
            .icon-type-wrapper .option img {
                position: relative;
                top: 50%;
                transform: translateY(-50%);
            }

            .icon-size-wrapper input[type="radio"]:not(:checked)+label::before,
            .icon-type-wrapper input[type="radio"]:not(:checked)+label::before {
                content: none;
                display: none;
            }

            .icon-size-wrapper input[type="radio"]:checked+label,
            .icon-type-wrapper input[type="radio"]:checked+label {
                outline-color: #80c944;
            }

            .icon-size-wrapper input[type="radio"]:checked+label::before,
            .icon-type-wrapper input[type="radio"]:checked+label::before {
                content: "";
                width: 20px;
                height: 20px;
                position: absolute;
                left: auto;
                right: -4px;
                top: -4px;
                background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 25 25' class='aioa-feature-on'%3E%3Cg%3E%3Ccircle fill='%2343A047' cx='12.5' cy='12.5' r='12'%3E%3C/circle%3E%3Cpath fill='%23FFFFFF' d='M12.5,1C18.9,1,24,6.1,24,12.5S18.9,24,12.5,24S1,18.9,1,12.5S6.1,1,12.5,1 M12.5,0C5.6,0,0,5.6,0,12.5S5.6,25,12.5,25S25,19.4,25,12.5S19.4,0,12.5,0L12.5,0z'%3E%3C/path%3E%3C/g%3E%3Cpolygon fill='%23FFFFFF' points='9.8,19.4 9.8,19.4 9.8,19.4 4.4,13.9 7.1,11.1 9.8,13.9 17.9,5.6 20.5,8.4 '%3E%3C/polygon%3E%3C/svg%3E") no-repeat center center/contain !important;
                border: none;
            }

            .save-changes-btn {
                text-align: center;
            }

            .save-changes-btn .btn {
                border-radius: 0.36rem;
                padding: 10px 22px;
            }
        </style>

        <h1>All in One Accessibility Settings:</h1>

        <form method="post" action="options.php" onSubmit="return validate_data()">

            <?php settings_fields("ada-accessibility-info-settings"); ?>

            <?php do_settings_sections("ada-accessibility-info-settings"); ?>

            <table class="form-table">
                <tr valign="top">
                    <td colspan="2">

                        <?php

                        if (empty(trim(esc_attr($userid)))) {
                            /*$curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://www.skynettechnologies.com/add-ons/discount_offer.php?platform=drupal',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'GET',
                            ));
                            $response = curl_exec($curl);*/

                            $args = array();
                            $url = 'https://www.skynettechnologies.com/add-ons/discount_offer.php?platform=wordpress';
                            $args = ['sslverify' => false];
                            $result = wp_remote_post($url, $args);
                            $resp = wp_remote_retrieve_body($result);
                            echo $resp . '
                            <style>
                                .ada-banner-section .inner-wrapper .code{
                                    font-family: -apple-system, "Avenir Next", "Segoe UI", BlinkMacSystemFont, Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                                }


                            </style>';
                        }
                        ?>
                    </td>
                </tr>
                <tr valign="top">

                    <th scope="row">License key required for full version:</th>

                    <td><input type="text" name="userid" value="<?php echo esc_attr($userid); ?>" size=60 />

                        <?php
                        $extra_infouserid = get_option("userid") ? get_option("userid") : "";

                        if ($extra_infouserid == "") { ?>

                            <p>Please <a href="https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&quantity=1&utm_source=<?php echo $store_url; ?>&utm_medium=wordpress-module&&utm_campaign=purchase-plan">Upgrade</a> to full version of All in One Accessibility Pro.</p>

                        <?php
                        }
                        ?>

                    </td>

                </tr>

                <tr valign="top">

                    <th scope="row">Hex color code:</th>

                    <td><input type="text" class="jscolor" name="highlight_color" value="<?php echo esc_attr($highlighted_color); ?>" />

                        <p>You can cutomize the ADA Widget color. For example: FF5733</p>

                    </td>

                </tr>

                <tr valign="top">

                    <th scope="row">Where would you like to place the accessibility icon on your site?</th>

                    <td><select name="position" default="bottom_right">

                            <option value="top_left" <?php if ($position == "top_left") {
                                                            echo "Selected";
                                                        } ?>>Top left</option>
                            <option value="top_center" <?php if ($position == "top_center") {
                                                            echo "Selected";
                                                        } ?>>Top center</option>
                            <option value="top_right" <?php if ($position == "top_right") {
                                                            echo "Selected";
                                                        } ?>>Top right</option>
                            <option value="mideel_left" <?php if ($position == "mideel_left") {
                                                            echo "Selected";
                                                        } ?>>Middle left</option>
                            <option value="middel_right" <?php if ($position == "middel_right") {
                                                                echo "Selected";
                                                            } ?>>Middle right</option>
                            <option value="bottom_left" <?php if ($position == "bottom_left") {
                                                            echo "Selected";
                                                        } ?>>Bottom left</option>
                            <option value="bottom_center" <?php if ($position == "bottom_center") {
                                                                echo "Selected";
                                                            } ?>>Bottom center</option>
                            <option value="bottom_right" <?php if ($position == "bottom_right") {
                                                                echo "Selected";
                                                            } ?>>Bottom right</option>

                        </select>

                    </td>

                </tr>
                <tr valign="center" <?php echo (strlen($extra_infouserid) < 15 ? "style='display:none'" : ''); ?>>
                    <th scope="row">Select Icon Type: </th>

                    <td>
                        <div class="icon-type-wrapper row">

                            <div class="col-sm-12">
                                <div class="row" style="display:flex; align-items:center;">
                                    <div class="col-auto mb-30" style="padding:10px;">
                                        <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                            <input type="radio" id="edit-type-1" <?php echo ($extra_info_icon_type == "aioa-icon-type-1" ? "checked" : ""); ?> name="aioa_icon_type" value="aioa-icon-type-1" class="form-radio">
                                            <label for="edit-type-1" class="option">
                                                <img src="<?php echo plugins_url("/images/aioa-icon-type-1.svg", __FILE__) ?>" width="65" height="65" />
                                                <span class="visually-hidden" style="display:none">Type 1</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-30" style="padding:10px;">
                                        <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                            <input type="radio" id="edit-type-2" <?php echo ($extra_info_icon_type == "aioa-icon-type-2" ? "checked" : ""); ?> name="aioa_icon_type" value="aioa-icon-type-2" class="form-radio">
                                            <label for="edit-type-2" class="option">
                                                <img src="<?php echo plugins_url("/images/aioa-icon-type-2.svg", __FILE__) ?>" width="65" height="65" />
                                                <span class="visually-hidden" style="display:none">Type 2</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-30" style="padding:10px;">
                                        <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                            <input type="radio" id="edit-type-3" <?php echo ($extra_info_icon_type == "aioa-icon-type-3" ? "checked" : ""); ?> name="aioa_icon_type" value="aioa-icon-type-3" class="form-radio">
                                            <label for="edit-type-3" class="option">
                                                <img src="<?php echo plugins_url("/images/aioa-icon-type-3.svg", __FILE__) ?>" width="65" height="65" />
                                                <span class="visually-hidden" style="display:none">Type 3</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="row">
                                                <div class="col-sm-6 mb-30">
                                                  <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                                    <input type="radio" id="edit-type-4" <?php //echo ($selected_store_result[0]->type == "type4" ? "checked" : "");
                                                                                            ?> name="type" value="aioa-icon-type-4" class="form-radio">
                                                    <label for="edit-type-4" class="option">
                                                      <img src="images/aioa-icon-type-4.svg" width="281.08" height="65" />
                                                      <span class="visually-hidden" style="display:none">Type 4</span>
                                                    </label>
                                                  </div>
                                                </div>
                                              </div>-->
                            </div>
                        </div>

                    </td>
                </tr>
                <tr valign="top" <?php echo (strlen($extra_infouserid) < 15 ? "style='display:none'" : ''); ?>>
                    <th scope="row">Select Icon Size:</th>

                    <td>
                        <div class="icon-size-wrapper row ">

                            <div class="col-sm-12">
                                <div class="row" style="display:flex;align-items:center;">
                                    <div class="col-auto mb-30" style="padding:10px;">
                                        <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                            <input type="radio" id="edit-size-big" <?php echo ($extra_info_icon_size == "aioa-big-icon" ? "checked" : ""); ?> name="aioa_icon_size" value="aioa-big-icon" class="form-radio">
                                            <label for="edit-size-big" class="option">
                                                <img src="<?php echo plugins_url("/images/" . $extra_info_icon_type . ".svg", __FILE__) ?>" width="75" height="75" />
                                                <span class="visually-hidden" style="display:none">Big</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-30" style="padding:10px;">
                                        <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                            <input type="radio" id="edit-size-medium" <?php echo ($extra_info_icon_size == "aioa-medium-icon" ? "checked" : ""); ?> name="aioa_icon_size" value="aioa-medium-icon" class="form-radio">
                                            <label for="edit-size-medium" class="option">
                                                <img src="<?php echo plugins_url("/images/" . $extra_info_icon_type . ".svg", __FILE__) ?>" width="65" height="65" />
                                                <span class="visually-hidden" style="display:none">Medium</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-30" style="padding:10px;">
                                        <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                            <input type="radio" id="edit-size-default" <?php echo ($extra_info_icon_size == "aioa-default-icon" ? "checked" : ""); ?> name="aioa_icon_size" value="aioa-default-icon" class="form-radio">
                                            <label for="edit-size-default" class="option">
                                                <img src="<?php echo plugins_url("/images/" . $extra_info_icon_type . ".svg", __FILE__) ?>" width="55" height="55" />
                                                <span class="visually-hidden" style="display:none">Default</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-30" style="padding:10px;">
                                        <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                            <input type="radio" id="edit-size-small" <?php echo ($extra_info_icon_size == "aioa-small-icon" ? "checked" : ""); ?> name="aioa_icon_size" value="aioa-small-icon" class="form-radio">
                                            <label for="edit-size-small" class="option">
                                                <img src="<?php echo plugins_url("/images/" . $extra_info_icon_type . ".svg", __FILE__) ?>" width="45" height="45" />
                                                <span class="visually-hidden" style="display:none">Small</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-30" style="padding:10px;">
                                        <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                                            <input type="radio" id="edit-size-extra-small" <?php echo ($extra_info_icon_size == "aioa-extra-small-icon" ? "checked" : ""); ?> name="aioa_icon_size" value="aioa-extra-small-icon" class="form-radio">
                                            <label for="edit-size-extra-small" class="option">
                                                <img src="<?php echo plugins_url("/images/" . $extra_info_icon_type . ".svg", __FILE__) ?>" width="35" height="35" />
                                                <span class="visually-hidden" style="display:none">Extra Small</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>

            </table>

            <?php submit_button(); ?>

        </form>
        <script>
            const sizeOptions = document.querySelectorAll('input[name="aioa_icon_size"]');
            const sizeOptionsImg = document.querySelectorAll('input[name="aioa_icon_size"] + label img');
            const typeOptions = document.querySelectorAll('input[name="aioa_icon_type"]');
            typeOptions.forEach(option => {
                option.addEventListener("click", (event) => {
                    sizeOptionsImg.forEach(option2 => {
                        var ico_type = document.querySelector('input[name="aioa_icon_type"]:checked').value;
                        option2.setAttribute("src", "<?php echo plugins_url(); ?>/all-in-one-accessibility/images/" + ico_type + ".svg");
                    });
                });
            });
        </script>

<?php
    }
}
if (!function_exists("update_ADAC_info")) {
    function update_ADAC_info() {
        register_setting("ada-accessibility-info-settings", "userid");
        register_setting("ada-accessibility-info-settings", "highlight_color");
        register_setting("ada-accessibility-info-settings", "position");
        register_setting("ada-accessibility-info-settings", "aioa_icon_type");
        register_setting("ada-accessibility-info-settings", "aioa_icon_size");

        /* Start Save widget Settings on Dashboard */


        $extra_info_high_link = get_option("highlight_color") ? get_option("highlight_color") : "f15a22";
        $extra_info_position = get_option("position") ? get_option("position") : "bottom_right";
        $extra_info_icon_type = get_option("aioa_icon_type") ? get_option("aioa_icon_type") : "aioa-icon-type-1";
        $extra_info_icon_size = get_option("aioa_icon_size") ? get_option("aioa_icon_size") : "aioa-medium-icon";


        $postdata = array(
            'u' => get_home_url(),
            'widget_position' => $extra_info_position,
            'widget_color_code' => $extra_info_high_link,
            'widget_icon_type' => $extra_info_icon_type,
            'widget_icon_size' => $extra_info_icon_size
        );

        ///add JS

        $args = array('postdata' => $postdata);
        $url = 'https://ada.skynettechnologies.us/api/widget-setting-update-platform';
        $args = ['sslverify' => false, 'body' => $postdata];
        $result = wp_remote_post($url, $args);
        $resp = (object)json_decode(wp_remote_retrieve_body($result), true);

        /* End Save widget Settings on Dashboard */
    }
}
function add_ADAC() {
    $extra_infouserid = get_option("userid") ? get_option("userid") : "";
    $extra_info_high_link = get_option("highlight_color") ? get_option("highlight_color") : "f15a22";
    $extra_info_position = get_option("position") ? get_option("position") : "bottom_right";
    $extra_info_icon_type = get_option("aioa_icon_type") ? get_option("aioa_icon_type") : "aioa-icon-type-1";
    $extra_info_icon_size = get_option("aioa_icon_size") ? get_option("aioa_icon_size") : "aioa-medium-icon";

    $activeColor = "#" . $extra_info_high_link;
    $userid = $extra_infouserid;
    if (empty($userid)) {
        $userid = "null";
    }
    $baseURL = "https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js";
    $ADAC_args = ["colorcode" => str_replace("#", "", $activeColor), "token" => $userid, "t" => rand(1, 10000000), "position" => $extra_info_position . "." . $extra_info_icon_type . "." . $extra_info_icon_size];
    wp_enqueue_script("aioa-adawidget", add_query_arg($ADAC_args, $baseURL), [], null, true);
}
add_filter("script_loader_tag", function ($tag, $handle) {
    if ("aioa-adawidget" !== $handle) {
        return $tag;
    }
    return str_replace(" src", " defer src", $tag); // defer the script

}, 10, 2);
//add_action('wp_body_open', 'add_ADAC');
add_action("wp_head", "add_ADAC");
function ADAC_deactivation() {
    $userid = "userid";
    $highlight_color = "highlight_color";
    $position = "position";
    delete_option($userid);
    delete_option($highlight_color);
    delete_option($position);
    delete_option("aioa_icon_type");
    delete_option("aioa_icon_size");
}
register_deactivation_hook(__FILE__, "ADAC_deactivation");
add_filter("clean_url", "ADAC_strip_ampersand", 99, 3);
function ADAC_strip_ampersand($url, $original_url, $_context) {
    if (strstr($url, "skynettechnologies.com") !== false) {
        $url = str_replace("&#038;", "&", $url);
    }
    return $url;
}
?>
