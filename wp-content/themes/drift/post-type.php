<?php

add_action( 'init', 'create_issues' );
function create_issues() {
	$labels = array(

		'name'               => _x( 'Issues', 'post type general name' ),

		'singular_name'      => _x( 'Issues', 'post type singular name' ),

		'add_new'            => _x( 'Add New Issue', '' ),

		'add_new_item'       => __( 'Add New Issue' ),

		'edit_item'          => __( 'Edit Issue' ),

		'new_item'           => __( 'New Issue' ),

		'view_item'          => __( 'View Issue' ),

		'search_items'       => __( 'Search Issue' ),

		'not_found'          => __( 'No  found Issue' ),

		'not_found_in_trash' => __( 'No found Issue in Trash' ),

		'parent_item_colon'  => '',

	);

	$supports = array( 'title', 'editor', 'excerpt', 'trackbacks', 'thumbnail', 'comments', 'revisions', 'author', 'page-attributes' );

	register_post_type(
		'issue',
		array(

			'labels'        => $labels,

			'menu_icon'     => 'dashicons-book-alt',

			'public'        => true,

			'supports'      => $supports,

			'hierarchical'  => true,

			'menu_position' => 10,

			'rewrite'       => array(
				'slug'       => 'issue',
				'with_front' => false,
			),

		)
	);

}


// Mention post type here

add_action( 'init', 'create_mentions' );
function create_mentions() {
	$labels = array(

		'name'               => _x( 'Mentions', 'post type general name' ),

		'singular_name'      => _x( 'Mentions', 'post type singular name' ),

		'add_new'            => _x( 'Add New Mention', '' ),

		'add_new_item'       => __( 'Add New Mention' ),

		'edit_item'          => __( 'Edit Mention' ),

		'new_item'           => __( 'New Mention' ),

		'view_item'          => __( 'View Mention' ),

		'search_items'       => __( 'Search Mention' ),

		'not_found'          => __( 'No  found Mention' ),

		'not_found_in_trash' => __( 'No found Mention in Trash' ),

		'parent_item_colon'  => '',

	);

	$supports = array( 'title', 'editor', 'excerpt', 'trackbacks', 'thumbnail', 'comments', 'revisions', 'author', 'page-attributes' );

	register_post_type(
		'mention',
		array(

			'labels'        => $labels,

			'menu_icon'     => 'dashicons-format-status',

			'public'        => true,

			'supports'      => $supports,

			'hierarchical'  => true,

			'menu_position' => 10,

			'rewrite'       => array(
				'slug'       => 'mention',
				'with_front' => false,
			),

		)
	);

}

function create_topics_hierarchical_taxonomy() {
	// Add new taxonomy, make it hierarchical like categories
	// first do the translations part for GUI

	$labels = array(
		'name'              => _x( 'Authors', 'taxonomy general name' ),
		'singular_name'     => _x( 'Author', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Authors' ),
		'all_items'         => __( 'All Authors' ),
		'parent_item'       => __( 'Parent Author' ),
		'parent_item_colon' => __( 'Parent Author:' ),
		'edit_item'         => __( 'Edit Author' ),
		'update_item'       => __( 'Update Author' ),
		'add_new_item'      => __( 'Add New Author' ),
		'new_item_name'     => __( 'New Author Name' ),
		'menu_name'         => __( 'Authors' ),
	);

	// Now register the taxonomy

	register_taxonomy(
		'authors',
		array( 'post' ),
		array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'article_author' ),
		)
	);
}
