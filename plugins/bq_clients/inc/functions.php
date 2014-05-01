<?php

// -- register install script
register_activation_hook(__FILE__, 'bq_wp_clients_install');

// -- register the deactivation script
register_deactivation_hook(__FILE__, 'bq_wp_clients_deactivate');

// -- runs when plug-in is installed
function bq_wp_clients_install(){
}

// -- run on uninstall deletes options
function bq_wp_clients_deactivate() {
	// -- delete options
	// -- delete_option('total_columns');
}

// Load our custom assets.
add_action( 'admin_enqueue_scripts', 'bq_wp_clients_assets');

function bq_wp_clients_assets(){

}

// -- Set up the post types
add_action('init', 'bq_wp_clients_regiser_post_types');

// -- Register Post Types function
function bq_wp_clients_regiser_post_types(){

	// -- set arguments for the portfolio_page post type
	$bq_client_wp_pt_args = array(
		'public' => true,
		'query_var' => 'bq_clients',
		'rewrite' => array(
				'slug' => 'press',
				'with_front' => false
		),
		'supports' => array(
			'title',
			'page-attributes',
			'thumbnail' 
		),
		'labels' => array(
			'name' => 'Client Pages',
			'singular_name' => 'Client Page',
			'add_new' => 'Add a new Client Page',
			'add_new_item' => 'Add a new Client Page',
			'edit_item' => 'Edit Client Page',
			'new_item' => 'New Client Page',
			'view_item' => 'View Client Page',
			'search_items' => 'Search Client Pages',
			'not_found' => 'No Client Pages Found',
			'not_found_in_trash' => 'No Client Pages Found in Trash'
		),
		'capability_type' => 'page',
		'hierarchical' => true,
        // 'register_meta_box_cb' => 'add_portfolio_metaboxes',
        'taxonomies' => array( '' ),
        'has_archive'   => true
	);

	// -- register the portfolio post type
	register_post_type( 'bq_clients', $bq_client_wp_pt_args );
}

