<?php
/**
 * Register custom post types
 *
 * @package Carpress
 */


function carpress_custom_post_types() {
	// services
	$labels = array(
		'name'               => __( 'Services' , 'carpress_wp'),
		'singular_name'      => _x( 'Service' , 'backend', 'carpress_wp'),
		'add_new'            => _x( 'Add New' , 'backend', 'carpress_wp'),
		'add_new_item'       => _x( 'Add New Service' , 'backend', 'carpress_wp'),
		'edit_item'          => _x( 'Edit Service' , 'backend', 'carpress_wp'),
		'new_item'           => _x( 'New Service' , 'backend', 'carpress_wp'),
		'all_items'          => _x( 'All Services' , 'backend', 'carpress_wp'),
		'view_item'          => _x( 'View Service' , 'backend', 'carpress_wp'),
		'search_items'       => _x( 'Search Services' , 'backend', 'carpress_wp'),
		'not_found'          => _x( 'No services found' , 'backend', 'carpress_wp'),
		'not_found_in_trash' => _x( 'No services found in Trash' , 'backend', 'carpress_wp'),
		'menu_name'          => _x( 'Services' , 'backend', 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'rewrite'         => array( 'slug' => ot_get_option( 'services_url_slug', 'services' ) ),
		'capability_type' => 'post',
		'has_archive'     => true,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' )
	);
	register_post_type( 'services', $args );

	// gallery
	$labels = array(
		'name'               => __( 'Galleries' , 'carpress_wp'),
		'singular_name'      => _x( 'Gallery' , 'backend', 'carpress_wp'),
		'add_new'            => _x( 'Add New' , 'backend', 'carpress_wp'),
		'add_new_item'       => _x( 'Add New Gallery' , 'backend', 'carpress_wp'),
		'edit_item'          => _x( 'Edit Gallery' , 'backend', 'carpress_wp'),
		'new_item'           => _x( 'New Gallery' , 'backend', 'carpress_wp'),
		'all_items'          => _x( 'All Galleries' , 'backend', 'carpress_wp'),
		'view_item'          => _x( 'View Gallery' , 'backend', 'carpress_wp'),
		'search_items'       => _x( 'Search Galleries' , 'backend', 'carpress_wp'),
		'not_found'          => _x( 'No galleries found' , 'backend', 'carpress_wp'),
		'not_found_in_trash' => _x( 'No galleries found in Trash' , 'backend', 'carpress_wp'),
		'menu_name'          => _x( 'Gallery' , 'backend', 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'rewrite'         => array( 'slug' => ot_get_option( 'gallery_url_slug', 'gallery' ) ),
		'capability_type' => 'post',
		'has_archive'     => true,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor' )
	);
	register_post_type( 'gallery', $args );

	// slider
	$labels = array(
		'name'               => _x( 'Slider' , 'backend', 'carpress_wp'),
		'singular_name'      => _x( 'Slide' , 'backend', 'carpress_wp'),
		'add_new'            => _x( 'Add New' , 'backend', 'carpress_wp'),
		'add_new_item'       => _x( 'Add New Slide' , 'backend', 'carpress_wp'),
		'edit_item'          => _x( 'Edit Slide' , 'backend', 'carpress_wp'),
		'new_item'           => _x( 'New Slide' , 'backend', 'carpress_wp'),
		'all_items'          => _x( 'All Slides' , 'backend', 'carpress_wp'),
		'view_item'          => _x( 'View Slide' , 'backend', 'carpress_wp'),
		'search_items'       => _x( 'Search Slides' , 'backend', 'carpress_wp'),
		'not_found'          => _x( 'No slides found' , 'backend', 'carpress_wp'),
		'not_found_in_trash' => _x( 'No slides found in Trash' , 'backend', 'carpress_wp'),
		'menu_name'          => _x( 'Slider' , 'backend', 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'capability_type' => 'post',
		'has_archive'     => false,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	);
	register_post_type( 'slider', $args );

	// testimonials
	$labels = array(
		'name'               => _x( 'Testimonials', 'backend', 'carpress_wp'),
		'singular_name'      => _x( 'Testimonial', 'backend', 'carpress_wp'),
		'add_new'            => _x( 'Add New' , 'backend', 'carpress_wp'),
		'add_new_item'       => _x( 'Add New Testimonial' , 'backend', 'carpress_wp'),
		'edit_item'          => _x( 'Edit Testimonial' , 'backend', 'carpress_wp'),
		'new_item'           => _x( 'New Testimonial' , 'backend', 'carpress_wp'),
		'all_items'          => _x( 'All Testimonials' , 'backend', 'carpress_wp'),
		'view_item'          => _x( 'View Testimonial' , 'backend', 'carpress_wp'),
		'search_items'       => _x( 'Search Testimonials' , 'backend', 'carpress_wp'),
		'not_found'          => _x( 'No testimonial found' , 'backend', 'carpress_wp'),
		'not_found_in_trash' => _x( 'No testimonial found in Trash' , 'backend', 'carpress_wp'),
		'menu_name'          => _x( 'Testimonials' , 'backend', 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'capability_type' => 'post',
		'has_archive'     => false,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor', 'page-attributes' )
	);
	register_post_type( 'testimonials', $args );

	// meet the team
	$labels = array(
		'name'               => __( 'Team' , 'carpress_wp'),
		'singular_name'      => _x( 'Team Member' , 'backend', 'carpress_wp'),
		'add_new'            => _x( 'Add New' , 'backend', 'carpress_wp'),
		'add_new_item'       => _x( 'Add New Team Member' , 'backend', 'carpress_wp'),
		'edit_item'          => _x( 'Edit Team Member' , 'backend', 'carpress_wp'),
		'new_item'           => _x( 'New Team Member' , 'backend', 'carpress_wp'),
		'all_items'          => _x( 'All Team Members' , 'backend', 'carpress_wp'),
		'view_item'          => _x( 'View Team Member' , 'backend', 'carpress_wp'),
		'search_items'       => _x( 'Search Team Members' , 'backend', 'carpress_wp'),
		'not_found'          => _x( 'No team members found' , 'backend', 'carpress_wp'),
		'not_found_in_trash' => _x( 'No team members found in Trash' , 'backend', 'carpress_wp'),
		'menu_name'          => _x( 'Team' , 'backend', 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'rewrite'         => array( 'slug' => ot_get_option( 'the_team_url_slug', 'the-team' ) ),
		'capability_type' => 'post',
		'has_archive'     => true,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'carpress_custom_post_types' );
