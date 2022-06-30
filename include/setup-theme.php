<?php  

function wp_theme_setup() {
	
	load_theme_textdomain( 'wp-theme-prototype' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	
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



?>