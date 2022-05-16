<?php
/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$c1_border       = ! empty( $c1_border ) ? $c1_border : 'yes';
$c1_nav_position = ! empty( $c1_nav_position ) ? $c1_nav_position : 'top_right';
$c1_nav          = ! empty( $c1_nav ) ? $c1_nav : 'yes';
?>
<!-- Carousel style 1 -->
<div class="lcg_theme" id="c_theme1">
    <div class="cmb-row cmb-type-radio">
        <div class="cmb-th">
            <label for="lcg_scode[c1_border]">
                <?php esc_html_e( 'Border Show', 'logo-showcase-ultimate' ); ?>
            </label>
        </div>    
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                <li>
                    <input type="radio" class="cmb2-option cmb2-radio-switch1" 
                    name="lcg_scode[c1_border]" 
                    id="lcg_scode[c1_border]1" 
                    value="yes" <?php checked( 'yes', $c1_border, true );  ?>>
                    <label for="lcg_scode[c1_border]1">
                        <?php esc_html_e( 'Yes', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
                <li>
                    <input type="radio" 
                    class="cmb2-option cmb2-radio-switch2" 
                    name="lcg_scode[c1_border]" 
                    id="lcg_scode[c1_border]2" 
                    value="no" <?php checked( 'no', $c1_border, true );  ?>>
                    <label for="lcg_scode[c1_border]2">
                        <?php esc_html_e( 'No', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
            </ul>
        </div>
    </div>

    <!-- Navigation show/hide -->
    <div class="cmb-row cmb-type-radio">
        <div class="cmb-th">
            <label for="lcg_scode[c1_nav]">
                <?php esc_html_e( 'Navigation Show', 'logo-showcase-ultimate' ); ?>
            </label>
        </div>    
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                <li>
                    <input type="radio" class="cmb2-option cmb2-radio-switch1" 
                    name="lcg_scode[c1_nav]" 
                    id="lcg_scode[c1_nav]1" 
                    value="yes" <?php checked( 'yes', $c1_nav, true );  ?>>
                    <label for="lcg_scode[c1_nav]1">
                        <?php esc_html_e( 'Yes', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
                <li>
                    <input type="radio" 
                    class="cmb2-option cmb2-radio-switch2" 
                    name="lcg_scode[c1_nav]" 
                    id="lcg_scode[c1_nav]2" 
                    value="no" <?php checked( 'no', $c1_nav, true );  ?>>
                    <label for="lcg_scode[c1_nav]2">
                        <?php esc_html_e( 'No', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
            </ul>
        </div>
    </div> 

    <!-- Navigation Position -->
    <div class="cmb-row cmb-type-radio">
        <div class="cmb-th">
            <label for="lcg_scode[c1_nav_position]">
                <?php esc_html_e( 'Navigation Position', 'logo-showcase-ultimate' ); ?>
            </label>
        </div>    
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list">
                <li>
                    <input type="radio" class="cmb2-option" 
                    name="lcg_scode[c1_nav_position]" 
                    id="lcg_scode[c1_nav_position]1" 
                    value="top_right" <?php checked( 'top_right', $c1_nav_position, true );  ?>>
                    <label for="lcg_scode[c1_nav_position]1">
                        <?php esc_html_e( 'Top right', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
                <li>
                    <input type="radio" 
                    class="cmb2-option" 
                    name="lcg_scode[c1_nav_position]" 
                    id="lcg_scode[c1_nav_position]2" 
                    value="top_left" <?php checked( 'top_left', $c1_nav_position, true );  ?>>
                    <label for="lcg_scode[c1_nav_position]2">
                        <?php esc_html_e( 'Top Left', 'logo-showcase-ultimate' ); ?>
                    </label>
                </li>
            </ul>
        </div>
    </div>
</div>   