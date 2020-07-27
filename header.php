<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/svg" href="<?php echo get_stylesheet_directory_uri() . '/imgs/';?>talk.svg"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
		<!-- Your site title as branding in the menu -->
			<div class="container" id="menu-container">
				<div class="row">
					<div class="col-md-3">
						<img src="<?php echo get_stylesheet_directory_uri();?>/imgs/science_bubbles_color_bg.svg" class="discourse-logo" alt="Scientific Discourse Project logo.">
					</div>
					<div class="col-md-6">
						<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">

						<h1 id="top-menu-title"><span class="the">The</span> Science<br>Discourse<br>Project</h1>
						</a>
					</div>
					<div class="col-md-3">
						<svg alt="A robot blinking hi in morse code." id="title-robot" height='200px' width='200px'  fill="#63656a" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><g display="none"><rect x="-267.879" y="-165.155" display="inline" fill="#040a0c" width="1286.936" height="912.422"></rect></g><g><path d="M80.631,37.719c0-3.499-2.847-6.346-6.346-6.346H55.172c-0.913-0.834-2.026-1.449-3.26-1.767h0.043v-3.292   c2.922-0.849,5.066-3.546,5.066-6.738c0-3.871-3.15-7.021-7.021-7.021c-3.871,0-7.021,3.15-7.021,7.021   c0,3.192,2.144,5.889,5.066,6.738v3.292h0.043c-1.234,0.318-2.347,0.932-3.26,1.767H25.796c-3.499,0-6.346,2.847-6.346,6.346v3.64   l-3.937,1.451l-2.557,0.943v2.725v9.666v2.726l2.557,0.943l3.937,1.451v3.64c0,3.499,2.847,6.346,6.346,6.346h5.955v1.422v1.909   c-5.652,2.117-10.043,6.988-11.366,13.123c-3.068,0.875-5.333,3.81-5.333,7.297h4.946c0-1.446,1.023-2.623,2.279-2.623   c1.257,0,2.28,1.177,2.28,2.623h4.946c0-3.403-2.156-6.288-5.112-7.237c1.085-3.951,3.82-7.152,7.359-8.92v10.735v3.909h3.909   h28.68h3.909v-3.909V78.846c3.537,1.768,6.271,4.968,7.357,8.918c-2.955,0.95-5.11,3.834-5.11,7.237h4.946   c0-1.446,1.023-2.623,2.28-2.623c1.257,0,2.279,1.177,2.279,2.623h4.946c0-3.487-2.266-6.423-5.334-7.297   c-1.325-6.133-5.715-11.002-11.364-13.12v-1.911V71.25h6.036c3.499,0,6.346-2.847,6.346-6.346v-3.67l3.856-1.421l2.557-0.943   v-2.726v-9.666v-2.725l-2.557-0.943l-3.856-1.421V37.719z M19.45,57.097l-2.585-0.953v-9.666l2.585-0.953V57.097z M46.889,19.576   c0-1.718,1.393-3.111,3.111-3.111s3.111,1.393,3.111,3.111S51.718,22.688,50,22.688S46.889,21.295,46.889,19.576z M64.34,89.578   H35.66V72.672h28.68V89.578z M76.722,64.904c0,1.346-1.091,2.436-2.436,2.436h-48.49c-1.346,0-2.436-1.091-2.436-2.436V37.719   c0-1.346,1.091-2.436,2.436-2.436h48.49c1.346,0,2.436,1.091,2.436,2.436V64.904z M83.135,46.478v9.666l-2.504,0.923V45.555   L83.135,46.478z"></path><path d="M29.026,54.501c0,3.916,3.186,7.101,7.102,7.101h27.745c3.916,0,7.101-3.186,7.101-7.101V41.02H29.026V54.501z    M31.409,43.403H68.59v11.098c0,2.601-2.116,4.718-4.718,4.718H36.128c-2.601,0-4.718-2.116-4.718-4.718V43.403z"></path><path d="M37.588,55.5h1.075c1.428,0,2.591-1.162,2.591-2.591v-3.33h-1.472h-1.556v-2.033v-1.472h-0.639   c-1.428,0-2.591,1.162-2.591,2.591v4.244C34.997,54.337,36.159,55.5,37.588,55.5z"></path><path d="M61.485,55.825h0.927c1.428,0,2.59-1.162,2.59-2.591v-3.656h-1.472H62.7v-1.975v-1.501   c-0.096-0.011-0.189-0.029-0.287-0.029h-0.927c-1.428,0-2.591,1.162-2.591,2.591v4.57C58.894,54.663,60.056,55.825,61.485,55.825z"></path>
							<path class="robot-ray" d="M61.646,7.841l-2.68,4.642c0.775,0.386,1.523,0.817,2.238,1.293l2.68-4.642L61.646,7.841z"></path>
							<path class="robot-ray" d="M51.043,5h-2.585v5.363c0.428-0.026,0.858-0.044,1.292-0.044c0.435,0,0.865,0.018,1.292,0.044V5z"></path><path class="robot-ray" d="M37.855,7.841l-2.239,1.293l2.68,4.642c0.716-0.476,1.464-0.907,2.238-1.293L37.855,7.841z"></path><path d="M54.442,76.757H37.553v8.735h16.889V76.757z M52.059,83.109H39.937v-3.968h12.122V83.109z"></path><path d="M59.74,84.774c2.012,0,3.648-1.637,3.648-3.649c0-2.012-1.637-3.649-3.648-3.649c-2.012,0-3.649,1.637-3.649,3.649   C56.091,83.137,57.728,84.774,59.74,84.774z M59.74,79.86c0.697,0,1.265,0.568,1.265,1.265c0,0.698-0.568,1.265-1.265,1.265   c-0.698,0-1.265-0.568-1.265-1.265C58.475,80.427,59.042,79.86,59.74,79.86z"></path></g>

					</div>
				</div>
			</div>

					<!-- end custom logo -->
	<div class="container" id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-light" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>

		<?php if ( 'container' === $container ) : ?>
			<div class="container nav-container">
		<?php endif; ?>				
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>

			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
