<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
</div><!-- .content -->
	<footer>
						<div class="navigation">
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav class="footer-navigation" role="navigation">
						<?php
							// Primary navigation menu.
							wp_nav_menu( array(
								'menu_class'     => 'footer-menu',
								'theme_location' => 'primary',
							) );
						?>
						</nav><!-- .main-navigation -->
					<?php endif; ?>
			</div> <!-- ends .navigation -->
	</footer>
</div><!-- page -->
</body>
</html>
