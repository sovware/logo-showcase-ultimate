<?php
/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$c3_border       = ! empty( $c3_border ) ? $c3_border : 'yes';
$c3_pagination   = ! empty( $c3_pagination ) ? $c3_pagination : 'yes';
?>
<!-- Carousel style 1 -->
<!-- Border show/hide -->
<div class="lcg_theme" id="c_theme3">
    <div class="cmb-row cmb-type-radio">
        <div class="cmb-th">
            <label for="lcg_scode[c3_border]">
                <?php esc_html_e( 'Border Show', 'logo-showcase-ultimate' ); ?>
            </label>
        </div>
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list">
                <li>
                    <input type="radio" class="cmb2-option" 
                    name="lcg_scode[c3_border]" 
                    id="lcg_scode[c3_border]1" 
                    value="yes" <?php checked( 'yes', $c3_border, true );  ?>>
                    <label for="lcg_scode[c3_border]1">
                        <?php esc_html_e( 'yes', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
                <li>
                    <input type="radio" 
                    class="cmb2-option" 
                    name="lcg_scode[c3_border]" 
                    id="lcg_scode[c3_border]2" 
                    value="no" <?php checked( 'no', $c3_border, true );  ?>>
                    <label for="lcg_scode[c3_border]2">
                        <?php esc_html_e( 'no', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
            </ul>
        </div>
    </div> 


    <!-- Navigation show/hide -->
    <div class="cmb-row cmb-type-radio">
        <div class="cmb-th">
            <label for="lcg_scode[tooltip_posi]">
                <?php esc_html_e( 'Pagination Show', 'logo-showcase-ultimate' ); ?>
            </label>
        </div>    
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list">
                <li>
                    <input type="radio" class="cmb2-option" 
                    name="lcg_scode[c3_pagination]" 
                    id="lcg_scode[c3_pagination]1" 
                    value="yes" <?php checked( 'yes', $c3_pagination, true );  ?>>
                    <label for="lcg_scode[c3_pagination]1">
                        <?php esc_html_e( 'yes', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
                <li>
                    <input type="radio" 
                    class="cmb2-option" 
                    name="lcg_scode[c3_pagination]" 
                    id="lcg_scode[c3_pagination]2" 
                    value="no" <?php checked( 'no', $c3_pagination, true );  ?>>
                    <label for="lcg_scode[c3_pagination]2">
                        <?php esc_html_e( 'no', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
            </ul>
        </div>
    </div>
</div>