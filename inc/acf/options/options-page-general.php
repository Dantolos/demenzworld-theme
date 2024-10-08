<?php 

add_action( 'acf/init', function() {
	acf_add_options_page( array(
          'page_title' => 'General',
          'menu_slug' => 'general',
          'menu_title' => 'Theme',
          'position' => 1,
          'redirect' => false,
          'menu_icon' => array(
               'type' => 'media_library',
               'value' => '74',
          ),
          'icon_url' => 'http://localhost:10038/wp-content/uploads/2024/09/Logo_rund_RGB_Demenzworld_weiss-3.svg',
     ) );
} );