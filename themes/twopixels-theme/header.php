<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seo_one_click_theme
 */
use Awpt\Plugins\Acf;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="RolDCkBPQ6-rmFCpJ-GlRs1v64NM3I8oSN5ZOfVyUOw" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header bg-primary position-relative">
		<nav id="site-navigation" role="navigation" class="container d-lg-flex align-items-lg-center">
			<div class="px-8 pt-7 nav-logo-btn-wrapper d-flex align-items-center justify-content-between" id="primary-nav-toggle">
				<?php Awpt\Custom\Custom::site_logo(); ?>
				<div class="navtoggle relative d-flex justify-content-end align-items-center d-lg-none">
					<div class="navtoggle__icon"></div>
				</div>
			</div>
			<div class="ms-lg-auto mt-lg-8">
				<?php
				if ( has_nav_menu( 'primary' ) ) :
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'menu_id'         => 'primary-menu',
							'menu_class'      => 'menu d-lg-flex align-items-lg-center ps-0',
							'container_id'    => 'primary-menu-container',
							'container_class' => 'ms-lg-auto',
						)
					);
				endif;
				?>
			</div>
		</nav>
		
	</header><!-- #masthead -->
