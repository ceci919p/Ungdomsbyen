<?php
/**
 * Theme functions and definitions
 *
 * @package travelberg
 */

if ( ! function_exists( 'travelberg_enqueue_styles' ) ) :
	/**
	 * @since Travelberg 1.0.0
	 */
	function travelberg_enqueue_styles() {
		wp_enqueue_style( 'travelberg-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'travelberg-google-fonts', '//fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700&display=swap', false );
	}

endif;
add_action( 'wp_enqueue_scripts', 'travelberg_enqueue_styles', 1 );

