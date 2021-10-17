<?php
defined('ABSPATH') || die('Direct access is not allow');

class Lcg_Migration
{
    public function __construct ()
    {
        add_action('admin_init', array( $this,'migrate_custom_post') );
    }

    public function migrate_custom_post() {
        
        $old_posts = get_posts( array( 'post_type'        => 'lcg_shortcode' ) );
        $update_plugin = get_option('lcg_update_plugin');

        if( empty( $update_plugin ) && ! empty( $old_posts ) ) {
            foreach( $old_posts as $old_post ) {
                $get_post_meta = get_post_meta( $old_post->ID, 'lcg_scode', true );
                $get_meta      = Lcg_Main_Class::adl_enc_unserialize( $get_post_meta );
                $new_meta      = $get_meta;
                //theme
                $carousel_theme = trim( $get_meta['c_theme'], 'c_theme');
                $grid_theme     = trim( $get_meta['g_theme'], 'g_theme');

                $new_meta['c_theme'] = 'carousel-theme-' . $carousel_theme;
                $new_meta['g_theme'] = 'grid-theme-' . $grid_theme;

                update_post_meta( $old_post->ID, 'lcg_scode', Lcg_Main_Class::adl_enc_serialize( $new_meta ) );
                
            }
           
        }

        update_option( 'lcg_update_plugin', true );

    }

   
}