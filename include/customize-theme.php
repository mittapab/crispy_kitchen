<?php  

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


?>