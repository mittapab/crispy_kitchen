( function( $ ) {

	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.custom-btn').css( 'background-color', newval );
		} );
	} );

    // wp.customize( 'SETTING_NAME', function( value ) {
    //     value.bind( function( newval ) {
    //         // Change handled here
    //     } );
    // } );
	
} )( jQuery );


/**
* Create a seperate js file "theme-customizer.js", add below code to that file and add file to the theme js folder.
*/
(function($){
	wp.customize("upload_logo", function(value) {
		value.bind(function(newval) {	
			/*
			* @newval = attachment id of the image
			* @upload_logo = Target id of your logo
			*/
			update_image_id ( newval, 'upload_logo' );	
		} );
	});
	
	wp.customize("footer_copyright", function(value) {
		value.bind(function(newval) {
			$("#footer_text").html(newval); 
		} );
	});
	
	wp.customize("bg_color_scheme", function(value) {
		value.bind(function(newval) {
			var colors = colorScheme[newval].colors;	
			var color = colors[0];
			wp.customize( "header_background_color" ).set( color );
			wp.customize( "footer_background_color" ).set( color );
		} );
	});
	
	wp.customize("header_background_color", function(value) {
		value.bind(function(newval) {
			$( '.navbar.navbar-default' ).css( {
				'background-color': newval
			} );
		} );
	});
	
	wp.customize("footer_background_color", function(value) {
		value.bind(function(newval) {
			$( 'footer' ).css( {
				'background-color': newval
			} );
		} );
	});
	
	
	
})(jQuery);

function update_image_id (id, target_id){
	var ajax_url = ajax_object.ajaxurl
	jQuery.ajax({
		url : ajax_url,
		type : 'post',
		data : {
				action : 'update-logo-customizer',
				attachment_id : id,
				target_id	   : target_id
		},
		success: function( response ){
			jQuery("#"+target_id).html(response);		
			
		}					
	});
}	