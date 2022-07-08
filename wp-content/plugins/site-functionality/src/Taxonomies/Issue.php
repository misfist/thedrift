<?php
/**
 * Taxonomy
 *
 * @package    SiteFunctionality
 */
namespace SiteFunctionality\Taxonomies;

use SiteFunctionality\Abstracts\Taxonomy;

	/**
	 * Class Taxonomies
	 *
	 * @package  SiteFunctionality\Taxonomies
	 * @since 0.1.0
	 */
	class Issue extends Taxonomy {

		/**
		 * Taxonomy data
		 */
		public const TAXONOMY = array(
			'id'          => 'issue',
			'title'       => 'Issue Categories',
			'singular'    => 'Issue Category',
			'menu'        => 'Issue Category',
			'post_types'  => array( 'post', 'issue', 'mentions' ),
			'has_archive' => false,
			'archive'     => 'issue',
			'with_front'  => false,
			'rest'        => 'issues',
		);

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct( $version, $plugin_name ) {
			parent::__construct( $version, $plugin_name );

			\add_action( 'init', array( $this, 'rewrite_rules' ), 10, 0 );
		}

		/**
		 * Add rewrite rules
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_rewrite_rule/
		 *
		 * @return void
		 */
		public function rewrite_rules() {}

	}
