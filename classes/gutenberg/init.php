<?php 

if( ! defined( 'ABSPATH' ) ) : exit(); endif; // No direct access allowed

function lcg_register_block() {

    wp_enqueue_script( 
        'lcg-gutenberg-js', 
        LCG_PLUGIN_URI . 'build/index.js', 
        [
        'wp-block-editor', 
        'wp-blocks', 
        'wp-components', 
        'wp-element', 
        'wp-i18n', 
        'wp-server-side-render'
        ] 
    );

    $attributes = lcg_get_attributes_from_metadata( trailingslashit( __DIR__ ) );

    register_block_type(
        'lcg/block',
        [
            'style'           => 'lcg-main',
            'editor_script'   => 'lcg-gutenberg-js',
            'api_version'     => 2,
            'attributes'      => $attributes,
            'render_callback' => 'lcg_render_callback'
        ]
    );
}

function lcg_render_callback( $attributes ) {
    $attributes['cg_title_show']            = ! empty( $attributes['cg_title_show'] ) ? 'yes' : 'no';
    $attributes['auto_play']                = ! empty( $attributes['auto_play'] ) ? 'yes' : 'no';
    $attributes['repeat_product']           = ! empty( $attributes['repeat_product'] ) ? 'yes' : 'no';
    $attributes['stop_hover']               = ! empty( $attributes['stop_hover'] ) ? 'yes' : 'no';
    $attributes['marquee']                  = ! empty( $attributes['marquee'] ) ? 'yes' : 'no';
    $attributes['navigation']               = ! empty( $attributes['navigation'] ) ? 'yes' : 'no';
    $attributes['carousel_pagination']      = ! empty( $attributes['carousel_pagination'] ) ? 'yes' : 'no';
    $attributes['grid_pagination']          = ! empty( $attributes['grid_pagination'] ) ? 'yes' : 'no';
    $attributes['image_crop']               = ! empty( $attributes['image_crop'] ) ? 'yes' : 'no';
    $attributes['image_hover']              = ! empty( $attributes['image_hover'] ) ? 'yes' : 'no';

    return lcg_run_shortcode( 'logo_showcase', $attributes );
    
}

function lcg_get_attributes_from_metadata( $file_or_folder ) {
	$filename      = 'attributes.json';
	$metadata_file = ( substr( $file_or_folder, -strlen( $filename ) ) !== $filename ) ?
		trailingslashit( $file_or_folder ) . $filename :
		$file_or_folder;

	if ( ! file_exists( $metadata_file ) ) {
		return [];
	}

	$metadata = json_decode( file_get_contents( $metadata_file ), true );

	if ( empty( $metadata ) || ! is_array( $metadata )  ) {
		return [];
	}

	return $metadata;
}

function lcg_run_shortcode( $shortcode, $atts = [] ) {
    $html = '';

    foreach ( $atts as $key => $value ) {
        $html .= sprintf( ' %s="%s"', $key, esc_html( $value ) );
    }

    $html = sprintf( '[%s%s]', $shortcode, $html );

    return do_shortcode( $html );
}

add_action( 'init', 'lcg_register_block' );
?>