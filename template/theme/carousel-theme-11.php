<?php 
$description = ! empty( $short_description ) ? $short_description : '';
?>
<div class="wpwax-lsu-item wpwax-lsu-item-flip-card swiper-slide">

<div class="wpwax-lsu-item-inner" data-bs-toggle="<?php echo ( 'yes' == $tooltip_show ) ? 'tooltip' : ''; ?>" data-bs-placement="<?php echo $tooltip_posi; ?>"
    title="<?php echo ! empty( $tooltip ) ? $tooltip : ''; ?>">
    
    <a href="<?php echo ! empty( $img_link ) ? $img_link : ''; ?>" target="<?php echo ! empty( $target ) ? $target : ''; ?>" class="wpwax-lsu-item-flip-card__front">

        <img src="<?php echo !empty($lcg_img) ? $lcg_img : ''; ?>" alt="<?php the_title(); ?>">
        
    </a>

    <div class="wpwax-lsu-item-flip-card__back">

        <h4 class="wpwax-lsu-item-flip-card__back--title wpwax-title"><?php echo get_the_title(); ?></h4>

        <p class="wpwax-lsu-item-flip-card__back--text"><?php echo wp_trim_words( $short_description, 8 ); ?></p>
        
    </div>

</div>

</div>