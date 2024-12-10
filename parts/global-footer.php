<?php  
namespace DW\Global_Footer;


if ( ! class_exists( 'Toplevel_Navbar' ) ) {
     class Global_Footer { 
          public array $footer_Navigation_Section;
          public string $donation_link_goenner;
          public string $donation_link_spende;

          public function __construct() {
               $this->footer_Navigation_Section = get_field('navigation_section', 'options') ?: false;

               $this->donation_link_goenner = get_field('donation_link_goenner', 'options') ?: '#';
               $this->donation_link_spende = get_field('donation_link_spende', 'options') ?: '#';
          }

          public function render():string {
               $render_output = '';
               $render_output .=  $this->get_style();
               $render_output .= $this->footer_content();
               $render_output .= $this->get_script();
               return $render_output; 
          }

          public function footer_content():string {
               $footer_content = '';
               $footer_content .= '<section class="dw__global_footer">'; 

                    $footer_content .= '<div class="dw__global_footer_overlay">';
                         $footer_content .= $this->shape_divider();
                    $footer_content .= '</div>';

                    // CONTENT
                    $footer_content .= '<div class="dw__global_footer_container">';
                         $footer_content .= '<div class="dw__footer_scroll_overlay"></div>';
                         $footer_content .= '<div class="dw__global_footer_inner">';
                              
                              $footer_content .= '<div class="dw__footer_left">';
                                   if($this->footer_Navigation_Section){
                                        $footer_content .= $this->address_block();
                                   }
                              $footer_content .= '</div>';
                              $footer_content .= '<div class="dw__footer_mid">';
                                   $footer_content .= $this->footer_call_to_action();    
                              $footer_content .= '</div>';
                              $footer_content .= '<div class="dw__footer_right">';
                                   $footer_content .= $this->navigation_block();    
                              $footer_content .= '</div>';
                              
                         $footer_content .= '</div>';
                    $footer_content .= '</div>';

               $footer_content .= '</section>';
               $footer_content .= $this->navbar_newsletter_lightbox();
               return $footer_content;
          }

          public function address_block():string { 
               $address_block = '';
               $address_block .= '<img src="'.get_template_directory_uri().'/assets/images/logo/demenzworld_logo_white.svg" alt="demenzworld logo" width="100%">';
               $address_block .= '<p>Verein demenzworld<br />c/o Linden 3L AG<br />Weyermannsstrasse 36<br />3008 Bern</p>';
               $address_block .= '<p><a href="mailto:hello@demenzworld.com">hello(at)demenzworld.com</a></p>';
               $address_block .= '<div class="dw__footer_social_media">';
                    $address_block .= '<a href="https://www.facebook.com/demenzworldcom" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/social_media/facebook.svg" alt="facebook" /></a>';
                    $address_block .= '<a href="https://www.youtube.com/@demenzworld" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/social_media/youtube.svg" alt="Youtube" /></a>';
                    $address_block .= '<a href="https://www.instagram.com/demenzworldcom/" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/social_media/insta.svg" alt="Instagram" /></a>';
                    $address_block .= '<a href="https://www.linkedin.com/company/demenzworld/ " target="_blank" ><img src="' . get_template_directory_uri() . '/assets/images/social_media/linkedin.svg" alt="LinkedIn"  /></a>';
               $address_block .= '</div>'; 
               return $address_block;
          }

          public function footer_call_to_action():string {
               $footer_cta = '';
               $footer_cta .= '<div class="dw__footer_call_to_action">';
                    $footer_cta .= '<img src="'.get_template_directory_uri().'/assets/images/elements/dw-donation-hearts-monoblue.svg" alt="thanks">';
                    $footer_cta .= '<button onclick="window.location.href=\''.$this->donation_link_goenner.'\';">Werde Gönner</button>';
                    $footer_cta .= '<button onclick="window.location.href=\''.$this->donation_link_spende.'\';">Einmalige Spende</button>';
                    $footer_cta .= '<div class="dw__footer_call_to_action_divider"><div class="divider_dot"></div><div class="divider_dot"></div><div class="divider_dot"></div><div class="divider_dot"></div></div>';
                    $footer_cta .= '<button onclick="openLightBox(\'.dw__newsletter_lightbox_container\')">Newsletter</button>';
               $footer_cta .= '</div>';
               return $footer_cta;
          }

          public function navigation_block():string { 
               $footer_nav = '';
               foreach ($this->footer_Navigation_Section as $key => $nav_section) {
                    $footer_nav .= '<div class="dw__footer_navigation_section">';
                         $footer_nav .= '<h4 class="dw__footer_navigation_section_title">'.$nav_section['section_title'].'</h4>';
                         $footer_nav .= '<ul>';
                              foreach ($nav_section['footer_navigation'] as $nav_item) {
                                   $footer_nav .= '<li><a href="'.$nav_item['link']['url'].'" target="'.$nav_item['link']['target'].'" >'.$nav_item['title'].'</a></li>';
                              }
                         $footer_nav .= '</ul>';
                    $footer_nav .= '</div>'; 
               }
               return $footer_nav;
          }

          //GET CSS File Content in a style-tag
          public function get_style():string {
               $cssFile = __DIR__.'/global-footer.css';
               $style_return = '<style type="text/css">';
               if (file_exists($cssFile)) {
                    $style_return .= file_get_contents($cssFile);
               }    
               $style_return .= '</style>'; 
               return $style_return;
          }

          //GET JS File Content in a script-tag
          private function get_script():string {
               $jsFile = __DIR__.'/global-footer.js';
               $js_return = '<script type="text/javascript" defer>';
               if (file_exists($jsFile)) {
                    $js_return .= file_get_contents($jsFile);
               }
               $js_return .= '</script>'; 
               return $js_return;
          }

          public function shape_divider():string {
               $shape_svg = '';
               $shape_svg .= '<svg width="1832" height="50" viewBox="0 0 1832 50" fill="none" xmlns="http://www.w3.org/2000/svg">';
               $shape_svg .= '<path fill="white" fill-rule="evenodd" clip-rule="evenodd" d="M1832.01 35.3581C1811.59 34.5859 1787.9 33.5594 1761.56 32.418C1601.26 25.4709 1342.75 14.2682 1125.45 30.2661C639.916 57.7234 602.734 55.114 260.481 31.0959L248.655 30.266C173.822 25.0162 89.6251 21.1617 -0.00390349 18.4302L-0.00390188 -0.00991462L1832.01 -0.00984983L1832.01 35.3581Z" />';
               $shape_svg .= '</svg>';
               return $shape_svg;
          }

          private function navbar_newsletter_lightbox():string { 
               $navbar_newsletter_lightbox = '';
               $navbar_newsletter_lightbox .= '<div class="dw__lightbox_container dw__newsletter_lightbox_container">';
                    $navbar_newsletter_lightbox .= '<div class="dw__newsletter_lightbox">';
                         $navbar_newsletter_lightbox .= '<div class="dw__section_newsletter_col_right">';
                              $navbar_newsletter_lightbox .= ' <h4 >Newsletter</h4>';
                              $navbar_newsletter_lightbox .= '<h2 style="color:#db007e;" id="newsletter">Aus 🐘 werden 🐘🐘🐘:</h2>';
                              $navbar_newsletter_lightbox .= '<script type="text/javascript" src="//livelearninglabs.friendlyautomate.ch/form/generate.js?id=92"></script>';
                         $navbar_newsletter_lightbox .= '</div>';
                    $navbar_newsletter_lightbox .= '</div>';
               $navbar_newsletter_lightbox .= '</div>';
               return $navbar_newsletter_lightbox;
          }
     }
}
