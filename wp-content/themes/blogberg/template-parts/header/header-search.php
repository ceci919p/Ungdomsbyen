<?php
/**
 * Displays header search
 * @since Blogberg 1.0.0
 */
?>
<?php if( !blogberg_get_option( 'disable_search_icon' ) ): ?>
	<div class="header-search-icon">
		<button aria-expanded="false">
			<span class="kfi kfi-search" aria-hidden="true"></span>
		</button>
	</div>
<?php endif; ?>