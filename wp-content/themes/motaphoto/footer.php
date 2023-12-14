<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part('template-parts/footer/footer-widgets'); ?>


<footer id="colophon" class="site-footer">

	<?php if (has_nav_menu('footer')) : ?>
		<nav aria-label="<?php esc_attr_e('Secondary menu', 'twentytwentyone'); ?>" class="footer-navigation">
			<ul class="footer-navigation-wrapper">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'items_wrap' => '%3$s',
						'container' => false,
						'depth' => 1,
						'link_before' => '<span>',
						'link_after' => '</span>',
						'fallback_cb' => false,
					)
				);
				?>


			</ul><!-- .footer-navigation-wrapper -->
		</nav><!-- .footer-navigation -->
	<?php endif; ?>

</footer><!-- #colophon -->
<div id="modal-contact" class='modal'>
	<div class="modal-content">
		<div class="modal-header">
		</div>
		<div class="modal-body">
			<?php
			// Récupère la référence de la photo
			$photoReference = get_post_meta(get_the_ID(), 'reference_de_la_photo', true);
			
			$terms = get_terms( array(
				'taxonomy' => 'reference_de_la_photo',
				'hide_empty' => false, 
			) );
			
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				foreach ($terms as $term) {
					echo '<p>' . esc_html($term->name) . '</p>';
				}
			}
			
			echo do_shortcode('[contact-form-7 id="3c0ccbd" title="Contact form 1"]'); ?>
		</div>

	</div>

</div>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>