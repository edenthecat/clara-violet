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

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="cat-description">
			<h2><?php single_cat_title(); ?></h2>
			<?php echo category_description( $category_id ); ?>
			<?php
				if (is_category()) {
					$this_category = get_category($cat);
				}
			?>
			<?php
				if($this_category->category_parent)
					$this_category = wp_list_categories('orderby=id&title_li=&use_desc_for_title=1&child_of='.$this_category->category_parent.
						"&echo=0");
				else
					$this_category = wp_list_categories('orderby=id&depth=1&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID.
						"&echo=0");
			?>
			<?	if ($this_category) :?> 
				<ul>
					<?php echo $this_category; ?>
				</ul>
			<?php endif; ?>
		</div> <!-- .cat-description -->

		<div class="cat-roll">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ): the_post(); ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
						<?php if ( has_post_thumbnail() ) : ?>
							<?php
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
								$url = $thumb['0'];
							?>
							<div class="single-cat-item" style="background-image:url(<?=$url?>);">
						<?php else : ?>
							<div class="single-cat-item">
						<?php endif; ?>
								<h2><?php the_title(); ?></h2>
						</div> <!-- .single-cat-item -->
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div><!-- .cat-roll -->

	</main><!-- main .site-main -->
</div><!-- .content-area -->


<?php get_footer(); ?>