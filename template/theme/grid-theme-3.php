
<div class="wpwax-lsu-item">

    <div class="wpwax-lsu-item-inner">

    <?php if ( ! empty( $img_link ) ) { ?>
        <a href="<?php echo esc_url( $img_link ) ?>" target="<?php echo ! empty( $target ) ? esc_url( $target ) : ''; ?>">
    <?php } ?>

            <img src="<?php echo ! empty( $lcg_img ) ? esc_url( $lcg_img ) : ''; ?>" alt="<?php echo esc_url( get_the_title() ); ?>">
            
    <?php if ( ! empty( $img_link ) ) { ?>
        </a>
    <?php } ?>

    </div>

</div>
