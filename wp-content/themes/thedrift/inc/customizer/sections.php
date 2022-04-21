<?php
/**
 * Customizer sections.
 *
 * @package The Drift
 */

/**
 * Register the section sections.
 *
 * @author WebDevStudios
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function drift_customize_sections( $wp_customize ) {

	// Register additional scripts section.
	$wp_customize->add_section(
		'drift_additional_scripts_section',
		[
			'title'    => esc_html__( 'Additional Scripts', 'the-drift' ),
			'priority' => 10,
			'panel'    => 'site-options',
		]
	);

	// Register a social links section.
	$wp_customize->add_section(
		'drift_social_links_section',
		[
			'title'       => esc_html__( 'Social Media', 'the-drift' ),
			'description' => esc_html__( 'Links here power the display_social_network_links() template tag.', 'the-drift' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		]
	);

	// Register a header section.
	$wp_customize->add_section(
		'drift_header_section',
		[
			'title'    => esc_html__( 'Header Customizations', 'the-drift' ),
			'priority' => 90,
			'panel'    => 'site-options',
		]
	);

	// Register a footer section.
	$wp_customize->add_section(
		'drift_footer_section',
		[
			'title'    => esc_html__( 'Footer Customizations', 'the-drift' ),
			'priority' => 90,
			'panel'    => 'site-options',
		]
	);
}
add_action( 'customize_register', 'drift_customize_sections' );
