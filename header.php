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
	<meta name="theme-color" content="#ff9800">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">TestWork</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse collapse justify-content-end" id="navbarNavAltMarkup">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'container' => false,
				'menu_class'     => 'navbar-nav ml-auto',
				'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
				// Process nav menu using our custom nav walker.
				'walker'         => new WP_Bootstrap_Navwalker(),
			) );
			?>
		</div>
	</nav>
	<div class="jumbotron jumbotron-fluid">
		<div class="container pt-5">
			<h1 class="display-4"><?php bloginfo( 'name' ); ?></h1>
			<p class="lead"><?php bloginfo( 'description' );?></p>
		</div>
	</div>
</header>
