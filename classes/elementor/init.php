<?php
if ( ! function_exists('register_logo_ultimate_widget') ) {
	function register_logo_ultimate_widget( $widgets_manager ) {

		require_once LCG_PLUGIN_DIR . 'classes/elementor/widget.php';

		$widgets_manager->register( new Elementor_Logo_Ultimate_Widget() );

	}
}
add_action( 'elementor/widgets/register', 'register_logo_ultimate_widget' );