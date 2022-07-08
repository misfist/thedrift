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
		'post_types'  => array( 'post', 'mention' ),
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
		\add_action( 'acf/init', array( $this, 'add_user_meta' ) );

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

	/**
	 * Register Term Meta
	 *
	 * @return void
	 */
	public function add_user_meta() {
		$default = \SiteFunctionality\get_author_initials( (int) $author );
		\acf_add_local_field_group(
			array(
				'key'                   => 'group_author_meta',
				'title'                 => \__( 'Author Details', 'site-functionality' ),
				'fields'                => array(
					array(
						'key'               => 'field_author_initials',
						'label'             => \__( 'Initials', 'site-functionality' ),
						'name'              => 'initials',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'taxonomy',
							'operator' => '==',
							'value'    => self::TAXONOMY['id'],
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'left',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 1,
			)
		);

	}

}
