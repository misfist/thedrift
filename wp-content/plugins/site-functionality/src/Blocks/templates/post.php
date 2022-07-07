<?php
/**
 * Template part for displaying Issue Table of Contents.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  SiteFunctionality
 */
?>
<article <?php \post_class(); ?>>

	<div class="entry-media">

		<?php
		if ( \has_post_thumbnail() ) :
			?>

			<picture class="entry-image">
				<?php \the_post_thumbnail( 'medium', array( 'class' => 'post-image' ) ); ?>
			</picture>

			<?php
		endif;
		?>
	</div><!-- .entry-media -->

	<div class="entry-body">
		<header class="entry-header">
			<?php \the_title( '<h2 class="entry-title"><a href="' . \esc_url( \get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			<?php
			$taxonomy = 'authors';
			if ( $authors = \get_the_terms( $post->ID, $taxonomy ) ) :
				?>
				<div class="entry-meta">

					<?php \SiteFunctionality\authors( $post->ID, $taxonomy ); ?>
 
				</div><!-- .entry-meta -->
				<?php
			endif;
			?>
		</header><!-- .entry-header -->

		<footer class="entry-footer">
		</footer><!-- .entry-footer -->
	</div><!-- .entry-body -->

</article><!-- #post-## -->
