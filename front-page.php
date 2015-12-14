<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<!-- FRONT PAGE -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if ( has_nav_menu( 'home_categories' ) ) : ?>
		<div class="home_categories">
			<?php
			wp_nav_menu( array(
				'menu_class'     => 'home_categories_menu',
				'theme_location' => 'home_categories',
				) );
				?>
		</div><!-- #home_categories -->
		<?php endif; ?>
		<div class="left-rail">
			<?php if ( is_active_sidebar( 'home_left' ) ) : ?>
			<div id="front-page-left-widgets" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'home_left' ); ?>
			</div><!-- #front-page-left-widgets -->
		<?php endif ?>
		</div><!-- .left-rail -->
		<div class="right-rail">
				<?php if ( is_active_sidebar( 'home_right' ) ) : ?>
				<div id="front-page-right-widgets" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'home_right' ); ?>
				</div><!-- #front-page-right-widgets -->
			<?php endif; ?>
		</div><!-- .right-rail -->

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>