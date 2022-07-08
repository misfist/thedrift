<?php
/**
 * Functions to register ACF Blocks
 *
 * @package SiteFunctionality
 */
namespace SiteFunctionality\Blocks\acf;

use SiteFunctionality;
use SiteFunctionality\Blocks\acf\CustomFields\CustomFields;

require_once \plugin_dir_path( __FILE__ ) . 'featured-articles/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'featured-issue/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'latest-articles/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'latest-issues/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'interstitial/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'interstitial-signup/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'column-list/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'column-list-item/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'toc/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'toc-item/index.php';
require_once \plugin_dir_path( __FILE__ ) . 'mention-item/index.php';

$custom_fields = new CustomFields( VERSION, PLUGIN );