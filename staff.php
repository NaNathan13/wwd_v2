<?php
/*
 * Template Name: Staff
 * description: Page template for contact page.
  

 */

get_header();
?>

<main id="primary" class="site-main staff_main">

	<div class="page_wrapper">
		<?php get_template_part('template-parts/heros/fifty_fifty_hero'); ?>

		<section class="staff_section">
			<div class="staff_container">
				<?php
				if (have_rows('staff_list')) : while (have_rows('staff_list')) : the_row();
				?>
						<div class="staff_element">
							<div class="staff_element_info">
								<?php if (get_sub_field('headshot')) : ?>
									<img src="<?php echo get_sub_field('headshot')['url'] ?>" alt="">
								<?php else : ?>
									<img src="<?php echo get_template_directory_uri() . '/images/rbg_logo.png' ?>" alt="">
								<?php endif; ?>
								<div class="staff_element_info_content">
									<h3><?php echo get_sub_field('gamertag') ?></h3>
									<h4 class="red"><?php echo get_sub_field('title') ?></h4>
									<h5><?php echo get_sub_field('full_name') ?></h5>
								</div>
							</div>
							<div class="staff_element_socials">
								<?php if (get_sub_field('twitter_link') || get_sub_field('twitch_link')) : ?>
									<a href="<?php echo get_sub_field('twitch_link') ?>"><img src="<?php echo get_template_directory_uri() . '/images/icons/twitch.png' ?>" alt=""></a>
									<a href="<?php echo get_sub_field('twitter_link') ?>"><img src="<?php echo get_template_directory_uri() . '/images/icons/twitter.png' ?>" alt=""></a>
								<?php endif; ?>
							</div>
						</div>
				<?php
					endwhile;
				endif;
				?>
			</div>
		</section>
	</div>
</main>

<?php
get_footer();
