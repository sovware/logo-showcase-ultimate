<?php
/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$g_theme                = ! empty( $g_theme ) ? $g_theme : 'grid-theme-1';
$g_columns              = ! empty( $g_columns ) ? $g_columns : '4';
$g_columns_tablet       = ! empty( $g_columns_tablet ) ? $g_columns_tablet : '2';
$g_columns_mobile       = ! empty( $g_columns_mobile ) ? $g_columns_mobile : '2';
?>
<!--TAB 3  Grid setting -->
<div id="lcsp-tab-3" class="lcsp-tab-content">
    <div class="cmb2-wrap form-table">
        <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
            <!--Select theme-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e( 'Select Theme', 'logo-showcase-ultimate' ); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="g_theme" name="lcg_scode[g_theme]">
                        <option value="grid-theme-1" <?php selected( $g_theme, 'grid-theme-1' ); ?> >Theme-1</option>
                        <option value="grid-theme-2" <?php selected( $g_theme, 'grid-theme-2' ); ?> >Theme-2</option>
                        <option value="grid-theme-3" <?php selected( $g_theme, 'grid-theme-3' ); ?> >Theme-3</option>
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
                    <label for="lcsp_ap"><?php esc_html_e( 'Select Columns', 'logo-showcase-ultimate' ); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="g_theme" name="lcg_scode[g_columns]">
                        <option value="1" <?php selected( '1', $g_columns, true ); ?>>Column-1</option>
                        <option value="2" <?php selected( '2', $g_columns, true ); ?>>Column-2</option>
                        <option value="3" <?php selected( '3', $g_columns, true ); ?>>Column-3</option>
                        <option value="4" <?php selected( '4', $g_columns, true ); ?>>Column-4</option>
                        <option value="5" <?php selected( '5', $g_columns, true ); ?>>Column-5</option>     
                        <option value="6" <?php selected( '6', $g_columns, true ); ?>>Column-6</option>     
                    </select>
                </div>
            </div>

            <!--Select Column for Tablet-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e( 'Select Columns for Tablet', 'logo-showcase-ultimate' ); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="g_theme" name="lcg_scode[g_columns_tablet]">
                        <option value="1" <?php selected( '1', $g_columns_tablet, true ); ?>>Column-1</option>
                        <option value="2" <?php selected( '2', $g_columns_tablet, true ); ?>>Column-2</option>
                        <option value="3" <?php selected( '3', $g_columns_tablet, true ); ?>>Column-3</option>
                        <option value="4" <?php selected( '4', $g_columns_tablet, true ); ?>>Column-4</option>
                    </select>
                </div>
            </div>

            <!--Select Column for Mobile-->
            <div class="cmb-row cmb-type-radio">
                <div class="cmb-th">
                    <label for="lcsp_ap"><?php esc_html_e( 'Select Columns for Mobile', 'logo-showcase-ultimate' ); ?></label>
                </div>
                <div class="cmb-td">
                    <select id="g_theme" name="lcg_scode[g_columns_mobile]">
                        <option value="1" <?php selected( '1', $g_columns_mobile, true ) ?>>Column-1</option>
                        <option value="2" <?php selected( '2', $g_columns_mobile, true ) ?>>Column-2</option>
                        <option value="3" <?php selected( '3', $g_columns_mobile, true ) ?>>Column-3</option>
                        <option value="4" <?php selected( '4', $g_columns_mobile, true ) ?>>Column-4</option>
                    </select>
                </div>
            </div>
            <?php
                require_once( LCG_PLUGIN_DIR . '/classes/settings/style/g_style1.php' );
                require_once( LCG_PLUGIN_DIR . '/classes/settings/style/g_style2.php' );
            ?>
        </div> <!-- end cmb2-metabox -->
    </div> <!-- end cmb2-wrap -->
</div> <!-- end lcsp-tab-2 