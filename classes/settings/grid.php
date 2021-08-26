<?php 
$g_theme         = ! empty( $g_theme ) ? $g_theme : 'grid-theme-1';
?>
<!--TAB 3  Grid setting -->
<div id="lcsp-tab-3" class="lcsp-tab-content">
    <div class="cmb2-wrap form-table">
        <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
            <!--Select theme-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e('Select Theme', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="g_theme" name="lcg_scode[g_theme]">
                        <option value="grid-theme-1" <?php selected( $g_theme, 'grid-theme-1'); ?> >Theme-1</option>
                        <option value="grid-theme-2" <?php selected( $g_theme, 'grid-theme-2'); ?> >Theme-2</option>
                        <option value="grid-theme-3" <?php selected( $g_theme, 'grid-theme-3'); ?> >Theme-3</option>
                        <option disabled>Theme-4 (Pro)</option>
                        <option disabled>Theme-5 (Pro)</option>
                        <option disabled>Theme-6 (Pro)</option>
                        <option disabled>Theme-7 (Pro)</option>
                        <option disabled>Theme-8 (Pro)</option>
                    </select>
                </div>
            </div>

            <!--Select Column for desktop-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e('Select Columns', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="g_theme" name="lcg_scode[g_columns]">
                        <option value="6">Column-6</option>
                        <option value="5" <?php if(!empty($g_columns) && $g_columns == "5"){ echo "selected";}?>>Column-5</option>
                        <option value="4" <?php if(!empty($g_columns) && $g_columns == "4"){ echo "selected";}?>>Column-4</option>
                        <option value="3" <?php if(!empty($g_columns) && $g_columns == "3"){ echo "selected";}?>>Column-3</option>
                        <option value="2" <?php if(!empty($g_columns) && $g_columns == "2"){ echo "selected";}?>>Column-2</option>
                    </select>
                </div>
            </div>

            <!--Select Column for Tablet-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e('Select Columns for Tablet', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="g_theme" name="lcg_scode[g_columns_tablet]">
                        <option value="4">Column-4</option>
                        <option value="3" <?php if(!empty($g_columns_tablet) && $g_columns_tablet == "3"){ echo "selected";}?>>Column-3</option>
                        <option value="2"  <?php if(!empty($g_columns_tablet) && $g_columns_tablet == "2"){ echo "selected";}?>>Column-2</option>
                        <option value="1"  <?php if(!empty($g_columns_tablet) && $g_columns_tablet == "1"){ echo "selected";}?>>Column-1</option>
                    </select>
                </div>
            </div>

            <!--Select Column for Mobile-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e('Select Columns for Mobile', LCG_TEXTDOMAIN); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="g_theme" name="lcg_scode[g_columns_mobile]">
                        <option value="2">Column-2</option>
                        <option value="4"  <?php if(!empty($g_columns_mobile) && $g_columns_mobile == "4"){ echo "selected";}?>>Column-4</option>
                        <option value="3" <?php if(!empty($g_columns_mobile) && $g_columns_mobile == "3"){ echo "selected";}?>>Column-3</option>
                        <option value="1" <?php if(!empty($g_columns_mobile) && $g_columns_mobile == "1"){ echo "selected";}?>>Column-1</option>
                    </select>
                </div>
            </div>


            <?php

            require_once( LCG_PLUGIN_DIR . '/classes/settings/style/g_style1.php' );
            require_once( LCG_PLUGIN_DIR . '/classes/settings/style/g_style2.php' );
            ?>
            <div class="lcs_pro_ver_notice">  <?php  esc_html_e('Following options available in ',LCG_TEXTDOMAIN); ?> <a href="https://aazztech.com/product/logo-showcase-ultimate-pro/" target="_blank"><?php esc_html_e('Pro version',LCG_TEXTDOMAIN); ?></a></div>
            <div style="opacity: 0.3">
                <!-- Pagination Display -->
                <div class="cmb-row cmb-type-text-medium">
                    <div class="cmb-th">
                        <label for="lcgp_scode[pagi_display]"><?php esc_html_e('Display Pagination', LCG_TEXTDOMAIN); ?></label>
                    </div>

                    <div class="cmb-td">
                        <input type="checkbox" id="display_pagi" value="true">
                    </div>

                </div>

                <!-- Pagination Type -->
                <div class="cmb-row cmb-type-radio">
                    <div class="cmb-th">
                        <label for="lcgp_scode[pagination_type]">
                            <?php esc_html_e('Pagination Type', LCG_TEXTDOMAIN); ?>
                        </label>
                    </div>
                    <div class="cmb-td">
                        <ul class="cmb2-radio-list cmb2-list">
                            <li>
                                <input type="radio" class="cmb2-option"
                                       name="lcgp_scode[pagination_type]"
                                       id="number_pagi">
                                <label for="number_pagi">
                                    <?php esc_html_e('Number Pagination', LCG_TEXTDOMAIN); ?>
                                </label>
                            </li>
                            <li>
                                <input type="radio"
                                       class="cmb2-option"
                                       name="lcgp_scode[pagination_type]"
                                       id="ajax_pagi">

                                <label for="ajax_pagi">
                                    <?php esc_html_e('Ajax Load More Button', LCG_TEXTDOMAIN); ?>
                                </label>

                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div> <!-- end cmb2-metabox -->
    </div> <!-- end cmb2-wrap -->
</div> <!-- end lcsp-tab-2 