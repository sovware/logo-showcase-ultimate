<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Are you cheating??? Accessing this file directly is forbidden.' );
$cg_title_show   = !empty($cg_title_show) ? $cg_title_show : 'no';
$lcg_type        = !empty($lcg_type) ? $lcg_type : 'latest';
$image_crop      = !empty($image_crop) ? $image_crop : 'yes';
$upscale         = !empty($upscale) ? $upscale : 'yes';
$target          = !empty($target) ? $target : '_blank';
?>
<!--TAB 1 General setting -->
<div id="lcsp-tab-5" class="lcsp-tab-content">
    <div class="cmb2-wrap form-table">
        <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_slider_title"><?php esc_html_e('Layout', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <select  name="lcg_scode[layout]" id="lcg">
                        <option value="carousel">Carousel</option>
                        <option value="grid" <?php if(!empty($layout) && $layout == "grid"){ echo "selected";}?>>Grid</option>
                    </select>
                </div>
            </div>

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_slider_title"><?php esc_html_e('Display Total Logos', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <input type="number" class="cmb2-text-medium"
                           name="lcg_scode[total_logos]"
                           id="lcsp_slider_title"
                           value="<?php echo !empty($total_logos) ? intval($total_logos) : '12'; ?>">
                </div>
            </div>

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_slider_title"><?php esc_html_e('Carousel / Grid Title', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-medium" 
                    name="lcg_scode[cg_title]"
                    id="lcsp_slider_title" 
                    value="<?php echo !empty($cg_title) ? esc_attr($cg_title) : ''; ?>">
                </div>
            </div>

            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ic">
                        <?php esc_html_e('Carousel / Grid Title Show', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list">
                        <li>
                            <input type="radio" class="cmb2-option"
                                   name="lcg_scode[cg_title_show]"
                                   id="lcg_scode[cg_title_show]1"
                                   value="yes" <?php checked('yes', $cg_title_show, true);  ?>>
                            <label for="lcg_scode[cg_title_show]1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio" class="cmb2-option"
                                   name="lcg_scode[cg_title_show]"
                                   id="lcg_scode[cg_title_show]2"
                                   value="no" <?php checked('no', $cg_title_show, true);  ?>>
                            <label for="lcg_scode[cg_title_show]2">
                                <?php esc_html_e('No', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="cmb-row cmb-type-multicheck lcscbw">
                <div class="cmb-th">
                    <label for="wpcs_products_type"><?php esc_html_e('Logo Type', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list">
                        <li>
                            <input type="radio" class="cmb2-option" 
                            name="lcg_scode[lcg_type]"
                            id="lcsp_logo_type1"
                            value="latest" <?php checked( 'latest', $lcg_type, true ); ?>>
                            <label for="lcsp_logo_type1">
                                <?php esc_html_e('Display Logos from Latest Published', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio" class="cmb2-option"
                            name="lcg_scode[lcg_type]"
                            id="lcsp_logo_type2"
                            value="older" <?php checked( 'older', $lcg_type, true ); ?>>
                            <label for="lcsp_logo_type2">
                                <?php esc_html_e('Display Logos from Older Published', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                    <p class="cmb2-metabox-description"><?php esc_html_e('What type of products to display in the logo showcase ultimate', LCG_TEXTDOMAIN); ?></p>
                    <ul>
                        <p style="font-size: 14px; margin: 13px 0 5px 0; font-style: italic;">Following options available in <a href="https://aazztech.com/product/logo-showcase-ultimate-pro/" target="_blank">Pro Version</a>:</p>
                        <li>
                            <input type="radio" class="cmb2-option"
                                   disabled>
                            <label for="lcsp_logo_type7">
                                <?php esc_html_e('Display Logos Randomly', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>

                        <li>
                            <input type="radio" class="cmb2-option"
                                   disabled>
                            <label for="lcsp_logo_type3"><?php esc_html_e('Display Logos from Category', LCG_TEXTDOMAIN); ?></label>
                        </li>

                        <li>
                            <input type="radio" class="cmb2-option"
                                   disabled>
                            <label for="lcsp_logo_type4"><?php esc_html_e('Display Logos by ID ', LCG_TEXTDOMAIN); ?></label>
                        </li>

                        <li>
                            <input type="radio" class="cmb2-option"
                                   disabled>
                            <label for="lcsp_logo_type5"><?php esc_html_e('Display Logos by Year', LCG_TEXTDOMAIN); ?></label>
                        </li>

                        <li>
                            <input type="radio" class="cmb2-option"
                                   disabled>
                            <label for="lcsp_logo_type6"><?php esc_html_e('Display Logos by Month', LCG_TEXTDOMAIN); ?></label>
                        </li>
                </div>
            </div>

            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ic">
                        <?php esc_html_e('Image Crop', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list">
                        <li>
                            <input type="radio" class="cmb2-option" 
                            name="lcg_scode[image_crop]" 
                            id="lcsp_ic1" 
                            value="yes" <?php checked('yes', $image_crop, true);  ?>>
                            <label for="lcsp_ic1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio" class="cmb2-option" 
                            name="lcg_scode[image_crop]" 
                            id="lcsp_ic2" 
                            value="no" <?php checked('no', $image_crop, true);  ?>>
                            <label for="lcsp_ic2">
                                <?php esc_html_e('No', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                    <p class="cmb2-metabox-description"><?php esc_html_e('If logos are not in the same size, this feature is helpful. It automatically resizes and crops. Note: your image must be higher than/equal to the cropping size set below.', LCG_TEXTDOMAIN); ?></p>
                </div>
            </div>
            <!--<div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_upscale">
                        <?php /*esc_html_e('Enable Image Upscaling', LCG_TEXTDOMAIN); */?>
                    </label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list">
                        <li>
                            <input type="radio" class="cmb2-option" 
                            name="lcg_scode[upscale]" 
                            id="lcsp_upscale1" 
                            value="yes" <?php /*checked('yes', $upscale, true);  */?>>
                            <label for="lcsp_upscale1">
                                <?php /*esc_html_e('Yes', LCG_TEXTDOMAIN); */?>
                            </label>
                        </li>
                        <li>
                            <input type="radio" 
                            class="cmb2-option" 
                            name="lcg_scode[upscale]" 
                            id="lcsp_upscale2" 
                            value="no" <?php /*checked('no', $upscale, true);  */?>>
                            <label for="lcsp_upscale2">
                                <?php /*esc_html_e('No', LCG_TEXTDOMAIN); */?>
                            </label>
                        </li>
                    </ul>
                    <p class="cmb2-metabox-description"><?php /*esc_html_e('If the logo size is less than the cropping size set below then by default, image will break. However, you can solve this problem by enabling upscaling.', LCG_TEXTDOMAIN); */?></p>
                </div>
            </div>-->


            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_iwfc">
                        <?php esc_html_e('Image Width', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-small" 
                    name="lcg_scode[image_width]" 
                    id="lcsp_iwfc" 
                    value="<?php echo !empty($image_width) ? intval($image_width) : 185; ?>">
                    <p class="cmb2-metabox-description"><?php esc_html_e('Image cropping width. NOTE: Your image must be higher than this value. Else, Image will show as broken', LCG_TEXTDOMAIN); ?></p>
                </div>
            </div>

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_ihfc">
                        <?php esc_html_e('Image Height', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-small" 
                    name="lcg_scode[image_height]" 
                    id="lcsp_ihfc" 
                    value="<?php echo !empty($image_height) ? intval($image_height) : 119; ?>">
                    <p class="cmb2-metabox-description"><?php esc_html_e('Image cropping height. NOTE: Your image must be higher than this value. Else, Image will show as broken', LCG_TEXTDOMAIN); ?></p>
                </div>
            </div>


            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_llow">
                        <?php esc_html_e('Open Logo Link in', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list">
                        <li><input type="radio" class="cmb2-option" 
                            name="lcg_scode[target]" 
                            id="lcsp_llow1" 
                            value="_blank" <?php checked('_blank', $target, true); ?>> 
                            <label for="lcsp_llow1">
                                <?php esc_html_e('New Window or Tab', LCG_TEXTDOMAIN); ?>
                            </label></li>
                        <li><input type="radio" class="cmb2-option" 
                            name="lcg_scode[target]" 
                            id="lcsp_llow2" 
                            value="_self" <?php checked('_self', $target, true); ?>> 
                            <label for="lcsp_llow2">
                                <?php esc_html_e('Same Window or Tab', LCG_TEXTDOMAIN); ?>
                            </label></li>
                    </ul>
                </div>
            </div>

        </div> <!-- end cmb2-metabox -->
    </div> <!-- end cmb2-wrap -->
</div> <!-- end lcsp-tab-1 -->