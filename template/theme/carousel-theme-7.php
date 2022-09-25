<div class="wpwax-lsu-item wpwax-lsu-item-bordered swiper-slide">

    <div class="wpwax-lsu-item-inner">

        <a href="<?php echo ! empty( $img_link ) ? $img_link : ''; ?>" target="<?php echo ! empty( $target ) ? $target : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="<?php echo $tooltip_posi; ?>" title="<?php echo ! empty( $tooltip ) ? $tooltip : ''; ?>">

            <img src="<?php echo !empty($lcg_img) ? $lcg_img : ''; ?>" alt="<?php the_title(); ?>">
            
        </a>

        <div class="wpwax-lsu-item-content">

            <p class="wpwax-title"><?php echo get_the_title(); ?></p>
            
        </div>

    </div>

</div>