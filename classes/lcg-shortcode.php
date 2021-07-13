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
                return esc_html__('No shortcode ID provided', LCG_TEXTDOMAIN);
        }
        $this->lcg_enqueue_files();

        $lcg_value = get_post_meta($id,'lcg_scode',true);

        $data_encoded   = ( !empty($lcg_value) ) ? lcg()::adl_enc_unserialize( $lcg_value ) : array();
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
            include LCG_PLUGIN_DIR . 'template/theme-1.php';
        }
		$true =  ob_get_clean();
		return $true;
	}

	//enqueue all files to shortcode
	public function lcg_enqueue_files () {
		wp_enqueue_style('lcg-style');
		wp_enqueue_script('main-js');
	}
}