<!-- wpwax logo Carousel Theme-2  -->
<h4 class="wpwax-lsu-logo-showcase-title">Client <span class="wpwax-lsu-logo-showcase-serial">#2</span> </h4>

<div class="wpwax-lsu-logo-showcase-wrap wpwax-lsu-logo-showcase-carousel-theme-2 wpwax-lsu-logo-showcase-grid">

    <div class="wpwax-lsu-carousel wpwax-lsu-carousel-nav-around" data-lsu-items="3"
        data-lsu-margin="80" data-lsu-loop="true" data-lsu-perslide="1" data-lsu-speed="300"
        data-lsu-autoplay='{"delay": "3000", "pauseOnMouseEnter": "true", "disableOnInteraction": "false"}'
        data-lsu-responsive='{"0": {"slidesPerView": "1", "spaceBetween": "0"}, "768": {"slidesPerView": "2", "spaceBetween": "15"}, "979": {"slidesPerView": "3", "spaceBetween": "20"}, "1199": {"slidesPerView": "3", "spaceBetween": "30"}}'>
        
        <div class="swiper-wrapper">
            <?php
            while ($adl_logo->have_posts()) : $adl_logo->the_post();
                $tooltip  = get_post_meta(get_the_id(), 'img_tool', true);
                $img_link = get_post_meta(get_the_id(), 'img_link', true);
                $image_id = get_post_thumbnail_id();
                $im = wp_get_attachment_image_src($image_id, 'full', true);
                //$img = aq_resize($im[0], $image_width, $image_height,true,true, $upscale);
                $thumb = get_post_thumbnail_id();
                // crop the image if the cropping is enabled.
                if (!empty($image_crop) && 'no' != $image_crop) {
                    $lcg_img = lcg_image_cropping($thumb, $image_width, $image_height, true, 100)['url'];
                } else {
                    $aazz_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                    $lcg_img = $aazz_thumb['0'];
                }
            ?>

            <div class="wpwax-lsu-logo-showcase-item wpwax-lsu-logo-showcase-item__bordered swiper-slide">

                <div class="wpwax-lsu-logo-showcase-item-inner" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Tooltip on right">
                    
                    <a href="">

                        <img src="<?php echo !empty($lcg_img) ? $lcg_img : ''; ?>" alt="<?php the_title(); ?>">
                        
                    </a>

                </div>

            </div>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        
        </div>
    
    </div>

    <div class="wpwax-lsu-carousel-nav wpwax-lsu-carousel-nav--around">

        <div class="wpwax-lsu-carousel-nav__btn wpwax-lsu-carousel-nav__btn-round wpwax-lsu-carousel-nav__btn-prev">

            <img src="<?php echo LCG_PLUGIN_URI . 'assets/icons/arrow-left.svg'; ?>" alt="" class="wpwax-lsu-svg">

        </div>

        <div class="wpwax-lsu-carousel-nav__btn wpwax-lsu-carousel-nav__btn-round wpwax-lsu-carousel-nav__btn-next">

            <img src="<?php echo LCG_PLUGIN_URI . 'assets/icons/arrow-right.svg'; ?>" alt="" class="wpwax-lsu-svg">

        </div>

    </div>

</div>