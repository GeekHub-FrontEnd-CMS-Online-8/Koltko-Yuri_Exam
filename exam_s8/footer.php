<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exam_s8
 */

?>

	
<section class="footer">
	<div class="footer__blok">
		<div class="footer__logo">
			<?php the_custom_logo( ); ?>
		</div>
		<div class="footer__serch">
			<?php echo do_shortcode( '[contact-form-7 id="32" title="sign up our newsletter"]' ); ?>
		</div>
	</div>
	<hr class="footer__line">
	<div class="footer__sic">
		<span>© 2018 MI Talent. Designed by Tranmautritam for Mass Impressions.</span>
	<div class="footer__sic-icon">

		<a target="_blank" href="<?php echo get_theme_mod('ads_facebook'); ?>"><?php echo get_theme_mod('ads_facebook-icon'); ?></a>
                    
                  <a href=""><i class="fab fa-instagram"></i></a>  
                   <a href=""><i class="fab fa-youtube"></i></a> 
                    <a href=""><i class="fab fa-twitter"></i></a>
	</div>
	</div>
	
</section>


<?php wp_footer(); ?>

</body>
</html>
