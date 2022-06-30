<?php
/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Lcg_Custom_Post {
    
	public function __construct () {
		//register custom post and taxonomy
		add_action( 'init', array( $this, 'register' ) );
	}

	//method for custom post and taxonomy
	public function register() {

		$main_labels = array(
			'name'               => _x( 'Logos', 'logo-showcase-ultimate' ),
			'singular_name'      => _x( 'Logo', 'logo-showcase-ultimate' ),
			'menu_name'          => _x( 'Logo Showcase', 'logo-showcase-ultimate' ),
			'name_admin_bar'     => _x( 'Logo', 'logo-showcase-ultimate' ),
			'add_new'            => _x( 'Add New logo', 'logo-showcase-ultimate' ),
			'add_new_item'       => __( 'Add New Logo', 'logo-showcase-ultimate' ),
			'new_item'           => __( 'New Logo', 'logo-showcase-ultimate' ),
			'edit_item'          => __( 'Edit Logo', 'logo-showcase-ultimate' ),
			'view_item'          => __( 'View Logo', 'logo-showcase-ultimate' ),
			'all_items'          => __( 'All Logos', 'logo-showcase-ultimate' ),
			'search_items'       => __( 'Search Logos', 'logo-showcase-ultimate' ),
			'parent_item_colon'  => __( 'Parent Logos:', 'logo-showcase-ultimate' ),
			'not_found'          => __( 'No Logos found.', 'logo-showcase-ultimate' ),
			'not_found_in_trash' => __( 'No Logos found in Trash.', 'logo-showcase-ultimate' )
		);

		$main_args = array(
            'labels'              => $main_labels,
            'public'              => false,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'show_ui'             => true,
            'query_var'           => true,
            'rewrite'             => array( 'slug' => 'logo' ),
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'supports'            => array( 'title', 'thumbnail' ),
            'show_in_nav_menus'   => false,
            'menu_icon'           => 'dashicons-format-gallery'
        );

        $shortcode_labels = array(
            'name'               => __( 'Shortcode Generator', 'logo-showcase-ultimate' ),
            'singular_name'      => __( 'Shortcode', 'logo-showcase-ultimate' ),
            'menu_name'          => __( 'Shortcode Generator', 'logo-showcase-ultimate' ),
            'all_items'          => __( 'Shortcode Generator', 'logo-showcase-ultimate' ),
            'add_new'            => __( 'Generate New Shortcode', 'logo-showcase-ultimate' ),
            'add_new_item'       => __( 'Generate New Shortcode', 'logo-showcase-ultimate' ),
            'new_item'           => __( 'Generate New Shortcode', 'logo-showcase-ultimate' ),
            'edit_item'          => __( 'Edit Generated Shortcode', 'logo-showcase-ultimate' ),
            'view_item'          => __( 'View Generated Shortcode', 'logo-showcase-ultimate' ),
            'name_admin_bar'     => __( 'Shortcode Generator', 'logo-showcase-ultimate' ),
            'search_items'       => __( 'Search Generated Shortcode', 'logo-showcase-ultimate' ),
            'parent_item_colon'  => __( 'Parent Generated Shortcode:', 'logo-showcase-ultimate' ),
            'not_found'          => __( 'No Shortcode found.', 'logo-showcase-ultimate' ),
            'not_found_in_trash' => __( 'No Shortcode found in Trash.', 'logo-showcase-ultimate' )
        );

        $shortcode_args = array(
            'labels'              => $shortcode_labels,
            'public'              => false,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'show_ui'             => true,
            'query_var'           => true,
            'rewrite'             => array( 'slug' => 'shortcode' ),
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'supports'            => array( 'title' ),
            'show_in_nav_menus'   => false,
            'show_in_menu'        => 'edit.php?post_type=lcg_mainpost',
        );

        //register logo post type
		register_post_type( 'lcg_mainpost', $main_args );
        //register shortcode generator/carousel post type
        register_post_type( 'lcg_shortcode', $shortcode_args );

		// logo category taxonomy registration
        $cat_tax_labels = array(
            'name'              => __( 'Logo Categories', 'logo-showcase-ultimate' ),
            'singular_name'     => __( 'Logo Category', 'logo-showcase-ultimate' ),
            'search_items'      => __( 'Search Logo Categories', 'logo-showcase-ultimate' ),
            'all_items'         => __( 'All Logo Categories', 'logo-showcase-ultimate' ),
            'parent_item'       => __( 'Parent Logo Category', 'logo-showcase-ultimate' ),
            'parent_item_colon' => __( 'Parent Logo Category:', 'logo-showcase-ultimate' ),
            'edit_item'         => __( 'Edit Logo Category' , 'logo-showcase-ultimate'),
            'update_item'       => __( 'Update Logo Category', 'logo-showcase-ultimate' ),
            'add_new_item'      => __( 'Add New Logo Category', 'logo-showcase-ultimate' ),
            'new_item_name'     => __( 'New Logo Category Name' , 'logo-showcase-ultimate'),
            'menu_name'         => __( 'Logo Categories', 'logo-showcase-ultimate' ),
        );

        $cat_tax_args = array(
            'hierarchical'      => true,
            'labels'            => $cat_tax_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'category' ),
        );

        register_taxonomy( 'lcg_category', 'lcg_mainpost', $cat_tax_args );
    
		flush_rewrite_rules();
	}//end register

}//end class