<?php 
/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Lcg_shortcode {

	public function __construct () {
		//shortcode hook
		add_shortcode("logo_showcase", array( $this, 'shortcode_create' ) );
	}

    /**
     * @param $atts
     * @param null $content
     * @return string
     */
    public function shortcode_create( $atts, $content = null ) {
		ob_start();

        $atts = shortcode_atts( array(
            'id'    =>  '',
            'layout'            => "",
            'cg_title_show'     => "",
            'cg_title'          => "",
            'header_position'   => "",
            'lcg_type'          => "",
            'total_logos'       => "",
            'c_theme'           => "",
            'auto_play'         => "",
            'repeat_product'    => "",
            'stop_hover'        => "",
            'c_desktop'         => "",
            'c_desktop_small'   => "",
            'c_tablet'          => "",
            'c_mobile'          => "",
            'slide_speed'       => "",
            'slide_time'        => "",
            'scrol_direction'   => "",
            'navigation'        => "",
            'nav_position'       => "",
            'carousel_pagination'  => "",
            'g_theme'           => "",
            'g_columns'         => "",
            'g_columns_tablet'  => "",
            'g_columns_mobile'  => "",
            'image_crop'         => "",
            'image_width'        => "",
            'image_height'       => "",
            'target'             => "",
            'image_hover'        => "",
            'tooltip' => "",
        ), $atts );
        
        

        $this->lcg_enqueue_files();
        $post_id =  ! empty( $atts['id'] ) ? $atts['id'] : '';
        $lcg_value = get_post_meta( $post_id, 'lcg_scode', true );

        $data_encoded   = ( !empty($lcg_value) ) ? lcg()::json_decoded( $lcg_value ) : array();
        extract( $data_encoded );
        $rand_id            = rand();
        $cg_title 			= ! empty( $cg_title ) ? $cg_title : '';
        $cg_title_show      = ! empty( $cg_title_show ) ? $cg_title_show : 'no';
        $lcg_type 			= ! empty( $lcg_type ) ? $lcg_type : 'latest';
        $layout   			= ! empty( $layout ) ? $layout : 'carousel';
        $c_theme  			= ! empty( $c_theme ) ? $c_theme : 'carousel-theme-1';
        $g_theme  			= ! empty( $g_theme ) ? $g_theme : 'grid-theme-1';
        $image_crop 		= ! empty( $image_crop ) ? $image_crop : "yes";
		$upscale		   	= ! empty( $upscale ) ? $upscale : "yes";
        $image_width 		= ! empty( $image_width ) ? $image_width : 185; // Image width for cropping
        $image_height 		= ! empty( $image_height ) ? $image_height : 119;
        $target				= ! empty( $target ) ? $target : '_blank';
        $c1_nav             = ! empty( $c1_nav ) ? $c1_nav : 'yes';
        $tooltip_show       = ! empty( $tooltip ) ? $tooltip : 'yes';
        $c1_nav_position    = ! empty( $c1_nav_position ) ? $c1_nav_position : 'top_right';
        $c2_nav             = ! empty( $c2_nav ) ? $c2_nav : 'yes';
        $g_columns          = ! empty( $g_columns ) ? intval( $g_columns ) : 6;
        $g_columns_tablet   = ! empty( $g_columns_tablet ) ? intval( $g_columns_tablet ) : 4;
        $g_columns_mobile   = ! empty( $g_columns_mobile ) ? intval( $g_columns_mobile ) : 2;

        $c_desktop          = ! empty( $c_desktop ) ? intval( $c_desktop ) : 5;
        $c_desktop_small    = ! empty( $c_desktop_small ) ? intval( $c_desktop_small ) : 4;
        $c_tablet           = ! empty( $c_tablet ) ? intval( $c_tablet ) : 3;
        $c_mobile           = ! empty( $c_mobile ) ? intval( $c_mobile ) : 2;

        $tooltip_posi       = ! empty( $tooltip_posi ) ? $tooltip_posi : "top";
        $total_logos        = ! empty( $total_logos ) ? intval( $total_logos ) : 12;

        //carousel settings
        $navigation                  = ! empty( $navigation ) ? $navigation : 'yes';
        $carousel_pagination         = ! empty( $carousel_pagination ) ? $carousel_pagination : 'no';
        $A_play                      = ! empty( $A_play ) ? $A_play : 'yes';
        $slide_speed                 = ! empty( $slide_speed ) ? $slide_speed : '2000';
        $slide_time                  = ! empty( $slide_time ) ? intval( $slide_time ) : '2000';
        $scrool                      = ! empty( $scrool ) ? $scrool : 'per_item';
        $repeat_product              = ! empty( $repeat_product ) ? $repeat_product : 'yes';
        $stop_hover                  = ! empty( $stop_hover ) ? $stop_hover : 'yes';
        $scrol_direction             = ! empty( $scrol_direction ) ? $scrol_direction : 'left';

        $image_hover     = ! empty( $image_hover ) ? $image_hover : 'yes';

        // shortcode $atts 
        $layout             			  = ! empty( $atts['layout'] ) ? $atts['layout'] : $layout;
        $cg_title_show              	  = ! empty( $atts['cg_title_show'] ) ? $atts['cg_title_show'] : $cg_title_show;
        $cg_title                         = ! empty( $atts['cg_title'] ) ? $atts['cg_title'] : $cg_title;
        $header_position 	   			  = ! empty( $atts['header_position'] ) ? $atts['header_position'] : 'middle';
        $lcg_type             		      = ! empty( $atts['lcg_type'] ) ? $atts['lcg_type'] : $lcg_type;
        $total_logos             		  = ! empty( $atts['total_logos'] ) ? $atts['total_logos'] : $total_logos;
        $c_theme             		      = ! empty( $atts['c_theme'] ) ? $atts['c_theme'] : $c_theme;
        $A_play             		      = ! empty( $atts['auto_play'] ) ? $atts['auto_play'] : $A_play;
        $repeat_product             	  = ! empty( $atts['repeat_product'] ) ? $atts['repeat_product'] : $repeat_product;
        $stop_hover             		  = ! empty( $atts['stop_hover'] ) ? $atts['stop_hover'] : $stop_hover;
        $c_desktop             		      = ! empty( $atts['c_desktop'] ) ? $atts['c_desktop'] : $c_desktop;
        $c_desktop_small             	  = ! empty( $atts['c_desktop_small'] ) ? $atts['c_desktop_small'] : $c_desktop_small;
        $c_tablet             		      = ! empty( $atts['c_tablet'] ) ? $atts['c_tablet'] : $c_tablet;
        $c_mobile             		      = ! empty( $atts['c_mobile'] ) ? $atts['c_mobile'] : $c_mobile;
        $slide_speed             		  = ! empty( $atts['slide_speed'] ) ? $atts['slide_speed'] : $slide_speed;
        $slide_time             		  = ! empty( $atts['slide_time'] ) ? $atts['slide_time'] : $slide_time;
        $scrol_direction             	  = ! empty( $atts['scrol_direction'] ) ? $atts['scrol_direction'] : $scrol_direction;
        $navigation             		  = ! empty( $atts['navigation'] ) ? $atts['navigation'] : $navigation;
        $carousel_pagination              = ! empty( $atts['carousel_pagination'] ) ? $atts['carousel_pagination'] : $carousel_pagination;
        $g_theme                            = ! empty( $atts['g_theme'] ) ? $atts['g_theme'] : $g_theme;
        $g_columns                          = ! empty( $atts['g_columns'] ) ? $atts['g_columns'] : $g_columns;
        $g_columns_tablet                   = ! empty( $atts['g_columns_tablet'] ) ? $atts['g_columns_tablet'] : $g_columns_tablet;
        $g_columns_mobile                   = ! empty( $atts['g_columns_mobile'] ) ? $atts['g_columns_mobile'] : $g_columns_mobile;
        $image_crop                         = ! empty( $atts['image_crop'] ) ? $atts['image_crop'] : $image_crop;
        $image_width                        = ! empty( $atts['image_width'] ) ? $atts['image_width'] : $image_width;
        $image_height                       = ! empty( $atts['image_height'] ) ? $atts['image_height'] : $image_height;
        $image_hover                        = ! empty( $atts['image_hover'] ) ? $atts['image_hover'] : $image_hover;
        $target                             = ! empty( $atts['target'] ) ? $atts['target'] : $target;
        $tooltip_show                       = ! empty( $atts['tooltip'] ) ? $atts['tooltip'] : $tooltip_show;

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

        $header_class = "";
        if( 'left' == $header_position ) {
            $header_class = 'wpwax-lsu-title--left';
        } elseif( 'right' == $header_position ) {
            $header_class = 'wpwax-lsu-title--right';
        }
        

        if ( $adl_logo->have_posts() ) { ?>

        <?php if( 'yes' == $cg_title_show ) { ?>
        <h4 class="wpwax-lsu-title <?php echo $header_class; ?>"><?php echo ! empty( $cg_title ) ? esc_html( stripslashes( wp_unslash( $cg_title ) ) ) : ''; ?></h4>
        <?php } ?>

            <div class="wpwax-lsu-ultimate <?php echo esc_attr( $image_hover_effect ); ?> wpwax-lsu-grid wpwax-lsu-<?php echo esc_attr( $theme ); ?> <?php echo ( 'grid' == $layout ) ? 'wpwax-lsu-logo-col-lg-' . esc_attr( $g_columns ) . ' wpwax-lsu-logo-col-md-' . esc_attr( $g_columns_tablet ) . ' wpwax-lsu-logo-col-sm-' . esc_attr( $g_columns_mobile ) . '' : 'wpwax-lsu-carousel wpwax-lsu-' . esc_attr( $theme ) . ' wpwax-lsu-carousel-nav-around'; ?> <?php echo esc_attr( $box_shadow_class ); ?>"
            <?php if( 'carousel' == $layout ) { ?>
                data-lsu-items      = "5"
                data-lsu-margin     = "20" 
                data-lsu-loop       = "<?php echo ( 'yes' == $repeat_product ) ? 'true' : 'false'; ?>" 
                data-lsu-perslide   = "1"
                data-lsu-speed      = "<?php echo esc_attr( $slide_speed ); ?>"
                data-lsu-autoplay   = '
                <?php if( 'yes' == $A_play ) { ?>
                {
                    "delay": "<?php echo esc_attr( $slide_time ); ?>",
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
                    "0": {"slidesPerView": "<?php echo esc_js( $c_mobile ); ?>",  "slidesPerGroup": "<?php echo 'per_item' == $scrool ? '1' : esc_js( $c_mobile ); ?>", "spaceBetween": "15"}, 
                    "768": {"slidesPerView": "<?php echo esc_js( $c_tablet ); ?>",  "slidesPerGroup": "<?php echo 'per_item' == $scrool ? '1' : esc_js( $c_tablet ); ?>", "spaceBetween": "15"}, 
                    "979": {"slidesPerView": "<?php echo esc_js( $c_desktop_small ); ?>",  "slidesPerGroup": "<?php echo 'per_item' == $scrool ? '1' : esc_js( $c_desktop_small ); ?>", "spaceBetween": "20"}, 
                    "1199": {"slidesPerView": "<?php echo esc_js( $c_desktop ); ?>",  "slidesPerGroup": "<?php echo 'per_item' == $scrool ? '1' : esc_js( $c_desktop ); ?>", "spaceBetween": "30"}
                }'
            <?php } ?>
            >

                <div class="<?php echo ( 'grid' == $layout ) ? 'wpwax-lsu-content' : 'swiper-wrapper'; ?>">

                    <?php
                    while( $adl_logo->have_posts() ) : $adl_logo->the_post();
                        $tooltip  = get_post_meta( get_the_id(), 'img_tool', true );
                        $img_link = get_post_meta( get_the_id(), 'img_link', true );
                        $image_id = get_post_thumbnail_id();
                        $im = wp_get_attachment_image_src( $image_id, 'full', true );
                        //$img = aq_resize($im[0], $image_width, $image_height,true,true, $upscale);
                        $thumb = get_post_thumbnail_id();
                        // crop the image if the cropping is enabled.
                        if ( ! empty( $image_crop ) && 'no' != $image_crop ) {
                            $lcg_img = lcg_image_cropping( $thumb, $image_width, $image_height, true, 100 )['url'];
                        } else {
                            $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                            $lcg_img = is_array( $aazz_thumb ) ? $aazz_thumb['0'] : array();
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
		wp_enqueue_style( 'lcg-style' );
        wp_enqueue_style( 'lcg-tooltip' );
        wp_enqueue_style( 'lcg-swiper-min-css' );

		wp_enqueue_script( 'main-js' );
        wp_enqueue_script( 'lcg-swiper-min-js' );
        wp_enqueue_script( 'lcg-popper-js' );
        wp_enqueue_script( 'lcg-tooltip-js' );
	}
}