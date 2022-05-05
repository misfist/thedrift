<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package The Drift
 */

 /**
  * Get Issue
  *
  * @param int $post_id
  * @return mixed object WP_Term || false
  */
function drift_get_issue( $post_id = null ) {
	$post_id    = $post_id ? $post_id : get_the_ID();
	$taxonomy   = 'issue';
	$issue_slug = get_post_field( 'post_name', $post_id );

	if ( $terms = wp_get_post_terms( $post_id, $taxonomy ) ) {
		return $terms[0];
	} elseif ( has_term( $issue_slug, $taxonomy, $post_id ) ) {
		return get_term( $issue_slug, $taxonomy );
	}

	return false;
}

/**
 * Get Issue Posts
 *
 * @param int    $post_id
 * @param string $fields
 * @return mixed object WP_Term || false
 */
function drift_get_issue_posts( $post_id = null, $fields = 'ids' ) {
	$post_id  = $post_id ? $post_id : get_the_ID();
	$taxonomy = 'issue';
	$issue    = drift_get_issue( $post_id );

	if ( ! empty( $issue ) ) {
		$args = array(
			'post_type'      => array(),
			'posts_per_page' => 50,
			'fields'         => $fields,
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'terms'    => $issue->term_id,
				),
			),
		);

		$query = new \WP_Query( $args );

		return $query->get_posts();
	}

	return false;
}

/**
 * Get Issue Sections
 *
 * @param array $posts
 * @param array $args
 * @return void
 */
function drift_get_sections( $posts, $args = array() ) {
	$defaults = array(
		'taxonomy'   => 'section',
		'object_ids' => $posts,
		'orderby'    => 'term_order',
	);
	$args     = wp_parse_args( $args, $defaults );

	$query = new WP_Term_Query( $args );

	return $query->get_terms();
}

/**
 * Get Posts Query
 *
 * @param int $post_id
 * @param array $args
 * @return object \WP_Query
 */
function drift_get_section_posts_query( $post_id = null, $args = array() ) {
	$post_id  = $post_id ? $post_id : get_the_ID();
	$defaults = array(
		'post_type'      => array( 'post', 'mention' ),
		'posts_per_page' => 50,
		'orderby'        => 'menu_order',
	);
	$args     = wp_parse_args( $args, $defaults );

	return new \WP_Query( $args );
}

/**
 * Get Posts
 *
 * @param int $post_id
 * @param array $args
 * @return array \WP_Post
 */
function drift_get_section_posts( $post_id = null, $args = array() ) {
	$query = drift_get_section_posts_query( $post_id, $args );

	return $query->get_posts();
}

/**
 * Get Post Author Terms
 *
 * @param int $post_id
 * @param array $args
 * @return array \WP_Term
 */
function drift_get_authors( $post_id = null, $args = array() ) {
	$defaults = array(
		'taxonomy'   => 'authors',
		'object_ids' => $post_id,
		'orderby'    => 'term_order',
	);
	$args     = wp_parse_args( $args, $defaults );

	$query = new WP_Term_Query( $args );

	return $query->get_terms();
}
