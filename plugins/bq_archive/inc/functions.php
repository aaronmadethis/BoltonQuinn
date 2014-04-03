<?php

// -- register install script
register_activation_hook(__FILE__, 'bq_wp_archive_install');

// -- register the deactivation script
register_deactivation_hook(__FILE__, 'bq_wp_archive_deactivate');

// -- runs when plug-in is installed
function bq_wp_archive_install(){
}

// -- run on uninstall deletes options
function bq_wp_archive_deactivate() {
	// -- delete options
	// -- delete_option('total_columns');
}

// Load our custom assets.
add_action( 'admin_enqueue_scripts', 'bq_wp_archive_assets');

function bq_wp_archive_assets(){

}

// -- Set up the post types
add_action('init', 'bq_wp_archive_regiser_post_types');

// -- Register Post Types function
function bq_wp_archive_regiser_post_types(){

	// -- set arguments for the portfolio_page post type
	$bq_archive_wp_pt_args = array(
		'public' => true,
		'query_var' => 'bq_archive',
		'rewrite' => array(
				'slug' => 'project-archive',
				'with_front' => false
		),
		'supports' => array(
			'title',
			'page-attributes',
			'thumbnail' 
		),
		'labels' => array(
			'name' => 'Project Archives',
			'singular_name' => 'Project Archive',
			'add_new' => 'Project Archive',
			'add_new_item' => 'Project Archive',
			'edit_item' => 'Edit Project Archive',
			'new_item' => 'New Project Archive',
			'view_item' => 'View Project Archive',
			'search_items' => 'Search Project Archives',
			'not_found' => 'No Project Archives Found',
			'not_found_in_trash' => 'No Project Archives Found in Trash'
		),
		'capability_type' => 'page',
		'hierarchical' => true,
        // 'register_meta_box_cb' => 'add_portfolio_metaboxes',
        'taxonomies' => array( 'category', 'post_tag' ),
        'has_archive'   => true
	);

	// -- register the portfolio post type
	register_post_type( 'bq_archive', $bq_archive_wp_pt_args );
}

