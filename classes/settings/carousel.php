<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Are you cheating??? Accessing this file directly is forbidden.' );
$stop_hover      = !empty($stop_hover) ? $stop_hover : 'true';
$A_play          = !empty($A_play) ? $A_play : 'yes';
$repeat_product  = !empty($repeat_product) ? $repeat_product : 'yes';
$pagination      = !empty($pagination) ? $pagination : 'yes';
$scrol_direction = !empty($scrol_direction) ? $scrol_direction : 'left';
$scrool          = !empty($scrool) ? $scrool : 'false';
$c_theme         = ! empty( $c_theme ) ? $c_theme : 'carousel-theme-1';
$navigation      = !empty($navigation) ? $navigation : 'yes';
$carousel_pagination      = !empty($carousel_pagination) ? $carousel_pagination : 'no';
?>
<!--TAB 2  Carousel setting -->
<div id="lcsp-tab-2" class="lcsp-tab-content">
    <div class="cmb2-wrap form-table">
        <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
            <!--Select theme-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e('Select Theme', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="c_theme" name="lcg_scode[c_theme]">
                        <option value="carousel-theme-1" <?php selected( $c_theme, 'carousel-theme-1'); ?> >Theme-1</option>
                        <option value="carousel-theme-2" <?php selected( $c_theme, 'carousel-theme-2'); ?> >Theme-2</option>
                        <option value="carousel-theme-3" <?php selected( $c_theme, 'carousel-theme-3'); ?> >Theme-3</option>
                        <option value="carousel-theme-4" <?php selected( $c_theme, 'carousel-theme-4'); ?> >Theme-4</option>
                        <option value="carousel-theme-5" <?php selected( $c_theme, 'carousel-theme-5'); ?> >Theme-5</option>
                        <option value="carousel-theme-6" <?php selected( $c_theme, 'carousel-theme-6'); ?> >Theme-6</option>
                        <option value="carousel-theme-7" <?php selected( $c_theme, 'carousel-theme-7'); ?> >Theme-7</option>
                        <option value="carousel-theme-8" <?php selected( $c_theme, 'carousel-theme-8'); ?> >Theme-8</option>
                        <option value="carousel-theme-9" <?php selected( $c_theme, 'carousel-theme-9'); ?> >Theme-9</option>
                        <option value="carousel-theme-10" <?php selected( $c_theme, 'carousel-theme-10'); ?> >Theme-10</option>
                        <option value="carousel-theme-11" <?php selected( $c_theme, 'carousel-theme-11'); ?> >Theme-11</option>
                        <option value="carousel-theme-12" <?php selected( $c_theme, 'carousel-theme-12'); ?> >Theme-12</option>
                        <option value="carousel-theme-13" <?php selected( $c_theme, 'carousel-theme-13'); ?> >Theme-13</option>
                        <option value="carousel-theme-14" <?php selected( $c_theme, 'carousel-theme-14'); ?> >Theme-14</option>
                        <option value="carousel-theme-15" <?php selected( $c_theme, 'carousel-theme-15'); ?> >Theme-15</option>
                        <option value="carousel-theme-16" <?php selected( $c_theme, 'carousel-theme-16'); ?> >Theme-16</option>
                    </select>
                </div>
            </div>

            <!--Auto Play-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e('Auto Play', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch1" 
                            name="lcg_scode[A_play]" 
                            id="lcsp_ap1" 
                            value="yes" <?php checked('yes', $A_play, true); ?>> 
                            <label for="lcsp_ap1"><?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch2" 
                            name="lcg_scode[A_play]" 
                            id="lcsp_ap2" 
                            value="no" <?php checked('no', $A_play, true); ?>> 
                            <label for="lcsp_ap2"><?php esc_html_e('No', LCG_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Repeat product-->
            <div class="cmb-row cmb-type-radio cmb2-radio-switch1">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e('Repeat Logo', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch1"
                                   name="lcg_scode[repeat_product]"
                                   id="repeat_product"
                                   value="yes" <?php checked('yes', $repeat_product, true); ?>>
                            <label for="repeat_product"><?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch2"
                                   name="lcg_scode[repeat_product]"
                                   id="repeat_product"
                                   value="no" <?php checked('no', $repeat_product, true); ?>>
                            <label for="repeat_product"><?php esc_html_e('No', LCG_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Stop on hover-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_soh"><?php esc_html_e('Stop on Hover', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch1" 
                            name="lcg_scode[stop_hover]" 
                            id="lcsp_soh1" 
                            value="true" <?php checked('true', $stop_hover, true); ?>> 
                            <label for="lcsp_soh1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch2" 
                            name="lcg_scode[stop_hover]" 
                            id="lcsp_soh2" 
                            value="false" <?php checked('false', $stop_hover, true);  ?>> 
                            <label for="lcsp_soh2">
                                <?php esc_html_e('No', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Items on desktop-->
            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_li_desktop">
                        <?php esc_html_e('Logo items (on Desktop, screen larger than 1198px)', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-small" 
                    name="lcg_scode[c_desktop]" 
                    id="lcsp_li_desktop" 
                    value="<?php echo !empty($c_desktop) ? intval($c_desktop) : 5; ?>">
                    <p class="cmb2-metabox-description"><?php esc_html_e('Maximum amount of items to display at a time on Desktop that screen size larger than 1198px', LCG_TEXTDOMAIN); ?></p>

                </div>
            </div>
            <!--Item on smaller desktop or laptop-->
            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_li_desktop_small">
                        <?php esc_html_e('Logo items (on Desktop, screen larger than 978px)', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-small" 
                    name="lcg_scode[c_desktop_small]" 
                    id="lcsp_li_desktop_small" 
                    value="<?php echo !empty($c_desktop_small) ? intval($c_desktop_small) : 4; ?>">
                    <p class="cmb2-metabox-description"><?php esc_html_e('Maximum amount of items to display at a time on Desktop that screen size larger than 978px', LCG_TEXTDOMAIN); ?></p>
                </div>
            </div>
            <!--items on tablet-->
            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_li_tablet">
                        <?php esc_html_e('Logo items (on Tablet)', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-small" 
                    name="lcg_scode[c_tablet]" 
                    id="lcsp_li_tablet" 
                    value="<?php echo !empty($c_tablet) ? intval($c_tablet) : 3; ?>">
                    <p class="cmb2-metabox-description"><?php esc_html_e('Maximum amount of items to display at a time on Tablet', LCG_TEXTDOMAIN); ?></p>
                </div>
            </div>
            <!--items on mobile-->
            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_li_mobile">
                        <?php esc_html_e('Logo items (on Mobile)', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-small" 
                    name="lcg_scode[c_mobile]" 
                    id="lcsp_li_mobile" 
                    value="<?php echo !empty($c_mobile) ? intval($c_mobile) : 2; ?>">
                    <p class="cmb2-metabox-description"><?php esc_html_e('Maximum amount of items to display at a time on Mobile', LCG_TEXTDOMAIN); ?></p>
                </div>
            </div>
            <!--slide speed-->
            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_ss">
                        <?php esc_html_e('Slide Speed', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-small" 
                    name="lcg_scode[slide_speed]" 
                    id="lcg_scode[slide_speed]" 
                    value="<?php echo !empty($slide_speed) ? intval($slide_speed) : 4000; ?>">
                    <p class="cmb2-metabox-description"><?php esc_html_e('Here 1000 is equal to 1 second. So provide a speed accordingly', LCG_TEXTDOMAIN); ?></p>
                </div>
            </div>
            <!--slide Timeout-->
            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="lcsp_ss">
                        <?php esc_html_e('Slide Timeout', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" class="cmb2-text-small"
                           name="lcg_scode[slide_time]"
                           id="lcg_scode[slide_time]"
                           value="<?php echo !empty($slide_time) ? intval($slide_time) : 2000; ?>">
                    <p class="cmb2-metabox-description"><?php esc_html_e('Here 1000 is equal to 1 second. So provide a timeout accordingly', LCG_TEXTDOMAIN); ?></p>
                </div>
            </div>
            <!--Scrolling-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_spp">
                        <?php esc_html_e('Scroll', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list">
                        <li>
                            <input type="radio" class="cmb2-option" 
                            name="lcg_scode[scrool]" 
                            id="lcsp_spp1" 
                            value="false" <?php checked('false', $scrool, true); ?>> 
                            <label for="lcsp_spp1">
                                <?php esc_html_e('Per Item', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li><input type="radio" class="cmb2-option" 
                            name="lcg_scode[scrool]" 
                            id="lcsp_spp2" 
                            value="true" <?php checked('true', $scrool, true); ?>> 
                            <label for="lcsp_spp2">
                                <?php esc_html_e('Per Page', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div> <!-- end cmb2-metabox -->

            <!--scrolling direction-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_scrol_dir"><?php esc_html_e('Carousel Scrolling Direction', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list">
                        <li><input type="radio" class="cmb2-option" name="lcg_scode[scrol_direction]" id="lcg_scode[scrol_direction]2" value="left" <?php checked('left', $scrol_direction, true); ?>> <label for="lcg_scode[scrol_direction]2"><?php esc_html_e('Slide from Right to Left', LCG_TEXTDOMAIN); ?></label></li>
                        <li><input type="radio" class="cmb2-option" name="lcg_scode[scrol_direction]" id="lcg_scode[scrol_direction]1" value="right" <?php checked('right', $scrol_direction, true); ?>> <label for="lcg_scode[scrol_direction]1"><?php esc_html_e('Slide from Left to Right', LCG_TEXTDOMAIN); ?></label></li>                                </ul>
                </div>
            </div>
            <!-- display navigation -->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_soh"><?php esc_html_e('Navigation', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch1" 
                            name="lcg_scode[navigation]" 
                            id="lcsp_nav1" 
                            value="yes" <?php checked('yes', $navigation, true); ?>> 
                            <label for="lcsp_nav1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch2" 
                            name="lcg_scode[navigation]" 
                            id="lcsp_nav2" 
                            value="no" <?php checked('no', $navigation, true);  ?>> 
                            <label for="lcsp_nav2">
                                <?php esc_html_e('No', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- display carousel_pagination -->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_soh"><?php esc_html_e('carousel_pagination', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch1" 
                            name="lcg_scode[carousel_pagination]" 
                            id="lcsp_c_pagi1" 
                            value="yes" <?php checked('yes', $carousel_pagination, true); ?>> 
                            <label for="lcsp_c_pagi1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch2" 
                            name="lcg_scode[carousel_pagination]" 
                            id="lcsp_c_pagi2" 
                            value="no" <?php checked('no', $carousel_pagination, true);  ?>> 
                            <label for="lcsp_c_pagi2">
                                <?php esc_html_e('No', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            require_once( LCG_PLUGIN_DIR . '/classes/settings/style/c_style3.php' );
            require_once( LCG_PLUGIN_DIR . '/classes/settings/style/c_style1.php' );
            require_once( LCG_PLUGIN_DIR . '/classes/settings/style/c_style2.php' );
            ?>

        </div>
    </div> <!-- end cmb2-wrap -->

</div> <!-- end lcsp-tab-2 -->