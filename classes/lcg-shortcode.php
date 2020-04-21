<?php 
if ( ! defined( 'ABSPATH' ) ) die( 'Direct access is not allow' );
class Lcg_shortcode
{
	public function __construct() {
		//shortcode hook
		add_shortcode("logo_showcase", array($this, 'lcg_shortcode_creat'));
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
                return esc_html__('No shortcode ID provided', LCG_TEXTDOMAIN);
        }
        $this->lcg_enqueue_files();

        $lcg_value = get_post_meta($id,'lcg_scode',true);

        $data_encoded   = ( !empty($lcg_value) ) ? Adl_Lcg_Main_Class::adl_enc_unserialize( $lcg_value ) : array();
        extract($data_encoded);
        $rand_id            = rand();
        $lcg_type 			= !empty($lcg_type) ? $lcg_type : 'latest';
        $layout   			= !empty($layout) ? $layout : 'carousel';
        $c_theme  			= !empty($c_theme) ? $c_theme : 'c_theme1';
        $image_crop 		= !empty($image_crop) ? $image_crop : "yes";
		$upscale		   	= !empty($upscale) ? $upscale : "yes";
        $image_width 		= !empty($image_width) ? $image_width : 185; // Image width for cropping
        $image_height 		= !empty($image_height) ? $image_height : 119;
        $target				= !empty($target) ? $target : '_blank';
        $c1_nav             = !empty($c1_nav)? $c1_nav : 'yes';
        $tooltip_show       = !empty($tooltip)? $tooltip : 'yes';
        $c1_nav_position    = !empty($c1_nav_position)? $c1_nav_position : 'top_right';
        $c2_nav             = !empty($c2_nav) ? $c2_nav : 'yes';
        $g_columns          = !empty($g_columns) ? intval($g_columns) : 6;
        $g_columns_tablet   = !empty($g_columns_tablet) ? intval($g_columns_tablet) : 4;
        $g_columns_mobile   = !empty($g_columns_mobile) ? intval($g_columns_mobile) : 2;
        $tooltip_posi       = !empty($tooltip_posi) ? $tooltip_posi : "top";
        $total_logos        = !empty($total_logos) ? intval($total_logos) : 12;

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

		    if ( $adl_logo->have_posts() ) {

                require_once 'theme/grid/tooltip.php';
		    	if( $layout == 'carousel' ) {
                    wp_enqueue_script('lcg-owl-carousel-js');
                    wp_enqueue_style('lcg-carousel-style');
		    		?>
                    <script type="text/javascript">
                        (function ($) {
                            jQuery(document).ready(function() {
                                'use strict';

                                // this object contains general option for owl carousel instances
                                var defaultOptions = {
                                    items: 5,
                                    loop: <?= (!empty( $repeat_product) && 'yes'== $repeat_product) ? 'true':'false'; ?>,
                                    autoplay: <?= (!empty( $A_play) && 'yes'== $A_play) ? 'true':'false'; ?>,
                                    autoplayHoverPause:<?= (!empty( $stop_hover) && 'true'== $stop_hover) ? 'true' : 'false' ; ?>,
                                    slideBy:<?= (!empty( $scrool) && 'true' === $scrool) ? '\'page\'' : ((!empty( $scrol_direction) && 'right'== $scrol_direction) ? -1 : 1); ?>,
                                    autoplaySpeed: <?= (!empty( $slide_speed))  ? $slide_speed : '4000' ; ?>,
                                    autoplayTimeout:<?= (!empty( $slide_time))  ? $slide_time : '2000' ; ?>,
                                    dots:<?= (!empty( $c3_pagination) && 'yes'== $c3_pagination) ? 'true' : 'false' ; ?>,
                                    margin: 30,
                                    responsive: {
                                        0 : {
                                            items:1
                                        },
                                        350: {
                                            items:<?= (!empty( $c_mobile)) ? absint( $c_mobile):2; ?>
                                        },
                                        480: {
                                            items:<?= (!empty( $c_mobile)) ? (absint( $c_mobile)+1):3; ?>
                                        },
                                        600 : {
                                            items:<?= (!empty( $c_tablet)) ? (absint( $c_tablet) - 1):3; ?>
                                        },
                                        768:{
                                            items:<?= (!empty( $c_tablet)) ? absint( $c_tablet):4; ?>
                                        },
                                        978:{
                                            items:<?= (!empty( $c_desktop_small)) ? absint( $c_desktop_small) : 4 ; ?>                          },
                                        1198:{
                                            items:<?= (!empty( $c_desktop)) ? absint( $c_desktop) : 5 ; ?>
                                        }
                                    }
                                };


                                /*@param selector is a string name of the selctor that needs to be initialized,
                                * @param specificOptions object that contains options for specific instance of owlCarousel, pass null
                                * if no additional option necessary
                                * @param prevs and next are the control selector for the specific owlcarousel instance
                                */
                                function owlInit(selector, specificOptions, prev, next) {
                                    var specificOptions = specificOptions || {},
                                        $selector = $(selector);

                                    $selector.owlCarousel(
                                        $.extend({}, defaultOptions, specificOptions)
                                    );

                                    if ((prev != 'undefined' || prev != 'null') || (next != 'undefined' || next != 'null')) {
                                        $(prev).on('click', function () {
                                            $selector.trigger('prev.owl.carousel');
                                        });
                                        $(next).on('click', function () {
                                            $selector.trigger('next.owl.carousel');
                                        });
                                    }
                                };

                                // carousel one
                                owlInit('.alc--slider<?php echo $rand_id;?>', null, '.slider--control<?php echo $rand_id;?>.icon-arrow-left', '.slider--control<?php echo $rand_id;?>.icon-arrow-right');
                            });


                        })(jQuery);

                    </script>



                    <?php
		    		if($c_theme == 'c_theme1') {
		    			require_once 'theme/carousel/theme1/style.php';
		    			?>
		    			
						<!-- Style One -->
						<div class="alc_wrapper">
						    <div class="alc_container">
						        <div class="alc_row">
						            <div class="col-md-12">
						                <div id="alc_style1">
                                            <?php
                                            if(!empty($cg_title_show) && $cg_title_show != 'no') {
                                            ?>
						                    <div class="alc_title alc_title1">
						                        <h3><?php echo !empty($cg_title) ? $cg_title : "";?></h3>
						                    </div>
						                    <?php } ?>
						                    <!-- Ends: .alc_title -->

						                    <div class="alc_slider_wrapper">
						                        <div class="alc_slider owl-carousel alc--slider<?php echo $rand_id;?>">
						                            <?php 
						                            while($adl_logo -> have_posts()) : $adl_logo->the_post();
						                            $tooltip  = get_post_meta(get_the_id(),'img_tool',true);
		    										$img_link = get_post_meta(get_the_id(),'img_link',true);
						                            $image_id = get_post_thumbnail_id();
						                            //$im = wp_get_attachment_image_src($image_id,'full',true);
						                            //$img = aq_resize($im[0], $image_width, $image_height,true,true, $upscale);
                                                    $thumb = get_post_thumbnail_id();
                                                    // crop the image if the cropping is enabled.
                                                    if (!empty($image_crop) && 'no' != $image_crop){
                                                        $lcg_img = lcg_image_cropping($thumb, $image_width, $image_height, true, 100)['url'];
                                                    }else{
                                                        $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
                                                        $lcg_img = $aazz_thumb['0'];
                                                    }
						                            ?>
                                                <div class="alc_single_slide" >
                                                    <div class="alc_item" data-toggle="tooltip" title="<?php if( !empty($tooltip) && $tooltip_show != 'no') { echo $tooltip;}?>" data-placement="<?=  $tooltip_posi;?>">
                                                        <figure>
                                                            <a <?php if(!empty($img_link)) {?>href="<?php if( !empty($img_link)) { echo $img_link;}?>" target="<?php echo $target;?>" <?php } ?>>
                                                                <img src="<?php echo $lcg_img;?>" alt="">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                </div>
                                                <?php
                                                endwhile;
                                                wp_reset_postdata();
                                                ?>
                                            </div>
                                            <?php if($c1_nav == 'yes') { ?>
						                        <div class="alc_slider_controls <?php if($c1_nav_position == 'top_right') { echo 'top_right';} else { echo 'top_left';}?>">
						                            <span class="slider_control slider_control_square slider--control<?php echo $rand_id;?> icon-arrow-left"></span>
						                            <span class="slider_control slider_control_square slider--control<?php echo $rand_id;?> icon-arrow-right"></span>
						                        </div>
                                            <?php } ?>
						                    </div>

						                </div>
						            </div>
						        </div>
						    </div>

						</div>
						<!-- Ends: alc_wrapper -->

		    			<?php
		    		}elseif($c_theme == 'c_theme2') {
                        require_once 'theme/carousel/theme2/style2.php';
		    		    ?>
                        <!-- Style Two -->
                        <div class="alc_wrapper">
                            <div class="alc_container">
                                <div class="alc_row">
                                    <div class="col-md-12">
                                        <div id="alc_style2">
                                            <?php
                                            if(!empty($cg_title_show) && $cg_title_show != 'no') {
                                                ?>
                                                <div class="alc_title">
                                                    <h3><?php echo !empty($cg_title) ? $cg_title : "";?></h3>
                                                </div>
                                            <?php } ?>

                                            <div class="alc_slider_wrapper">
                                                <div class="alc_slider owl-carousel alc--slider<?php echo $rand_id;?>">
                                                    <?php
                                                    while($adl_logo -> have_posts()) : $adl_logo->the_post();
                                                    $tooltip  = get_post_meta(get_the_id(),'img_tool',true);
                                                    $img_link = get_post_meta(get_the_id(),'img_link',true);
                                                    $image_id = get_post_thumbnail_id();
                                                    $im = wp_get_attachment_image_src($image_id,'full',true);
                                                    //$img = aq_resize($im[0], $image_width, $image_height,true,true, $upscale);
                                                    $thumb = get_post_thumbnail_id();
                                                    // crop the image if the cropping is enabled.
                                                    if (!empty($image_crop) && 'no' != $image_crop){
                                                        $lcg_img = lcg_image_cropping($thumb, $image_width, $image_height, true, 100)['url'];
                                                    }else{
                                                        $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
                                                        $lcg_img = $aazz_thumb['0'];
                                                    }
                                                    ?>
                                                    <div class="alc_single_slide">
                                                        <div class="alc_item" data-toggle="tooltip" title="<?php if( !empty($tooltip) && $tooltip_show != 'no') { echo $tooltip;}?>" data-placement="<?=  $tooltip_posi;?>">
                                                            <figure>
                                                                <a <?php if(!empty($img_link)) {?>href="<?php if( !empty($img_link)) { echo $img_link;}?>" target="<?php echo $target;?>" <?php } ?>>
                                                                    <img src="<?php echo $lcg_img;?>" alt="">
                                                                </a>
                                                            </figure>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    endwhile;
                                                    wp_reset_postdata();
                                                    ?>
                                                </div>

                                            <?php if($c2_nav == 'yes') { ?>
                                                <div class="alc_slider_controls">
                                                    <span class="slider_control slider_control_square slider--control<?php echo $rand_id;?> icon-arrow-left"></span>
                                                    <span class="slider_control slider_control_square slider--control<?php echo $rand_id;?> icon-arrow-right"></span>
                                                </div>
                                            <?php } ?>
                                            </div>
                                            <!-- Ends: .alc_slider_wrapper -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Ends: alc_container -->
                        </div>
                        <!-- Ends: alc_wrapper -->
		    	<?php	}elseif($c_theme == 'c_theme3') {
                        require_once 'theme/carousel/theme3/style3.php';
		    		    ?>
                        <!-- Style Eleven -->
                        <div class="alc_wrapper">
                            <div class="alc_container">
                                <div class="alc_row">
                                    <div class="col-md-12">
                                        <div id="alc_style11">
                                            <?php
                                            if(!empty($cg_title_show) && $cg_title_show != 'no') {
                                                ?>
                                                <div class="alc_title alc_title11">
                                                    <h3><?php echo !empty($cg_title) ? $cg_title : "";?></h3>
                                                </div>
                                            <?php } ?>
                                            <!-- Ends: .alc_title -->

                                            <div class="alc_slider_wrapper">
                                                <div class="alc_slider owl-carousel alc--slider<?php echo $rand_id;?>">
                                                    <?php
                                                    while($adl_logo -> have_posts()) : $adl_logo->the_post();
                                                    $tooltip  = get_post_meta(get_the_id(),'img_tool',true);
                                                    $img_link = get_post_meta(get_the_id(),'img_link',true);
                                                    $image_id = get_post_thumbnail_id();
                                                    $im = wp_get_attachment_image_src($image_id,'full',true);
                                                    //$img = aq_resize($im[0], $image_width, $image_height,true,true, $upscale);
                                                    $thumb = get_post_thumbnail_id();
                                                    // crop the image if the cropping is enabled.
                                                    if (!empty($image_crop) && 'no' != $image_crop){
                                                        $lcg_img = lcg_image_cropping($thumb, $image_width, $image_height, true, 100)['url'];
                                                    }else{
                                                        $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
                                                        $lcg_img = $aazz_thumb['0'];
                                                    }
                                                    ?>
                                                    <div class="alc_single_slide">
                                                        <div class="alc_item" data-toggle="tooltip" title="<?php if( !empty($tooltip) && $tooltip_show != 'no') { echo $tooltip;}?>" data-placement="<?=  $tooltip_posi;?>">
                                                            <figure>
                                                                <a <?php if(!empty($img_link)) {?>href="<?php if( !empty($img_link)) { echo $img_link;}?>" target="<?php echo $target;?>" <?php } ?>>
                                                                    <img src="<?php echo $lcg_img;?>" alt="">
                                                                </a>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <!-- Ends: .alc_single_slide -->
                                                    <?php
                                                    endwhile;
                                                    wp_reset_postdata();
                                                    ?>
                                                </div>
                                                <!-- Ends: .alc_slider -->
                                            </div>
                                            <!-- Ends: .alc_slider_wrapper -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Ends: alc_container -->
                        </div>
                        <!-- Ends: alc_wrapper -->
                   <?php }
		    	} elseif( $layout == 'grid' ) {
                    if($g_theme == 'g_theme1') {
                        require_once 'theme/grid/theme1.php';
                        ?>
                        <!-- Style #14 -->
                        <div class="alc_wrapper">
                            <div class="alc_container">
                                <div class="alc_row">
                                    <div class="col-md-12">
                                        <div id="alc_style14">
                                            <?php
                                            if(!empty($cg_title_show) && $cg_title_show != 'no') {
                                                ?>
                                                <div class="alc_title">
                                                    <h3><?php echo !empty($cg_title) ? $cg_title : "";?></h3>
                                                </div>
                                            <?php } ?>
                                            <!-- Ends: .alc_title -->

                                            <div class="alc_grid_wrapper">
                                                <?php
                                                while($adl_logo -> have_posts()) : $adl_logo->the_post();
                                                $tooltip  = get_post_meta(get_the_id(),'img_tool',true);
                                                $img_link = get_post_meta(get_the_id(),'img_link',true);
                                                $image_id = get_post_thumbnail_id();
                                                $im = wp_get_attachment_image_src($image_id,'full',true);
                                                //$img = aq_resize($im[0], $image_width, $image_height,true,true, $upscale);
                                                $thumb = get_post_thumbnail_id();
                                                // crop the image if the cropping is enabled.
                                                if (!empty($image_crop) && 'no' != $image_crop){
                                                    $lcg_img = lcg_image_cropping($thumb, $image_width, $image_height, true, 100)['url'];
                                                }else{
                                                    $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
                                                    $lcg_img = $aazz_thumb['0'];
                                                }
                                                ?>
                                                <div class="alc_single_grid-<?=  $g_columns;?> alc_column_tab-<?=  $g_columns_tablet;?> alc_column_mobile-<?= $g_columns_mobile;?>" data-toggle="tooltip" title="<?php if( !empty($tooltip) && $tooltip_show != 'no') { echo $tooltip;}?>" data-placement="<?=  $tooltip_posi;?>">
                                                    <div class="alc_item">
                                                        <figure>
                                                            <a <?php if(!empty($img_link)) {?>href="<?php if( !empty($img_link)) { echo $img_link;}?>" target="<?php echo $target;?>" <?php } ?>>
                                                                <img src="<?php echo $lcg_img;?>" alt="">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                </div>
                                                <!-- Ends: .alc_single_grid -->
                                                <?php
                                                endwhile;
                                                wp_reset_postdata();
                                                ?>
                                            </div>
                                            <!-- Ends: .alc_slider -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Ends: alc_container -->
                        </div>
                        <!-- Ends: alc_wrapper -->

                        <?php
                    }elseif($g_theme == 'g_theme2') {
                        require_once 'theme/grid/theme2.php';
                        ?>
                        <!-- Style #15 -->
                        <div class="alc_wrapper">
                            <div class="alc_container">
                                <div class="alc_row">
                                    <div class="col-md-12">
                                        <div id="alc_style15">
                                            <?php
                                            if(!empty($cg_title_show) && $cg_title_show != 'no') {
                                                ?>
                                                <div class="alc_title">
                                                    <h3><?php echo !empty($cg_title) ? $cg_title : "";?></h3>
                                                </div>
                                            <?php } ?>
                                            <!-- Ends: .alc_title -->

                                            <div class="alc_grid_wrapper">
                                                    <?php
                                                    while($adl_logo -> have_posts()) : $adl_logo->the_post();
                                                    $tooltip  = get_post_meta(get_the_id(),'img_tool',true);
                                                    $img_link = get_post_meta(get_the_id(),'img_link',true);
                                                    $image_id = get_post_thumbnail_id();
                                                    $im = wp_get_attachment_image_src($image_id,'full',true);
                                                    //$img = aq_resize($im[0], $image_width, $image_height,true,true, $upscale);
                                                    $thumb = get_post_thumbnail_id();
                                                    // crop the image if the cropping is enabled.
                                                    if (!empty($image_crop) && 'no' != $image_crop){
                                                        $lcg_img = lcg_image_cropping($thumb, $image_width, $image_height, true, 100)['url'];
                                                    }else{
                                                        $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
                                                        $lcg_img = $aazz_thumb['0'];
                                                    }
                                                    ?>
                                                    <div class="alc_single_grid-<?=  $g_columns;?> alc_column_tab-<?=  $g_columns_tablet;?> alc_column_mobile-<?= $g_columns_mobile;?>">
                                                    <div class="alc_item" data-toggle="tooltip" title="<?php if( !empty($tooltip) && $tooltip_show != 'no') { echo $tooltip;}?>" data-placement="<?=  $tooltip_posi;?>">
                                                        <figure>
                                                            <a <?php if(!empty($img_link)) {?>href="<?php if( !empty($img_link)) { echo $img_link;}?>" target="<?php echo $target;?>" <?php } ?>>
                                                                <img src="<?php echo $lcg_img;?>" alt="">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                </div>
                                                <!-- Ends: .alc_single_grid -->
                                                <?php
                                                endwhile;
                                                wp_reset_postdata();
                                                ?>
                                            </div>
                                            <!-- Ends: .alc_slider -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Ends: alc_container -->
                        </div>
                        <!-- Ends: alc_wrapper -->
                        <?php
                    }elseif($g_theme == 'g_theme3') {
                        require_once 'theme/grid/theme3.php';
                        ?>
                        <!-- Style #16 -->
                        <div class="alc_wrapper">
                            <div class="alc_container">
                                <div class="alc_row">
                                    <div class="col-md-12">
                                        <div id="alc_style16">
                                            <?php
                                            if(!empty($cg_title_show) && $cg_title_show != 'no') {
                                                ?>
                                                <div class="alc_title">
                                                    <h3><?php echo !empty($cg_title) ? $cg_title : "";?></h3>
                                                </div>
                                            <?php } ?>
                                            <!-- Ends: .alc_title -->

                                            <div class="alc_grid_wrapper">
                                                <?php
                                                while($adl_logo -> have_posts()) : $adl_logo->the_post();
                                                $tooltip  = get_post_meta(get_the_id(),'img_tool',true);
                                                $img_link = get_post_meta(get_the_id(),'img_link',true);
                                                $image_id = get_post_thumbnail_id();
                                                $im = wp_get_attachment_image_src($image_id,'full',true);
                                                //$img = aq_resize($im[0], $image_width, $image_height,true,true, $upscale);
                                                $thumb = get_post_thumbnail_id();
                                                // crop the image if the cropping is enabled.
                                                if (!empty($image_crop) && 'no' != $image_crop){
                                                    $lcg_img = lcg_image_cropping($thumb, $image_width, $image_height, true, 100)['url'];
                                                }else{
                                                    $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
                                                    $lcg_img = $aazz_thumb['0'];
                                                }
                                                ?>
                                               <div class="alc_single_grid-<?=  $g_columns;?> alc_column_tab-<?=  $g_columns_tablet;?> alc_column_mobile-<?= $g_columns_mobile;?> alc-margin-right" data-toggle="tooltip" title="<?php if( !empty($tooltip) && $tooltip_show != 'no') { echo $tooltip;}?>" data-placement="<?=  $tooltip_posi;?>">
                                                    <div class="alc_item">
                                                        <figure>
                                                            <a <?php if(!empty($img_link)) {?>href="<?php if( !empty($img_link)) { echo $img_link;}?>" target="<?php echo $target;?>" <?php } ?>>
                                                                <img src="<?php echo $lcg_img;?>" alt="">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                </div>
                                                <!-- Ends: .alc_single_grid -->
                                               <?php
                                               endwhile;
                                               wp_reset_postdata();
                                               ?>

                                            </div>
                                            <!-- Ends: .alc_slider -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Ends: alc_container -->
                        </div>
                        <!-- Ends: alc_wrapper -->
                        <?php
                    }

		    	}

		    } // end $adl_logo

		$true =  ob_get_clean();
		return $true;
	}

	//enqueue all files to shortcode
	public function lcg_enqueue_files () {
		wp_enqueue_style('lcg-animate-style');
		wp_enqueue_style('lcg-responsive');
		wp_enqueue_style('lcg-icons');
		wp_enqueue_style('lcg-theme');
		wp_enqueue_style('lcg-tooltip');
		wp_enqueue_style('lcg-style');


		wp_enqueue_script('lcg-popper-min-js');
		wp_enqueue_script('lcg-tooltip-js');
		wp_enqueue_script('lcg-util-js');
		wp_enqueue_script('main-js');
	}
}