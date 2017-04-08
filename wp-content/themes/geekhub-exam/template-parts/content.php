<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GH-exam
 */

?>

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
