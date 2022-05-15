
<div class="wpwax-lsu-item swiper-slide">

    <div class="wpwax-lsu-item-inner" data-bs-toggle="<?php echo ( 'yes' == $tooltip_show ) ? 'tooltip' : ''; ?>" data-bs-placement="top"
        title="<?php echo ! empty( $tooltip ) ? esc_attr( $tooltip ) : ''; ?>">
        
        <a href="<?php echo ! empty( $img_link ) ? esc_url( $img_link ) : ''; ?>" target="<?php echo ! empty( $target ) ? esc_attr( $target ) : ''; ?>">

            <img src="<?php echo ! empty( $lcg_img ) ? esc_url( $lcg_img ) : ''; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
            
        </a>

    </div>

</div>

      