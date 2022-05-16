<?php
/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$c2_nav          = ! empty( $c2_nav ) ? $c2_nav : 'yes';
?>
<div class="lcg_theme" id="c_theme2">
	<!-- Navigation show/hide -->
    <div class="cmb-row cmb-type-radio">
        <div class="cmb-th">
            <label for="lcg_scode[c2_nav]">
                <?php esc_html_e( 'Navigation Show', 'logo-showcase-ultimate' ); ?>
            </label>
        </div>    
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list">
                <li>
                    <input type="radio" class="cmb2-option" 
                    name="lcg_scode[c2_nav]" 
                    id="lcg_scode[c2_nav]1" 
                    value="yes" <?php checked( 'yes', $c2_nav, true );  ?>>
                    <label for="lcg_scode[c2_nav]1">
                        <?php esc_html_e( 'Yes', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
                <li>
                    <input type="radio" 
                    class="cmb2-option" 
                    name="lcg_scode[c2_nav]" 
                    id="lcg_scode[c2_nav]2" 
                    value="no" <?php checked( 'no', $c2_nav, true );  ?>>
                    <label for="lcg_scode[c2_nav]2">
                        <?php esc_html_e( 'No', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
            </ul>
        </div>
    </div> 
</div>