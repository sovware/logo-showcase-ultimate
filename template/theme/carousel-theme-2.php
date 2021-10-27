
<div class="wpwax-lsu-item swiper-slide">

    <div class="wpwax-lsu-item-inner" data-bs-toggle="<?php echo ( 'yes' == $tooltip_show ) ? 'tooltip' : ''; ?>" data-bs-placement="top"
        title="<?php echo ! empty( $tooltip ) ? $tooltip : ''; ?>">
        
    <?php if ( ! empty( $img_link ) ) { ?>
        <a href="<?php echo $img_link ?>" target="<?php echo ! empty( $target ) ? $target : ''; ?>">
    <?php } ?>

            <img src="<?php echo !empty($lcg_img) ? $lcg_img : ''; ?>" alt="<?php the_title(); ?>">
            
    <?php if ( ! empty( $img_link ) ) { ?>
        </a>
    <?php } ?>

    </div>

</div>
