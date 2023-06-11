<?php
if( ! empty( $_GET['lcg-dismiss-discount-notice'] ) && 'true' == $_GET['lcg-dismiss-discount-notice'] ) {
    update_option( 'lcg_dismiss_discount_notice', true );
}

if( ! isset( $_GET['lcg-dismiss-discount-notice'] ) ) { ?>

    <div class="lcg-dashboard-notice">

        <a class="lcg-dashboard-notice__dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'lcg-dismiss-discount-notice', 'true' ) ) ); ?>"><?php esc_html_e( 'Dismiss', 'logo-showcase-ultimate' ); ?></a>

        <img src="<?php echo esc_url( 'https://s12.gifyu.com/images/SuUGf.gif' ); ?>" alt="">
        <h5><?php esc_html_e( 'EXCLUSIVE OFFER FOR LOGO SHOWCASE ULTIMATE!', 'logo-showcase-ultimate' ); ?></h5>
        <p>
        <?php esc_html_e( "Save 35% this summer with Logo Showcase Ultimate! Elevate your brand presence by displaying stunning logo carousels, grids, and sliders. Showcase your brand identity effortlessly and captivate your audience. Upgrade today and make your brand shine!", "logo-showcase-ultimate" ); ?>
        </p>
        <a class="wpcu-dashboard-notice__dismiss" target="_blank" href="<?php echo esc_url( 'https://wpwax.com/product/logo-showcase-ultimate-pro/#single-plugin-pricing-plan' ); ?>"><?php esc_html_e( 'Get Now!', 'logo-showcase-ultimate' ); ?></a>
        
    </div>

<?php } ?>