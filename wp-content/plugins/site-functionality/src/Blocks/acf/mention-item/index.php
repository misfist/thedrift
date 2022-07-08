<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package  SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\MentionItem;

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
				'placeholder' => __( 'Add title...', 'site-functionality' ),
				'className'   => 'entry-title',
				'lock'        => array(
					'move'   => false,
					'remove' => false,
				),
			),
		),
		array(
			'core/paragraph',
			array(
				'placeholder' => __( 'Add genre...', 'site-functionality' ),
				'className'   => 'entry-genre',
				'lock'        => array(
					'move'   => false,
					'remove' => false,
				),
			),
		),
		array(
			'core/paragraph',
			array(
				'placeholder' => __( 'Add content...', 'site-functionality' ),
				'className'   => 'entry-content',
			),
		),
	);
	$allowed_blocks = array( 'core/heading', 'core/paragraph' );

	$id    = ! empty( $block['anchor'] ) ? $block['anchor'] : 'mention-' . $block['id'];
	$class = str_replace( '/', '-', $block['name'] ) . ' mention';
	if ( ! empty( $block['className'] ) ) {
		$class .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class .= ' align' . $block['align'];
	}
	?>
	<article class="<?php echo \esc_attr( $class ); ?>">
		<InnerBlocks 
			template="<?php echo \esc_attr( \wp_json_encode( $template ) ); ?>" 
			allowedBlocks="<?php echo \esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
		/>
		<?php
		$author = \get_field( 'author' );
		$initials = \get_field( 'author_initials' );
		if( $author  || $initials ) :
			?>
			<div class="author">
				<?php
				if ( $initials ) : 
					?>
					<?php echo \esc_attr( $initials ); ?>
					<?php
				elseif ( $author ) :
					?>

					<?php
					if( $initials = \get_term_meta( (int) $author, 'initials', true ) ) :
						?>
						<?php echo \esc_attr( $initials ); ?>
						<?php
					elseif( $author ) :
						?>
						<?php echo \SiteFunctionality\author_initials( (int) $author ); ?>
						<?php
					endif;
					?>
				
					<?php
				endif;
				?>
	
			</div>
			<?php
		endif;
		?>
	</article>
	
	<?php
}

/**
 * Registers the `acf/mention-item` block on the server.
 */
function register() {
	\acf_register_block_type(
		array(
			'name'            => 'mention-item',
			'title'           => \__( 'Mention', 'site-functionality' ),
			'description'     => '',
			'category'        => 'common',
			'keywords'        => array(
				0 => 'list',
			),
			'post_types'      => array(
				0 => 'mention',
			),
			'mode'            => 'preview',
			'align_content'   => null,
			'render_template' => '',
			'render_callback' => __NAMESPACE__ . '\render',
			'enqueue_style'   => '',
			'enqueue_script'  => '',
			'enqueue_assets'  => '',
			'icon'            => 'admin-comments',
			// 'parent'          => 'acf/mention',
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
