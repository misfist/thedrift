<?php
/**
 * Template part for displaying Issue posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Drift
 */
?>

<article <?php post_class( 'post-container' ); ?>>
	<?php
	if ( has_post_thumbnail() ) :
		?>
		<div class="entry-media">
			<?php the_post_thumbnail( 'full', array( 'class' => 'issue-cover' ) ); ?>
		</div><!-- .entry-media -->
		<?php
	endif;
	?>
	<div class="entry-body">
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
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-body -->

	<footer class="entry-footer">
		<?php drift_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
