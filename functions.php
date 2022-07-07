<?php 

/**==== Setup theme =====*/
require get_template_directory() . '/include/setup-theme.php';   

/**==== Theme options ==== */
require get_template_directory() . '/include/theme-options.php';   

/**====Custom Post type ==== */
require get_template_directory() . '/include/cpt-theme.php';   

/**==== Customize =====*/
require get_template_directory() . '/include/customize-theme.php';

/**==== Customize =====*/
require get_template_directory() . '/include/widget-theme.php';   


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
//add_action('admin_enqueue_scripts', 'add_admin_panel_script' );

?>