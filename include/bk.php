<?php   


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

add_action("wp_enqueue_scripts" , 'add_theme_script');


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

/**===================================================================================================================== */


/*
* @ include file in theme
* Register different customizer options
* @Logo option
* @footer copyright option   
* @Color schemes for navigation and footer
*/
function customtheme_customize_register( $wp_customize ){
		
	$wp_customize->add_section( 'image-options', array(
		"title" => __("Image Options", "customtheme"),
		"priority" => 160,				
	) );
	
	// $wp_customize->add_section( 'footer-options', array(
	// 	"title" => __("Footer Options", "customtheme"),
	// 	"priority" => 160,				
	// ) );
	
	// $wp_customize->add_section( 'bg-color-options', array(
	// 	"title" => __("Color Options", "customtheme"),
	// 	"description" => __( 'Change background color of header and footer' ),
	// 	"priority" => 160,				
	// ) );
	
	/*
	* Transport has two types
	* @postMessage = the changes will take place in real time as it happens without refresh
	* @refresh = changes will take place after clicking "save" button and refresh
	* @type = its value can be "theme_mod" or "option"
	* @theme_mod = This options is sticked to theme.
	*/	
	
	// Add settings and control for logo upload
	$wp_customize->add_setting("upload_logo", array(
		"type" => "theme_mod", // or 'option'
		"capability" => "edit_theme_options",
		"default" => "",
		"transport" => "postMessage",
		'sanitize_callback' => '',
  		'sanitize_js_callback' => '' // Basically to_json.
	));

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize, 'upload_logo', 
		array( // setting id
			'label'    => __( 'Upload Logo', 'customtheme' ),
			'section'  => 'image-options',
			'priority' => 1,
		)
	) );
	
	// Add copy right text in the footer
	// $wp_customize->add_setting("footer_copyright", array(
	// 	"default" => "&copy 2016 Business. Powered by Allshore.",
	// 	"transport" => "postMessage",
	// ));
	// $wp_customize->add_control( 'footer_copyright', array( // setting id
	// 	'label'    => __( 'Footer Copyright Text', 'customtheme' ),
	// 	'section'  => 'footer-options', // section id
	// 	'type'     => 'text',
	// 	'priority' => 1,
	// ) );
	
	######################### COLOR SCHEME SECTION #########################
	// Add color scheme options, dropdown of different colors
	
	// $wp_customize->add_setting("bg_color_scheme", array(
	// 	"default" => "default",
	// 	"sanitize_callback" => "customtheme_sanitize_color_scheme",
	// 	"transport" => "postMessage",
	// ));
	
	// $wp_customize->add_control( "bg_color_scheme", array(
	// 	"label"    => __( "Background colors scheme", "customtheme" ),
	// 	"section"  => "bg-color-options",
	// 	"type"     => "select",
	// 	"choices"  => customtheme_get_color_scheme_choices(),
	// 	'priority' => 1,
	// ) );
	// $color_scheme = customtheme_get_color_scheme();
		
	// // Add page background color setting and control.
	// $wp_customize->add_setting( 'header_background_color', array(
	// 	'default'           => $color_scheme[0],
	// 	'sanitize_callback' => 'sanitize_hex_color',
	// 	'transport'         => 'postMessage',
	// ) );

	// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
	// 	'label'       => __( 'Navigation Background Color', 'customtheme' ),
	// 	'section'     => 'bg-color-options',
	// 	'alpha'       => true,
	// ) ) );
	
	// Add page background color setting and control.
	// $wp_customize->add_setting( 'footer_background_color', array(
	// 	'default'           => $color_scheme[1],
	// 	'sanitize_callback' => 'sanitize_hex_color',
	// 	'transport'         => 'postMessage',
	// ) );

	// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
	// 	'label'       => __( 'Footer Background Color', 'customtheme' ),
	// 	'section'     => 'bg-color-options',
	// ) ) );
	
}
add_action("customize_register","customtheme_customize_register");

//if ( ! function_exists( 'customtheme_get_color_scheme_choices' ) ) :
	/**
	 * Retrieves an array of color scheme choices registered.
	 * @Dropdown for different color options, default,dark,gray,red,yellow
	*/
// 	function customtheme_get_color_scheme_choices(){
		
// 		$bg_color_schemes  = customtheme_get_color_schemes();
// 		$bg_color_scheme_control_options = array();
// 		foreach ( $bg_color_schemes as $color_scheme => $value ) {
// 			$bg_color_scheme_control_options[ $color_scheme ] = $value['label'];
// 		}
		
// 		return $bg_color_scheme_control_options;
		
// 	}	
// endif;

//if ( ! function_exists( 'customtheme_get_color_schemes' )):
	/**
	 * The default schemes include 'default', 'dark', 'gray', 'red', and 'yellow'.
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 * You can add your own color using add_filter
	 *
	 */
// 	function customtheme_get_color_schemes(){
// 			return apply_filters( 'customtheme_color_schemes', array(
// 			'default' => array(
// 				'label'  => __( 'Default', 'customtheme' ),
// 				'colors' => array(
// 					'#1a1a1a',
// 					'#ffffff',
// 					'#007acc',
// 					'#1a1a1a',
// 					'#686868',
// 				),
// 			),
// 			'dark' => array(
// 				'label'  => __( 'Dark', 'customtheme' ),
// 				'colors' => array(
// 					'#262626',
// 					'#1a1a1a',
// 					'#9adffd',
// 					'#e5e5e5',
// 					'#c1c1c1',
// 				),
// 			),
// 			'gray' => array(
// 				'label'  => __( 'Gray', 'customtheme' ),
// 				'colors' => array(
// 					'#c9c9c9',
// 					'#4d545c',
// 					'#c7c7c7',
// 					'#f2f2f2',
// 					'#f2f2f2',
// 				),
// 			),
// 			'red' => array(
// 				'label'  => __( 'Red', 'customtheme' ),
// 				'colors' => array(
// 					'#dd1111',
// 					'#ff675f',
// 					'#640c1f',
// 					'#402b30',
// 					'#402b30',
// 				),
// 			),
// 			'yellow' => array(
// 				'label'  => __( 'Yellow', 'customtheme' ),
// 				'colors' => array(
// 					'#eeee22',
// 					'#ffef8e',
// 					'#774e24',
// 					'#3b3721',
// 					'#5b4d3e',
// 				),
// 			),
// 		) );
// 	}
// endif;
/*
* Enqueue javascript file for real time changes
* put theme-customizer.js file in js folder of theme
*/ 
function customtheme_customizer_live_preview() {
	wp_enqueue_script( 'custom_css_preview', get_template_directory_uri() . '/assets/js/main.js', array( 'customize-preview', 'jquery' ) );  	
//	wp_localize_script( 'custom_css_preview', 'colorScheme', customtheme_get_color_schemes() ); // color schemes global variable
	wp_localize_script( 'custom_css_preview', 'ajax_object',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'customize_preview_init', 'customtheme_customizer_live_preview' );

//if ( ! function_exists( 'customtheme_sanitize_color_scheme' ) ) :
/**
 * Handles sanitization color schemes.
 */
// function customtheme_sanitize_color_scheme( $value ) {
	
// 	$color_schemes = customtheme_get_color_scheme_choices();
// 	if ( ! array_key_exists( $value, $color_schemes ) ) {
// 		return 'default';
// 	}
// 	return $value;
	
// }
// endif; // customtheme_sanitize_color_scheme

//if ( ! function_exists( 'customtheme_get_color_scheme' ) ) :
/**
 * Retrieves the current color scheme.
*/
// function customtheme_get_color_scheme() {
	
// 	$color_scheme_option = get_theme_mod( 'bg_color_scheme', 'default' );
// 	$color_schemes       = customtheme_get_color_schemes();
// 	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
// 		return $color_schemes[ $color_scheme_option ]['colors'];
// 	}
// 	return $color_schemes['default']['colors'];	
// }
// endif; // customtheme_get_color_scheme

/*
* Update css in header.
*/
//function customtheme_update_background_css(){
?>
	<!-- <style type="text/css">
		.navbar.navbar-default { background-color: <?php echo get_theme_mod('header_background_color'); ?>; }
		footer { background-color: <?php echo get_theme_mod('footer_background_color'); ?>; }
	</style> -->
<?php
//}
// add_action( 'wp_head', 'customtheme_update_background_css' );

/*
* Logo upload return attachment id, then id is passed to this function through ajax.
* On success return uploaded logo.
*/
function update_customizer_options() {
    // Handle request then generate response using WP_Ajax_Response
	$att_id = $_POST['attachment_id'];
	if( $att_id!='' ){
		$img_src = wp_get_attachment_image( $att_id, 'medium' );
		echo $img_src;
	}
	exit;
	
}
add_action( 'wp_ajax_update-logo-customizer', 'update_customizer_options' );
add_action( 'wp_ajax_nopriv_update-logo-customizer', 'update_customizer_options' );
?>

