<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GH-exam
 */

?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="clients-slider-block">
			<div class="container">
				<h2 class="featured-slider-title"><?php echo get_theme_mod('featured-slider-title'); ?></h2>
				<ul class="clients-slider">
					<?php
					$args = array(
						'post_type' => 'clients',
						'posts_per_page' => 100
					);
					$the_query = new WP_Query($args);
					if ($the_query->have_posts()) :?>
						<?php while ($the_query->have_posts()) : ?>
							<?php $the_query->the_post(); ?>
							<li class="client-post">
								<a class="partner-icon" target="_blank" href="<?php the_field('client_link'); ?>"><?php the_post_thumbnail('full') ?></a>
							</li>
						<?php endwhile; ?>
					<?php else : //no posts ?>
					<?php endif; wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
		<div class="contact">
			<div class="container d-flex flex-wrap">
				<div class="contacts col-lg-6 col-md-6 col-sm-12 col-12">
					<h2 class="contact-title">Contact Us</h2>
					<p class="contact-text"><?php echo get_theme_mod('contact_text'); ?></p>
					<p class="phone"><i class="fa fa-phone" aria-hidden="true"></i><?php echo get_theme_mod('contact_phone'); ?></p>
					<p class="address"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo get_theme_mod('contact_address'); ?></p>
					<div class="map">
						<iframe src="<?php echo get_theme_mod ('map_place'); ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="contact-form col-lg-6 col-md-6 col-sm-12 col-12">
					<?php echo do_shortcode('[contact-form-7 id="88" title="Contact form"]');?>
				</div>
			</div>
		</div>
		<div class="logo-footer-block">
			<div class="container">
				<div class="d-flex justify-content-center logo-footer"><?php the_custom_logo(); ?></div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<p class="copyright-text"><?php echo get_theme_mod('copyright'); ?></p>
			</div>
		</div>
	</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
