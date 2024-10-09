<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once(__DIR__.'/parts/toplevel-navbar.php');

$navigation = get_field('navigation', 'options');
$Toplevel_Navbar = new \DW\Toplevel_Navbar\Toplevel_Navbar( $navigation, false );

?>
<!DOCTYPE html>
<html lang="DE">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background-color:#E4DEF2;">
 
<?php
echo $Toplevel_Navbar->render();
