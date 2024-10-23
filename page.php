<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

get_header(); 
?>
<div class="dw__page_wrapper dw_default_page" >  
     <div class="dw__page_content_container dw_default_page_content"> 
          <?php echo the_content(); ?>
     </div>
</div>

<script>
     var rellax = new Rellax(".rellax");
</script>
<?php
get_footer();
