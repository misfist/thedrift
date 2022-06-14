<?php
/**
 *
 */
$args  = array(
	'post_type'      => 'issue',
	'posts_per_page' => '4',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'ignore_sticky'  => true,
);
$query = new wp_query( $args );
?>
<section class="issues">
	<header class="latestArticle_Heading td-issues-head issue__header">
		<h1 class="issues__title"><?php esc_html_e( 'Issues', 'drift' ); ?></h1>
	</header>
	<div class="home_issues">
		<div class="row custom_wrap home_mentions_wrap">		
			<ol class="issues_list_ul row">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					$fallback_image = get_stylesheet_directory_uri() . '/assets/images/dummy.jpg';
					$issues_page    = get_page_by_path( 'issues', OBJECT, array( 'page' ) );
					$issue_no       = preg_match_all( '/\d+/', $post->post_name, $number ) ? end( $number[0] ) : '';
					?>
					<li <?php post_class( 'col-md-3 issues_image' ); ?> data-count="<?php echo esc_attr( $issue_no ); ?>">
						<a href="<?php echo get_the_permalink( $issues_page->ID ); ?>#<?php echo $post->post_name; ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
						<?php
						if ( has_post_thumbnail() ) :
							?>
								<?php the_post_thumbnail( 'medium', array( 'class' => 'issue-cover' ) ); ?>
							<?php
						else :
							?>
								<img src="<?php echo esc_url( $fallback_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="issue-cover">
							<?php
						endif;
						?>
						</a> 
					</li>
			<?php endwhile; ?>
			</ol>		   			
		</div>

		<div class="nextIssues">
			<a href="<?php echo esc_url( get_the_permalink( $issues_page->ID ) ); ?>" class="issuesMoreIcon">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/angle-right.png">
			</a>
		</div>

	</div>
	
</section>
