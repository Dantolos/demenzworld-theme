<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

get_header(); 
?>
<div class="dw__page_wrapper" >  
     <img class="dw__page_wrapper_parallax rellax" data-rellax-speed="10" src="<?php echo get_template_directory_uri(); ?>/assets/images/elements/background-element.svg" />    
     <div class="dw__page_content_container"> 

          <!-- HERO -->
          <section class="dw__section_hero_wrapper">
               <div class="dw__hero_left_col">
                    <h2>Alzi beantwortet deine Fragen – basierend auf dem Expertenwissen der demenzworld.</h2>
               </div>
               <div class="dw__hero_right_col">
                    <div class="dw__loading_dots" style="position:absolute; top:0; left:0; bottom:0; right:0; margin:auto;z-index:-5;"></div>     
                    <iframe style="height:100%;width:100%;position:absolute;" frameBorder="0" src="https://widget.botsonic.com/CDN/index.html?service-base-url=https%3A%2F%2Fapi-azure.botsonic.ai&token=8bc27af1-2037-4c5c-974f-a0a094af3250&base-origin=https%3A%2F%2Fbot.writesonic.com&instance-name=Botsonic&standalone=true&page-url=https%3A%2F%2Fbot.writesonic.com%2Fbots%2Fe43c27a8-216b-49a7-8ced-cc6252359374%2Fconnect"></iframe>
               </div>
          </section>
          <!-- END HERO -->
          <section class="dw__section_dark_wrapper dw__section_platform_grid_wrapper">
               <div class="dw__section_dark_shape_divider divider_top" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_top_blue.svg);">
               </div>
               <div class="dw__section_dark_wrapper_inner" > 
                         <div class="dw__section_platform_grid">
                              <?php 
                              $Boxes = get_field('boxes');
                              if(is_array($Boxes) ){
                                   foreach( $Boxes as $Box){ ?>
                                 
                                        <div class="dw__grid_box" style="background-color:<?php echo $Box['color']; ?>;" > 
                                             <div class="dw__grid_box_background_wrapper " >
                                                  <div class="dw__grid_box_background " style="background-image:url(<?php echo $Box['background_shape']; ?>);"></div>
                                             </div>
                                             <div class="dw__grid_box_text">
                                                  <h3><?php echo $Box['title']; ?></h3>
                                                  <div class="dw__grid_box_hidden">
                                                       <?php if ($Box['logo']) {
                                                            echo '<img class="dw__grid_box_logo" src="' . $Box['logo'] . '" />'; 
                                                       } else {
                                                            echo '<h3 style="color:' . $Box['color'] . '">' . $Box['title'] . '</h3>'; 
                                                       }?>
                                                       <p><?php echo $Box['subtitle']; ?></p>
                                                       <a href="<?php echo $Box['link']; ?>" target="_blank" style="background-color:<?php echo $Box['color']; ?>;">mehr ...</a>
                                                  </div>
                                             </div>
                                             <div class="dw__grid_box_hover_content">
                                                  <div class="dw__box_icon_container">
                                                       <img class="dw__box_icon_background" src="<?php echo $Box['icon_background']; ?>"/>
                                                       <img class="dw__box_icon" src="<?php echo $Box['icon']; ?>"/>
                                                  </div>
                                             </div>
                                             
                                        </div>
                                        
                                   <?php }
                              } ?>
                             
                         </div>
               </div> 
               <div class="dw__section_dark_shape_divider divider_bottom" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_bottom_blue.svg);">
                    <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_bottom_blue.svg" alt="" width="100%"/>  -->
               </div> 
          </section>
     
          <section class="dw__section_newsletter">
               <div class="dw__section_newsletter_col_left">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pictures/dw-newsletter_image.png" alt="" width="100%">
               </div>
               <div class="dw__section_newsletter_col_right">
                    <h4>Newsletter</h4>
                    <h2 style="color:#db007e;">Aus 🐘 werden 🐘🐘🐘:</h2>
                    <script type="text/javascript" src="//livelearninglabs.friendlyautomate.ch/form/generate.js?id=92"></script>
                         
               </div>
          </section>

          <section class="dw__section_supporter">
               <div class="dw__section_white_shape_divider divider_top" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_top_white.svg);">
               </div>
               <div class="dw__section_white_wrapper_inner" >   
           
                    <h2 style="padding:0 5%; width:90%; text-align:center;">Diese Organisationen unterstützen uns.</h2>
                    <div class="dw__supporter_grid" style="">   
                    <?php 
                    $supporters = get_field('supporters');
                    if(is_array($supporters) ){ 
                         foreach( $supporters as $supporter){ ?>
                         <div class="dw__supporter_logo" style="">
                              <img src="<?php echo $supporter['logo']; ?>" alt="<?php echo $supporter['name']; ?>"  title="<?php echo $supporter['name']; ?>" width="100%">
                         </div> 
                    <?php }} ?>
               </div>
          </section>

         

          
     </div> 
</div>

<script>
     var rellax = new Rellax(".rellax");
</script>
<?php
get_footer();
