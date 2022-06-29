<?php
/**
 * Register and Render Block
 *
 * @since   1.0.0
 * @package Site_Functionality
 */
namespace Site_Functionality\Blocks\ACF\Featured_Issue;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Render Block
 *
 * @param array $block_attributes
 * @param string $content
 * @return string
 */
function render( $block, $content = '', $is_preview = false, $post_id = 0 ) {
    ?>
    <!-- Render callback -->
    Test
    <?php 
}

/**
 * Registers the `site-functionality/event-time` block on the server.
 */
function register() {
	\register_block_type(
		__DIR__,
		[
			'render_callback' 	=> __NAMESPACE__ . '\render',
		]
	);
}
// add_action( 'init', __NAMESPACE__ . '\register' );