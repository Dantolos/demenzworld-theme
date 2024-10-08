<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 
get_header(); 
?>


<div>  
     <?php echo get_the_content(); ?>   
</div>


<?php
get_footer();
