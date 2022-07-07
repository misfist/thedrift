<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package  SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\LatestIssues;

use SiteFunctionality\Util\TemplateLoader;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 /**
  * Render Block
  *
  * @param array $block
  * @param string $content
  * @param boolean $is_preview
  * @param integer $post_id
  * @return void
  */
function render( $block, $content = '', $is_preview = false, $post_id = 0 ) {

	$args  = array(
		'post_type'      => 'issue',
		'posts_per_page' => 4,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'ignore_sticky'  => true,
		'offset'         => 1,
	);

	$query = new \WP_Query( $args );

	if ( $query->have_posts() ) :
		$id = ! empty( $block['anchor'] ) ? $block['anchor'] : 'latest-issues-' . $block['id'];

		$class = str_replace( '/', '-', $block['name'] ) . ' latest-issues';
		if ( ! empty( $block['className'] ) ) {
			$class .= ' ' . $block['className'];
		}
		if ( ! empty( $block['align'] ) ) {
			$class .= ' align' . $block['align'];
		}
		?>
		<section id="<?php echo \esc_attr( $id ); ?>" class="wp-block-<?php echo $class; ?>">
			<?php
			if ( $heading = \get_field( 'section_title' ) ) :
				?>
				<header class="section-header">
					<h2 class="section-title">
						<?php echo \esc_html( $heading ); ?>
					</h2>
				</header><!-- .section-header -->
				<?php
			endif;
			?>
			
			<ol class="post-list">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				$issues_page = \get_page_by_path( 'issues', OBJECT, array( 'page' ) );
				$issue_no    = preg_match_all( '/\d+/', $query->post->post_name, $number ) ? end( $number[0] ) : '';
				?>

				<li <?php \post_class(); ?> data-count="<?php echo \esc_attr( $issue_no ); ?>">
					<a href="<?php echo \get_the_permalink( $issues_page->ID ); ?>#<?php echo $query->post->post_name; ?>" title="<?php echo \esc_attr( \get_the_title() ); ?>">
					<?php
					if ( \has_post_thumbnail() ) :
						?>
						<?php \the_post_thumbnail( 'medium', array( 'class' => 'issue-cover' ) ); ?>
						<?php
					endif;
					?>
					</a> 
				</li>

				<?php
			endwhile;
			?>
			</ol><!-- .post-list -->

			<?php
			if ( $link = \get_field( 'section_link' ) ) :
				?>
				<footer class="section-footer">
					<?php
					$url   = array_key_exists( 'url', $link ) && $link['url'] ? $link['url'] : \get_permalink( (int) \get_option( 'page_for_posts' ) );
					$title = array_key_exists( 'title', $link ) && $link['title'] ? $link['title'] : __( 'See more' );
					?>
					<a href="<?php echo \esc_url( $url ); ?>" title="<?php \esc_attr_e( $title, 'site-functionality' ); ?>"><?php \esc_html_e( $title, 'site-functionality' ); ?></a>
				</footer><!-- .section-footer -->
				<?php
			endif;
			?>

		</section><!-- .wp-block-<?php echo $class; ?> -->
		<?php
	endif;

}

/**
 * Registers the `acf/latest-articles` block on the server.
 */
function register() {
	\acf_register_block_type(
		array(
			'name'            => 'latest-issues',
			'title'           => \__( 'Latest Issues', 'site-functionality' ),
			'description'     => '',
			'category'        => 'common',
			'keywords'        => array(
				0 => 'issue',
				1 => 'featured',
			),
			'post_types'      => array(
				0 => 'post',
				1 => 'page',
			),
			'mode'            => 'preview',
			'align'           => '',
			'align_content'   => '',
			'render_template' => '',
			'render_callback' => __NAMESPACE__ . '\render',
			'enqueue_style'   => '',
			'enqueue_script'  => '',
			'enqueue_assets'  => '',
			'icon'            => 'book-alt',
			'supports'        => array(
				'align'         => false,
				'mode'          => false,
				'multiple'      => false,
				'jsx'           => true,
				'align_content' => true,
				'anchor'        => true,
				'color'         => true,
			),
		)
	);
}
add_action( 'acf/init', __NAMESPACE__ . '\register' );
