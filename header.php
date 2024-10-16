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
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory(); ?>/assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory(); ?>/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory(); ?>/assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_stylesheet_directory(); ?>/assets/images/favicon/site.webmanifest">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background-color:#E4DEF2;">
 
<?php
echo $Toplevel_Navbar->render();
