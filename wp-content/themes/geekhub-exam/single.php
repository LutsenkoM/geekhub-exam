<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package GH-exam
 */

get_header(); ?>
	<div id="primary" class="content-area container">
		<div class="row">
			<main id="main" class="site-main col-lg-9 col-md-9 col-sm-12 col-12" role="main">
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->
<?php
get_footer();
