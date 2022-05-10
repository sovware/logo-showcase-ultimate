<?php 
if ( ! defined( 'ABSPATH' ) ) die( 'Direct access is not allow' );
class Lcg_shortcode
{
	public function __construct() {
		//shortcode hook
		add_shortcode("logo_showcase", array( $this, 'lcg_shortcode_creat' ) );
	}

	//shortcode cr

    /**
     * @param $atts
     * @param null $content
     * @return string
     */
    public function lcg_shortcode_creat($atts, $content = null ) {
		ob_start();

		extract( shortcode_atts(array(
                    'id' => "",
                ), $atts
                )
            );

		if ( empty( $id) ) {
                return esc_html__('No shortcode ID provided', 'logo-showcase-ultimate');
        }
        $this->lcg_enqueue_files();

        $lcg_value = get_post_meta($id,'lcg_scode',true);

        $data_encoded   = ( !empty($lcg_value) ) ? lcg()::adl_enc_unserialize( $lcg_value ) : array();
        extract($data_encoded);
        $rand_id            = rand();
        $cg_title 			= ! empty( $cg_title ) ? esc_attr( $cg_title ) : '';
        $cg_title_show      = ! empty( $cg_title_show ) ? esc_attr( $cg_title_show ) : 'no';
        $lcg_type 			= ! empty( $lcg_type ) ? esc_attr( $lcg_type ) : 'latest';
        $layout   			= ! empty( $layout ) ? esc_attr( $layout ) : 'carousel';
        $c_theme  			= ! empty( $c_theme ) ? esc_attr( $c_theme ) : 'carousel-theme-1';
        $g_theme  			= ! empty( $g_theme ) ? esc_attr( $g_theme ) : 'grid-theme-1';
        $image_crop 		= ! empty( $image_crop ) ? esc_attr( $image_crop ) : "yes";
		$upscale		   	= ! empty( $upscale ) ? esc_attr( $upscale ) : "yes";
        $image_width 		= ! empty( $image_width ) ? esc_attr( $image_width ) : 185; // Image width for cropping
        $image_height 		= ! empty( $image_height ) ? esc_attr( $image_height ) : 119;
        $target				= ! empty( $target ) ? esc_attr( $target ) : '_blank';
        $c1_nav             = ! empty( $c1_nav ) ? esc_attr( $c1_nav ) : 'yes';
        $tooltip_show       = ! empty( $tooltip ) ? esc_attr( $tooltip ) : 'yes';
        $c1_nav_position    = ! empty( $c1_nav_position ) ? esc_attr( $c1_nav_position ) : 'top_right';
        $c2_nav             = ! empty( $c2_nav ) ? esc_attr( $c2_nav ) : 'yes';
        $g_columns          = ! empty( $g_columns ) ? intval( esc_attr( $g_columns ) ) : 6;
        $g_columns_tablet   = ! empty( $g_columns_tablet ) ? intval( esc_attr( $g_columns_tablet ) ) : 4;
        $g_columns_mobile   = ! empty( $g_columns_mobile ) ? intval( esc_attr( $g_columns_mobile ) ) : 2;

        $c_desktop          = ! empty( $c_desktop ) ? intval( esc_attr( $c_desktop ) ) : 5;
        $c_desktop_small    = ! empty( $c_desktop_small ) ? intval( esc_attr( $c_desktop_small ) ) : 4;
        $c_tablet           = ! empty( $c_tablet ) ? intval( esc_attr( $c_tablet ) ) : 3;
        $c_mobile           = ! empty( $c_mobile ) ? intval( esc_attr( $c_mobile ) ) : 2;

        $tooltip_posi       = ! empty( $tooltip_posi ) ? esc_attr( $tooltip_posi ) : "top";
        $total_logos        = ! empty( $total_logos ) ? intval( esc_attr( $total_logos ) ) : 12;

        //carousel settings
        $navigation                  = ! empty( $navigation ) ? esc_attr( $navigation ) : 'yes';
        $carousel_pagination         = ! empty( $carousel_pagination ) ? esc_attr( $carousel_pagination ) : 'no';
        $A_play                      = ! empty( $A_play ) ? esc_attr( $A_play ) : 'yes';
        $slide_speed                 = ! empty( $slide_speed ) ? esc_attr( $slide_speed ) : '2000';
        $slide_time                  = ! empty( $slide_time ) ? intval( esc_attr( $slide_time ) ) : '2000';
        $scrool                      = ! empty( $scrool ) ? esc_attr( $scrool ) : 'per_item';
        $repeat_product              = ! empty( $repeat_product ) ? esc_attr( $repeat_product ) : 'yes';
        $stop_hover                  = ! empty( $stop_hover ) ? esc_attr( $stop_hover ) : 'yes';
        $scrol_direction             = ! empty( $scrol_direction ) ? esc_attr( $scrol_direction ) : 'left';

        $image_hover     = ! empty( $image_hover ) ? esc_attr( $image_hover ) : 'yes';

        $image_hover_effect = '';
        if( ! empty( 'yes' == $image_hover ) ) {
            $image_hover_effect = 'wpwax-lsu-hover-active';
        }
        
        if( 'carousel' == $layout ) {
            $theme = $c_theme;
        } else {
            $theme = $g_theme;
        }
        $box_shadow_class = '';
        if( 'carousel' == $layout && 'carousel-theme-3' == $theme ) {
            $box_shadow_class = 'wpwax-lsu-grid-theme-raised';
        }
        $args = array();
        $common_args = [
            'post_type' => 'lcg_mainpost',
            'posts_per_page'=> $total_logos,
            'status' => 'published',
        ];
        if ( 'latest' == $lcg_type ) { $args = $common_args; }
        elseif ('older' == $lcg_type) {
            $older_args = [
                'orderby'   => 'date',
                'order'     => 'ASC',
            ];
            $args = array_merge($common_args, $older_args);
        }else {
            $args = $common_args;
        }


        $adl_logo = new WP_Query( $args );

        if ( $adl_logo->have_posts() ) { ?>

        <?php if( 'yes' == $cg_title_show ) { ?>
        <h4 class="wpwax-lsu-title"><?php echo ! empty( $cg_title ) ? $cg_title : ''; ?></h4>
        <?php } ?>

            <div class="wpwax-lsu-ultimate <?php echo $image_hover_effect; ?> wpwax-lsu-grid wpwax-lsu-<?php echo $theme; ?> <?php echo ( 'grid' == $layout ) ? 'wpwax-lsu-logo-col-lg-' . $g_columns . ' wpwax-lsu-logo-col-md-' . $g_columns_tablet . ' wpwax-lsu-logo-col-sm-' . $g_columns_mobile . '' : 'wpwax-lsu-carousel wpwax-lsu-' . $theme . ' wpwax-lsu-carousel-nav-top'; ?> <?php echo $box_shadow_class; ?>"
            <?php if( 'carousel' == $layout ) { ?>
                data-lsu-items      = "5"
                data-lsu-margin     = "20" 
                data-lsu-loop       = "<?php echo ( 'yes' == $repeat_product ) ? 'true' : 'false'; ?>" 
                data-lsu-perslide   = "1"
                data-lsu-speed      = "<?php echo $slide_speed; ?>"
                data-lsu-autoplay   = '
                <?php if( 'yes' == $A_play ) { ?>
                {
                    "delay": "<?php echo $slide_time; ?>",
                    "pauseOnMouseEnter": <?php echo ( 'yes' == $stop_hover ) ? 'true' : 'false'; ?>,
                    "disableOnInteraction": false,
                    "stopOnLastSlide": true,
                    "reverseDirection": <?php echo ( 'left' == $scrol_direction ) ? 'false' : 'true'; ?>
                }
                <?php } else { ?>
                    false
                <?php } ?>
                '
                data-lsu-responsive ='{
                    "0": {"slidesPerView": "<?php echo $c_mobile; ?>",  "slidesPerGroup": "<?php echo 'per_item' == $scrool ? '1' : $c_mobile; ?>", "spaceBetween": "15"}, 
                    "768": {"slidesPerView": "<?php echo $c_tablet; ?>",  "slidesPerGroup": "<?php echo 'per_item' == $scrool ? '1' : $c_tablet; ?>", "spaceBetween": "15"}, 
                    "979": {"slidesPerView": "<?php echo $c_desktop_small; ?>",  "slidesPerGroup": "<?php echo 'per_item' == $scrool ? '1' : $c_desktop_small; ?>", "spaceBetween": "20"}, 
                    "1199": {"slidesPerView": "<?php echo $c_desktop; ?>",  "slidesPerGroup": "<?php echo 'per_item' == $scrool ? '1' : $c_desktop; ?>", "spaceBetween": "30"}
                }'
            <?php } ?>
            >

                <div class="<?php echo ( 'grid' == $layout ) ? 'wpwax-lsu-content' : 'swiper-wrapper'; ?>">

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

                    <?php

                    include LCG_PLUGIN_DIR . 'template/theme/' . $theme .'.php'; 

                    endwhile;
                    wp_reset_postdata();
                    ?>
        
                </div>
                <?php 
                if( 'carousel' == $layout && 'yes' == $navigation ) {
                    include LCG_PLUGIN_DIR . 'template/navigation.php'; 
                }
                if( 'carousel' == $layout && 'yes' == $carousel_pagination ) {
                    include LCG_PLUGIN_DIR . 'template/carousel-pagination.php'; 
                }
                
                ?>
            </div>

            <?php
                        
        }
		$true =  ob_get_clean();
		return $true;
	}

	//enqueue all files to shortcode
	public function lcg_enqueue_files () {
		wp_enqueue_style('lcg-style');
        wp_enqueue_style('lcg-tooltip');
        wp_enqueue_style('lcg-swiper-min-css');

		wp_enqueue_script('main-js');
        wp_enqueue_script('lcg-swiper-min-js');
        wp_enqueue_script('lcg-popper-js');
        wp_enqueue_script('lcg-tooltip-js');
	}
}