<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package  SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\Toc;

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
				'level'       => 2,
				'placeholder' => __( 'Add heading...', 'site-functionality' ),
				'className' => 'section-heading'
			),
		),
		array(
			'acf/toc-item',
			array(
				'className'   => 'list-body',
				'lock' => array(
					'move'   => false,
					'remove' => false,
				),
			),
			array(
				array(
					'core/heading',
					array(
						'level'       => 3,
						'placeholder' => __( 'Add heading...', 'site-functionality' ),
						'className'   => 'list-item-heading',
					),
				),
				array(
					'core/list',
					array(
						'placeholder' => __( 'Add content...', 'site-functionality' ),
					),
				),
			)
		),
	);
	$allowed_blocks = array( 'core/heading', 'acf/toc-item' );

	$id    = ! empty( $block['anchor'] ) ? $block['anchor'] : 'toc-' . $block['id'];
	$class = str_replace( '/', '-', $block['name'] ) . ' toc';
	if ( ! empty( $block['className'] ) ) {
		$class .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class .= ' align' . $block['align'];
	}
	?>
	<section id="<?php echo \esc_attr( $id ); ?>" class="wp-block-<?php echo $class; ?>">

		<header class="section-header">
			<?php
			if ( $section_title = get_field( 'section_title' ) ) :
				?>
				<h2 class="section-title">
					<?php echo esc_html( $section_title ); ?>
				</h2>
				<?php
				endif;
			?>
			<?php
			if ( $section_subtitle = get_field( 'section_subtitle' ) ) :
				?>
				<h2 class="section-subtitle">
					<?php echo esc_html( $section_subtitle ); ?>
				</h2>
				<?php
			endif;
			?>
		</header>

		<InnerBlocks 
			template="<?php echo \esc_attr( \wp_json_encode( $template ) ); ?>" 
			allowedBlocks="<?php echo \esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
		/>

	</section><!-- .wp-block-<?php echo $class; ?> -->

	<?php
}

/**
 * Registers the `acf/toc` block on the server.
 */
function register() {
	\acf_register_block_type(
		array(
			'name'            => 'toc',
			'title'           => \__( 'Table of Content', 'site-functionality' ),
			'description'     => '',
			'category'        => 'common',
			'keywords'        => array(
				0 => 'column',
				1 => 'section',
				2 => 'list',
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
