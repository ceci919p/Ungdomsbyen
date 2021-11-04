<?php
/**
 * Theme admin functions.
 *
 * @package Ona
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Add admin menu
*
* @since 1.0.0
*/
function ona_theme_admin_menu() {
	add_theme_page(
		esc_html__( 'Ona Getting Started', 'ona' ),
		esc_html__( 'Ona', 'ona' ),
		'manage_options',
		'ona-theme',
		'ona_admin_page_content',
		30
	);
}
add_action( 'admin_menu', 'ona_theme_admin_menu' );


/**
* Add admin page content
*
* @since 1.0.0
*/
function ona_admin_page_content() {
	$theme = wp_get_theme();
	$theme_name = 'Ona';
	$active_theme_name  = strtolower( preg_replace( '#[^a-zA-Z]#', '', $theme->template ) );
	$docs_url = 'https://docs.deothemes.com/ona/knowledgebase/';

	$urls = array(
		'theme-url'									=> 'https://ona.deothemes.com/',
		'rating-url'								=> 'https://wordpress.org/support/theme/ona/reviews/?rate=5#new-post',
		'docs' 											=> 'https://docs.deothemes.com/ona',
		'video-tutorials'						=> 'https://www.youtube.com/watch?v=R9tPDGK1q-Q&list=PLaPNmyRO67T0BsLPlGdrXO0T_5SxM5A4-&ab_channel=DeoThemes',
		'header-footer-builder'			=> $docs_url . 'header-footer-builder',
		'product-builder'						=> $docs_url . 'product-builder',
		'mega-menu-builder' 				=> $docs_url . 'mega-menu-builder',
		'page-layout'								=> $docs_url . 'page-layout',
		'gdpr'											=> $docs_url . 'gdpr',
		'home-page-demos'						=> $docs_url . 'home-page-demos'
	);

	$info = array(
		'header-footer-builder' => array(
			'title'			=> esc_html__( 'Header / Footer Builder', 'ona' ),
			'class'			=> 'ona-addon-list-item',
			'title_url' => $urls['header-footer-builder'],
			'links'			=> array(
				array(
					'link_class'	 => 'ona-learn-more',
					'link_url'		 => $urls['header-footer-builder'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'ona' ),
					'target_blank' => true
				),
			),
		),
		'product-builder' => array(
			'title'			=> esc_html__( 'Product Builder', 'ona' ),
			'class'			=> 'ona-addon-list-item',
			'title_url' => $urls['product-builder'],
			'links'			=> array(
				array(
					'link_class'	 => 'ona-learn-more',
					'link_url'		 => $urls['product-builder'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'ona' ),
					'target_blank' => true
				),
			),
		),
		'mega-menu-builder' => array(
			'title'			=> esc_html__( 'Mega Menu Builder', 'ona' ),
			'class'			=> 'ona-addon-list-item',
			'title_url' => $urls['mega-menu-builder'],
			'links'			=> array(
				array(
					'link_class'	 => 'ona-learn-more',
					'link_url'		 => $urls['mega-menu-builder'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'ona' ),
					'target_blank' => true
				),
			),
		),
		'page-layouts' => array(
			'title'			=> esc_html__( 'Page Layout', 'ona' ),
			'class'			=> 'ona-addon-list-item',
			'title_url' => $urls['page-layout'],
			'links'			=> array(
				array(
					'link_class'	 => 'ona-learn-more',
					'link_url'		 => $urls['page-layout'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'ona' ),
					'target_blank' => true
				),
			),
		),
		'gdpr' => array(
			'title'			=> esc_html__( 'GDPR Tools', 'ona' ),
			'class'			=> 'ona-addon-list-item',
			'title_url' => $urls['gdpr'],
			'links'			=> array(
				array(
					'link_class'	 => 'ona-learn-more',
					'link_url'		 => $urls['gdpr'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'ona' ),
					'target_blank' => true
				),
			),
		),				
	);

	$features = array(
		'demos' => array(
			'title'			=> esc_html__( 'Home Pages', 'ona' ),
			'url'				=> '',
			'free'			=> esc_html__( '1', 'ona' ),
			'pro'				=> esc_html__( '6', 'ona' ),
		),
		'headers-footers' => array(
			'title'			=> esc_html__( 'Headers and Footers', 'ona' ),
			'url'				=> '',
			'free'			=> esc_html__( '1', 'ona' ),
			'pro'				=> esc_html__( '6', 'ona' )
		),
		'rtl-translation' => array(
			'title'			=> esc_html__( 'RTL and Translation Ready', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'demo-import' => array(
			'title'			=> esc_html__( 'One Click Demo Import', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),	
		'24-7-support' => array(
			'title'			=> esc_html__( 'Priority email support', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),		
		'builder' => array(
			'title'			=> esc_html__( 'Header / footer / product builder', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'elementor-widgets' => array(
			'title'			=> esc_html__( 'Elementor widgets', 'ona' ),
			'url'				=> '',
			'free'			=> esc_html__( 'Basic', 'ona' ),
			'pro'				=> esc_html__( '45+ premium widgets', 'ona' ),
		),
		'megamenu' => array(
			'title'			=> esc_html__( 'Customizable mega menu', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'gdpr' => array(
			'title'			=> esc_html__( 'GDPR tools', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'acf-pro' => array(
			'title'			=> esc_html__( 'ACF Pro integrated', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'slider-revolution' => array(
			'title'			=> esc_html__( 'Slider Revolution', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> esc_html__( 'Included (save $85)', 'ona' ),
		),
		'currency-language' => array(
			'title'			=> esc_html__( 'Currency and language switcher', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'off-canvas-mini-cart' => array(
			'title'			=> esc_html__( 'Off-canvas mini cart', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'distraction-free-checkout' => array(
			'title'			=> esc_html__( 'Distraction free checkout', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'dynamic-portfolio' => array(
			'title'			=> esc_html__( 'Dynamic portfolio', 'ona' ),
			'url'				=> '',
			'free'			=> '<i class="ona-list-item-icon ona-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="ona-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),		
		'typography' => array(
			'title'			=> esc_html__( 'Typography', 'ona' ),
			'url'				=> '',
			'free'			=> esc_html__( 'Google Fonts', 'ona' ),
			'pro'				=> esc_html__( 'Google Fonts + Adobe Fonts', 'ona' )
		),
		'colors' => array(
			'title'			=> esc_html__( 'Colors', 'ona' ),
			'url'				=> '',
			'free'			=> esc_html__( 'Limited', 'ona' ),
			'pro'				=> esc_html__( 'Advanced', 'ona' )
		),	
	);

	$demos = array(
		'home-1' => array(
			'title'			=> esc_html__( 'Home Main', 'ona' ),
			'url'				=> $urls['theme-url'],
			'preview'		=> $urls['theme-url'] . '/import/01/preview.jpg',
		),
		'home-2' => array(
			'title'			=> esc_html__( 'Creative Agency', 'ona' ),
			'url'				=> $urls['theme-url'] . 'creative-agency',
			'preview'		=> $urls['theme-url'] . '/import/02/preview.jpg',
		),
		'home-3' => array(
			'title'			=> esc_html__( 'Studio Dark', 'ona' ),
			'url'				=> $urls['theme-url'] . 'studio-dark',
			'preview'		=> $urls['theme-url'] . '/import/03/preview.jpg',
		),
		'home-4' => array(
			'title'			=> esc_html__( 'Online Store', 'ona' ),
			'url'				=> $urls['theme-url'] . 'online-store',
			'preview'		=> $urls['theme-url'] . '/import/04/preview.jpg',
		),
		'home-5' => array(
			'title'			=> esc_html__( 'Interior Slider', 'ona' ),
			'url'				=> $urls['theme-url'] . 'interior-slider',
			'preview'		=> $urls['theme-url'] . '/import/05/preview.jpg',
		),
		'home-6' => array(
			'title'			=> esc_html__( 'Portfolio Masonry', 'ona' ),
			'url'				=> $urls['theme-url'] . 'portfolio-masonry',
			'preview'		=> $urls['theme-url'] . '/import/06/preview.jpg',
		),
	);

	?>

		<div class="ona-page-header">
			<div class="ona-page-header__container">
				<div class="ona-page-header__branding">
					<a href="<?php echo esc_url( $urls['theme-url'] ); ?>" target="_blank" rel="noopener" >
						<img src="<?php echo esc_url( ONA_URI . '/assets/admin/img/theme_logo.png' ); ?>" class="ona-page-header__logo" alt="<?php echo esc_attr__( 'Ona', 'ona' ); ?>" />
					</a>
					<span class="ona-theme-version"><?php echo esc_html( ONA_VERSION ); ?></span>
				</div>
				<div class="ona-page-header__tagline">
					<span  class="ona-page-header__tagline-text">				
						<?php echo esc_html__( 'Made by ', 'ona' ); ?>
						<a href="https://deothemes.com/"><?php echo esc_html__( 'DeoThemes', 'ona' ); ?></a>						
					</span>					
				</div>				
			</div>
		</div>

		<div class="wrap ona-container">
			<div class="ona-grid">

				<div class="ona-grid-content">
					<div class="ona-body">

						<h1 class="ona-title"><?php esc_html_e( 'Getting Started', 'ona' ); ?></h1>
						<p class="ona-intro-text">
							<?php echo esc_html__( 'Ona is now installed and ready to use. Get ready to build something beautiful. To get started check the links below. We hope you enjoy it! If you have any suggestion of how to improve this theme feel free to contact us.', 'ona' ); ?>
						</p>

						<h2 class="ona-widget-title"><?php echo esc_html__( 'Useful Links', 'ona' ); ?></h2>
						<ul class="ona-useful-links">
							<li>
								<a href="https://wordpress.org/support/theme/ona/reviews/#new-post" target="_blank"><?php echo esc_html__( 'Rate us ★★★★★', 'ona' ); ?></a>
							</li>
							<li>
								<a href="https://deothemes.com/contact/"><?php echo esc_html__( 'Contact us', 'ona' ); ?></a>
							</li>
							<li>
								<a href="https://twitter.com/deothemes"><?php echo esc_html__( 'Follow us', 'ona' ); ?></a>
							</li>
						</ul>

					</div> <!-- .body -->

				</div> <!-- .content -->	

			</div> <!-- .grid -->

		</div>
	<?php
}
