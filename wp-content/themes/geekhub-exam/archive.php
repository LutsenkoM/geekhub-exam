<?php
get_header('custom'); ?>
    <div class="container blog-page">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <?php
                if ( have_posts() ) :
                    ?>

                    <h2><?php
                        if (is_category()) {
                            single_cat_title();
                        } elseif (is_tag()) {
                            single_tag_title();
                        } elseif (is_author()) {
                            the_post();
                            echo 'Author Archive:' . get_the_author();
                            rewind_posts();
                        } elseif (is_day()) {
                            echo 'Daily Archive:' .get_the_date();
                        } elseif (is_month()) {
                            echo 'Monthly Archive:' .get_the_date('F Y');
                        } else {
                            echo 'Archives:';
                        }
                        ?>
                    </h2>

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" class="col-lg-6 col-md-6 col-sm-12 col-12 blog-post">
                            <article class="border-blog">
                                <div class="blog-img"><?php the_post_thumbnail('full'); ?></div>
                                <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="blog-content ">
                                    <?php the_excerpt(); ?>
                                </div>
                                <p class="blog-time"><i class="fa fa-clock-o " aria-hidden="true"></i><?php the_time('d, j, Y'); ?></p>
                            </article>
                        </div><!-- #post-## -->

                    <?php endwhile;
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
            </div>
            <?php get_sidebar(); ?>

        </div>
    </div>
<?php
get_footer();