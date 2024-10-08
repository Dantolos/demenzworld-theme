<?php
require_once(get_stylesheet_directory().'/parts/toplevel-navbar.php');


function toplevel_navbar( \WP_REST_Request $request ) {
	
	$args = $request->get_params(); 

	$navigation = array(
		['name' => 'journal', 'url' => 'https://demenzjournal.com/', 'color' => '#8456BA'],
		['name' => 'wiki', 'url' => 'https://demenzwiki.com/', 'color' => '#dd3333'],
		['name' => 'meets', 'url' => 'https://www.demenzmeet.ch/', 'color' => '#db007e'],
		['name' => 'forum', 'url' => 'https://www.facebook.com/demenzworldcom', 'color' => '#F5AA00'],
	);

     $Toplevel_Navbar = new \DW\Toplevel_Navbar\Toplevel_Navbar($navigation, false);

	

     $navbar_endpoint = [
		'endpoint' => '/toplevel-navbar', 
          "toplevel_navbar" => $Toplevel_Navbar->render()
     ];

	// Filter: fields=XYZ 
	if (isset($args['fields'])) {
		$fields = explode(',', $args['fields']); 
		$filtered_result = [];

          foreach ($fields as $field) {
               if (isset($navbar_endpoint[$field])) {
                    $filtered_result[$field] = $navbar_endpoint[$field];
               }
          } 
          return $filtered_result;
     }

	return $navbar_endpoint;
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'dw', '/navbar/', array(
		'methods'  => 'GET',
		'callback' => 'toplevel_navbar',
	) );
} );
