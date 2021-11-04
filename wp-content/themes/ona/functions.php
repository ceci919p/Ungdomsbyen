<?php
/**
 * Theme functions and definitions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Ona
 * @since 		 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

// Constants
define( 'ONA_VERSION', '1.0' );
define( 'ONA_DIR', get_template_directory() );
define( 'ONA_URI', get_template_directory_uri() );


// Includes
require_once ONA_DIR . '/inc/admin/theme-admin.php';
require_once ONA_DIR . '/inc/block-patterns.php';


/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'ona_setup' ) ) :
	function ona_setup() {

		load_theme_textdomain( 'ona', get_template_directory() . '/languages' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1170, 0 );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
		add_theme_support( 'responsive-embeds' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );
	}
	add_action( 'after_setup_theme', 'ona_setup' );
endif;


/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/

if ( ! function_exists( 'ona_styles' ) ) :
	function ona_styles() {

		wp_register_style( 'ona-style', ONA_URI . '/assets/css/style.min.css' );
		wp_add_inline_style( 'ona-style', ona_get_font_face_styles() );

		$dependencies = apply_filters( 'ona_style_dependencies', array( 'ona-style' ) );

		wp_register_style( 'ona-style-blocks', ONA_URI . '/assets/css/blocks.min.css', $dependencies, ONA_VERSION );		
		
		wp_enqueue_style( 'ona-style' );
		wp_style_add_data( 'ona-style', 'rtl', 'replace' );
		wp_enqueue_style( 'ona-style-blocks' );
		wp_style_add_data( 'ona-style-blocks', 'rtl', 'replace' );

	}
	add_action( 'wp_enqueue_scripts', 'ona_styles' );
endif;


/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/

if ( ! function_exists( 'ona_editor_styles' ) ) :
	function ona_editor_styles() {

		add_editor_style( array(
			'./assets/css/editor.min.css',
			'./assets/css/blocks.min.css'
		) );

		wp_add_inline_style( 'wp-block-library', ona_get_font_face_styles() );
	}
	add_action( 'admin_init', 'ona_editor_styles' );
endif;


/*--------------------------------------------------------------
# Enqueue Admin Scripts and Styles
--------------------------------------------------------------*/

if ( ! function_exists( 'ona_admin_scripts' ) ) :
	function ona_admin_scripts() {
		$screen = get_current_screen();
		wp_enqueue_style( 'ona-admin-styles', ONA_URI . '/assets/admin/css/admin-styles.css' );

		if ( $screen->id === 'appearance_page_one-click-demo-import' ) {
			wp_register_script( 'ona-admin-scripts', ONA_URI . '/assets/admin/js/admin-scripts.js', array('jquery-core'), false, true );
			wp_enqueue_script( 'ona-admin-scripts' );
		}
	}
	add_action( 'admin_enqueue_scripts', 'ona_admin_scripts' );
endif;


/*--------------------------------------------------------------
# Get Google Fonts
--------------------------------------------------------------*/

if ( ! function_exists( 'ona_get_font_face_styles' ) ) :
	/**
	 * Get font face styles.
	 *
	 * @return string
	 */
	function ona_get_font_face_styles() {
		return "
		@font-face{
			font-family: 'Gilda Display';
			font-weight: normal;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/gilda-display/GildaDisplay-Regular.woff' ) . "') format('woff');
		}

		@font-face{
			font-family: 'Nunito Sans';
			font-weight: normal;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/nunito-sans/NunitoSans-Regular.woff' ) . "') format('woff');
		}

		@font-face{
			font-family: 'Nunito Sans';
			font-weight: normal;
			font-style: italic;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/nunito-sans/NunitoSans-Italic.woff' ) . "') format('woff');
		}

		@font-face{
			font-family: 'Nunito Sans';
			font-weight: 600;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/nunito-sans/NunitoSans-SemiBold.woff' ) . "') format('woff');
		}

		@font-face{
			font-family: 'Nunito Sans';
			font-weight: 700;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/nunito-sans/NunitoSans-Bold.woff' ) . "') format('woff');
		}

		";
	}
endif;
