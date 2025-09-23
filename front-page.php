<?php

if (!defined("ABSPATH")) {
    exit();
}

get_header();
?>
<div class="dw__page_wrapper" >
     <img class="dw__page_wrapper_parallax rellax" data-rellax-speed="10" src="<?php echo get_template_directory_uri(); ?>/assets/images/elements/background-element.svg" />
     <div class="dw__page_content_container">

          <!-- HERO -->
          <section class="dw__section_hero_wrapper">
              <!-- --
              <div class="dw__hero_left_col">
                   <h2>Unser Chatbot beantwortet deine Fragen – basierend auf dem Expertenwissen der demenzworld.</h2>
              </div>
              -->
               <div class="dw__hero_right_col " >
                    <!--
                    Loading Animation
                    <div class="dw__loading_dots" style="position:absolute; top:0; left:0; bottom:0; right:0; margin:auto;z-index:-5;"></div>-->

                    <!--
                    Botsonic iFrame
                    <iframe style="height:100%;width:100%;position:absolute;" frameBorder="0" src="https://widget.botsonic.com/CDN/index.html?service-base-url=https%3A%2F%2Fapi-azure.botsonic.ai&token=8bc27af1-2037-4c5c-974f-a0a094af3250&base-origin=https%3A%2F%2Fbot.writesonic.com&instance-name=Botsonic&standalone=true&page-url=https%3A%2F%2Fbot.writesonic.com%2Fbots%2Fe43c27a8-216b-49a7-8ced-cc6252359374%2Fconnect"></iframe>-->

                    <iframe style="height:100%;width:100%;position:absolute;max-width:1280px;" frameBorder="0" src="https://sophie.demenzworld.com/chat/iframe"></iframe>

               </div>
          </section>
          <!-- END HERO -->

          <section class="dw__section_dark_wrapper dw__section_platform_grid_wrapper">
               <div class="dw__section_dark_shape_divider divider_top" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_top_blue.svg);">
               </div>
               <div class="dw__section_dark_wrapper_inner">
                         <div class="dw__section_platform_grid">
                              <?php
                              $Boxes = get_field("boxes");
                              if (is_array($Boxes)) {
                                  foreach ($Boxes as $Box) { ?>
                                        <div class="dw__grid_box" style="background-color:<?php echo $Box[
                                            "color"
                                        ]; ?>;" >
                                             <div class="dw__grid_box_background_wrapper " >
                                                  <div class="dw__grid_box_background " style="background-image:url(<?php echo $Box[
                                                      "background_shape"
                                                  ]; ?>);"></div>
                                             </div>
                                             <div class="dw__grid_box_text">
                                                  <h3><?php echo $Box[
                                                      "title"
                                                  ]; ?></h3>
                                                  <div class="dw__grid_box_hidden">
                                                       <?php if ($Box["logo"]) {
                                                           echo '<img class="dw__grid_box_logo" src="' .
                                                               $Box["logo"] .
                                                               '" />';
                                                       } else {
                                                           echo '<h3 style="color:' .
                                                               $Box["color"] .
                                                               '">' .
                                                               $Box["title"] .
                                                               "</h3>";
                                                       } ?>
                                                       <p><?php echo $Box[
                                                           "subtitle"
                                                       ]; ?></p>
                                                       <a href="<?php echo $Box[
                                                           "link"
                                                       ]; ?>" target="_blank" style="background-color:<?php echo $Box[
    "color"
]; ?>;">mehr ...</a>
                                                  </div>
                                             </div>
                                             <div class="dw__grid_box_hover_content">
                                                  <div class="dw__box_icon_container">
                                                       <img class="dw__box_icon_background" src="<?php echo $Box[
                                                           "icon_background"
                                                       ]; ?>"/>
                                                       <img class="dw__box_icon" src="<?php echo $Box[
                                                           "icon"
                                                       ]; ?>"/>
                                                  </div>
                                             </div>
                                        </div>
                                   <?php }
                              }
                              ?>

                         </div>
               </div>
               <div class="dw__section_dark_shape_divider divider_bottom" style="background-color:white;background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_bottom_blue.svg);">
                    <!-- <img src="<?php
//echo get_template_directory_uri();
?>/assets/images/elements/dw-shape_divider_bottom_blue.svg" alt="" width="100%"/>  -->
               </div>
            </section>
            <section class="dw__section_teaser">
                <div class="dw__section_teaser_wrapper">
                    <h2>Aktuell</h2>
                    <p>Neue Beiträge aus dem demenzjournal, anstehende Demenz Meets und was sonst läuft in der demenzworld: Hier bleibst du auf dem Laufenden!</p>
                    <div class="dw__section_teaser_container">

                    <?php
                    $teasers = get_field("teasers") ?: false;
                    if ($teasers) {
                        foreach ($teasers as $teaser) {

                            $category = $teaser["kategorie"];
                            $categoriLogo = [
                                "post" =>
                                    get_template_directory_uri() .
                                    "/assets/images/logo/Logo_hoch_RGB_Demenzjournal_negativ_weiss.svg",
                                "meet" =>
                                    get_template_directory_uri() .
                                    "/assets/images/logo/Logo_hoch_RGB_Demenzmeets_negativ_weiss.svg",
                            ];
                            $categoriIcon = [
                                "post" =>
                                    get_template_directory_uri() .
                                    "/assets/images/logo/Logo_rund_RGB_Demenzjournal_Farbe.svg",
                                "meet" =>
                                    get_template_directory_uri() .
                                    "/assets/images/logo/Logo_rund_RGB_Demenzmeets_Farbe.svg",
                            ];
                            $categoriColor = [
                                "post" => "#8456ba",
                                "meet" => "#db007e",
                            ];
                            ?>
                            <div class="dw__teaser_box dw__teaser_box_<?php echo $category; ?>">
                                <a href="<?php echo esc_url(
                                    $teaser["link"],
                                ); ?>">
                                <div class="dw__teaser_box_icon"><img src="<?php echo $categoriIcon[
                                    $category
                                ]; ?>"/></div>
                                <p class="dw__teaser_box_date"><?php echo $teaser[
                                    "date"
                                ]; ?></p>
                                <div class="dw__teaser_box_image" style="background-image:url('<?php echo $teaser[
                                    "image"
                                ]; ?>');">
                                    <div class="dw__teaser_hover_overlay" style="background-color:<?php echo $categoriColor[
                                        $category
                                    ]; ?>;">
                                        <img src="<?php echo $categoriLogo[
                                            $category
                                        ]; ?>" />
                                    </div>
                                </div>
                                <div class="dw__teaser_box_content">

                                    <h3 style="color: <?php echo $categoriColor[
                                        $category
                                    ]; ?>;"><?php echo $teaser["title"]; ?></h3>
                                    <p><?php echo $teaser["excerpt"]; ?></p>
                                </div>
                                <div class="dw__teaser_hover_overlay_footer" style="background-color:<?php echo $categoriColor[
                                    $category
                                ]; ?>;">weiterlesen <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dw_arrow.svg" /></div>
                                </a>
                            </div>
                        <?php
                        }
                    }
                    ?>
                    </div>
                </div>
                <div class="dw__section_dark_shape_divider divider_bottom" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_bottom_white.svg);">
                </div>
            </section>

            <section class="dw__section_newsletter">
               <div class="dw__section_newsletter_col_left">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pictures/dw-newsletter_image.png" alt="" width="100%">
               </div>
               <div class="dw__section_newsletter_col_right">
                    <h4 >Newsletter</h4>
                    <h2 style="color:#db007e;" id="newsletter">Aus 🐘 werden 🐘🐘🐘:</h2>
                    <script type="text/javascript" src="//livelearninglabs.friendlyautomate.ch/form/generate.js?id=92"></script>
               </div>

            </section>

            <section class="dw__section_testimonials ">
                <div class="dw__section_dark_shape_divider divider_top" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_top_blue.svg);">
                </div>
                <div class="dw__section_testimonials_wrapper">
                    <div class="dw__section_testimonials_content">
                        <h2>Für Menschen<br>von Menschen</h2>
                        <p>Unsere Community sagt:</p>
                        <div id="testimonial_splide" class="splide">
                            <div class="dw__section_testimonials_carousel splide__track">
                                <ul class="splide__list">
                                <?php
                                $testimonials =
                                    get_field("testimonial") ?: false;
                                if ($testimonials) {
                                    foreach ($testimonials as $testimonial) {
                                        echo '<li class="splide__slide">';
                                        echo render_testimonial($testimonial);
                                        echo "</li>";
                                    }
                                }
                                ?>
                                </ul>
                            </div>
                            <div>

                            </div>

                        </div>


                        <button onclick="window.location.href='<?php echo get_field(
                            "donation_link_spende",
                            "options",
                        ); ?>';" class="dw_setion_testimonial_sdonation_button"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/elements/heart.svg" width="25px" height="25px">Jetzt Spenden</button>
                    </div>

                </div>
                <div class="dw__section_dark_shape_divider divider_bottom" style="background-color:white;background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_bottom_blue.svg);">

                </div>
            </section>

          <section class="dw__section_supporter">

               <div class="dw__section_white_wrapper_inner dw__supporter_grid_section">

                    <h2 style="padding:0 2%; width:90%; text-align:center;">Diese Organisationen unterstützen uns:</h2>
                    <div class="dw__supporter_grid" style="">
                    <?php
                    $supporters = get_field("supporters");
                    if (is_array($supporters)) {
                        foreach ($supporters as $supporter) {
                            $supporter_link = $supporter["link"]; ?>


                         <div class="dw__supporter_logo" >
                             <?php if ($supporter_link) {
                                 echo '<a href="' .
                                     $supporter_link .
                                     '" target="_blank">';
                             } ?>
                              <img src="<?php echo $supporter[
                                  "logo"
                              ]; ?>" alt="<?php echo $supporter[
    "name"
]; ?>"  title="<?php echo $supporter["name"]; ?>" width="100%">
     <?php if ($supporter_link) {
         echo "</a>";
     } ?>
                         </div>
                    <?php
                        }
                    }
                    ?>
               </div>



               <div class="dw__section_white_wrapper_inner dw__supporter_grid_section">

                    <h2 style="padding:0 2%; width:90%; text-align:center;">Unsere Partner</h2>
                    <div class="dw__supporter_grid" style="">
                    <?php
                    $partners = get_field("partner");
                    if (is_array($partners)) {
                        foreach ($partners as $partner) {
                            $partner_link = $partner["link"]; ?>


                        <div class="dw__supporter_logo" >
                            <?php if ($partner_link) {
                                echo '<a href="' .
                                    $partner_link .
                                    '" target="_blank">';
                            } ?>
                                <img src="<?php echo $partner[
                                    "logo"
                                ]; ?>" alt="<?php echo $partner[
    "name"
]; ?>"  title="<?php echo $partner["name"]; ?>" width="100%">
                                <?php if ($partner_link) {
                                    echo "</a>";
                                } ?>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>

          </section>

     </div>
</div>

<script>
     //var rellax = new Rellax(".rellax");
</script>
<?php
get_footer();

function render_testimonial($testimonialData)
{
    $testimonialBox = "";
    $testimonialBox .= '<div class=" dw__testimonial_box">';
    $testimonialBox .=
        "<blockquote>" . $testimonialData["quote"] . "</blockquote>";
    $testimonialBox .= '<div class="dw__testimonial_box_author">';
    $testimonialBox .=
        '<div class="dw__testimonial_box_author_portrait" style="background-image:url(' .
        $testimonialData["portrait"] .
        ');"></div>';
    $testimonialBox .= '<div class="dw__testimonial_box_author_name">';
    $testimonialBox .= "<h3>" . $testimonialData["author"]["name"] . "</h3>";
    $testimonialBox .=
        "<h5>" . $testimonialData["author"]["funktion"] . "</h5>";
    $testimonialBox .= "</div>";

    $testimonialBox .= "</div>";

    $testimonialBox .= '<div class="bubble_cone"></div>';
    $testimonialBox .= "</div>";
    return $testimonialBox;
}

