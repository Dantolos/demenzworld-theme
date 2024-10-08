<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

// LOADING ACF SETTINGS
include_once( get_stylesheet_directory() . '/inc/acf/acf-config.php' );
 
// CUSTOM ENDPOINT
require_once( get_stylesheet_directory() . '/inc/api/toplevel-navbar.api.php' );
 
function custom_theme_scripts() { 
     wp_enqueue_style('main-stylesheet', get_template_directory_uri() . '/assets/style/main.css'); 

     wp_enqueue_script('rellax', 'https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js', array(), null, false); 
     wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/scripts/main.js', array(), null, false); 
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts'); 


/*-----------------------
-----BLOCK INCLUDING-----
------------------------*/
//require_once get_template_directory() . '/inc/blocks/blocks.php';



/*-------------------------------------------------------------*/
/*------------------------SVG Erlauben-------------------------*/
/*-------------------------------------------------------------*/
add_filter( 'wp_check_filetype_and_ext', 'my_svgs_disable_real_mime_check', 10, 4 );
function my_svgs_disable_real_mime_check( $data, $file, $filename, $mimes ) {
     $wp_filetype = wp_check_filetype( $filename, $mimes );	
     $ext = $wp_filetype['ext'];
     $type = $wp_filetype['type'];
     $proper_filename = $data['proper_filename'];
     return compact( 'ext', 'type', 'proper_filename' );
}
add_filter( 'upload_mimes', function ( $mime_types ) {
     $mime_types['svg'] = 'image/svg+xml';
     $mime_types[ 'eps' ] = 'application/postscript';
     $mime_types['json'] = 'application/json'; 
     $mime_types['obj'] = 'model/obj'; 
     $mime_types['fbx'] = 'model/fbx'; 
     return $mime_types;
} );

