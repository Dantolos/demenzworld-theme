<?php  
namespace DW\Toplevel_Navbar;

if ( ! class_exists( 'Toplevel_Navbar' ) ) {
     class Toplevel_Navbar {
 
          public $darkmode;
          public $bg_color;
          public $primary_logo;
          public $alt_logo;
          public $icon;
          public $navigation;
          public $donation_link_goenner;
          public $donation_link_spende;

          public $style_sheet;
          private $js_script;

           
          function __construct( array $navigation, bool $darkmode = false ) {  
               $this->darkmode = $darkmode;
               $this->navigation = $navigation;

               $this->bg_color = $this->darkmode ? '#0C032D' : '#FFFFFF';

               $this->primary_logo = !$this->darkmode ? get_field('logo', 'options') : get_field('logo_negativ', 'options');
               $this->alt_logo = !$this->darkmode ? get_field('logo_alt', 'options') : get_field('logo_negativ_alt', 'options');
               $this->icon = !$this->darkmode ? get_field('icon', 'options') : get_field('icon_negativ', 'options');
 
               $this->style_sheet = $this->get_style();
               $this->js_script = $this->get_script(); 

               $this->donation_link_goenner = get_field('donation_link_goenner', 'options') ?: '#';
               $this->donation_link_spende = get_field('donation_link_spende', 'options') ?: '#';
          }

        
          public function render() {
               $render_output = '';
       
               $render_output .= '<div class="dw__navbar_wrapper">';
               $render_output .=  $this->get_style();

               $render_output .=  $this->navbar_content();

               $render_output .= '</div>';
               $render_output .= $this->js_script;

               return $render_output;
          }

          public function navbar_content(){
               $navbar_content = '';
               $navbar_content .= '<nav class="dw__navbar" style="background-color:'.$this->bg_color.';"> ';
                    $navbar_content .= $this->navbar_logo();

                    $navbar_content .= '<div class="dw__navbar_navigation_container">';
                         $navbar_content .= $this->navbar_navigation_list();
                    $navbar_content .= '</div>';

                    $navbar_content .= '<div class="dw__navbar_buttons_container">'; 
                         $navbar_content .= $this->navbar_donation_trigger(); 
                         $navbar_content .= $this->navbar_chatbot_trigger();
                         $navbar_content .= $this->navbar_burger_trigger();
                    $navbar_content .= '</div>';
               $navbar_content .= '</nav>';
          
          
               $navbar_content .= $this->navbar_donation_lightbox();
               $navbar_content .= $this->navbar_chatbot_lightbox();
               $navbar_content .= $this->navbar_burger_lightbox();
               return $navbar_content;
          }

          private function navbar_logo() { 
               $navbar_logo = '';
               $navbar_logo .= '<div class="dw__navbar_logo" >';
                    $navbar_logo .= '<a class="" href="https://demenzworld.com" style="">'; 
                         $navbar_logo .= '<img src="'.$this->alt_logo.'" alt="logo" style="max-height: 100%; width: auto; object-fit: cover;"/>'; 
                    $navbar_logo .= '</a>';
               $navbar_logo .= '</div>'; 
               return $navbar_logo; 
          }

          

          private function navbar_donation_trigger() { 
               $navbar_donation_trigger = '';
               $navbar_donation_trigger .= '<button onclick="openLightBox(\'.dw__donation_lightbox_container\')" class="dw__navbar_donation_trigger">';
                    $navbar_donation_trigger .= '<img src="'.get_stylesheet_directory_uri().'/assets/images/dw-donation-icon.svg" alt="donation"/>';
               $navbar_donation_trigger .= '</button>';
               return $navbar_donation_trigger;
          }
      

          private function navbar_chatbot_trigger() { 
               $navbar_chatbot_trigger = '';
               $navbar_chatbot_trigger .= '<button onclick="openLightBox(\'.dw__chatbot_lightbox_container\')" class="dw__navbar_chatbot_trigger">';
                    $navbar_chatbot_trigger .= '<img src="'.get_stylesheet_directory_uri().'/assets/images/chatbot-icon.svg" alt="chatbot"/>';
               $navbar_chatbot_trigger .= '</button>';
               return $navbar_chatbot_trigger;
          }

          private function navbar_burger_trigger() { 
               $navbar_burger_trigger = '';
               $navbar_burger_trigger .= '<button onclick="openLightBox(\'.dw__burger_lightbox_container\')" class="dw__navbar_burger_trigger">';
                    $navbar_burger_trigger .= '<img src="'.get_stylesheet_directory_uri().'/assets/images/dw-burger-icon.svg" alt="burger"/>';
               $navbar_burger_trigger .= '</button>';
               return $navbar_burger_trigger;
          }
         

          private function navbar_navigation_list(  ) {
               $navbar_navigation = '';
               $navbar_navigation .= '<ul class="dw__navbar_navigation">';
                    foreach( $this->navigation as $navigation_item ){
                         $navigation_link = isset($navigation_item['link']['url']) ? $navigation_item['link'] : array('url' => '*', 'target' => '' );
                         $navbar_navigation .= '<li class="dw__navbar_navigation_item">';
                              $navbar_navigation .= '<a class="nav-link dropdown-toggle" style="color:'.$navigation_item['color'].';" href="'. $navigation_link['url'].'" target="'. $navigation_link['target'].'"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                              $navbar_navigation .= $navigation_item['title'];
                              $navbar_navigation .= '</a>';
                         $navbar_navigation .= '</li>';
                    } 
                    // DROPDOWN
                    $navbar_navigation .= '<li class="dw__navbar_navigation_item dw__navbar_navigation_item_dropdown">';
                         $navbar_navigation .= 'Unterstützung';
                         $navbar_navigation .= '<ul class="dw__navbar_dropdown_menu" aria-labelledby="navbarDropdown">';
                              $navbar_navigation .= '<li class="dw__navbar_dropdown_item">';
                                   $navbar_navigation .= '<a class="nav-link dropdown-toggle" href="'.$this->donation_link_goenner.'" target="_blank"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                   $navbar_navigation .= 'Werde Gönner';
                                   $navbar_navigation .= '</a>';
                              $navbar_navigation .= '</li>';
                              $navbar_navigation .= '<li class="dw__navbar_dropdown_item">';
                                   $navbar_navigation .= '<a class="nav-link dropdown-toggle" href="'.$this->donation_link_spende.'" target="_blank" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                   $navbar_navigation .= 'Einmalige Spende';
                                   $navbar_navigation .= '</a>';
                              $navbar_navigation .= '</li>';
                         $navbar_navigation .= '</ul>'; 
                    $navbar_navigation .= '</li>';
               $navbar_navigation .= '</ul>'; 
               return $navbar_navigation;
          } 
 
          
          private function navbar_donation_lightbox() { 
               $navbar_donation_lightbox = '';
               $navbar_donation_lightbox .= '<div class="dw__lightbox_container dw__donation_lightbox_container">';
                    $navbar_donation_lightbox .= '<div class="dw__donation_lightbox">';
                         $navbar_donation_lightbox .= '<img src="'.get_stylesheet_directory_uri().'/assets/images/elements/donation.svg" alt="donation"/>';
                         $navbar_donation_lightbox .= '<h3>Unterstütze uns</h3>';
                         $navbar_donation_lightbox .= '<a href="'.$this->donation_link_goenner.'" target="_blank">';
                         $navbar_donation_lightbox .= '<button class="dw__donation_button_primary">Werde Gönner</button>';
                         $navbar_donation_lightbox .= '</a>';
                         $navbar_donation_lightbox .= '<a href="'.$this->donation_link_spende.'" target="_blank">';
                         $navbar_donation_lightbox .= '<button class="dw__donation_button_secondary">einmalige Spende</button>';
                         $navbar_donation_lightbox .= '</a>';
                    $navbar_donation_lightbox .= '</div>';
               $navbar_donation_lightbox .= '</div>';
               return $navbar_donation_lightbox;
          }

          private function navbar_chatbot_lightbox() { 
               $navbar_chatbot_lightbox = '';
               $navbar_chatbot_lightbox .= '<div class="dw__lightbox_container dw__chatbot_lightbox_container">';
                    $navbar_chatbot_lightbox .= '<div class="dw__chatbot_lightbox">';
                         $navbar_chatbot_lightbox .= '<img src="'.get_stylesheet_directory_uri().'/assets/images/chatbot-icon.svg" alt="chatbot" style="opacity:.2; transform:scale(2); filter: grayscale(1);"/>';
                         $navbar_chatbot_lightbox .= '<button class="dw__chatbot_lightbox_close_btn" onclick="closeLightBox(\'.dw__chatbot_lightbox_container\')"><img src="'.get_stylesheet_directory_uri().'/assets/images/close-icon.svg" alt="close-icon" style="opacity:.6; transform:scale(1); filter: grayscale(1);"/></button>';
                         $navbar_chatbot_lightbox .= '<div class="dw__chatbot_lightbox_chatbot">';
                              $navbar_chatbot_lightbox .= '<iframe style="height:100%;width:100%" frameBorder="0" src="https://widget.botsonic.com/CDN/index.html?service-base-url=https%3A%2F%2Fapi-azure.botsonic.ai&token=8bc27af1-2037-4c5c-974f-a0a094af3250&base-origin=https%3A%2F%2Fbot.writesonic.com&instance-name=Botsonic&standalone=true&page-url=https%3A%2F%2Fbot.writesonic.com%2Fbots%2Fe43c27a8-216b-49a7-8ced-cc6252359374%2Fconnect"></iframe>';
                         $navbar_chatbot_lightbox .= '</div>';
                    $navbar_chatbot_lightbox .= '</div>';
               $navbar_chatbot_lightbox .= '</div>';
               return $navbar_chatbot_lightbox;
          }

          private function navbar_burger_lightbox() { 
               $navbar_burger_lightbox = '';
               $navbar_burger_lightbox .= '<div class="dw__lightbox_container dw__burger_lightbox_container">';
                    $navbar_burger_lightbox .= '<div class="dw__burger_lightbox" >';
                         $navbar_burger_lightbox .= '<div class="dw__burger_navlist_wrapper" style="hide-scrollbar">';
                              foreach( $this->navigation as $navigation_item ){
                                   $navigation_link = isset($navigation_item['link']['url']) ? $navigation_item['link'] : array('url' => '*', 'target' => '' );
                                   $navbar_burger_lightbox .= '<a class="nav-link dropdown-toggle"  href="'. $navigation_link['url'].'" target="'. $navigation_link['target'].'"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                        $navbar_burger_lightbox .= '<div class="dw__burger_navigation_item" style="background-color:'.$navigation_item['color'].';">';
                                             $navbar_burger_lightbox .= $navigation_item['title'];
                                        $navbar_burger_lightbox .= '</div>';
                                   $navbar_burger_lightbox .= '</a>';
                              }  

                              $navbar_burger_lightbox .= '<div class="dw__burger_navigation_item dw__burger_navigation_item_dropdown">';
                              $navbar_burger_lightbox .= 'Unterstützung';
                              $navbar_burger_lightbox .= '<ul class="dw__burger_dropdown_menu" aria-labelledby="navbarDropdown">';
                                   $navbar_burger_lightbox .= '<li class="dw__burger_dropdown_item">';
                                        $navbar_burger_lightbox .= '<a class="nav-link dropdown-toggle" href="'.$this->donation_link_goenner.'" target="_blank"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                        $navbar_burger_lightbox .= 'Werde Gönner';
                                        $navbar_burger_lightbox .= '</a>';
                                   $navbar_burger_lightbox .= '</li>';
                                   $navbar_burger_lightbox .= '<li class="dw__burger_dropdown_item">';
                                        $navbar_burger_lightbox .= '<a class="nav-link dropdown-toggle" href="'.$this->donation_link_spende.'" target="_blank"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                        $navbar_burger_lightbox .= 'Einmalige Spende';
                                        $navbar_burger_lightbox .= '</a>';
                                   $navbar_burger_lightbox .= '</li>';
                                   $navbar_burger_lightbox .= '</ul>';
                              $navbar_burger_lightbox .= '</div>';  
                         $navbar_burger_lightbox .= '</div >';

                         $navbar_burger_lightbox .= '<button class="dw__burger_lightbox_close_btn" onclick="closeLightBox(\'.dw__burger_lightbox_container\')"><img src="'.get_stylesheet_directory_uri().'/assets/images/close-icon.svg" alt="close-icon" style="opacity:.6; transform:scale(1.2); filter: grayscale(1);"/></button>';

                    $navbar_burger_lightbox .= '</div>';
               $navbar_burger_lightbox .= '</div>';
               return $navbar_burger_lightbox;
          }
          

          //GET CSS File Content in a style-tag
          public function get_style() {
               $cssFile = __DIR__.'/toplevel-navbar.css';
               $style_return = '<style type="text/css">';
               if (file_exists($cssFile)) {
                    $style_return .= file_get_contents($cssFile);
               }    
               $style_return .= '</style>'; 
               return $style_return;
          }

          //GET JS File Content in a script-tag
          private function get_script() {
               $jsFile = __DIR__.'/toplevel-navbar.js';
               $js_return = '<script type="text/javascript" defer>';
               if (file_exists($jsFile)) {
                    $js_return .= file_get_contents($jsFile);
               }
               $js_return .= '</script>'; 
               return $js_return;
          }

     }

     
          
}