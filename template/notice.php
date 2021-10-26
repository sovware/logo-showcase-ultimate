<?php
if( ! empty( $_GET['lcg-dismiss-notice'] ) && 'true' == $_GET['lcg-dismiss-notice'] ) {
    update_option( 'lcg_dismiss_notice', true );
}

if( ! isset( $_GET['lcg-dismiss-notice'] ) ) { ?>

    <div class="lcg-dashboard-notice">
        <p>
        <?php
            echo wp_kses_post( sprintf(
                /* translators: %s: documentation URL */
                __( 'We are giving away 25 premium licenses to our users for FREE. Claim before it’s gone! To claim <a href="%s" target="_blank">Contact us.</a>', 'logo-showcase-ultimate' ),
                'https://wpwax.com/contact'
            ) );
        ?>
        </p>
        <a class="lcg-dashboard-notice__dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'lcg-dismiss-notice', 'true' ) ) ); ?>"><?php esc_html_e( 'Dismiss', 'logo-showcase-ultimate' ); ?></a>
    </div>

<?php } ?>
