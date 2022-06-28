<?php // require get_template_directory() . '/include/theme-options.php';   


function wp_theme_setup() {
	/**
	 * Load translation identity
	 * add default WordPress support for title, feed and enable post thumbnail in post/page.
	 */
	load_theme_textdomain( 'wp-theme-prototype' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	/**
	 * un comment these lines if you want to register your own image size
	 * it's effect when uploading new image.
	 */
	// add_image_size( 'cover-image', 400, 300, true );
	// add_image_size( 'wp-theme-prototype-600', 600, 300, true );
	add_image_size( 'product', 400, 400, array('center' , 'center') );


	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}

add_action( 'after_setup_theme', 'wp_theme_setup' );

function add_support_theme(){
    register_nav_menus( array(
        'top'    => __( 'Top Navigation', 'crispy-top-menu' ),
       
   ));
}

add_action( 'after_setup_theme', 'add_support_theme' );

function add_theme_script(){
   
    //css
    wp_enqueue_style('wp-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('crispy' , get_theme_file_uri('/assets/css/bootstrap.min.css'), array() , '1.0.0');
    wp_enqueue_style('crispy-boot' , get_theme_file_uri('/assets/css/bootstrap-icons.css'), array() , '1.0.0');
    wp_enqueue_style('crispy-main' , get_theme_file_uri('/assets/css/tooplate-crispy-kitchen.css'), array() , '1.0.0');
    wp_enqueue_style('crispy-font' , '//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap', array() , '1.0.0');
	

    //javascript

    wp_enqueue_script('crispy-script' , get_theme_file_uri('/assets/js/jquery.min.js') , array() , '1.0.0' , true);
    wp_enqueue_script('crispy-script_custom' , get_theme_file_uri('/assets/js/main.js') , array() , '1.0.0' , true);
    wp_enqueue_script('crispy-script_1' , get_theme_file_uri('/assets/js/bootstrap.bundle.min.js') , array() , '1.0.0' , true);
    wp_enqueue_script('crispy-script_2' , get_theme_file_uri('/assets/js/custom.js') , array() , '1.0.0' , true);
    
}

function add_admin_panel_script(){
   
    //css
    wp_enqueue_style('wp-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('crispy' , get_theme_file_uri('/assets/css/bootstrap.min.css'), array() , '1.0.0');
    wp_enqueue_style('crispy-boot' , get_theme_file_uri('/assets/css/bootstrap-icons.css'), array() , '1.0.0');
    wp_enqueue_style('crispy-font' , '//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap', array() , '1.0.0');
    
}

add_action("wp_enqueue_scripts" , 'add_theme_script');
add_action('admin_enqueue_scripts', 'add_admin_panel_script' );


// custom option theme

add_action( 'customize_register' , 'my_theme_options' );

function my_theme_options ( $wp_customize ) {
	// ส่วนการตั้งค่าและการควบคุมจะถูกเพิ่มที่นี่

    $wp_customize->add_section( 
        'mytheme_footer_options', 
        array(
            'title'       => __( 'Crispy Button Settings', 'mytheme' ),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
            'description' => __('Change Button options here.', 'mytheme'), 
        ) 
    );

    $wp_customize->add_setting( 'footer_bg_color',
	array(
		'default' => 'f1f1f1' ,
        'transport' => 'postMessage'
	)
);      

  
  $wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 
	'footer_bg_color_control',
	array(
		'label'    => __( 'Button Background Color', 'mytheme' ), 
		'section'  => 'mytheme_footer_options',
		'settings' => 'footer_bg_color',
		'priority' => 10,
	) 
));



}

add_action('wp_head' , 'my_dynamic_css' );

function my_dynamic_css() {	?>
	<style type='text/css'>
      .custom-btn{ background:<?php echo get_theme_mod('footer_bg_color') ?> !important ; }
	</style>
	<?php
}

add_action( 'customize_preview_init' , 'my_customizer_preview' );

function my_customizer_preview() {
	wp_enqueue_script( 
		'my_theme_customizer',
		get_template_directory_uri() . '/js/theme-customizer.js',
		array(  'jquery', 'customize-preview' ),
		
		true
	);

}


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

/**========================================= Theme options ================================================== */


function add_theme_panal(){
	add_menu_page('Theme options', 'Theme Settings' , 'manage_options', 'Theme-options' , 'theme_init', 'dashicons-layout', 100 );
    add_submenu_page('Theme-options', 'Logo' , 'Logo' , 'manage_options', 'Theme-options' , 'theme_init');
	add_submenu_page('Theme-options', 'Header Menu' , 'Header Menu' , 'manage_options', 'header_menu' , 'theme_init');
	add_submenu_page('Theme-options', 'Header Event & Post' , 'Header Event & Post' , 'manage_options', 'event_post' , 'theme_init');
	
}

add_action('admin_menu' ,'add_theme_panal');

function theme_init(){

}




