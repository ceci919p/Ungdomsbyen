<?php
/**
 * Displays header layout one
 * @since Travelberg 1.0.0
 */
?>

<header id="masthead" class="wrapper site-header site-header-primary" role="banner">
	<?php if( display_header_text() || has_custom_logo() ): ?>
		<div class="main-header">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4 d-none d-lg-block">
						<div class="header-icons-wrap">
							<div class="socialgroup">
								<?php echo blogberg_get_menu( 'social' ); ?>
							</div>
						</div>
					</div>
					<div class="col-6 col-lg-4">
						<?php
							get_template_part( 'template-parts/header/site', 'branding' );
						?>
					</div>
					<div class="col-lg-4 col-6">
						<div class="header-icons-wrap text-right">
							<?php get_template_part('template-parts/header/header', 'search'); ?>
							<?php
								$hamburger_menu_class = '';
								if( blogberg_get_option( 'disable_hamburger_menu_icon' ) ){
									$hamburger_menu_class = 'd-inline-block d-lg-none';
								}
							?>
							<span class="alt-menu-icon <?php echo esc_attr( $hamburger_menu_class ); ?>">
								<a class="offcanvas-menu-toggler" href="#">
									<span class="icon-bar"></span>
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="main-navigation-wrap site-header-wrap d-none d-lg-block">
		<div class="container">
			<div class="wrap-nav">
				<div id="navigation">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'travelberg' ); ?></button>
						<?php echo blogberg_get_menu( 'primary' ); ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Search form structure -->
	<div class="header-search-wrap">
		<div id="search-form">
			<?php get_search_form(); ?>
		</div>
	</div>
</header>