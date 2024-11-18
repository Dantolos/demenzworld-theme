<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

require_once(__DIR__.'/parts/global-footer.php');
$Global_Footer = new \DW\Global_Footer\Global_Footer(  );
$staticFooter = false;
if(!$staticFooter){
	echo $Global_Footer->render();
}else {
	?>
	<section class="dw__section_footer">
		<div class="dw__section_pink_shape_divider divider_top" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/elements/dw-shape_divider_top_pink.svg);">
		</div>
		<div class="dw__section_white_wrapper_inner dw__footer_wrapper" style="background-color: #db007e;">   
			<div class="dw__footer_left">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/demenzworld_logo_white.svg" alt="demenzworld logo" width="100%">
				<p>Verein demenzworld<br />c/o Linden 3L AG<br />Weyermannsstrasse 36<br />3008 Bern</p>
				<p><a href="mailto:hello@demenzworld.com">hello(at)demenzworld.com</a></p>
				<div class="dw__footer_social_media">
					<a href="https://www.facebook.com/demenzworldcom" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/social_media/facebook.svg" alt="facebook" /></a>
					<a href="https://www.youtube.com/@demenzworld" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/social_media/youtube.svg" alt="Youtube" /></a>
					<a href="https://www.instagram.com/demenzworldcom/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/social_media/insta.svg" alt="Instagram" /></a>
					<a href="https://www.linkedin.com/company/demenzworld/ " target="_blank" ><img src="<?php echo get_template_directory_uri(); ?>/assets/images/social_media/linkedin.svg" alt="LinkedIn"  /></a>
				</div>
			</div>			
			<div class="dw__footer_right">
				<?php 
				$footerNavigation = get_field('footer_navigation', 'options') ?: false; 
				if($footerNavigation){
					foreach( $footerNavigation as $footer_nav_item ){
						$footer_nav_link = $footer_nav_item['link']['url'] ?: '#';
						echo '<p><a href="' . $footer_nav_link . '" >' . $footer_nav_item['title'].'</a></p>';
					}
				}
				?>
			</div>			
		</div>
	</section>
	<?php 
}
?>


 
</body>
</html>

