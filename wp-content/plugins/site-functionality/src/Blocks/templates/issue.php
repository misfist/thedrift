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

			<picture class="entry-image issue-cover">
				<?php \the_post_thumbnail( 'issue-cover', array( 'class' => 'issue-cover' ) ); ?>
			</picture>

			<?php
		endif;
		?>
	</div><!-- .entry-media -->

	<div class="entry-body">
		<header class="entry-header screen-reader-text">
			<?php \the_title( '<h3 class="entry-title"><a href="' . \esc_url( \get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

			<div class="entry-meta"></div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			\the_content(
				sprintf(
					\wp_kses(
						/* translators: %s: Name of current post. */
						\esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'site-functionality' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					\the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php
			if ( $link = \get_field( 'link' ) ) :
				$url = array_key_exists( 'url', $link ) && $link['url'] ?  $link['url'] : \get_post_type_archive_link( $post->post_type );
				$title = array_key_exists( 'title', $link ) && $link['title'] ?  $link['title'] : __( 'Read now.' );
				?>
				<a href="<?php echo \esc_url( $url ); ?>" title="<?php \esc_attr_e( $title, 'site-functionality' ); ?>"><?php \esc_html_e( $title, 'site-functionality' ); ?></a>
				<?php
			endif;
			?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-body -->

</article><!-- #post-## -->
