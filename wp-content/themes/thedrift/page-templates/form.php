<?php
/**
 * Template Name: Form Template
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package The Drift
 */

get_header(); ?>

	<main id="main" class="container site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			the_post_navigation();

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php get_footer(); ?>