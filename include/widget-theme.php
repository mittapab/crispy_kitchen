<?php

function register_custom_widget_area_footer_1() {
    register_sidebar(
    array(
    'id' => 'new-widget-area',
    'name' => esc_html__( 'Crispy Footer Area 1', 'theme-domain' ),
    'description' => esc_html__( 'Footer 1', 'theme-domain' ),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="text-white mb-lg-4 mb-3">',
    'after_title' => '</h6>'
    )
    );
    }
    add_action( 'widgets_init', 'register_custom_widget_area_footer_1' );





?>