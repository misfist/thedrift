<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Drift
 */

?>

	<article <?php post_class( 'post-container' ); ?>>

		<?php
		if ( is_single() ) : 
			?>

			<div class="entry-top">

			<?php 
		endif; 
		?>

		<div class="entry-media">
			<?php
			$size = ( is_single() ) ? esc_attr( 'full' ) : esc_attr( 'large' );
			$class = ( is_single() ) ? esc_attr( 'single-post' ) : esc_attr( 'archive-post' );
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( $size, array( 'class' => $class ) );
			endif;
			?>
		</div><!-- .entry-media -->

		<?php
		if ( ! is_single() ) : 
			?>

			<div class="entry-body">

			<?php 
		endif; 
		?>

		<header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>

			<div class="entry-meta">
				<?php drift_post_date(); ?>
				<?php drift_post_author(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<?php
		if ( is_single() ) : 
			?>

			</div><!-- .entry-top -->

			<?php 
		endif; 
		?>

		<div class="entry-content">
			<?php
				if ( is_single() ) : 
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. */
								esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the-drift' ),
								[
									'span' => [
										'class' => [],
									],
								]
							),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						)
					);
				else :
					the_excerpt();
				endif;

				wp_link_pages(
					[
						'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'the-drift' ),
						'after'  => '</div>',
					]
				);
				?>
		</div><!-- .entry-content -->

		<?php
		if ( ! is_single() ) : 
			?>

			</div><!-- .entry-body -->

			<?php 
		endif; 
		?>

		<footer class="entry-footer">
			<?php drift_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</article><!-- #post-## -->
