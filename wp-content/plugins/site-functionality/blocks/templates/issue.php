<?php
/**
 * Template part for displaying Issue Table of Contents.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  SiteFunctionality
 */
?>
<article <?php post_class( $data->class ); ?>>

	<div class="entry-media">

		<?php
		if ( has_post_thumbnail() ) :
			?>

			<picture class="entry-image issue-cover">
				<?php the_post_thumbnail( 'issue-cover', array( 'class' => 'issue-cover' ) ); ?>
			</picture>

			<?php
		endif;
		?>
	</div><!-- .entry-media -->

	<div class="entry-body">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			<div class="entry-meta">
				Meta goes here
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. */
						esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'site-functionality' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
		</footer><!-- .entry-footer -->
	</div><!-- .entry-body -->

</article><!-- #post-## -->
