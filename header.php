<?php
/**
 * The template for displaying the header.
 *
 * @package Clara Violet
 * @since 0.1.0
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="page">
			<header class="site-header">
				<div class="masthead">
					<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif; ?>
				</div> <!-- .masthead -->
				<div class="navigation">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php
								// Primary navigation menu.
								wp_nav_menu( array(
									'menu_class'     => 'nav-menu',
									'theme_location' => 'primary',
								) );
							?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
				</div> <!-- .navigation -->
			</header> <!-- header .site-header -->

			<div id="content" class="site-content">