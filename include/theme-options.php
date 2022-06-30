<?php  


function theme_option_page() { ?>

	<div class="wrap">

       <div class="row">
           <div class="col-md-8">
             
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
           <div class="col-md-4"></div> 
  
       </div>
      
	</div>

	<?php  }
 
 
	function add_theme_menu_item() {

	add_theme_page("CP Theme option", "CP Theme option", "manage_options", "theme-options", "theme_option_page", null, 99);

}
    add_action("admin_menu", "add_theme_menu_item");

   // function theme_section_description(){ 	echo '<p>Config General theme</p>'; }

	function test_theme_settings(){


	// setting options
    add_settings_section( 'first_section', 'Genneral setting theme', '','theme-options');

 	//add logo
    add_settings_field('logo_text' , 'Add Logo Text name' , 'logot_text_name' , 'theme-options' , 'first_section');
	register_setting( 'theme-options-grp', 'logo_text');


	}
   
	function logot_text_name(){
		?>
		<input type="text" name="logo_text" id="logo_text" class="form-control" value="<?php echo get_option('logo_text'); ?>" />
		<?php	
	}

	
 // regsiter data to database
	add_action('admin_init','test_theme_settings');


?>
