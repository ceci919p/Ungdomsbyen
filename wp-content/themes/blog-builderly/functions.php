<?php 
add_action( 'wp_enqueue_scripts', 'blog_builderly_enqueue_styles' );
function blog_builderly_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 


 // Header changes
require get_stylesheet_directory() . '/inc/custom-header.php';


// Google fonts
function blog_builderly_google_fonts() {
	wp_enqueue_style( 'blog-builderly-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:600', false ); 
}
add_action( 'wp_enqueue_scripts', 'blog_builderly_google_fonts' );



// Customizer stuff
function blogbuilderly_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'navigation_social_link_color', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
        $wp_customize->add_setting( 'navigation_link_color', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
            $wp_customize->add_setting( 'navigation_background_color', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
                $wp_customize->add_setting( 'header_bg_color', array(
        'default'           => '#eee',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
                    $wp_customize->add_setting( 'header_widget_link', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );

    $wp_customize->add_setting( 'header_widget_text', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
        $wp_customize->add_setting( 'header_widget_titles', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
            $wp_customize->add_setting( 'header_tagline_color', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
                $wp_customize->add_setting( 'header_title_color', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );

}
add_action( 'customize_register', 'blogbuilderly_customize_register', 9999 );

if(! function_exists('blogbuilderly_css_from_u' ) ): 
	function blogbuilderly_css_from_u(){

		?>

		<style type="text/css">
		.header-container{ padding-top: <?php echo esc_attr(get_theme_mod( 'header_top_padding')); ?>px; }
		.header-container{ padding-bottom: <?php echo esc_attr(get_theme_mod( 'header_bottom_padding')); ?>px; }
		.header-widgets h3 { color: <?php echo esc_attr(get_theme_mod( 'header_widget_titles')); ?>; }
		.header-widgets, .header-widgets p, .header-widgets li, .header-widgets table td, .header-widgets table th, .header-widgets   { color: <?php echo esc_attr(get_theme_mod( 'header_widget_text')); ?>; }
		.header-widgets a, .header-widgets a, .header-widgets .menu li a { color: <?php echo esc_attr(get_theme_mod( 'header_widget_link')); ?>; }
		header#masthead { background-color: <?php echo esc_attr(get_theme_mod( 'header_bg_color')); ?>; }
		.site-title{ color: <?php echo esc_attr(get_theme_mod( 'header_title_color')); ?>; }
		p.site-description{ color: <?php echo esc_attr(get_theme_mod( 'header_tagline_color')); ?>; }
		.button-divider{ background-color: <?php echo esc_attr(get_theme_mod( 'header_button_divider_color')); ?>; }
		.header-button{ border-color: <?php echo esc_attr(get_theme_mod( 'header_button_color')); ?>; }
		.header-button{ color: <?php echo esc_attr(get_theme_mod( 'header_button_color')); ?>; }
		#site-navigation .menu li, #site-navigation .menu .sub-menu, #site-navigation .menu .children, nav#site-navigation{ background: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
		#site-navigation .menu li a, #site-navigation .menu li a:hover, #site-navigation .menu li a:active, #site-navigation .menu > li.menu-item-has-children > a:after, #site-navigation ul.menu ul a, #site-navigation .menu ul ul a, #site-navigation ul.menu ul a:hover, #site-navigation .menu ul ul a:hover, div#top-search a, div#top-search a:hover { color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?>; }
		.m_menu_icon { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?>; }
		#top-social a, #top-social a:hover, #top-social a:active, #top-social a:focus, #top-social a:visited{ color: <?php echo esc_attr(get_theme_mod( 'navigation_social_link_color')); ?>; }  
		.top-widgets h1, .top-widgets h2, .top-widgets h3, .top-widgets h4, .top-widgets h5, .top-widgets h6 { color: <?php echo esc_attr(get_theme_mod( 'topwidgets_headline_color')); ?>; }
		.top-widgets p, .top-widgets, .top-widgets li, .top-widgets ol, .top-widgets cite{ color: <?php echo esc_attr(get_theme_mod( 'topwidgets_text_color')); ?>; }
		.top-widget-fullwidth h3:after{ background: <?php echo esc_attr(get_theme_mod( 'topwidgets_headline_color')); ?>; }
		.top-widgets ul li a, .top-widgets a, .top-widgets a:hover, .top-widgets a:visited, .top-widgets a:focus, .top-widgets a:active, .top-widgets ol li a, .top-widgets li a, .top-widgets .menu li a, .top-widgets .menu li a:hover, .top-widgets .menu li a:active, .top-widgets .menu li a:focus{ color: <?php echo esc_attr(get_theme_mod( 'topwidgets_link_color')); ?>; }
		.blog-feed-category a{ color: <?php echo esc_attr(get_theme_mod( 'blogpage_category_color')); ?>; }
		.blog h2.entry-title a, .nav-previous a, .nav-next a { color: <?php echo esc_attr(get_theme_mod( 'blogpage_headline_color')); ?>; }
		.blog-feed-post-wrapper .blog-feed-meta * { color: <?php echo esc_attr(get_theme_mod( 'blogpage_date_color')); ?>; }
		.blog-feed-post-wrapper p { color: <?php echo esc_attr(get_theme_mod( 'blogpage_text_color')); ?>; }
		.blog .entry-more a { color: <?php echo esc_attr(get_theme_mod( 'blogpage_button_color')); ?>; }
		.blog .entry-more a { border-color: <?php echo esc_attr(get_theme_mod( 'blogpage_button_color')); ?>; }
		.blog .entry-more a:hover { background: <?php echo esc_attr(get_theme_mod( 'blogpage_button_color')); ?>; }
		.blog .entry-more a:hover { border-color: <?php echo esc_attr(get_theme_mod( 'blogpage_button_color')); ?>; }
		.blog #primary article.post { border-color: <?php echo esc_attr(get_theme_mod( 'blogpage_border_color')); ?>; }
		.single-post .comment-metadata time, .page .comment-metadata time, .single-post time.entry-date.published, .page time.entry-date.published, .single-post .posted-on a, .page .posted-on a { color: <?php echo esc_attr(get_theme_mod( 'postpage_date')); ?>; }
		.single-post #main th, .page #main th, .single-post .entry-cate a h2.entry-title, .single-post h1.entry-title, .page h2.entry-title, .page h1.entry-title, .single-post #main h1, .single-post #main h2, .single-post #main h3, .single-post #main h4, .single-post #main h5, .single-post #main h6, .page #main h1, .page #main h2, .page #main h3, .page #main h4, .page #main h5, .page #main h6 { color: <?php echo esc_attr(get_theme_mod( 'postpage_headline')); ?>; }
		.comments-title:after{ background: <?php echo esc_attr(get_theme_mod( 'postpage_headline')); ?>; }
		.post #main .nav-next a:before, .single-post #main .nav-previous a:before, .page #main .nav-previous a:before, .single-post #main .nav-next a:before, .single-post #main a, .page #main a{ color: <?php echo esc_attr(get_theme_mod( 'postpage_link')); ?>; }
		.page #main, .page #main p, .page #main th,.page .comment-form label, .single-post #main, .single-post #main p, .single-post #main th,.single-post .comment-form label, .single-post .comment-author .fn, .page .comment-author .fn   { color: <?php echo esc_attr(get_theme_mod( 'postpage_text')); ?>; }
		.single-post .comment-form input.submit, .page .comment-form input.submit { border-color: <?php echo esc_attr(get_theme_mod( 'postpage_button')); ?>; }
		.single-post .comment-form input.submit, .page .comment-form input.submit { color: <?php echo esc_attr(get_theme_mod( 'postpage_button')); ?>; }
		.single-post .comment-form input.submit:hover, .page .comment-form input.submit:hover { color:#fff; background-color: <?php echo esc_attr(get_theme_mod( 'postpage_button')); ?>; }
		.single-post #main .entry-cate a, .page #main .entry-cate a { color: <?php echo esc_attr(get_theme_mod( 'postpage_category')); ?>; }
		.single-post .comment-content, .page .comment-content, .single-post .navigation.post-navigation, .page .navigation.post-navigation, .single-post #main td, .page #main td,  .single-post #main th, .page #main th, .page #main input[type="url"], .single-post #main input[type="url"],.page #main input[type="text"], .single-post #main input[type="text"],.page #main input[type="email"], .single-post #main input[type="email"], .page #main textarea, .single-post textarea { border-color: <?php echo esc_attr(get_theme_mod( 'postpage_border')); ?>; }
		.top-widget-wrapper{ border-color: <?php echo esc_attr(get_theme_mod( 'topwidgets_border_color')); ?>; }
		.footer-widgets-wrapper{ background: <?php echo esc_attr(get_theme_mod( 'footer_background')); ?>; }
		.footer-widgets-wrapper h1, .footer-widgets-wrapper h2,  .footer-widgets-wrapper h3,  .footer-widgets-wrapper h4,  .footer-widgets-wrapper h5,  .footer-widgets-wrapper h6 { color: <?php echo esc_attr(get_theme_mod( 'footer_headline')); ?>; }
		.footer-widget-single, .footer-widget-single p, .footer-widgets-wrapper p, .footer-widgets-wrapper { color: <?php echo esc_attr(get_theme_mod( 'footer_text')); ?>; }
		.footer-widgets-wrapper  ul li a, .footer-widgets-wrapper li a,.footer-widgets-wrapper a,.footer-widgets-wrapper a:hover,.footer-widgets-wrapper a:active,.footer-widgets-wrapper a:focus, .footer-widget-single a, .footer-widget-single a:hover, .footer-widget-single a:active{ color: <?php echo esc_attr(get_theme_mod( 'footer_link')); ?>; }
		.footer-widget-single h3, .footer-widgets .search-form input.search-field { border-color: <?php echo esc_attr(get_theme_mod( 'footer_border')); ?>; }
		footer .site-info { background: <?php echo esc_attr(get_theme_mod( 'footer_copyright_background')); ?>; }
		footer .site-info { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_text')); ?>; }
		</style>
		<?php }
		add_action( 'wp_head', 'blogbuilderly_css_from_u' );
		endif;
