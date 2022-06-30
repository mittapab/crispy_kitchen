<?php  

//add new menu for theme-options page with page callback theme-options-page.


// function add menu theme options 
function theme_option_page() { ?>

	<div class="wrap">
	  <h1>Custom Theme Options Page</h1>
	<form method="post" action="options.php">
	<?php

		// display settings field on theme-option page
		settings_fields("theme-options-grp");
		// display all sections for theme-options page
		do_settings_sections("theme-options");
		submit_button();
	?>
	</form>
	</div>

	<?php  }
 
     // function register hook menu item
	function add_theme_menu_item() {

	add_theme_page("Theme Customization", "Theme Customization", "manage_options", "theme-options", "theme_option_page", null, 99);

}

	add_action("admin_menu", "add_theme_menu_item");




	function theme_section_description(){ 	echo '<p>Theme Option Section</p>'; }




	function options_callback(){

	$options = get_option( 'first_field_option' );
	echo '<input name="first_field_option" id="first_field_option" type="checkbox" value="1" class="code" ' . checked( 1, $options, false ) . ' /> Check for enabling custom help text.';
	
}
	function test_theme_settings(){


	// setting options
	add_option('first_field_option',1);// add theme option to database

	add_settings_section( 'first_section', 'New Theme Options Section', 'theme_section_description','theme-options');


    // registerv fields
	add_settings_field('first_field_option','Test Settings Field','options_callback', 'theme-options','first_section');//add settings field to the “first_section”
	
	register_setting( 'theme-options-grp', 'first_field_option');

	//add settings filed with callback display_test_twitter_element.
    add_settings_field('twitter_url', 'Test Twitter Profile Url', 'display_test_twitter_element', 'theme-options', 'first_section');
    
	register_setting( 'theme-options-grp', 'test_twitter_url');

	//add logo

	add_settings_field('logo_text' , 'Add Logo Text name' , 'logot_text_name' , 'theme-options' , 'first_section');
	register_setting( 'theme-options-grp', 'logo_text');


	}
   
	function logot_text_name(){
		?>
		<input type="text" name="logo_text" id="logo_text" value="<?php echo get_option('logo_text'); ?>" />
		<?php	
	}

	function display_test_twitter_element(){
		//php code to take input from text field for twitter URL.
		?>
		<input type="text" name="test_twitter_url" id="test_twitter_url" value="<?php echo get_option('test_twitter_url'); ?>" />
		<?php
		}

 // regsiter data to database
	add_action('admin_init','test_theme_settings');

