<?php
/**
 * Content Taxonomies
 *
 * @since   1.0.0
 * @package SiteFunctionality
 */
namespace SiteFunctionality\Taxonomies;

use SiteFunctionality\Abstracts\Taxonomy;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Type extends Taxonomy {

	/**
	 * Taxonomy data
	 */
	public const  TAXONOMY = array(
		'id'           => 'type',
		'title'        => 'Types',
		'singular'     => 'Type',
		'menu'         => 'Types',
		'archive'      => false,
		'with_front'   => true,
		'rest'         => 'types',
		'hierarchical' => true,
		'post_types'   => array(
			'post',
		),
	);

	/**
	 * Post Type fields
	 */
	public const FIELDS = array();

	// /**
	// * Init
	// *
	// * @return void
	// */
	// public function init() {}

	/**
	 * Register custom query vars
	 *
	 * @link https://developer.wordpress.org/reference/hooks/query_vars/
	 *
	 * @param array $vars The array of available query variables
	 */
	public function registerQueryVars( $vars ) : array {
		return $vars;
	}

}
