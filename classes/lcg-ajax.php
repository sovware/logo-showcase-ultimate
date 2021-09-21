<?php 

 //Protect direct access
if ( ! defined( 'ABSPATH' ) ) die( 'Are you cheating??? Accessing this file directly is forbidden.' );

class Lcg_Ajax
{
	public function __construct() {

		add_action('wp_ajax_lsu_loadmore', array( $this, 'loadmore_ajax_handler') ); // wp_ajax_{action}
        add_action('wp_ajax_nopriv_lsu_loadmore', array( $this, 'loadmore_ajax_handler') );
		
    }

    function loadmore_ajax_handler(){
 
        // prepare our arguments for the query
        $args = json_decode( stripslashes( $_POST['query'] ), true );
        $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
        $args['post_status'] = 'publish';
        $id    = ! empty( isset( $_POST['id'] ) ) ? $_POST['id'] : '';
        $lcg_value = get_post_meta($id,'lcg_scode',true);

        $data_encoded   = ( !empty($lcg_value) ) ? lcg()::adl_enc_unserialize( $lcg_value ) : array();
        extract($data_encoded);
        $target				= !empty($target) ? $target : '_blank';
        $tooltip_show       = !empty($tooltip)? $tooltip : 'yes';
        $image_crop 		= !empty($image_crop) ? $image_crop : "yes";
        $image_width 		= !empty($image_width) ? $image_width : 185; // Image width for cropping
        $image_height 		= !empty($image_height) ? $image_height : 119;
        $g_theme  			= !empty($g_theme) ? $g_theme : 'grid-theme-1';
     
        // it is always better to use WP_Query but not here
        query_posts( $args );

       
     
        if( have_posts() ) :
     
            // run the loop
            while( have_posts() ): the_post();

            $tooltip  = get_post_meta( get_the_id(), 'img_tool', true );
            $img_link = get_post_meta(get_the_id(), 'img_link', true );
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
     
                // look into your theme code how the posts are inserted, but you can use your own HTML of course
                // do you remember? - my example is adapted for Twenty Seventeen theme
                include LCG_PLUGIN_DIR . 'template/theme/' . $g_theme . '.php'; 
                // for the test purposes comment the line above and uncomment the below one
                // the_title();
     
     
            endwhile;
     
        endif;
        die; // here we exit the script and even no wp_reset_query() required!
    }

	

}//end class