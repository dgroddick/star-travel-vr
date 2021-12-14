<?php
/**
 * Custom post type for Planets
 */
function create_planets_cpt() {
    $labels = array(
		'name'               => _x( 'Planets', 'post type general name', 'star_travel_guide' ),
		'singular_name'      => _x( 'Planet', 'post type singular name', 'star_travel_guide' ),
		'menu_name'          => _x( 'Planets', 'admin menu', 'star_travel_guide' ),
		'name_admin_bar'     => _x( 'planet', 'add new on admin bar', 'star_travel_guide' ),
		'add_new'            => _x( 'Add New', 'planet', 'star_travel_guide' ),
		'add_new_item'       => __( 'Add New Planet', 'star_travel_guide' ),
		'new_item'           => __( 'New Planet', 'star_travel_guide' ),
		'edit_item'          => __( 'Edit Planet', 'star_travel_guide' ),
		'view_item'          => __( 'View Planet', 'star_travel_guide' ),
		'all_items'          => __( 'All Planet', 'star_travel_guide' ),
		'search_items'       => __( 'Search Planets', 'star_travel_guide' ),
		'parent_item_colon'  => __( 'Parent Planets:', 'star_travel_guide' ),
		'not_found'          => __( 'No planets found.', 'star_travel_guide' ),
		'not_found_in_trash' => __( 'No planets found in Trash.', 'star_travel_guide' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'star_travel_guide' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'planet' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields' )
	);
    register_post_type( 'planet', $args );
    flush_rewrite_rules();
}
add_action( 'init', 'create_planets_cpt' );