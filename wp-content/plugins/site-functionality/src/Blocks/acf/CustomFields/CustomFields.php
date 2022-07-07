<?php
/**
 * Content CustomFields
 *
 * @since   1.0.0
 * @package SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf\CustomFields;

use SiteFunctionality\Abstracts\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CustomFields extends Base {

	/**
	 * Custom fields
	 */
	public const FIELDS = array(
		'amount'     => 'number',
		'number'     => 'integer',
		'average'    => 'number',
		'price'      => 'number',
		'file'       => 'string',
		'show_title' => 'boolean',
	);

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
	 * Init
	 *
	 * @return void
	 */
	public function init() {
		\add_action( 'acf/init', array( $this, 'acf_settings' ) );
		\add_action( 'acfe/init', array( $this, 'acfe_settings' ) );
		\add_action( 'acf/init', array( $this, 'featured_issue' ) );
		\add_action( 'acf/init', array( $this, 'featured_articles' ) );
		\add_action( 'acf/init', array( $this, 'latest_articles' ) );
		\add_action( 'acf/init', array( $this, 'interstitial' ) );
		\add_action( 'acf/init', array( $this, 'interstitial_signup' ) );
	}

	/**
	 * Modify ACF settings
	 *
	 * @link https://www.advancedcustomfields.com/resources/acf-settings/
	 *
	 * @return void
	 */
	public function acf_settings() {}

	/**
	 * Modify ACF settings
	 *
	 * @link https://www.acf-extended.com/features/modules/dynamic-options-pages
	 *
	 * @return void
	 */
	public function acfe_settings() {}

	/**
	 * Register fields
	 *
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 *
	 * @return void
	 */
	public function featured_issue() {
		\acf_add_local_field_group(
			array(
				'key'                   => 'group_featured_issue',
				'title'                 => \__( 'Featured Issue', 'site-functionality' ),
				'fields'                => array(
					array(
						'key'                => 'field_select_issue',
						'label'              => \__( 'Select Issue', 'site-functionality' ),
						'name'               => 'post',
						'type'               => 'post_object',
						'instructions'       => '',
						'required'           => 1,
						'conditional_logic'  => 0,
						'wrapper'            => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'post_type'          => array(
							0 => 'issue',
						),
						'taxonomy'           => '',
						'allow_null'         => 0,
						'multiple'           => 0,
						'return_format'      => 'object',
						'save_custom'        => 0,
						'save_post_status'   => 'publish',
						'acfe_bidirectional' => array(
							'acfe_bidirectional_enabled' => '0',
						),
						'ui'                 => 1,
					),
					array(
						'key'               => 'field_link',
						'label'             => \__( 'Link', 'site-functionality' ),
						'name'              => 'link',
						'type'              => 'acfe_advanced_link',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'post_type'         => '',
						'taxonomy'          => '',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'block',
							'operator' => '==',
							'value'    => 'acf/featured-issue',
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
				'show_in_rest'          => true,
				'acfe_autosync'         => 'php',
			)
		);
	}

	/**
	 * Register fields
	 *
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 *
	 * @return void
	 */
	public function featured_articles() {
		\acf_add_local_field_group(
			array(
				'key'                   => 'group_featured_articles',
				'title'                 => \__( 'Featured Articles', 'site-functionality' ),
				'fields'                => array(
					array(
						'key'               => 'field_section_title',
						'label'             => \__( 'Section Title', 'site-functionality' ),
						'name'              => 'section_title',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => \__( 'Featured', 'site-functionality' ),
						'placeholder'       => \__( 'Add section header...', 'site-functionality' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'                => 'field_featured_posts',
						'label'              => \__( 'Articles', 'site-functionality' ),
						'name'               => 'posts',
						'type'               => 'post_object',
						'instructions'       => \__( 'Manually select articles to display in a Featured block.', 'site-functionality' ),
						'required'           => 0,
						'conditional_logic'  => 0,
						'wrapper'            => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'post_type'          => array(
							0 => 'post',
						),
						'taxonomy'           => '',
						'allow_null'         => 0,
						'multiple'           => 1,
						'return_format'      => 'id',
						'save_custom'        => 0,
						'save_post_status'   => 'publish',
						'acfe_bidirectional' => array(
							'acfe_bidirectional_enabled' => '0',
						),
						'ui'                 => 1,
					),
					array(
						'key'               => 'field_62c619355aa68',
						'label'             => \__( 'Query Options', 'site-functionality' ),
						'name'              => '',
						'type'              => 'message',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'label',
							'id'    => '',
						),
						'message'           => \__( 'Query Options', 'site-functionality' ),
						'new_lines'         => '',
						'esc_html'          => 0,
					),
					array(
						'key'                => 'field_featured_post_tag',
						'label'              => \__( 'Tag', 'site-functionality' ),
						'name'               => 'post_tags',
						'type'               => 'taxonomy',
						'instructions'       => \__(
							'Display most recent posts from a specific tag.
							e.g. Featured',
							'site-functionality'
						),
						'required'           => 0,
						'conditional_logic'  => 0,
						'wrapper'            => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'taxonomy'           => 'post_tag',
						'field_type'         => 'select',
						'allow_null'         => 1,
						'add_term'           => 0,
						'save_terms'         => 0,
						'load_terms'         => 0,
						'return_format'      => 'id',
						'acfe_bidirectional' => array(
							'acfe_bidirectional_enabled' => '0',
						),
						'multiple'           => 0,
					),
					array(
						'key'               => 'field_posts_per_page',
						'label'             => \__( 'Number of Posts', 'site-functionality' ),
						'name'              => 'posts_per_page',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => 3,
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'min'               => '',
						'max'               => '',
						'step'              => '',
					),
					array(
						'key'               => 'field_section',
						'label'             => \__( 'Link', 'site-functionality' ),
						'name'              => 'section_link',
						'type'              => 'acfe_advanced_link',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'post_type'         => '',
						'taxonomy'          => '',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'block',
							'operator' => '==',
							'value'    => 'acf/featured-articles',
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
				'show_in_rest'          => 0,
			)
		);
	}

	/**
	 * Register fields
	 *
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 *
	 * @return void
	 */
	public function latest_articles() {
		\acf_add_local_field_group(
			array(
				'key'                   => 'group_latest_articles',
				'title'                 => \__( 'Latest Articles', 'site-functionality' ),
				'fields'                => array(
					array(
						'key'               => 'field_section_title',
						'label'             => \__( 'Section Title', 'site-functionality' ),
						'name'              => 'section_title',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => 'Latest',
						'placeholder'       => \__( 'Add section header...', 'site-functionality' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_query_options_label',
						'label'             => \__( 'Query Options', 'site-functionality' ),
						'name'              => '',
						'type'              => 'message',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'label',
							'id'    => '',
						),
						'message'           => '',
						'new_lines'         => '',
						'esc_html'          => 0,
					),
					array(
						'key'                => 'field_post_type',
						'label'              => \__( 'Post Type', 'site-functionality' ),
						'name'               => 'post_type',
						'type'               => 'acfe_post_types',
						'instructions'       => '',
						'required'           => 0,
						'conditional_logic'  => 0,
						'wrapper'            => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'post_type'          => array(
							0 => 'post',
							1 => 'mention',
						),
						'field_type'         => 'select',
						'default_value'      => array(
							0 => 'post',
						),
						'return_format'      => 'name',
						'allow_null'         => 1,
						'multiple'           => 1,
						'ui'                 => 1,
						'ajax'               => 1,
						'placeholder'        => \__( 'Select Post Type', 'site-functionality' ),
						'allow_custom'       => 0,
						'choices'            => array(),
						'search_placeholder' => '',
						'layout'             => '',
						'toggle'             => 0,
					),
					array(
						'key'               => 'field_posts_per_page',
						'label'             => \__( 'Number of Posts', 'site-functionality' ),
						'name'              => 'posts_per_page',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => 3,
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'min'               => '',
						'max'               => '',
						'step'              => '',
					),
					array(
						'key'                => 'field_issue',
						'label'              => \__( 'Issue', 'site-functionality' ),
						'name'               => 'issue',
						'type'               => 'taxonomy',
						'instructions'       => \__( 'Limit articles to specific issue', 'site-functionality' ),
						'required'           => 0,
						'conditional_logic'  => 0,
						'wrapper'            => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'taxonomy'           => 'issue',
						'field_type'         => 'multi_select',
						'allow_null'         => 1,
						'add_term'           => 0,
						'save_terms'         => 0,
						'load_terms'         => 0,
						'return_format'      => 'id',
						'acfe_bidirectional' => array(
							'acfe_bidirectional_enabled' => '0',
						),
						'multiple'           => 0,
					),
					array(
						'key'               => 'field_section_link',
						'label'             => \__( 'Link', 'site-functionality' ),
						'name'              => 'section_link',
						'type'              => 'acfe_advanced_link',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'post_type'         => '',
						'taxonomy'          => '',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'block',
							'operator' => '==',
							'value'    => 'acf/latest-articles',
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
				'show_in_rest'          => true,
			)
		);
	}

	/**
	 * Register fields
	 *
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 *
	 * @return void
	 */
	public function interstitial() {
		\acf_add_local_field_group(
			array(
				'key'                   => 'group_interstitial',
				'title'                 => \__( 'Interstitial', 'site-functionality' ),
				'fields'                => array(),
				'location'              => array(
					array(
						array(
							'param'    => 'block',
							'operator' => '==',
							'value'    => 'acf/interstitial',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'left',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => false,
				'description'           => '',
				'show_in_rest'          => true,
			)
		);
	}
	/**
	 * Register fields
	 *
	 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
	 *
	 * @return void
	 */
	public function interstitial_signup() {
		\acf_add_local_field_group(
			array(
				'key'                   => 'group_interstitial_signup',
				'title'                 => \__( 'Interstitial Signup Form', 'site-functionality' ),
				'fields'                => array(),
				'location'              => array(
					array(
						array(
							'param'    => 'block',
							'operator' => '==',
							'value'    => 'acf/interstitial-signup',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'left',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => false,
				'description'           => '',
				'show_in_rest'          => true,
			)
		);
	}
}
