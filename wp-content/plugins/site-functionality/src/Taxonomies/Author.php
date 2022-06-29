<?php
/**
 * Taxonomy
 *
 * @package   Site_Functionality
 */
namespace SiteFunctionality\Taxonomies;

use SiteFunctionality\Abstracts\Taxonomy;

	/**
	 * Class Taxonomies
	 *
	 * @package Site_Functionality\Taxonomies
	 * @since 0.1.0
	 */
	class Author extends Taxonomy {

		/**
		 * Taxonomy data
		 */
		public const TAXONOMY = array(
			'id'          => 'authors',
			'title'       => 'Authors',
			'singular'    => 'Author',
			'menu'        => 'Authors',
			'post_types'  => array( 'post', 'mentions' ),
			'has_archive' => false,
			'archive'     => 'article_author',
			'with_front'  => false,
			'rest'        => 'authors',
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
