<?php
/**
 * Custom scripts and styles.
 *
 * @package The Drift
 */

/**
 * Enqueue scripts and styles.
 *
 * @author WebDevStudios
 */
function drift_scripts() {
	$asset_file_path = dirname( __DIR__ ) . '/build/index.asset.php';
	$dependencies    = array();

	if ( is_readable( $asset_file_path ) ) {
		$asset_file = include $asset_file_path;
	} else {
		$asset_file = array(
			'version'      => '1.0.0',
			'dependencies' => array( 'wp-polyfill' ),
		);
	}	
	
	wp_register_script( 'drift-wpfs', get_stylesheet_directory_uri() . '/build/wpfs.js', array( 'jquery' ), $asset_file['version'], true );

	// Register styles & scripts.
	wp_enqueue_style( 'drift-css', get_stylesheet_directory_uri() . '/build/index.css', $dependencies, $asset_file['version'] );
	wp_enqueue_script( 'drift-scripts', get_stylesheet_directory_uri() . '/build/index.js', $asset_file['dependencies'], $asset_file['version'], true );

	global $post;
	if( is_a( $post, '\WP_Post' ) && has_shortcode( $post->post_content, 'fullstripe_form' ) ) {
		wp_enqueue_script( 'drift-wpfs' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'drift_scripts' );

/**
 * Preload styles and scripts.
 *
 * @author WebDevStudios
 */
function drift_preload_scripts() {
	$asset_file_path = dirname( __DIR__ ) . '/build/index.asset.php';

	if ( is_readable( $asset_file_path ) ) {
		$asset_file = include $asset_file_path;
	} else {
		$asset_file = array(
			'version'      => '1.0.0',
			'dependencies' => array( 'wp-polyfill' ),
		);
	}

	?>
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/build/index.css?ver=<?php echo esc_html( $asset_file['version'] ); ?>" as="style">
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/build/index.js?ver=<?php echo esc_html( $asset_file['version'] ); ?>" as="script">
	<?php
}
add_action( 'wp_head', 'drift_preload_scripts', 1 );

/**
 * Preload assets.
 *
 * @author Corey Collins
 */
function drift_preload_assets() {
	?>
	<?php if ( drift_get_custom_logo_url() ) : ?>
		<link rel="preload" href="<?php echo esc_url( drift_get_custom_logo_url() ); ?>" as="image">
	<?php endif; ?>
	<?php
}
add_action( 'wp_head', 'drift_preload_assets', 1 );
