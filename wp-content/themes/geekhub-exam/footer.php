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
		<div class="container d-flex ">
			<?php the_custom_logo(); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'footer-menu', 'menu_class' => 'navbar-footer', 'container' => 'ul'  ) ); ?>
			<?php dynamic_sidebar( 'footer-1' ); ?>

			<?php
			$social_links_facebook = get_theme_mod('social_links_facebook');
			$social_links_twitter = get_theme_mod('social_links_twitter');
			$social_links_google = get_theme_mod('social_links_google');
			$social_links_linkedin = get_theme_mod('social_links_linkedin');

			if( $social_links_facebook || $social_links_twitter || $social_links_linkedin || $social_links_google  ){ ?>
				<ul class="social-icons d-flex">
					<?php if($social_links_facebook){ ?>
						<li><a target="_blank" href="<?php echo esc_url($social_links_facebook) ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<?php } ?>
					<?php if($social_links_google){ ?>
						<li><a target="_blank" href="<?php echo esc_url($social_links_google) ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<?php } ?>
					<?php if($social_links_twitter){ ?>
						<li><a target="_blank" href="<?php echo esc_url($social_links_twitter) ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<?php } ?>
					<?php if($social_links_linkedin){ ?>
						<li><a target="_blank" href="<?php echo esc_url($social_links_linkedin) ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
<!-- insert widget like this : --><?php //dynamic_sidebar( 'footer-1' ); ?>