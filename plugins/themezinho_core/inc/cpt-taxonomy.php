<?php

if ( ! function_exists('themezinho_testimonial_cpt') ) {

// Register Custom Post Type
	function themezinho_testimonial_cpt() {

		$labels = array(
			'name'                  => _x( 'Testimonials', 'Post Type General Name', 'themezinho' ),
			'singular_name'         => _x( 'Review', 'Post Type Singular Name', 'themezinho' ),
			'menu_name'             => __( 'Testimonials', 'themezinho' ),
			'name_admin_bar'        => __( 'Review', 'themezinho' ),
			'archives'              => __( 'Review Archives', 'themezinho' ),
			'attributes'            => __( 'Review Attributes', 'themezinho' ),
			'parent_item_colon'     => __( 'Parent Review:', 'themezinho' ),
			'all_items'             => __( 'All Testimonials', 'themezinho' ),
			'add_new_item'          => __( 'Add New Review', 'themezinho' ),
			'add_new'               => __( 'Add New', 'themezinho' ),
			'new_item'              => __( 'New Review', 'themezinho' ),
			'edit_item'             => __( 'Edit Review', 'themezinho' ),
			'update_item'           => __( 'Update Review', 'themezinho' ),
			'view_item'             => __( 'View Review', 'themezinho' ),
			'view_items'            => __( 'View Testimonials', 'themezinho' ),
			'search_items'          => __( 'Search Review', 'themezinho' ),
			'not_found'             => __( 'Not found', 'themezinho' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'themezinho' ),
			'featured_image'        => __( 'Featured Image', 'themezinho' ),
			'set_featured_image'    => __( 'Set featured image', 'themezinho' ),
			'remove_featured_image' => __( 'Remove featured image', 'themezinho' ),
			'use_featured_image'    => __( 'Use as featured image', 'themezinho' ),
			'insert_into_item'      => __( 'Insert into Review', 'themezinho' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Review', 'themezinho' ),
			'items_list'            => __( 'Testimonials list', 'themezinho' ),
			'items_list_navigation' => __( 'Testimonials list navigation', 'themezinho' ),
			'filter_items_list'     => __( 'Filter Testimonials list', 'themezinho' ),
		);
		$args = array(
			'label'                 => __( 'Review', 'themezinho' ),
			'description'           => __( 'Review Description', 'themezinho' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => true,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-admin-comments',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'testimonial', $args );

	}
	add_action( 'init', 'themezinho_testimonial_cpt', 0 );

}




if ( ! function_exists('themezinho_work_cpt') ) {

// Register Custom Post Type
	function themezinho_work_cpt() {

		$labels = array(
			'name'                  => _x( 'Works', 'Post Type General Name', 'themezinho' ),
			'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'themezinho' ),
			'menu_name'             => __( 'Works', 'themezinho' ),
			'name_admin_bar'        => __( 'Work', 'themezinho' ),
			'archives'              => __( 'Work Archives', 'themezinho' ),
			'attributes'            => __( 'Work Attributes', 'themezinho' ),
			'parent_item_colon'     => __( 'Parent Work:', 'themezinho' ),
			'all_items'             => __( 'All Works', 'themezinho' ),
			'add_new_item'          => __( 'Add New Work', 'themezinho' ),
			'add_new'               => __( 'Add New', 'themezinho' ),
			'new_item'              => __( 'New Work', 'themezinho' ),
			'edit_item'             => __( 'Edit Work', 'themezinho' ),
			'update_item'           => __( 'Update Work', 'themezinho' ),
			'view_item'             => __( 'View Work', 'themezinho' ),
			'view_items'            => __( 'View Works', 'themezinho' ),
			'search_items'          => __( 'Search Work', 'themezinho' ),
			'not_found'             => __( 'Not found', 'themezinho' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'themezinho' ),
			'featured_image'        => __( 'Featured Image', 'themezinho' ),
			'set_featured_image'    => __( 'Set featured image', 'themezinho' ),
			'remove_featured_image' => __( 'Remove featured image', 'themezinho' ),
			'use_featured_image'    => __( 'Use as featured image', 'themezinho' ),
			'insert_into_item'      => __( 'Insert into Work', 'themezinho' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Work', 'themezinho' ),
			'items_list'            => __( 'Works list', 'themezinho' ),
			'items_list_navigation' => __( 'Works list navigation', 'themezinho' ),
			'filter_items_list'     => __( 'Filter Works list', 'themezinho' ),
		);
		$args = array(
			'label'                 => __( 'Work', 'themezinho' ),
			'description'           => __( 'Work Description', 'themezinho' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-admin-settings',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'work', $args );

	}
	add_action( 'init', 'themezinho_work_cpt', 0 );

}

if ( ! function_exists( 'themezinho_work_tag_taxonomy' ) ) {

// Register Custom Taxonomy
	function themezinho_work_tag_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Tags', 'Taxonomy General Name', 'themezinho' ),
			'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'themezinho' ),
			'menu_name'                  => __( 'Tags', 'themezinho' ),
			'all_items'                  => __( 'All Tags', 'themezinho' ),
			'parent_item'                => __( 'Parent Tag', 'themezinho' ),
			'parent_item_colon'          => __( 'Parent Tag:', 'themezinho' ),
			'new_item_name'              => __( 'New Tag Name', 'themezinho' ),
			'add_new_item'               => __( 'Add New Tag', 'themezinho' ),
			'edit_item'                  => __( 'Edit Tag', 'themezinho' ),
			'update_item'                => __( 'Update Tag', 'themezinho' ),
			'view_item'                  => __( 'View Tag', 'themezinho' ),
			'separate_items_with_commas' => __( 'Separate tags with commas', 'themezinho' ),
			'add_or_remove_items'        => __( 'Add or remove tags', 'themezinho' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'themezinho' ),
			'popular_items'              => __( 'Popular tags', 'themezinho' ),
			'search_items'               => __( 'Search Tags', 'themezinho' ),
			'not_found'                  => __( 'Not Found', 'themezinho' ),
			'no_terms'                   => __( 'No tags', 'themezinho' ),
			'items_list'                 => __( 'Tags list', 'themezinho' ),
			'items_list_navigation'      => __( 'Tags list navigation', 'themezinho' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'work_tag', array( 'work' ), $args );

	}
	add_action( 'init', 'themezinho_work_tag_taxonomy', 0 );

}

if ( ! function_exists('themezinho_hero_cpt') ) {

// Register Custom Post Type
	function themezinho_hero_cpt() {

		$labels = array(
			'name'                  => _x( 'Headers', 'Post Type General Name', 'themezinho' ),
			'singular_name'         => _x( 'Hero Banner', 'Post Type Singular Name', 'themezinho' ),
			'menu_name'             => __( 'Headers', 'themezinho' ),
			'name_admin_bar'        => __( 'Hero Banner', 'themezinho' ),
			'archives'              => __( 'Hero Banner Archives', 'themezinho' ),
			'attributes'            => __( 'Hero Banner Attributes', 'themezinho' ),
			'parent_item_colon'     => __( 'Parent Hero Banner:', 'themezinho' ),
			'all_items'             => __( 'All Headers', 'themezinho' ),
			'add_new_item'          => __( 'Add New Hero Banner', 'themezinho' ),
			'add_new'               => __( 'Add New', 'themezinho' ),
			'new_item'              => __( 'New Hero Banner', 'themezinho' ),
			'edit_item'             => __( 'Edit Hero Banner', 'themezinho' ),
			'update_item'           => __( 'Update Hero Banner', 'themezinho' ),
			'view_item'             => __( 'View Hero Banner', 'themezinho' ),
			'view_items'            => __( 'View Headers', 'themezinho' ),
			'search_items'          => __( 'Search Hero Banner', 'themezinho' ),
			'not_found'             => __( 'Not found', 'themezinho' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'themezinho' ),
			'featured_image'        => __( 'Featured Image', 'themezinho' ),
			'set_featured_image'    => __( 'Set featured image', 'themezinho' ),
			'remove_featured_image' => __( 'Remove featured image', 'themezinho' ),
			'use_featured_image'    => __( 'Use as featured image', 'themezinho' ),
			'insert_into_item'      => __( 'Insert into Hero Banner', 'themezinho' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Hero Banner', 'themezinho' ),
			'items_list'            => __( 'Headers list', 'themezinho' ),
			'items_list_navigation' => __( 'Headers list navigation', 'themezinho' ),
			'filter_items_list'     => __( 'Filter Headers list', 'themezinho' ),
		);
		$args = array(
			'label'                 => __( 'Hero Banner', 'themezinho' ),
			'description'           => __( 'Hero Banner Description', 'themezinho' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => true,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-welcome-widgets-menus',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'hero', $args );

	}
	add_action( 'init', 'themezinho_hero_cpt', 0 );

}
