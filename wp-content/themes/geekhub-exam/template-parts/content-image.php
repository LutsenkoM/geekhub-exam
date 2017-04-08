<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-img"><?php the_post_thumbnail('full'); ?></div>
	<h2 class="blog-title"><?php the_title(); ?></h2>
	<div class="blog-content margin-bottom-lg">
		<?php the_content(); ?>
	</div>
	<a href="<?php the_permalink(); ?>">Read more</a>
</article><!-- #post-## -->
