<?php
defined('ABSPATH') || die('Direct access is not allow');

class Lcg_Migration
{
    public function __construct ()
    {
        add_action('admin_init', array( $this,'migrate_custom_post') );
    }

    public function migrate_custom_post() {
        
        $old_logos = get_posts( array( 'post_type'        => 'lcg_mainpost_pro' ) );
        $old_posts = get_posts( array( 'post_type'        => 'lcg_shortcode_pro' ) );
        $update_plugin = get_option('lcg_update_plugin');

        if( empty( $update_plugin ) && ! empty( $old_logos ) ) {

            foreach( $old_logos as $old_logo ) {

                $get_img_link  = get_post_meta( $old_logo->ID, 'uls_img_link', true );
                $get_img_tool  = get_post_meta( $old_logo->ID, 'uls_img_tool', true );
                $get_short_description  = get_post_meta( $old_logo->ID, 'uls_short_description', true );

                $create_logo = wp_insert_post( array( 
                    'ID'         => $old_logo->ID,
                    'post_type'  => 'lcg_mainpost',
                    'post_title' => $old_logo->post_title,
                    'post_status' => 'publish',
                ) );

                if( $create_logo ) {
                    update_post_meta( $old_logo->ID, 'img_link', $get_img_link );
                    update_post_meta( $old_logo->ID, 'img_tool', $get_img_tool );
                    update_post_meta( $old_logo->ID, 'short_description', $get_short_description );
                }

            }

        }

        if( empty( $update_plugin ) && ! empty( $old_posts ) ) {
            foreach( $old_posts as $old_post ) {
                $get_post_meta = get_post_meta( $old_post->ID, 'lcgp_scode', true );
                $get_meta      = Lcg_Main_Class_Pro::adl_enc_unserialize( $get_post_meta );
                $new_meta      = $get_meta;
                //theme
                $carousel_theme = trim( $get_meta['c_theme'], 'c_theme');
                $grid_theme     = trim( $get_meta['g_theme'], 'g_theme');

                $new_meta['c_theme'] = 'carousel-theme-' . $carousel_theme;
                $new_meta['g_theme'] = 'grid-theme-' . $grid_theme;

                //navigation 
                if( 'c_theme1' == $get_meta['c_theme'] || 'c_theme2' == $get_meta['c_theme'] || 'c_theme7' == $get_meta['c_theme'] || 'c_theme8' == $get_meta['c_theme'] || 'c_theme9' == $get_meta['c_theme'] || 'c_theme10' == $get_meta['c_theme'] || 'c_theme11' == $get_meta['c_theme'] || 'c_theme12' == $get_meta['c_theme'] || 'c_theme13' == $get_meta['c_theme'] || 'c_theme14' == $get_meta['c_theme'] ) {

                    $c_theme                            =  trim( $get_meta['c_theme'], 'c_theme' );
                    $new_meta['navigation']             =  $get_meta['c' . $c_theme . '_nav'];
                    $new_meta['navarro_color']          =  $get_meta['c' . $c_theme . '_navarro_color'];
                    $new_meta['nav_background']         =  $get_meta['c' . $c_theme . '_nav_background'];
                    $new_meta['nav_border']             =  $get_meta['c' . $c_theme . '_nav_border'];
                    $new_meta['nav_hov_arrow_color']    =  $get_meta['c' . $c_theme . '_nav_hov_arrow_color'];
                    $new_meta['nav_hov_back_color']     =  $get_meta['c' . $c_theme . '_nav_hov_back_color'];
                    $new_meta['nav_hov_border_color']   =  $get_meta['c' . $c_theme . '_nav_hov_border_color'];
                    
                }

                $create_post = wp_insert_post( array( 
                    'ID'         => $old_post->ID,
                    'post_type'  => 'lcg_shortcode',
                    'post_title' => $old_post->post_title,
                    'post_status' => 'publish',
                ) );
                
                if( $create_post ) {
                    update_post_meta( $old_post->ID, 'lcg_scode', Lcg_Main_Class_Pro::adl_enc_serialize( $new_meta ) );
                }
                
            }
           
            
        }

        update_option( 'lcg_update_plugin', true );

    }

   
}