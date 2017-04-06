<?php
//Template name: Home page
get_header(); ?>
    <section>
        <div class="container">
            <?php
            $args = array(
                'post_type' => 'test',
                'posts_per_page' => 100
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post();

                    get_template_part('template-parts/content', get_post_type());

                endwhile; ?>
            <?php else : //no posts ?>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </section>

    <section>
        <div class="container">
            Second section
            <div class="media">
                <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
                <div class="media-body">
                    <h2 class="h2">Media heading</h2>
                    <div class="content">
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                    </div>
                    <a href="#">Read more</a>
                </div>
            </div>
    </section>
<?php
get_footer();
