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

            



        </div> <!-- end cmb2-metabox -->
    </div> <!-- end cmb2-wrap -->
</div> <!-- end lcsp-tab-4 