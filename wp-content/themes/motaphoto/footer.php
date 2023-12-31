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
      // Retrieve the photo reference
      $reference = get_field('reference_de_la_photo');
      if ($reference) {
        echo '<input  id="ref-photo-input" value="' . esc_html($reference) . '" />';
      }


      // Display the contact form
      echo do_shortcode('[contact-form-7 id="3c0ccbd" title="Contact form 1"]');
    ?>
  </div>
</div>


</div>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>