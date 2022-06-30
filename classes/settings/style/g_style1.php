<?php
/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$g1_border = ! empty( $g1_border ) ? $g1_border : 'yes';
?>
<div class="grid_theme" id="g_theme1">
    
    <!-- Border show/hide -->
    <div class="cmb-row cmb-type-radio">

        <div class="cmb-th">
            <label for="lcg_scode[g1_border]">
                <?php esc_html_e( 'Border Show', 'logo-showcase-ultimate' ); ?>
            </label>
        </div>    
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list">
                <li>
                    <input type="radio" class="cmb2-option" 
                    name="lcg_scode[g1_border]" 
                    id="lcg_scode[g1_border]1" 
                    value="yes" <?php checked( 'yes', $g1_border, true );  ?>>
                    <label for="lcg_scode[g1_border]1">
                        <?php esc_html_e( 'Yes', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
                <li>
                    <input type="radio" 
                    class="cmb2-option" 
                    name="lcg_scode[g1_border]" 
                    id="lcg_scode[g1_border]2" 
                    value="no" <?php checked( 'no', $g1_border, true );  ?>>
                    <label for="lcg_scode[g1_border]2">
                        <?php esc_html_e( 'No', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
            </ul>
        </div>
    </div>
</div>