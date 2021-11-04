<?php
/**
 * Ona: Block Patterns
 *
 * @since 1.0
 */

if ( ! function_exists( 'ona_register_block_patterns' ) ) :
	function ona_register_block_patterns() {
		if ( function_exists( 'register_block_pattern_category' ) ) {
			register_block_pattern_category(
				'ona-general',
				array( 'label' => __( 'Ona General', 'ona' ) )
			);
			register_block_pattern_category(
				'ona-footers',
				array( 'label' => __( 'Ona Footers', 'ona' ) )
			);
			register_block_pattern_category(
				'ona-headers',
				array( 'label' => __( 'Ona Headers', 'ona' ) )
			);
			register_block_pattern_category(
				'ona-pages',
				array( 'label' => __( 'Ona Pages', 'ona' ) )
			);
		}
		if ( function_exists( 'register_block_pattern' ) ) {
			$block_patterns = array(
				'general-hero-cover',
				'general-page-title-with-image',
				'general-promo-boxes',
				'general-promo-section',
				'general-recent-posts',
				'header-default',
				'header-centered-logo',
				'footer-default',
				'page-about',
				'page-contact'	
			);

			foreach ( $block_patterns as $block_pattern ) {
				register_block_pattern(
					'ona/' . $block_pattern,
					require __DIR__ . '/patterns/' . $block_pattern . '.php'
				);
			}
		}
	}
endif;
add_action( 'init', 'ona_register_block_patterns', 9 );
