<?php
if(!defined('ABSPATH')) {die('direct access can not possoble');}


	class lcg_mce_button_adl
	{
		private static $instance;

		
		public static function init() {
			return self::$instance;
		}

		
		public function __construct() {
			add_action( 'wp_ajax_pc_cpt_list', array( $this, 'adl_gc_list_ajax' ) );
			add_action( 'admin_footer', array( $this, 'gc_cpt_list' ) );
			add_action( 'admin_head', array( $this, 'gc_mce_button' ) );
		}

		//method for  admin footer
		function gc_mce_button() {
			// check user permissions
			if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
				return;
			}
			// check if WYSIWYG is enabled
			if ( 'true' == get_user_option( 'rich_editing' ) ) {
				add_filter( 'mce_external_plugins', array( $this, 'gc_add_mce_button' ) );
				add_filter( 'mce_buttons', array( $this, 'gc_adl_register_mce_button' ) );
			}
		}
		
		
		function gc_add_mce_button( $plugin_array ) {
			$plugin_array['sp_gc_mce_button'] = plugin_dir_url(__FILE__).'assets/js/mce.js';

			return $plugin_array;
		}

		//method for register mce button
		function gc_adl_register_mce_button( $buttons ) {
			array_push( $buttons, 'sp_gc_mce_button' );

			return $buttons;
		}

		public function posts( $post_type ) {

			global $wpdb;
			$cpt_type        = $post_type;
			$cpt_post_status = 'publish';
			$cpt             = $wpdb->get_results( $wpdb->prepare(
				"SELECT ID, post_title
	                FROM $wpdb->posts 
	                WHERE $wpdb->posts.post_type = %s
	                AND $wpdb->posts.post_status = %s
	                ORDER BY ID DESC",
				$cpt_type,
				$cpt_post_status
			) );

			$list = array();

			foreach ( $cpt as $post ) {
				$selected  = '';
				$post_id   = $post->ID;
				$post_name = $post->post_title;
				$list[]    = array(
					'text'  => $post_name,
					'value' => $post_id
				);
			}

			wp_send_json( $list );
		}

		public function adl_gc_list_ajax() {
			// check for nonce
			check_ajax_referer( 'sp-mce-nonce', 'security' );
			$posts = $this->posts( 'lcg_shortcode' ); // change 'post' if you need posts list

			return $posts;
		}

		public function gc_cpt_list() {
			// create nonce
			global $current_screen;
			$current_screen->post_type;
			if ( $current_screen == 'post' || 'page' ) {
				$nonce = wp_create_nonce( 'sp-mce-nonce' );
				?>
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        var data = {
                            'action': 'pc_cpt_list',							// wp ajax action
                            'security': '<?php echo $nonce; ?>'		// nonce value created earlier
                        };
                        // fire ajax
                        jQuery.post(ajaxurl, data, function (response) {
                            // if nonce fails then not authorized else settings saved
                            if (response === '-1') {
                                // do nothing
                                console.log('error');
                            } else {
                                if (typeof(tinyMCE) != 'undefined') {
                                    if (tinyMCE.activeEditor != null) {
                                        tinyMCE.activeEditor.settings.spPCShortcodeList = response;
                                    }
                                }
                            }
                        });
                    });
                </script>
				<?php
			}
		}
	}


if(class_exists("lcg_mce_button_adl")) {
	$sp_mce_btn = new lcg_mce_button_adl();
	$sp_mce_btn->init();
}

