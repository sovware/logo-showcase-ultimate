
<div class="wpwax-lsu-item wpwax-lsu-item-bordered wpwax-lsu-item-flip-card">

<div class="wpwax-lsu-item-inner" data-bs-toggle="<?php echo ( 'yes' == $tooltip_show ) ? 'tooltip' : ''; ?>" data-bs-placement="top"
    title="<?php echo ! empty( $tooltip ) ? $tooltip : ''; ?>">
    
    <a href="<?php echo ! empty( $img_link ) ? $img_link : ''; ?>" target="<?php echo ! empty( $target ) ? $target : ''; ?>" class="wpwax-lsu-item-flip-card__front">

        <img src="<?php echo !empty($lcg_img) ? $lcg_img : ''; ?>" alt="<?php the_title(); ?>">
        
    </a>

    <div class="wpwax-lsu-item-flip-card__back">

        <h4 class="wpwax-lsu-item-flip-card__back--content"><?php the_title(); ?></h4>
        
    </div>

</div>

</div>