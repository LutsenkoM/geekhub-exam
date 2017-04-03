<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GH-exam
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
			<nav class="navbar navbar-toggleable-md navbar-light container">
					<div class="navbar-wrap d-flex justify-content-between align-items-center">
						<?php the_custom_logo(); ?>
						<button class="" id="button-menu" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_id' => 'primary-menu', 'menu_class' => 'navbar-nav', 'container' => 'ul'  ) ); ?>
					</div>
			</nav>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
