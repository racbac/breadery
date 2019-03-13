<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package breadery
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'breadery' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="navbar navbar-expand-md navbar-dark justify-content-between">
			<div class="site-branding navbar-brand">
				<?php the_custom_logo(); ?>
				<?php 
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;

				$breadery_description = get_bloginfo( 'description', 'display' );
				if ( $breadery_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $breadery_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#site-navigation" aria-controls="site-navigation" aria-expanded="false" aria-label="Toggle navigation">
            	<span class="navbar-toggler-icon"></span>
        	</button>
			<nav id="site-navigation" class="main-navigation navbar-collapse collapse justify-content-between">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'navbar-nav nav-menu align-items-center'
				) );
				?>
				<?php 
				wp_nav_menu( array(
					'theme_location' => 'social-menu',
					'menu_id'        => 'social-menu',
					'menu_class'     => 'nav justify-content-center',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>'
				) );
			?>
			</nav><!-- #site-navigation -->
		</div><!-- .navbar -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
