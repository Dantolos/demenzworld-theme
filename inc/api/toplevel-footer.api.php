<?php
require_once(get_stylesheet_directory().'/parts/global-footer.php');

function toplevel_footer( \WP_REST_Request $request ) {

  $args = $request->get_params();
  
  $jsFile = get_stylesheet_directory_uri().'/parts/global-footer.js'; 
	$js_script = file_get_contents($jsFile) ?: false;

  $cssFile = get_stylesheet_directory_uri().'/parts/global-footer.css'; 
	$css_script = file_get_contents($cssFile) ?: false;

  $Global_Footer = new \DW\Global_Footer\Global_Footer(  );

  $footer_endpoint = '';
  
  $footer_endpoint = [
    'style_link' => get_stylesheet_directory_uri().'/parts/global-footer.css',
    'script_link' => get_stylesheet_directory_uri().'/parts/global-footer.js',
    'content' => '<div class="dw__global_footer_embed_wrapper">'.$Global_Footer->footer_content().'</div>',
  ];
  return $footer_endpoint;
}


add_action( 'rest_api_init', function () {
	register_rest_route( 'dw', '/footer/', array(
		'methods'  => 'GET',
		'callback' => 'toplevel_footer',
	) );
} );


