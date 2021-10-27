
<div class="wpwax-lsu-item">

    <div class="wpwax-lsu-item-inner">

    <?php if ( ! empty( $img_link ) ) { ?>
        <a href="<?php echo $img_link ?>" target="<?php echo ! empty( $target ) ? $target : ''; ?>">
    <?php } ?>

            <img src="<?php echo !empty($lcg_img) ? $lcg_img : ''; ?>" alt="<?php the_title(); ?>">
            
    <?php if ( ! empty( $img_link ) ) { ?>
        </a>
    <?php } ?>

    </div>

</div>
