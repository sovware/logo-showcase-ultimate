<?php
/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div id="lcsp-tabs-container">
    <div class="lcsp-tabs-menu-wrapper">
        <ul class="lcsp-tabs-menu">
            <li class="current"><a href="#lcsp-tab-1"><span
                        class="fas fa-code"></span><?php esc_html_e( 'Shortcodes', 'logo-showcase-ultimate' ); ?></a></li>
            <li><a href="#lcsp-tab-5"><span
                        class="fas fa-cog"></span><?php esc_html_e( 'General Settings', 'logo-showcase-ultimate' ); ?></a></li>
            <li style="display: <?php echo ( ! empty( $layout ) && $layout == "grid" ) ? 'none' : 'block'; ?>;"
                id="tab2"><a href="#lcsp-tab-2"><span
                        class="fas fa-sliders-h"></span><?php esc_html_e( 'Carousel Settings', 'logo-showcase-ultimate' ); ?></a>
            </li>
            <li style="display: <?php echo ( ! empty( $layout ) && $layout == "grid" ) ? 'block' : 'none';?>;"
                id="tab3"><a href="#lcsp-tab-3"><span
                        class="fas fa-th"></span><?php esc_html_e( 'Grid Settings', 'logo-showcase-ultimate' ); ?></a></li>
            <li><a href="#lcsp-tab-4"><span
                        class="fas fa-palette"></span><?php esc_html_e( 'Style Settings', 'logo-showcase-ultimate' ); ?></a></li>
        </ul>
        <a href="#" class="lcsp-support"><span class="fas fa-question-circle"></span>Support</a>
    </div>

    <div class="lcsp-tab">
        <?php
            require_once( LCG_PLUGIN_DIR . '/classes/settings/shortcode.php' );
            require_once( LCG_PLUGIN_DIR . '/classes/settings/general.php' );
            require_once( LCG_PLUGIN_DIR . '/classes/settings/carousel.php' );
            require_once( LCG_PLUGIN_DIR . '/classes/settings/grid.php' );
            require_once( LCG_PLUGIN_DIR . '/classes/settings/style/style.php' );
        ?>
    </div> <!-- end lcsp-tab -->
</div> <!-- end lcsp-tabs-container -->