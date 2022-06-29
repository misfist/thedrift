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
			\add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		}

		/**
		 * Add rewrite rules
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_rewrite_rule/
		 *
		 * @return void
		 */
		public function rewrite_rules() {}

		/**
		 * Add Submenu in Users
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_users_page/
		 * 
		 * @return void
		 */
		public function add_admin_menu() {

			\add_users_page(
				\esc_html__( 'Authors', 'site-functionality' ),
				\esc_html__( 'Authors', 'site-functionality' ),
				'list_users',
				'edit-tags.php?taxonomy=authors'
			);
	
		}

	}
