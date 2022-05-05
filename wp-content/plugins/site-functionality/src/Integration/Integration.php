<?php
/**
 * Content PostTypes
 *
 * @since   1.0.0
 * @package SiteFunctionality
 */
namespace SiteFunctionality\Integration;

use SiteFunctionality\Abstracts\Base;
use SiteFunctionality\Integration\LeakyPaywall;


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Integration extends Base {

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
		new LeakyPaywall( $this->version, $this->plugin_name );
	}

}
