<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Blogberg 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>
    <div class="post-content-inner">
        <div class="post-text">
            <?php
                # Prints out the contents of this post after applying filters.
                the_content();
            ?>
        </div>
    </div>
</article>