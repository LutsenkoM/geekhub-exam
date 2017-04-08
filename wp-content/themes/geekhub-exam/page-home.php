<?php
//Template name: Home page
get_header(); ?>
    <section class="intro">
        <div class="container ">
            <div class="d-flex flex-wrap intro-block">
                <div class="intro-img col-lg-5 col-md-5 col-sm-12 col-12">
                    <img alt="" src="<?php echo get_theme_mod('intro_image'); ?>" class="img-fluid">
                </div>
                <div class="intro-decription d-flex flex-column justify-content-center offset-1 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h2 class="intro-title"><?php echo get_theme_mod('intro_title') ?></h2>
                    <p class="intro-subtitle"><?php echo get_theme_mod('intro_subtitle') ?></p>
                    <p class="intro-second-title"><?php echo get_theme_mod('intro_second_title') ?></p>
                    <p class="intro-text"><?php echo get_theme_mod('intro_text') ?></p>
                </div>
            </div>
            <div class="arrow-block">
                <a href="#" class="arrow-icon"></a>
            </div>
        </div>
    </section>
    <section class="welcome" id="welcome">
        <div class="container d-flex flex-wrap">
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <img alt="" src="<?php echo get_theme_mod('welcome_image'); ?>" class="img-fluid">
            </div>
            <div class="welcome-description d-flex flex-column justify-content-center offset-1 col-lg-8 col-md-12 col-sm-12 col-12">
                <h2><?php echo get_theme_mod('welcome_title'); ?></h2>
                <p>
                    <?php echo get_theme_mod('welcome_description'); ?>
                </p>
            </div>
        </div>
    </section>
    <section class="services">
        <div class="container">
            <h2><?php echo get_theme_mod('services_title'); ?></h2>
            <p><?php echo get_theme_mod('services_subtitle'); ?></p>
            <div class="services-item d-flex flex-wrap">
                <?php
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => 100
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :?>
                    <?php while ($the_query->have_posts()) : ?>
                        <?php $the_query->the_post(); ?>

                    <article class="service-item d-flex flex-column justify-content-center align-items-center col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="service-img"><?php the_post_thumbnail('full') ?></div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_content(); ?></p>
                    </article>

                   <?php endwhile; ?>
                <?php else : //no posts ?>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="portfolio">
        <div class="container">
            <h2><?php echo get_theme_mod('portfolio_title'); ?></h2>
            <p><?php echo get_theme_mod('portfolio_subtitle'); ?></p>
            <div class="isotop">
                <ul class="isotop-btns d-flex flex-wrap justify-content-center">
                    <li><a href="#"  class="active">All</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Development</a></li>
                    <li><a href="#">SEO</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
                <ul class="isotop-img d-flex flex-wrap">
                    <?php
                    $args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => 100
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :?>
                        <?php while ($the_query->have_posts()) : ?>
                            <?php $the_query->the_post(); ?>
                                <li class="col-lg-4 col-md-4 col-sm-12 col-12"><a href="#"><?php the_post_thumbnail('full') ?></a></li>
                        <?php endwhile; ?>
                        <?php else : //no posts ?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
    </section>
<?php
get_footer();
