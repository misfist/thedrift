<?php
/**
 * Content Filters
 *
 * @since   1.0.0
 * @package SiteFunctionality
 */
namespace SiteFunctionality\Util;

use SiteFunctionality\Abstracts\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Filters extends Base {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $version, $plugin_name ) {
		parent::__construct( $version, $plugin_name );
		$this->init();
	}

	/**
	 * Add Actions
	 *
	 * @return void
	 */
	public function init() {
		/**
		 * @see https://make.wordpress.org/core/2021/07/01/block-styles-loading-enhancements-in-wordpress-5-8/
		 */
		\add_filter( 'should_load_separate_core_block_assets', '__return_true' );
		\add_filter( 'the_excerpt', array( $this, 'maybe_use_custom_field_excerpt' ) );
	}

	/**
	 * Modify the excerpt
	 * 
	 * @link https://developer.wordpress.org/reference/hooks/the_excerpt/
	 *
	 * @param string $excerpt
	 * @return string $excerpt
	 */
	public function maybe_use_custom_field_excerpt( $excerpt ) {
		global $post;
		$limit = 20;
		if ( ! $post || ! is_object( $post ) ) {
			return $excerpt;
		}
		if ( $description = \get_post_meta( $post->ID, 'description', true ) ) {
			$description    = \strip_shortcodes( $description );
			$description    = \apply_filters( 'the_content', $description );
			$description    = \strip_shortcodes( $description );
			$excerpt_length = $limit;
			$excerpt_more   = \apply_filters( 'excerpt_more', ' ' . '&hellip;' );
			$excerpt        = \wp_trim_words( $description, $excerpt_length, $excerpt_more );
		}
		return $excerpt;
	}

}
