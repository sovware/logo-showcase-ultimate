<?php 

 //Protect direct access
if ( ! defined( 'ABSPATH' ) ) die( 'Are you cheating??? Accessing this file directly is forbidden.' );

class Lcg_Custom_Post
{
	public function __construct() {

		//register custom post and taxonomy
		add_action('init',array($this,'lcg_custom_post_taxonomy'));
		
	}

	//method for custom post and taxonomy
	public function lcg_custom_post_taxonomy() {

		$main_labels = array(
			'name'               => _x( 'Logos', LCG_TEXTDOMAIN ),
			'singular_name'      => _x( 'Logo', LCG_TEXTDOMAIN ),
			'menu_name'          => _x( 'Logo Showcase', LCG_TEXTDOMAIN ),
			'name_admin_bar'     => _x( 'Logo', LCG_TEXTDOMAIN ),
			'add_new'            => _x( 'Add New logo', LCG_TEXTDOMAIN ),
			'add_new_item'       => __( 'Add New Logo', LCG_TEXTDOMAIN ),
			'new_item'           => __( 'New Logo', LCG_TEXTDOMAIN ),
			'edit_item'          => __( 'Edit Logo', LCG_TEXTDOMAIN ),
			'view_item'          => __( 'View Logo', LCG_TEXTDOMAIN ),
			'all_items'          => __( 'All Logos', LCG_TEXTDOMAIN ),
			'search_items'       => __( 'Search Logos', LCG_TEXTDOMAIN ),
			'parent_item_colon'  => __( 'Parent Logos:', LCG_TEXTDOMAIN ),
			'not_found'          => __( 'No Logos found.', LCG_TEXTDOMAIN ),
			'not_found_in_trash' => __( 'No Logos found in Trash.', LCG_TEXTDOMAIN )
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
            'name'               => __( 'Shortcode Generator', LCG_TEXTDOMAIN ),
            'singular_name'      => __( 'Shortcode', LCG_TEXTDOMAIN ),
            'menu_name'          => __( 'Shortcode Generator', LCG_TEXTDOMAIN ),
            'all_items'          => __( 'Shortcode Generator', LCG_TEXTDOMAIN ),
            'add_new'            => __( 'Generate New Shortcode', LCG_TEXTDOMAIN ),
            'add_new_item'       => __( 'Generate New Shortcode', LCG_TEXTDOMAIN ),
            'new_item'           => __( 'Generate New Shortcode', LCG_TEXTDOMAIN ),
            'edit_item'          => __( 'Edit Generated Shortcode', LCG_TEXTDOMAIN ),
            'view_item'          => __( 'View Generated Shortcode', LCG_TEXTDOMAIN ),
            'name_admin_bar'     => __( 'Shortcode Generator', LCG_TEXTDOMAIN ),
            'search_items'       => __( 'Search Generated Shortcode', LCG_TEXTDOMAIN ),
            'parent_item_colon'  => __( 'Parent Generated Shortcode:', LCG_TEXTDOMAIN ),
            'not_found'          => __( 'No Shortcode found.', LCG_TEXTDOMAIN ),
            'not_found_in_trash' => __( 'No Shortcode found in Trash.', LCG_TEXTDOMAIN )
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
            'name'              => __( 'Logo Categories', LCG_TEXTDOMAIN ),
            'singular_name'     => __( 'Logo Category', LCG_TEXTDOMAIN ),
            'search_items'      => __( 'Search Logo Categories', LCG_TEXTDOMAIN ),
            'all_items'         => __( 'All Logo Categories', LCG_TEXTDOMAIN ),
            'parent_item'       => __( 'Parent Logo Category', LCG_TEXTDOMAIN ),
            'parent_item_colon' => __( 'Parent Logo Category:', LCG_TEXTDOMAIN ),
            'edit_item'         => __( 'Edit Logo Category' , LCG_TEXTDOMAIN),
            'update_item'       => __( 'Update Logo Category', LCG_TEXTDOMAIN ),
            'add_new_item'      => __( 'Add New Logo Category', LCG_TEXTDOMAIN ),
            'new_item_name'     => __( 'New Logo Category Name' , LCG_TEXTDOMAIN),
            'menu_name'         => __( 'Logo Categories', LCG_TEXTDOMAIN ),
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

	}//end lcg_custom_post_taxonomy

	

}//end class