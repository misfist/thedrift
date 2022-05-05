<?php
/**
 * Content Taxonomies
 *
 * @since   1.0.0
 * @package SiteFunctionality
 */
namespace SiteFunctionality\Taxonomies;

use SiteFunctionality\Abstracts\Base;
use SiteFunctionality\Taxonomies\Author;
use SiteFunctionality\Taxonomies\Section;
use SiteFunctionality\Taxonomies\Issue;
use SiteFunctionality\Taxonomies\Type;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Taxonomies extends Base {

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
		new Author( $this->version, $this->plugin_name );
		new Section( $this->version, $this->plugin_name );
		new Issue( $this->version, $this->plugin_name );
		new Type( $this->version, $this->plugin_name );
	}

}