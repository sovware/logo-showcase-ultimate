<div class="wpwax-lsu-item wpwax-lsu-item-bordered swiper-slide">

    <div class="wpwax-lsu-item-inner wpwax-lsu-item-inner--zoom-in" data-bs-toggle="<?php echo ( 'yes' == $tooltip_show ) ? 'tooltip' : ''; ?>" data-bs-placement="<?php echo $tooltip_posi; ?>"
        title="<?php echo ! empty( $tooltip ) ? $tooltip : ''; ?>">
        <!--    
            Zoom In: wpwax-lsu-item-inner--zoom-in
            Zoom Out: wpwax-lsu-item-inner--zoom-out
            Blur In: wpwax-lsu-item-inner--blur-in
            Blur Out: wpwax-lsu-item-inner--blur-out
            Grayscale In: wpwax-lsu-item-inner--grayscale-in
            Grayscale Out: wpwax-lsu-item-inner--grayscale-out
        -->
        
        <a href="<?php echo ! empty( $img_link ) ? $img_link : ''; ?>" target="<?php echo ! empty( $target ) ? $target : ''; ?>">

            <img src="<?php echo !empty($lcg_img) ? $lcg_img : ''; ?>" alt="<?php the_title(); ?>">
            
        </a>

    </div>

</div>