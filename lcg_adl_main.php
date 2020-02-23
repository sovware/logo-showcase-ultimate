<?php
/*
Plugin Name: Logo Showcase Ultimate
Plugin URI: https://aazztech.com/product/logo-showcase-ultimate-pro/
Description: This plugin allows you to easily create Logo Showcase to display logos of your clients, partners, sponsors and affiliates etc in a beautiful carousel, slider and grid.
Version:     1.0.6
Author:      AazzTech
Author URI:  https://aazztech.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: logo-showcase-ultimate
Domain Path: /languages/
*/
if ( ! defined( 'ABSPATH' ) ) die( 'Direct access is not allow' );


if (!class_exists('Adl_Lcg_Main_Class')) {

	class Adl_Lcg_Main_Class
	{
		public function __construct() {

			//define all constants
			$this->define_lcg_adl_constants();
			// lets include all the required files
        	$this->lcg_include_required_files();
        	new Lcg_Custom_Post;
            new Lcg_Featured_Img_Customizer(array(
                'post_type'     => 'lcg_mainpost',
                'metabox_title' => esc_html__( 'Logo', LCG_TEXTDOMAIN ),
                'set_text'      => esc_html__( 'Set logo', LCG_TEXTDOMAIN ),
                'remove_text'   => esc_html__( 'Remove logo', LCG_TEXTDOMAIN )
            ));
            new Lcg_Metabox;
            new Lcg_shortcode;
			//include all style and script
			add_action( 'template_redirect', array($this, 'lcg_enqueue_style_front') );

			add_action( 'plugins_loaded', array( $this, 'lcg_load_textdomain' ) );
            //  include style and script for admin
            add_action( 'admin_enqueue_scripts', array($this, 'lcg_admin_enqueue_scripts') );
            // add a link to the pro version on the plugin activation screen
            add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this, 'display_pro_version_logo_link') );
            // add usage and support menu to the admin menu
            add_action('admin_menu', array($this, 'lcg_hook_usage_and_support_submenu'));
            // support svg format
            add_filter('upload_mimes', array($this, 'lcg_support_svg'));
            register_activation_hook(plugin_basename(__FILE__), array($this,'adl_activation_hook'));
            register_deactivation_hook(plugin_basename(__FILE__), array($this,'adl_deactivation_hook'));

		}


        /**
         *define constants
         */
        public function define_lcg_adl_constants() {
            
            if( ! defined( 'LCG_PLUGIN_URI' ) ) define( 'LCG_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
            if( ! defined( 'LCG_PLUGIN_DIR' ) ) define( 'LCG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
            if( ! defined( 'LCG_TEXTDOMAIN' ) ) define( 'LCG_TEXTDOMAIN', 'logo-showcase-ultimate' );

        }

        //include all file for plugin
        public function lcg_include_required_files() {

        	require_once LCG_PLUGIN_DIR . 'classes/lcg-adl-custom-post.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-metabox-overrider.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-adl-metabox.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-resize.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-shortcode.php';
            require_once LCG_PLUGIN_DIR . 'gc-mce-shortcode-button.php';

        }

        //enqueues all the styles and scripts
        public function lcg_enqueue_style_front() {

        	wp_register_style( 'lcg-animate-style', LCG_PLUGIN_URI . '/assets/css/animate.css' );
            wp_register_style( 'lcg-carousel-style', LCG_PLUGIN_URI . '/assets/css/owl.carousel.css' );
            wp_register_style( 'lcg-responsive', LCG_PLUGIN_URI . '/assets/css/responsive.css' );
            wp_register_style( 'lcg-icons', LCG_PLUGIN_URI . '/assets/css/simple-line-icons.css' );
            wp_register_style( 'lcg-theme', LCG_PLUGIN_URI . '/assets/css/theme.css' );
            wp_register_style( 'lcg-tooltip', LCG_PLUGIN_URI . '/assets/css/tooltip.css' );
            wp_register_style( 'lcg-style', LCG_PLUGIN_URI . '/assets/css/style.css' );

            wp_register_script( 'lcg-owl-carousel-js', LCG_PLUGIN_URI . '/assets/js/owl.carousel.min.js', array('jquery'));
            wp_register_script( 'lcg-popper-min-js', LCG_PLUGIN_URI . '/assets/js/popper.min.js', array('jquery'));
            wp_register_script( 'lcg-tooltip-js', LCG_PLUGIN_URI . '/assets/js/tooltip.js', array('jquery'));
            wp_register_script( 'lcg-util-js', LCG_PLUGIN_URI . '/assets/js/util.js', array('lcg-tooltip-js'));
            wp_register_script( 'main-js', LCG_PLUGIN_URI . '/assets/js/main.js', array('jquery'));
            
        }

        public function lcg_load_textdomain() {

        	load_plugin_textdomain(LCG_TEXTDOMAIN, false, plugin_basename( dirname( __FILE__ ) ) . '/languages/');
        	
        }

        //method for enqueue admins's style and script
        public function lcg_admin_enqueue_scripts() {

            wp_enqueue_style('cmb2-min', PLUGINS_URL('admin/css/cmb2.min.css',__FILE__));
            wp_enqueue_style('admin-style', PLUGINS_URL('admin/css/lcsp-admin-styles.css',__FILE__));
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('admin-script', PLUGINS_URL('admin/js/lcsp-admin-script.js',__FILE__),array( 'jquery', 'wp-color-picker' ));

        }

        //method for pro plugin's link
        public function display_pro_version_logo_link( $links ) {
            $links[] = '<a href="'.esc_url('https://aazztech.com/product/logo-showcase-ultimate-pro/').'" target="_blank">'.esc_html__('Pro Version', LCG_TEXTDOMAIN).'</a>';
            return $links;
        }

        //add page for usage & support
        public function lcg_hook_usage_and_support_submenu() {
            add_submenu_page( 'edit.php?post_type=lcg_mainpost', __('Usage & Support', LCG_TEXTDOMAIN), __('Usage & Support', LCG_TEXTDOMAIN), 'manage_options', 'lcg_usage_support', array($this, 'lcg_display_usage_and_support') );
        }

        public function lcg_display_usage_and_support() {
            require_once LCG_PLUGIN_DIR . 'classes/lcg-usages-support.php';
        }

        public function lcg_support_svg ( $mimes) {
            $mimes['svg'] = 'image/svg+xml';
            $mimes['svgz'] = 'image/svg+xml';

            return $mimes;
        }
        //serialize and then encode the string and return the encoded data

        /**
         * @param $data
         * @return string
         */
        public static function adl_enc_serialize($data) {

            return base64_encode(serialize($data));
        }

        //decode the data and then unserialize the data and return it

        /**
         * @param $data
         * @return mixed
         */
        public static function adl_enc_unserialize($data) {

            return unserialize(base64_decode($data));
        }

        /**
         *activation hook
         */
        public function adl_activation_hook() {
            flush_rewrite_rules();
        }

        /**
         * deactivation hook
         */
        public function adl_deactivation_hook() {
            flush_rewrite_rules();
        }

	}//end class


}//end if

new Adl_Lcg_Main_Class;


