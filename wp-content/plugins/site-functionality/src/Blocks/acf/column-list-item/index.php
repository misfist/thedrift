<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package  SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\ColumnListItem;

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
	$template       = array(
		array(
			'core/heading',
			array(
				'level'       => 3,
				'placeholder' => __( 'Add heading...', 'site-functionality' ),
				'className'   => 'list-item-heading',
				'lock'        => array(
					'move'   => false,
					'remove' => false,
				),
			),
		),
		array(
			'core/list',
			array(
				'placeholder' => __( 'Add content...', 'site-functionality' ),
			),
		),
	);
	$allowed_blocks = array( 'core/heading', 'core/list', 'core/paragraph' );

	$id    = ! empty( $block['anchor'] ) ? $block['anchor'] : 'column-list-item-' . $block['id'];
	$class = str_replace( '/', '-', $block['name'] ) . ' column-list-item';
	if ( ! empty( $block['className'] ) ) {
		$class .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class .= ' align' . $block['align'];
	}
	?>
	<div id="<?php echo \esc_attr( $id ); ?>" class="wp-block-<?php echo $class; ?>">

		<InnerBlocks 
			template="<?php echo \esc_attr( \wp_json_encode( $template ) ); ?>" 
			allowedBlocks="<?php echo \esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
		/>

	</div><!-- .wp-block-<?php echo $class; ?> -->

	<?php
}

/**
 * Registers the `acf/column-list` block on the server.
 */
function register() {
	\acf_register_block_type(
		array(
			'name'            => 'column-list-item',
			'title'           => \__( '2-Column List Item', 'site-functionality' ),
			'description'     => '',
			'category'        => 'common',
			'keywords'        => array(
				0 => 'list',
			),
			'post_types'      => array(
				0 => 'post',
				1 => 'page',
				2 => 'mention',
			),
			'mode'            => 'preview',
			'align_content'   => null,
			'render_template' => '',
			'render_callback' => __NAMESPACE__ . '\render',
			'enqueue_style'   => '',
			'enqueue_script'  => '',
			'enqueue_assets'  => '',
			'icon'            => 'editor-ul',
			'parent'          => 'acf/column-list',
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
