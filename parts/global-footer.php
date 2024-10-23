<?php  
namespace DW\Global_Footer;


if ( ! class_exists( 'Toplevel_Navbar' ) ) {
     class Global_Footer { 
          public function __construct() {
                
          }

          public function render(){
               $render_output = '';
               $render_output .=  $this->get_style();
               $render_output .= '<section class="dw__global_footer">'; 

                    $render_output .= '<div class="dw__global_footer_overlay">';
                         $render_output .= $this->shape_divider();
                    $render_output .= '</div>';
                    $render_output .= '<div class="dw__global_footer_container">';
                         $render_output .= '<div class="dw__footer_left">';
                              $render_output .= '<img src="'.get_template_directory_uri().'/assets/images/logo/demenzworld_logo_white.svg" alt="demenzworld logo" width="100%">';
                              $render_output .= '<p>Verein demenzworld<br />c/o Linden 3L AG<br />Weyermannsstrasse 36<br />3008 Bern</p>';
                              $render_output .= '<p><a href="mailto:hello@demenzworld.com">hello(at)demenzworld.com</a></p>';
                              $render_output .= '<div class="dw__footer_social_media">';
                                   $render_output .= '<a href="https://www.facebook.com/groups/demenzalzheimer " target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/social_media/facebook.svg" alt="facebook" /></a>';
                                   $render_output .= '<a href="https://www.youtube.com/@demenzworld" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/social_media/youtube.svg" alt="Youtube" /></a>';
                                   $render_output .= '<a href="https://www.instagram.com/demenzworldcom/" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/social_media/insta.svg" alt="Instagram" /></a>';
                                   $render_output .= '<a href="https://www.linkedin.com/company/demenzworld/ " target="_blank" ><img src="' . get_template_directory_uri() . '/assets/images/social_media/linkedin.svg" alt="LinkedIn"  /></a>';
                              $render_output .= '</div>';
                         $render_output .= '</div>';
                    $render_output .= '</div>';
               $render_output .= '</section>';
               $render_output .= $this->get_script();
               return $render_output; 
          }

          //GET CSS File Content in a style-tag
          public function get_style() {
               $cssFile = __DIR__.'/global-footer.css';
               $style_return = '<style type="text/css">';
               if (file_exists($cssFile)) {
                    $style_return .= file_get_contents($cssFile);
               }    
               $style_return .= '</style>'; 
               return $style_return;
          }

          //GET JS File Content in a script-tag
          private function get_script() {
               $jsFile = __DIR__.'/global-footer.js';
               $js_return = '<script type="text/javascript" defer>';
               if (file_exists($jsFile)) {
                    $js_return .= file_get_contents($jsFile);
               }
               $js_return .= '</script>'; 
               return $js_return;
          }

          public function shape_divider() {
               $shape_svg = '';
               $shape_svg .= '<svg width="1832" height="50" viewBox="0 0 1832 50" fill="none" xmlns="http://www.w3.org/2000/svg">';
               $shape_svg .= '<path fill="white" fill-rule="evenodd" clip-rule="evenodd" d="M1832.01 35.3581C1811.59 34.5859 1787.9 33.5594 1761.56 32.418C1601.26 25.4709 1342.75 14.2682 1125.45 30.2661C639.916 57.7234 602.734 55.114 260.481 31.0959L248.655 30.266C173.822 25.0162 89.6251 21.1617 -0.00390349 18.4302L-0.00390188 -0.00991462L1832.01 -0.00984983L1832.01 35.3581Z" />';
               $shape_svg .= '</svg>';
               return $shape_svg;
          }
     }
}