<?php
/*
Plugin Name: Logo Showcase Ultimate
Plugin URI: https://wpwax.com/product/logo-showcase-ultimate-pro/
Description: This plugin allows you to easily create Logo Showcase to display logos of your clients, partners, sponsors and affiliates etc in a beautiful carousel, slider and grid.
Version:     1.2.0
Author:      wpWax
Author URI:  https://wpwax.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: logo-showcase-ultimate
Domain Path: /languages/
*/
if (!defined('ABSPATH')) die('Direct access is not allow');

if (!class_exists('Lcg_Main_Class')) {
    class Lcg_Main_Class
    {
        /**
         *
         * @since 1.0.0
         */
        private static $instance;

        /**
         * all metabox
         * @since 2.0.0
         */
        public $metabox;

        /**
         * custom post
         * @since 2.0.0
         */
        public $custom_post;

        /**
         * all shortcode
         * @since 2.0.0
         */
        public $shortcode;

        /**
         * all shortcode
         * @since 2.0.0
         */
        public $migration;

        public static function instance()
        {
            if (!isset(self::$instance) && !(self::$instance instanceof Lcg_Main_Class)) {
                self::$instance = new Lcg_Main_Class;
                //if woocmmerce plugin not activate
                self::$instance->define_lcg_adl_constants();
                add_action('plugin_loaded', array(self::$instance, 'lcg_load_textdomain'));
                add_action('admin_enqueue_scripts', array(self::$instance, 'lcg_admin_enqueue_scripts'));
                add_action('template_redirect', array(self::$instance, 'lcg_enqueue_style_front'));
                add_action('admin_menu', array(self::$instance, 'lcg_hook_usage_and_support_submenu'));
                add_filter('plugin_action_links_' . plugin_basename(__FILE__), array(self::$instance, 'display_pro_version_logo_link'));
                // support svg format
                add_filter('upload_mimes', array(self::$instance, 'lcg_support_svg'));
                self::$instance->lcg_include_required_files();
                self::$instance->custom_post                = new Lcg_Custom_Post();
                self::$instance->featured_img_customizer    = new Lcg_Featured_Img_Customizer(array(
                    'post_type'     => 'lcg_mainpost',
                    'metabox_title' => esc_html__('Logo', LCG_TEXTDOMAIN),
                    'set_text'      => esc_html__('Set logo', LCG_TEXTDOMAIN),
                    'remove_text'   => esc_html__('Remove logo', LCG_TEXTDOMAIN)
                ));
                self::$instance->metabox                    = new Lcg_Metabox();
                self::$instance->shortcode                  = new Lcg_shortcode();
                self::$instance->migration                  = new Lcg_Migration();
            }

            return self::$instance;
        }


        /**
         *define constants
         */
        public function define_lcg_adl_constants()
        {

            if (!defined('LCG_PLUGIN_URI')) define('LCG_PLUGIN_URI', plugin_dir_url(__FILE__));
            if (!defined('LCG_PLUGIN_DIR')) define('LCG_PLUGIN_DIR', plugin_dir_path(__FILE__));
            if (!defined('LCG_TEXTDOMAIN')) define('LCG_TEXTDOMAIN', 'logo-showcase-ultimate');
        }

        //include all file for plugin
        public function lcg_include_required_files()
        {

            require_once LCG_PLUGIN_DIR . 'classes/lcg-adl-custom-post.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-metabox-overrider.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-adl-metabox.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-resize.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-shortcode.php';
            require_once LCG_PLUGIN_DIR . 'classes/lcg-migration.php';
        }

        //enqueues all the styles and scripts
        public function lcg_enqueue_style_front()
        {

            wp_register_style('lcg-style', LCG_PLUGIN_URI . '/assets/css/style.css');
            wp_register_style('lcg-swiper-min-css', LCG_PLUGIN_URI . '/assets/css/vendor/swiper-bundle.min.css');
            wp_register_style('lcg-tooltip', LCG_PLUGIN_URI . '/assets/css/vendor/tooltip.css');

            wp_register_script('lcg-popper-js', LCG_PLUGIN_URI . '/assets/js/vendor/popper.min.js', array('jquery'));
            wp_register_script('lcg-tooltip-js', LCG_PLUGIN_URI . '/assets/js/vendor/tooltip.js', array('jquery', 'lcg-popper-js'));
            wp_register_script('lcg-swiper-min-js', LCG_PLUGIN_URI . '/assets/js/vendor/swiper-bundle.min.js', array('jquery', 'lcg-tooltip-js'));
            wp_register_script('main-js', LCG_PLUGIN_URI . '/assets/js/main.js', array('jquery', 'lcg-swiper-min-js'));
        }

        public function lcg_load_textdomain()
        {

            load_plugin_textdomain(LCG_TEXTDOMAIN, false, plugin_basename(dirname(__FILE__)) . '/languages/');
        }

        //method for enqueue admins's style and script
        public function lcg_admin_enqueue_scripts()
        {

            wp_enqueue_style('cmb2-min', PLUGINS_URL('admin/css/cmb2.min.css', __FILE__));
            wp_enqueue_style('admin-style', PLUGINS_URL('admin/css/lcsp-admin-styles.css', __FILE__));
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('admin-script', PLUGINS_URL('admin/js/lcsp-admin-script.js', __FILE__), array('jquery', 'wp-color-picker'));
        }

        //method for pro plugin's link
        public function display_pro_version_logo_link($links)
        {
            $links[] = '<a href="' . esc_url('https://wpwax.com/product/logo-showcase-ultimate-pro/') . '" target="_blank">' . esc_html__('Pro Version', LCG_TEXTDOMAIN) . '</a>';
            return $links;
        }

        //add page for usage & support
        public function lcg_hook_usage_and_support_submenu()
        {
            add_submenu_page('edit.php?post_type=lcg_mainpost', __('Usage & Support', LCG_TEXTDOMAIN), __('Usage & Support', LCG_TEXTDOMAIN), 'manage_options', 'lcg_usage_support', array($this, 'lcg_display_usage_and_support'));
        }

        public function lcg_display_usage_and_support()
        {
            require_once LCG_PLUGIN_DIR . 'classes/lcg-usages-support.php';
        }

        public function lcg_support_svg($mimes)
        {
            $mimes['svg'] = 'image/svg+xml';
            $mimes['svgz'] = 'image/svg+xml';

            return $mimes;
        }

        /**
         * Initialize appsero tracking.
         *
         * @see https://github.com/Appsero/client
         *
         * @return void
         */
        public function init_appsero() {
            if ( ! class_exists( '\Appsero\Client' ) ) {
                require_once LCG_PLUGIN_DIR . 'classes/appsero/src/Client.php';
            }

            $client = new \Appsero\Client( 'e5b9d7f8-87e0-48db-823e-f2b38a259095', 'Logo Showcase Ultimate', __FILE__ );

            // Active insights
            $client->insights()->init();
        }

        //serialize and then encode the string and return the encoded data

        /**
         * @param $data
         * @return string
         */
        public static function adl_enc_serialize($data)
        {

            return base64_encode(serialize($data));
        }

        //decode the data and then unserialize the data and return it

        /**
         * @param $data
         * @return mixed
         */
        public static function adl_enc_unserialize($data)
        {

            return unserialize(base64_decode($data));
        }
    } //end class


} //end if

function lcg()
{
    return Lcg_Main_Class::instance();
}

if( ! class_exists('Lcg_Main_Class_Pro') ) {
    lcg();
}


function lcg_image_cropping($attachmentId, $width, $height, $crop = true, $quality = 100)
{
    $resizer = new Lcg_Image_resizer($attachmentId);

    return $resizer->resize($width, $height, $crop, $quality);
}