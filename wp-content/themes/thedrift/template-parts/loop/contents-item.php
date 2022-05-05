<?php
/**
 * Template part for displaying Table of Contents Item.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Drift
 */
?>

<li <?php post_class( 'contents-item' ); ?>>
    <header class="entry-header">
        <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
        <div class="entry-meta">
            <?php drift_post_author(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
</li><!-- #post-## -->
