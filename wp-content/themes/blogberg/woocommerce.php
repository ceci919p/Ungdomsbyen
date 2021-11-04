<?php
/**
 * The template for displaying archived woocommerce products
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @since Blogberg 1.0.0
 */
get_header(); 
# Print banner with breadcrumb and post title.
blogberg_inner_banner();
?>
<section class="wrap-detail-page" id="main-content">
	<div class="container">
		<div class="row">
			<?php if( blogberg_get_option( 'archive_layout' ) == 'left' ): ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
			<?php
				$class = '';
				$layout_class = '';
				blogberg_get_option( 'archive_layout' ) == 'none' ? $class = 'col-12' : $class = 'col-md-8';
			?>
			<div id="primary" class="<?php echo esc_attr( $class ); ?>" id="main-wrap">
				<div class="post-section">
					<div class="content-wrap">
						<div class="<?php echo esc_attr( $layout_class ), ' ' ?>">
							<main id="main" class="post-detail-content woocommerce-products" role="main">
							<?php if ( have_posts() ) :
								woocommerce_content();
							endif;
							?>
							</main>
						</div>
					</div>
				</div>
				<?php
					if( !blogberg_get_option( 'disable_pagination' ) ):
						the_posts_pagination( array(
							'next_text' => '<span>'.esc_html__( 'Next', 'blogberg' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Next page', 'blogberg' ) . '</span>',
							'prev_text' => '<span>'.esc_html__( 'Prev', 'blogberg' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Previous page', 'blogberg' ) . '</span>',
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'blogberg' ) . ' </span>',
						));
					endif;
				?>
			</div>
			<?php if( blogberg_get_option( 'archive_layout' ) == 'right' ): ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
