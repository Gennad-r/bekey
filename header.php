<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BeKey
 */

?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="theme-color" content="#242424">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
	<div class="container">
		<nav class="top-menu row">
			<div class="brand-side col-auto">
				<a href="<?php echo get_home_url(); ?>"><img src=" <?php echo get_template_directory_uri() . '/app/img/logo.svg' ?>" alt="" class="logo"> <span>feature</span></a>
			</div>
			<div class="menu-side col-auto ml-auto">
				<ul class="top-menu-holder">
					<li class="share">share
						<ul>
							<li><?php dynamic_sidebar( 'sidebar-fb' ); ?></li>
							<li><?php dynamic_sidebar( 'sidebar-tw' ); ?></li>
							<li><?php dynamic_sidebar( 'sidebar-gp' ); ?></li>
							<li><?php dynamic_sidebar( 'sidebar-pin' ); ?></li>
						</ul>
					</li>
					<li><a href="#"><i class="fa fa-search"></i></a></li>
					<li><a href="#"><i class="fa fa-user"></i></a></li>
				</ul>
			</div>
		</nav>
	</div>
</header>
