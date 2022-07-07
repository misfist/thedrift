<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package  SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\FeaturedIssue;

use SiteFunctionality\Util\TemplateLoader;
// use SiteFunctionality\Blocks\acf\get_template_params;

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
	global $post;

	if ( $post = \get_field( 'post' ) ) {
		$loader_params   = \SiteFunctionality\Blocks\get_template_params();
		$template_loader = new TemplateLoader( $loader_params );
		\setup_postdata( $post );

		$id              = ! empty( $block['anchor'] ) ? $block['anchor'] : 'featured-issue-' . $block['id'];
		$class = str_replace( '/', '-', $block['name'] ) . ' featured-issue';
		if ( ! empty( $block['className'] ) ) {
			$class .= ' ' . $block['className'];
		}
		if ( ! empty( $block['align'] ) ) {
			$class .= ' align' . $block['align'];
		}
		?>
		<section id="<?php echo \esc_attr( $id ); ?>" class="wp-block-<?php echo $class; ?>">

			<?php
			$template_loader
			->setTemplateData(
				array(
					'has_link' => true,
					'link'     => get_post_type_archive_link( $post->post_type ),
				)
			)
				->getTemplatePart( $post->post_type );
			?>

		</section><!-- .wp-block-<?php echo $class; ?> -->
		
		<?php
		wp_reset_postdata();
	}
}

/**
 * Registers the `acf/featured-issue` block on the server.
 */
function register() {

	\acf_register_block_type(
		array(
			'name'            => 'featured-issue',
			'title'           => \__( 'Featured Issue', 'site-functionality' ),
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
