<?php
/**
 * The main template file
 *
 * @package Clara Violet
 * @since 0.1.0
 */

get_header(); ?>

<!-- THIS IS THE INDEX TEMPLATE -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ): the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
