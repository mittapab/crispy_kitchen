<?php   

//**** Custom Post type */

function add_food_post_type(){

	$labels = array(
        'name'                  => _x( 'Foods', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Food', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Foods', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Food', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Food', 'textdomain' ),
        'new_item'              => __( 'New Food', 'textdomain' ),
        'edit_item'             => __( 'Edit Food', 'textdomain' ),
        'view_item'             => __( 'View Food', 'textdomain' ),
        'all_items'             => __( 'All Foods', 'textdomain' ),
        'search_items'          => __( 'Search Foods', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Foods:', 'textdomain' ),
        'not_found'             => __( 'No Foods found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Foods found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Food Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Food archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Food', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Food', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Foods list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Foods list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Foods list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'food' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'menu_icon' => 'dashicons-cart'
    );
 
    register_post_type( 'food', $args );
	
}

add_action( 'init', 'add_food_post_type' );

/** ========================================================================================================== */



function add_custom_taxonomies() {
	
	register_taxonomy('Categories_Menus', 'food', array(
	  
	  'hierarchical' => true,
	  
	  'labels' => array(
		'name' => _x( 'Menus', 'taxonomy general name' ),
		'singular_name' => _x( 'Menus', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Menus' ),
		'all_items' => __( 'All Menus' ),
		'parent_item' => __( 'Parent Menus' ),
		'parent_item_colon' => __( 'Parent Menus:' ),
		'edit_item' => __( 'Edit Menus' ),
		'update_item' => __( 'Update Menus' ),
		'add_new_item' => __( 'Add New Menus' ),
		'new_item_name' => __( 'New Menus Name' ),
		'menu_name' => __( 'Categories Menus' ),
		
	  ),
	 
	  'rewrite' => array(
		'slug' => 'Categories_Menus', // This controls the base slug that will display before each term
		'with_front' => false, // Don't display the category base before "/locations/"
		'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
	  ),


	));


	register_taxonomy('tag','food',array(
		'hierarchical' => false,
		'labels' => "Relation",
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag' ),
	  ));
  }
  add_action( 'init', 'add_custom_taxonomies', 0 );

?>