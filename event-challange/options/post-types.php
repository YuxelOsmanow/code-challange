<?php

register_post_type( 'mm_event', array(
	'labels' => array(
		'name' => __( 'Events', 'mm' ),
		'singular_name' => __( 'Event', 'mm' ),
		'add_new' => __( 'Add New', 'mm' ),
		'add_new_item' => __( 'Add new Event', 'mm' ),
		'view_item' => __( 'View Event', 'mm' ),
		'edit_item' => __( 'Edit Event', 'mm' ),
		'new_item' => __( 'New Event', 'mm' ),
		'view_item' => __( 'View Event', 'mm' ),
		'search_items' => __( 'Search Events', 'mm' ),
		'not_found' =>  __( 'No Events found', 'mm' ),
		'not_found_in_trash' => __( 'No Events found in trash', 'mm' ),
	),
	'public' => false,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'query_var' => true,
	'menu_icon' => 'dashicons-calendar-alt',
	'supports' => array( 'title' ),
));
