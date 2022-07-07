<?php
/**
 * Helper Functions
 *
 * @since   1.0.0
 * @package SiteFunctionality
 */

namespace SiteFunctionality;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get Post Authors
 *
 * @see get_object_taxonomies()
 * @param int    $post_id
 * @param string $taxonomy
 * @return array $term_links
 */
function get_authors( $post_id = null, $taxonomy = 'authors' ) : array {
	$post_id    = $post_id ? (int) $post_id : \get_the_ID();
	$terms      = \get_the_terms( $post_id, $taxonomy );
	$term_links = array();

	if ( $terms && ! \is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$term_links[] = '<a href="' . \esc_attr( \get_term_link( $term->slug, $taxonomy ) ) . '">' . \esc_html( $term->name ) . '</a>';
		}
	}

	return $term_links;
}

/**
 * Render Post Authors
 *
 * @param int $post_id
 * @param string $taxonomy
 * @return void
 */
function authors( $post_id = null, $taxonomy = 'authors' ) {
	if ( $terms = get_authors( $post_id, $taxonomy ) ) {
		$term_links = implode( ', ', $terms );
		?>
			<div class="entry-authors" rel="vcard"><?php echo $term_links; ?></div>
		<?php
	}
}

/**
 * Debug Helper
 */
if ( ! function_exists( 'console_log' ) ) {
	function console_log( $data ) {
		$output = $data;
		if ( is_array( $output ) ) {
			$output = implode( ',', $output );
		}

		echo "<script>console.log( $output );</script>";
	}
}

/**
 * Simple helper to debug to the console
 *
 * @param data object, array, string             $data
 * @param $context string  Optional a description.
 *
 * @return string
 */
function debug_to_console( $data, $context = 'Debug in Console' ) {

	// Buffering to solve problems frameworks, like header() in this and not a solid return.
	ob_start();

	$output  = 'console.info(\'' . $context . ':\');';
	$output .= 'console.log(' . json_encode( $data ) . ');';
	$output  = sprintf( '<script>%s</script>', $output );

	echo $output;
}
