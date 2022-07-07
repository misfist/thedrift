<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package  SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\InterstitialSignup;

use SiteFunctionality\Util\TemplateLoader;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Render Block
 *
 * @param array  $block_attributes
 * @param string $content
 * @return string
 */
function render( $block, $content = '', $is_preview = false, $post_id = 0 ) {
	$template = array(
		array(
			'core/heading',
			array(
				'level'       => 2,
				'placeholder' => __( 'Add heading...', 'site-functionality' ),
			),
		),
		array(
			'getwid/mailchimp',
			array(),
		),
	);
	$id       = ! empty( $block['anchor'] ) ? $block['anchor'] : 'interstitial-signup-' . $block['id'];
	$class    = str_replace( '/', '-', $block['name'] ) . ' interstitial-signup';
	if ( ! empty( $block['className'] ) ) {
		$class .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class .= ' align' . $block['align'];
	}
	?>
	<section id="<?php echo \esc_attr( $id ); ?>" class="wp-block-<?php echo $class; ?>">

		<div class="alignfull-wrapper">
			<InnerBlocks template="<?php echo \esc_attr( \wp_json_encode( $template ) ); ?>" />
		</div>

	</section><!-- .wp-block-<?php echo $class; ?> -->

	<?php
}

/**
 * Registers the `acf/interstitial-signup` block on the server.
 */
function register() {
	\acf_register_block_type(
		array(
			'name'            => 'interstitial-signup',
			'title'           => \__( 'Interstitial - Signup Form', 'site-functionality' ),
			'description'     => '',
			'category'        => 'common',
			'keywords'        => array(
				0 => 'interstitial',
				1 => 'section',
				2 => 'callout',
			),
			'post_types'      => array(
				0 => 'post',
				1 => 'page',
				2 => 'mention',
			),
			'mode'            => 'preview',
			'align'           => 'full',
			'align_content'   => null,
			'render_template' => '',
			'render_callback' => __NAMESPACE__ . '\render',
			'enqueue_style'   => '',
			'enqueue_script'  => '',
			'enqueue_assets'  => '',
			'icon'            => 'feedback',
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
