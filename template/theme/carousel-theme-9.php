<div class="wpwax-lsu-item swiper-slide">

    <div class="wpwax-lsu-item-inner" data-bs-toggle="<?php echo ( 'yes' == $tooltip_show ) ? 'tooltip' : ''; ?>" data-bs-placement="<?php echo $tooltip_posi; ?>"
        title="<?php echo ! empty( $tooltip ) ? $tooltip : ''; ?>">
        
        <a href="<?php echo ! empty( $img_link ) ? $img_link : ''; ?>" target="<?php echo ! empty( $target ) ? $target : ''; ?>">
            
            <img src="<?php echo !empty($lcg_img) ? $lcg_img : ''; ?>" alt="<?php the_title(); ?>">
        
        </a>

        <span class="wpwax-lsu-item-content wpwax-title"><?php the_title(); ?></span>
        
    </div>

</div>