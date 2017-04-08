<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package GH-exam
 */

get_header(); ?>
	<div class="blog-posts-title">
		<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
	</div>
	<div id="primary" class="content-area container">
		<div class="row">
			<main id="main" class="site-main col-lg-9 col-md-9 col-sm-12 col-12" role="main">
				<?php
				while ( have_posts() ) : the_post(); ?>
					<article class="blog-single-post">
						<?php the_content(); ?>
					</article>
					<div class="single-pagination d-flex justify-content-between">
						<p class="pag-link"><?php previous_post_link('%link', 'Previous'); ?></p>
						<p class="pag-link"><?php next_post_link('%link', 'Next'); ?></p>
					</div>
				<?php
				endwhile; // End of the loop.
				?>
			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->
<?php
get_footer();
