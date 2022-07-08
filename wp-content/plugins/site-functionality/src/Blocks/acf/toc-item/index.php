<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package  SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\TocItem;

use SiteFunctionality\Util\TemplateLoader;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 /**
  * Render Block
  *
  * @param array   $block
  * @param string  $content
  * @param boolean $is_preview
  * @param integer $post_id
  * @return void
  */
function render( $block, $content = '', $is_preview = false, $post_id = 0 ) {
	if ( $post_id = \get_field( 'post' ) ) {
		$post = \get_post( $post_id );
		
		$classes = implode( ' ', \get_post_class( 'toc-item', $post ) );
		?>
		<li id="post-<?php echo $post->ID; ?>" class="<?php echo $classes; ?>">
			<h3 class="entry-title"><a href="<?php \the_permalink( $post->ID ); ?>" title="<?php echo \esc_attr( $post->post_title ); ?>"><?php echo \get_the_title( $post->ID ); ?></a></h3>
			<?php
			$taxonomy = 'authors';
			if ( 'post' === $post->post_type && ( $authors = \get_the_terms( $post->ID, $taxonomy ) ) ) :
				?>
				<div class="entry-meta">

					<?php \SiteFunctionality\authors( $post->ID, $taxonomy ); ?>
 
				</div><!-- .entry-meta -->
				<?php
			endif;
			?>
		</li><!-- .wp-block-<?php echo $class; ?> -->
		
	<?php
	}

}

/**
 * Registers the `acf/toc` block on the server.
 */
function register() {
	\acf_register_block_type(
		array(
			'name'            => 'toc-item',
			'title'           => \__( 'TOC Item', 'site-functionality' ),
			'description'     => '',
			'category'        => 'common',
			'keywords'        => array(
				0 => 'list',
			),
			'post_types'      => array(
				0 => 'issue',
			),
			'mode'            => 'preview',
			'align_content'   => null,
			'render_template' => '',
			'render_callback' => __NAMESPACE__ . '\render',
			'enqueue_style'   => '',
			'enqueue_script'  => '',
			'enqueue_assets'  => '',
			'icon'            => 'list-view',
			'parent'          => 'acf/toc',
			'supports'        => array(
				'align'         => true,
				'mode'          => true,
				'multiple'      => true,
				'jsx'           => true,
				'align_content' => false,
				'anchor'        => true,
				'color'         => true,
			),
		)
	);
}
add_action( 'acf/init', __NAMESPACE__ . '\register' );
