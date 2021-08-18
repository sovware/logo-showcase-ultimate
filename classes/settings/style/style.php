<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Are you cheating??? Accessing this file directly is forbidden.' );
$tooltip         = !empty($tooltip) ? $tooltip : 'yes';
$tooltip_posi    = !empty($tooltip_posi) ? $tooltip_posi : 'bottom';
$image_hover     = !empty($image_hover) ? $image_hover : 'yes';
?>
<!--TAB 4  Style setting -->
<div id="lcsp-tab-4" class="lcsp-tab-content">
    <div class="cmb2-wrap form-table">
        <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
            <!-- Image hover effect -->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcg_scode[image_hover]">
                        <?php esc_html_e('Image Hover Effect', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch1" 
                            name="lcg_scode[image_hover]" 
                            id="lcg_scode[image_hover]1" 
                            value="yes" <?php checked('yes', $image_hover, true);  ?>>
                            <label for="lcg_scode[image_hover]1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio" 
                            class="cmb2-option cmb2-radio-switch2" 
                            name="lcg_scode[image_hover]" 
                            id="lcg_scode[image_hover]2" 
                            value="no" <?php checked('no', $image_hover, true);  ?>>
                            <label for="lcg_scode[image_hover]2">
                                <?php esc_html_e('No', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tool tip show / hide -->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcg_scode[tooltip]">
                        <?php esc_html_e('Display Tooltip', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch1"
                                   name="lcg_scode[tooltip]"
                                   id="lcg_scode[tooltip]1"
                                   value="yes" <?php checked('yes', $tooltip, true);  ?>>
                            <label for="lcg_scode[tooltip]1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio"
                                   class="cmb2-option cmb2-radio-switch2"
                                   name="lcg_scode[tooltip]"
                                   id="lcg_scode[tooltip]2"
                                   value="no" <?php checked('no', $tooltip, true);  ?>>
                            <label for="lcg_scode[tooltip]2">
                                <?php esc_html_e('No', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="lcs_pro_ver_notice">  <?php  esc_html_e('Following options available in ',LCG_TEXTDOMAIN); ?> <a href="https://aazztech.com/product/logo-showcase-ultimate-pro/" target="_blank"><?php esc_html_e('Pro version',LCG_TEXTDOMAIN); ?></a></div>
            <!-- Tooltip Position -->
            <div style="opacity: 0.3">
                <div class="cmb-row cmb-type-radio">
                    <div class="cmb-th">
                        <label for="lcgp_scode[tooltip_posi]">
                            <?php esc_html_e('Tooltip Position', LCG_TEXTDOMAIN); ?>
                        </label>
                    </div>
                    <div class="cmb-td">
                        <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                            <li>
                                <input type="radio" class="cmb2-option cmb2-radio-switch1"
                                id="tooltip_pos_top"
                                name="postition"
                                top="top"
                                >
                                <label for="tooltip_pos_top">
                                    <?php esc_html_e('Top   ', LCG_TEXTDOMAIN); ?>
                                </label>
                            </li>
                            <li>
                                <input type="radio"
                                       class="cmb2-option cmb2-radio-switch2"
                                       id="tooltip_pos_bottom"
                                       name="postition"
                                       value="bottom"
                                >
                                <label for="lcgp_scode[tooltip_posi]2">
                                    <?php esc_html_e('Bottom', LCG_TEXTDOMAIN); ?>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tooltip text color -->
                <div class="cmb-row cmb-type-radio">
                    <div class="cmb-th">
                        <label for="lcgp_scode[tooltip_textc]">
                            <?php esc_html_e('Tooltip Text color', LCG_TEXTDOMAIN); ?>
                        </label>
                    </div>
                    <div class="cmb-td">
                        <input type="text" name="lcgp_scode[tooltip_text_color]"
                               class="cpa-color-picker"
                               id="tooltip_text_color" />
                    </div>
                </div>

                <!-- Tooltip Background color -->
                <div class="cmb-row cmb-type-radio">
                    <div class="cmb-th">
                        <label for="lcgp_scode[tooltip_back]">
                            <?php esc_html_e('Tooltip Background color', LCG_TEXTDOMAIN); ?>
                        </label>
                    </div>
                    <div class="cmb-td">
                        <input type="text" name="lcgp_scode[tooltip_back]"
                               class="cpa-color-picker"
                               value="<?php if(empty($tooltip_back)) { echo "#202428";}else{ echo $tooltip_back;}?>" />
                    </div>
                </div>

                <!-- Tooltip font size -->
                <div class="cmb-row cmb-type-text-medium">
                    <div class="cmb-th">
                        <label for="lcsp_stfs"><?php esc_html_e('Tooltip Font Size', LCG_TEXTDOMAIN); ?></label>
                    </div>
                    <div class="cmb-td">
                        <input type="text" class="cmb2-text-small"
                               name="lcgp_scode[tooltip_size]"
                               id="lcsp_stfs"
                               value="<?php if(empty($tooltip_size)) { echo "16px"; } else { echo $tooltip_size; } ?>">
                    </div>
                </div>
            </div>


        </div> <!-- end cmb2-metabox -->
    </div> <!-- end cmb2-wrap -->
</div> <!-- end lcsp-tab-4 