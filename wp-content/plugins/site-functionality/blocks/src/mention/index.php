<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\Blocks\Mention;

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
function render( $attributes, $content, $block ) {
	$wrapper_attributes = \get_block_wrapper_attributes();

	// if( ! \is_admin() ) {
	// echo '<pre>';
	// var_dump( $attributes, $block );
	// echo '</pre>';
	// }

	$allowed_html = array(
		'a'      => array(
			'href'   => array(),
			'title'  => array(),
			'target' => array(),
		),
		'p'      => array(
			'em'     => array(),
			'strong' => array(),
		),
		'em'     => array(),
		'strong' => array(),
	);

	ob_start();

	if ( isset( $attributes['title'] ) && isset( $attributes['content'] ) ) :
		?>

	<article <?php echo $wrapper_attributes; ?>>

		<div class="faq__title title">
			<?php
			if ( $title = $attributes['title'] ) :
				?>
				<h3>
					<?php echo apply_filters( 'the_title', $title ); ?>
				</h3>
				<?php
			endif;
			?>
		</div>
		<?php
		if ( $genre = $attributes['genre'] ) :
			?>
			<div class="faq__genre genre">
				<?php echo wp_kses( $genre, $allowed_html ); ?>
			</div>
			<?php
		endif;
		?>
		<div class="faq__content content">
			<?php
			if ( $content = $attributes['content'] ) :
				?>
				<div class="content-wrapper">
					<?php echo wp_kses_post( $content ); ?>
				</div>
				<?php
			endif;
			?>
		</div>
		<?php
		if ( $author = $attributes['author'] ) :
			?>
			<div class="faq__author author">
				<?php echo wp_kses( $author, $allowed_html ); ?>
			</div>
			<?php
		endif;
		?>
	</article>

		<?php
	endif;
	$return = apply_filters( __NAMESPACE__ . '\RenderHTML', ob_get_clean(), $attributes, $content, $block );

	return $return;
}

/**
 * Registers the `site-functionality/mention` block on the server.
 */
function register() {
	\register_block_type(
		__DIR__,
		array(
			'render_callback' => __NAMESPACE__ . '\render',
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\register' );
