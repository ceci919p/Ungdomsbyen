<?php
/** 
* Template for Off canvas Menu
* @since Blogberg 1.0.0
*/
?>
<div id="offcanvas-menu">
	<div class="header-search-wrap">
		<?php get_search_form(); ?>
	</div>
	<div id="primary-nav-offcanvas" class="offcanvas-navigation d-xl-none d-lg-block">
		<?php echo blogberg_get_menu( 'primary' ); ?>
	</div>
	<div id="secondary-nav-offcanvas" class="offcanvas-navigation d-none d-lg-block">
		<?php blogberg_get_menu( 'secondary' ); ?>
	</div>
	<?php if ( is_active_sidebar( 'header-sidebar' ) ): ?>
		<sidebar class="sidebar clearfix">
			<?php dynamic_sidebar( 'header-sidebar' ); ?>
		</sidebar>
	<?php endif; ?>
	<div class="close-offcanvas-menu">
		<button class="kfi kfi-close-alt2"></button>
	</div>
</div>