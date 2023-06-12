<?php
if( ! empty( $_GET['lcg-dismiss-discount-notice'] ) && 'true' == $_GET['lcg-dismiss-discount-notice'] ) {
    update_option( 'lcg_dismiss_discount_notice', true );
}

if( ! isset( $_GET['lcg-dismiss-discount-notice'] ) ) { ?>

    <div class="lcg-dashboard-notice">
        <a class="lcg-dashboard-notice__dismiss lcg-dashboard-notice__close" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'lcg-dismiss-discount-notice', 'true' ) ) ); ?>"><?php esc_html_e( 'x', 'logo-showcase-ultimate' ); ?></a>

        <img src="<?php echo esc_url( 'https://s12.gifyu.com/images/SuUGf.gif' ); ?>" alt="">
        <div class="lcg-dashboard-notice__content">
            <h5><?php esc_html_e( 'EXCLUSIVE OFFER FOR LOGO SHOWCASE ULTIMATE!', 'logo-showcase-ultimate' ); ?></h5>
            <p>
                <?php
                    $offer = '<strong>' . esc_html__( "Save 35% this summer with Logo Showcase Ultimate! ", "logo-showcase-ultimate" ) . '</strong>';
                    $text = esc_html__( "Elevate your brand presence by displaying stunning logo carousels, grids, and sliders. Showcase your brand identity effortlessly and captivate your audience. Upgrade today and make your brand shine!", "logo-showcase-ultimate" );

                    echo $offer . $text;
                ?>
            </p>
            <a class="lcg-dashboard-notice__dismiss lcg-dashboard-notice__btn" target="_blank" href="<?php echo esc_url( 'https://wpwax.com/product/logo-showcase-ultimate-pro/#single-plugin-pricing-plan' ); ?>"><?php esc_html_e( 'Get Now!', 'logo-showcase-ultimate' ); ?></a>
        </div>
    </div>

<?php } ?>