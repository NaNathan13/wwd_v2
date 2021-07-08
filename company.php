<?php
/*
 * Template Name: All Teams
 * description: Page template for contact page.
  

 */

get_header();
?>

<main id="primary" class="site-main company_main">

	<section class="page_hero_section">
		<img src="<?php echo get_field('all_teams_hero_image')['url'] ?>" alt="">
		<h1><?php echo get_field('all_teams_page_headline') ?></h1>
	</section>
	<section class="all_teams_section">
		<div class="all_teams_container">
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $post->ID,
				'order'          => 'DESC',
				'orderby'        => 'title'
			);
			$parent = new WP_Query($args);

			if ($parent->have_posts()) : ?>
				<?php while ($parent->have_posts()) : $parent->the_post(); ?>
					<div class="all_teams_individual">
						<a href="<?php the_permalink(); ?>">
							<h3><?php echo the_title(); ?></h3>
						</a>
					</div>

				<?php endwhile; ?>
			<?php endif;
			wp_reset_postdata(); ?>
		</div>

	</section>

	<?php get_template_part('template-parts/components/sponsors'); ?>


</main>

<?php
get_footer();
