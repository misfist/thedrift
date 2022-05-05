<?php
/**
 * Template part for displaying Issue Table of Contents.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Drift
 */
$issue_taxonomy   = 'issue';
$issue            = isset( $args['issue'] ) ? $args['issue'] : array();
$posts            = $args['posts'];
$section_taxonomy = 'section';
?>
<?php
$sections = drift_get_sections( $posts );

if ( ! empty( $sections ) ) :
	?>
	<ul class="issue-contents">
	<?php
	foreach ( $sections as $section ) :
		?>
		
		<li class="section-<?php echo esc_attr( $section->slug ); ?>">
			<h3 class="section-title"><?php echo esc_html( $section->name ); ?></h3>

			<?php
			$args  = array(
				'posts__in' => $posts,
				'orderby'   => 'menu_order',
				'order'     => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => $section_taxonomy,
						'terms'    => $section->term_id,
					),
					array(
						'taxonomy' => $issue_taxonomy,
						'terms'    => $issue->term_id,
					),
				),
			);
			$query = drift_get_section_posts_query( $post->ID, $args );
			if ( $query->have_posts() ) :
				?>

				<ul class="posts-list">

					<?php
					while ( $query->have_posts() ) :
						$query->the_post();

						get_template_part( 'template-parts/loop/contents', 'item' );

					endwhile;
					wp_reset_postdata();
					?>

				</ul><!-- .posts-list -->
				<?php
			endif;
			?>

		</li><!-- .section-$section->slug -->

		<?php
	endforeach;
	?>
	</ul><!-- .issue-contents -->
	<?php
endif;
?>
