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
    wp_enqueue_script('crispy-script_1' , get_theme_file_uri('/assets/js/bootstrap.bundle.min.js') , array() , '1.0.0' , true);
    wp_enqueue_script('crispy-script_2' , get_theme_file_uri('/assets/js/custom.js') , array() , '1.0.0' , true);
    
}

add_action("wp_enqueue_scripts" , 'add_theme_script');






?>