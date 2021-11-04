<?php
/**
 * Template part for displaying slider content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Travelberg 1.0.0
 */
?>
<?php
	$class = '';
	if( blogberg_get_option( 'slider_content_alignment' ) == 'center' ){
		$class = 'text-center';
	}
?>
<div class="banner-overlay">
	<div class="slide-inner <?php echo esc_attr( $class ); ?>">
		<article class="post">
			<div class="post-content">
				<?php
				if( 'post' == get_post_type() ):
					$blogberg_cat = blogberg_get_the_category();
					if( $blogberg_cat ):
				?>
						<span class="entry-meta-cat">
							<?php
								$term_link = get_category_link( $blogberg_cat[ 0 ]->term_id );
							?>
							<a href="<?php echo esc_url( $term_link ); ?>">
								<?php echo esc_html( $blogberg_cat[0]->name ); ?>
							</a>
						</span>
				<?php
					endif;
				endif;
				?>
				<header class="post-title">
					<h2>
						<a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
					</h2>
				</header>

				<div class="button-container">
					<a href="<?php the_permalink(); ?>" class="button-outline">
						<?php echo blogberg_get_option( 'slider_button_text' ); ?>
					</a>
				</div>
			</div>
		</article>
	</div>
</div>

