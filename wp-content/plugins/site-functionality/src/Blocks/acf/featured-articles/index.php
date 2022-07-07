<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package  SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\FeaturedArticles;

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

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
	);

	if ( $posts = \get_field( 'posts' ) ) {
		$args['post__in'] = (array) $posts;
	} else {
		if ( $tags = \get_field( 'tags' ) ) {
			$args['tag__in'] = (array) $tags;
		}
		if ( $posts_per_page = \get_field( 'posts_per_page' ) ) {
			$args['posts_per_page'] = (int) $posts_per_page;
		}
	}

	$query = new \WP_Query( $args );

	if ( $query->have_posts() ) :
		$loader_params   = \SiteFunctionality\Blocks\get_template_params();
		$template_loader = new TemplateLoader( $loader_params );

		$id    = ! empty( $block['anchor'] ) ? $block['anchor'] : 'featured-article-' . $block['id'];
		$class = str_replace( '/', '-', $block['name'] ) . ' featured-article';
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
			
			<div class="post-list">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>

				<?php
				$template_loader
					->setTemplateData(
						array()
					)
					->getTemplatePart( 'post' );
				?>

				<?php
			endwhile;
			wp_reset_postdata();
			?>
			</div><!-- .post-list -->

			<?php
			if ( $link = \get_field( 'section_link' ) ) :
				?>
				<footer class="section-footer">
					<?php
					$url   = array_key_exists( 'url', $link ) && $link['url'] ? $link['url'] : \get_page_link( (int) \get_option( 'page_for_posts' ) );
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
 * Registers the `acf/featured-articles` block on the server.
 */
function register() {
	\acf_register_block_type(
		array(
			'name'            => 'featured-articles',
			'title'           => \__( 'Featured Articles', 'site-functionality' ),
			'description'     => '',
			'category'        => 'common',
			'keywords'        => array(
				0 => 'issue',
				1 => 'featured',
			),
			'post_types'      => array(
				0 => 'page',
			),
			'mode'            => 'preview',
			'align'           => '',
			'align_content'   => '',
			'render_template' => '',
			'render_callback' => __NAMESPACE__ . '\render',
			'enqueue_style'   => '',
			'enqueue_script'  => '',
			'enqueue_assets'  => '',
			'icon'            => 'star-filled',
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
