<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Point
 */

	/**
	 * Hook - business_point_after_content.
	 *
	 * @hooked business_point_after_content_action - 10
	 */
	do_action( 'business_point_after_content' );

?>

	<?php get_template_part( 'template-parts/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="copyright">
					Copyright © <a href="http://heoquaydanang.com/" >heoquaydanang.com</a> All rights reserved.
			</div>

		<div class="site-info">
            Design by <strong>Tuấn - 0339.899.969</strong>
        </div>
			
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
