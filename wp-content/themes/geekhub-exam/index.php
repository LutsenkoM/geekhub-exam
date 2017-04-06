<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GH-exam
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<div class="row">
			<main id="main" class="site-main col-lg-9 col-md-9 col-sm-12 col-12" role="main">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

				<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
                <!--            PAGINATION-->
                <div class="pag-wrap col-sm-12 center-xs d-flex justify-content-center">
                    <?php
                    global $wp_query;

                    $big = 999999999; // need an unlikely integer

                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'total' => $wp_query->max_num_pages,
                        'prev_text' => '',
                        'next_text' => ''
                    ));
                    ?>
                </div>
                <!--            PAGINATION END-->

			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->

<?php

get_footer();
