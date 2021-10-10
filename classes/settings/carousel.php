<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Are you cheating??? Accessing this file directly is forbidden.' );
$stop_hover      = !empty($stop_hover) ? $stop_hover : 'yes';
$A_play          = !empty($A_play) ? $A_play : 'yes';
$repeat_product  = !empty($repeat_product) ? $repeat_product : 'yes';
$pagination      = !empty($pagination) ? $pagination : 'yes';
$scrol_direction = !empty($scrol_direction) ? $scrol_direction : 'left';
$scrool          = !empty($scrool) ? $scrool : 'per_item';
$c_theme         = ! empty( $c_theme ) ? $c_theme : 'carousel-theme-1';
$navigation      = !empty($navigation) ? $navigation : 'yes';
$carousel_pagination      = !empty($carousel_pagination) ? $carousel_pagination : 'no';
$marquee         = !empty($marquee) ? $marquee : 'no';
$nav_position = !empty($nav_position) ? $nav_position : 'top-right';
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
                                   id="repeat_product1"
                                   value="yes" <?php checked('yes', $repeat_product, true); ?>>
                            <label for="repeat_product1"><?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch2"
                                   name="lcg_scode[repeat_product]"
                                   id="repeat_product2"
                                   value="no" <?php checked('no', $repeat_product, true); ?>>
                            <label for="repeat_product2"><?php esc_html_e('No', LCG_TEXTDOMAIN); ?></label>
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
                            value="yes" <?php checked('yes', $stop_hover, true); ?>>
                            <label for="lcsp_soh1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch2"
                            name="lcg_scode[stop_hover]"
                            id="lcsp_soh2"
                            value="no" <?php checked('no', $stop_hover, true);  ?>>
                            <label for="lcsp_soh2">
                                <?php esc_html_e('No', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Marquee-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_mar"><?php esc_html_e('Marquee', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch1"
                            name="lcg_scode[marquee]"
                            id="lcsp_mar1"
                            value="yes" <?php checked('yes', $marquee, true); ?>>
                            <label for="lcsp_mar1">
                                <?php esc_html_e('Yes', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li><input type="radio" class="cmb2-option cmb2-radio-switch2"
                            name="lcg_scode[marquee]"
                            id="lcsp_mar2"
                            value="no" <?php checked('no', $marquee, true);  ?>>
                            <label for="lcsp_mar2">
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
                        <?php esc_html_e('Logos Column', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <div class="cmb-product-columns">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M528 0H48C21.5 0 0 21.5 0 48v320c0 26.5 21.5 48 48 48h192l-16 48h-72c-13.3 0-24 10.7-24 24s10.7 24 24 24h272c13.3 0 24-10.7 24-24s-10.7-24-24-24h-72l-16-48h192c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zm-16 352H64V64h448v288z"/></svg></span>
                                </div>
                            </div>
                            <input type="text" class="cmb2-text-small"
                            name="lcg_scode[c_desktop]"
                            id="lcsp_li_desktop"
                            value="<?php echo !empty($c_desktop) ? intval($c_desktop) : 5; ?>">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M624 416H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33.02-17.47-32.77-32H16c-8.8 0-16 7.2-16 16v16c0 35.2 28.8 64 64 64h512c35.2 0 64-28.8 64-64v-16c0-8.8-7.2-16-16-16zM576 48c0-26.4-21.6-48-48-48H112C85.6 0 64 21.6 64 48v336h512V48zm-64 272H128V64h384v256z"/></svg></span>
                                </div>
                            </div>
                            <input type="text" class="cmb2-text-small"
                            name="lcg_scode[c_desktop_small]"
                            id="lcsp_li_desktop_small"
                            value="<?php echo !empty($c_desktop_small) ? intval($c_desktop_small) : 4; ?>">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM224 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm176-108c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12V60c0-6.6 5.4-12 12-12h328c6.6 0 12 5.4 12 12v312z"/></svg>
                                </div>
                            </div>
                            <input type="text" class="cmb2-text-small"
                            name="lcg_scode[c_tablet]"
                            id="lcsp_li_tablet"
                            value="<?php echo !empty($c_tablet) ? intval($c_tablet) : 3; ?>">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm112-108c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12V60c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v312z"/></svg>
                                </div>
                            </div>
                            <input type="text" class="cmb2-text-small"
                            name="lcg_scode[c_mobile]"
                            id="lcsp_li_mobile"
                            value="<?php echo !empty($c_mobile) ? intval($c_mobile) : 2; ?>">
                        </div>
                    </div>

                    <p class="cmb2-metabox-description">
                        <?php esc_html_e('Set logos column(s) in different devices.', LCG_TEXTDOMAIN); ?>
                    </p>

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
                            value="per_item" <?php checked('per_item', $scrool, true); ?>>
                            <label for="lcsp_spp1">
                                <?php esc_html_e('Per Item', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li><input type="radio" class="cmb2-option"
                            name="lcg_scode[scrool]"
                            id="lcsp_spp2"
                            value="per_page" <?php checked('per_page', $scrool, true); ?>>
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

            <!-- Navigation Position -->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcg_scode[nav_position]">
                        <?php esc_html_e('Navigation Position', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>

                <div class="cmb-td">
                    <ul class="cmb2-radio-list cmb2-list">
                        <li>
                            <input type="radio" class="cmb2-option"
                            name="lcg_scode[nav_position]"
                            id="lcg_scode[nav_position]1"
                            value="top-right" <?php checked('top-right', $nav_position, true);  ?>>
                            <label for="lcg_scode[nav_position]1">
                                <?php esc_html_e('Top Right', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio"
                            class="cmb2-option"
                            name="lcg_scode[nav_position]"
                            id="lcg_scode[nav_position]2"
                            value="top-left" <?php checked('top-left', $nav_position, true);  ?>>
                            <label for="lcg_scode[nav_position]2">
                                <?php esc_html_e('Top Left', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio" class="cmb2-option"
                            name="lcg_scode[nav_position]"
                            id="lcg_scode[nav_position]3"
                            value="around" <?php checked('around', $nav_position, true);  ?>>
                            <label for="lcg_scode[nav_position]3">
                                <?php esc_html_e('Middle', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio"
                            class="cmb2-option"
                            name="lcg_scode[nav_position]"
                            id="lcg_scode[nav_position]4"
                            value="bottom-right" <?php checked('bottom-right', $nav_position, true);  ?>>
                            <label for="lcg_scode[nav_position]4">
                                <?php esc_html_e('Bottom Right', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                        <li>
                            <input type="radio"
                            class="cmb2-option"
                            name="lcg_scode[nav_position]"
                            id="lcg_scode[nav_position]5"
                            value="bottom-left" <?php checked('bottom-left', $nav_position, true);  ?>>
                            <label for="lcg_scode[nav_position]5">
                                <?php esc_html_e('Bottom Left', LCG_TEXTDOMAIN); ?>
                            </label>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Navigation color -->
            <div class="cmb-row cmb-type-radio wpcu_navigation_depend">
                <div class="cmb-th">
                    <label for="wcpscu[nav_arrow_color]">
                        Navigation Style
                    </label>
                </div>
                <div class="cmb-td">
                    <div class="cmb-navigation">
                        <div class="cmb-navigation-item">
                            <label for="wcpscu[nav_arrow_color]">
                                <?php esc_html_e('Navigation Arrow Color', LCG_TEXTDOMAIN); ?>
                            </label>
                            <input type="text" name="lcg_scode[navarro_color]"
                            class="cpa-color-picker"
                            value="<?php echo ! empty( $navarro_color ) ? $navarro_color : '#9192a3'; ?>" />
                        </div>
                        <div class="cmb-navigation-item">
                            <label for="wcpscu[nav_back_color]">
                                <?php esc_html_e('Navigation Background Color', LCG_TEXTDOMAIN); ?>
                            </label>
                            <input type="text" name="lcg_scode[nav_background]"
                            class="cpa-color-picker"
                            value="<?php echo ! empty( $nav_background ) ? $nav_background : '#fff'; ?>" />
                        </div>
                        <div class="cmb-navigation-item">
                            <label for="wcpscu[nav_border_color]">
                                <?php esc_html_e('Navigation Border Color', LCG_TEXTDOMAIN); ?>
                            </label>
                            <input type="text" name="lcg_scode[nav_border]"
                            class="cpa-color-picker"
                            value="<?php echo ! empty( $nav_border ) ? $nav_border : '#EAEAF1'; ?>" />
                        </div>
                        <div class="cmb-navigation-item">
                            <label for="wcpscu[nav_arrow_hover_color]">
                                <?php esc_html_e('Navigation Hover Arrow Color', LCG_TEXTDOMAIN); ?>
                            </label>
                            <input type="text" name="lcg_scode[nav_hov_arrow_color]"
                            class="cpa-color-picker"
                            value="<?php echo ! empty( $nav_hov_arrow_color ) ? $nav_hov_arrow_color : '#fff'; ?>" />
                        </div>
                        <div class="cmb-navigation-item">
                            <label for="wcpscu[nav_back_hover_color]">
                                <?php esc_html_e('Navigaiton Hover Background Color', LCG_TEXTDOMAIN); ?>
                            </label>
                            <input type="text" name="lcg_scode[nav_hov_back_color]"
                            class="cpa-color-picker"
                            value="<?php echo ! empty( $nav_hov_back_color ) ? $nav_hov_back_color : '#ff5500'; ?>" />
                        </div>
                        <div class="cmb-navigation-item">
                            <label for="wcpscu[nav_border_hover]">
                                <?php esc_html_e('Navigaiton Hover Border Color', LCG_TEXTDOMAIN); ?>
                            </label>
                            <input type="text" name="lcg_scode[nav_hov_border_color]"
                            class="cpa-color-picker"
                            value="<?php echo ! empty( $nav_hov_border_color ) ? $nav_hov_border_color : '#ff5500'; ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- display carousel_pagination -->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_soh"><?php esc_html_e('Pagination', LCG_TEXTDOMAIN); ?></label>
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

            <!-- dot pagination color -->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcg_scode[pagination_dots_color]">
                        <?php esc_html_e('Pagination Dots Color', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" name="lcg_scode[pagination_dots_color]"
                        class="cpa-color-picker"
                        value="<?php echo ! empty( $pagination_dots_color ) ? $pagination_dots_color : '#333'; ?>" />
                </div>
            </div>

            <!-- dot pagination color -->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcg_scode[pagination_dots_active_color]">
                        <?php esc_html_e('Pagination Dots Active Color', LCG_TEXTDOMAIN); ?>
                    </label>
                </div>
                <div class="cmb-td">
                    <input type="text" name="lcg_scode[pagination_dots_active_color]"
                        class="cpa-color-picker"
                        value="<?php echo ! empty( $pagination_dots_active_color ) ? $pagination_dots_active_color : '#fff'; ?>" />
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