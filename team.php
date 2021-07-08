<?php
/*
 * Template Name: Individual Team
 * description: Page template for contact page.
  

 */

get_header();
?>

<main id="primary" class="site-main team_main">

	<section class="page_hero_section">
		<img src="<?php echo get_field('team_hero_image')['url'] ?>" alt="">
		<h1><?php echo get_field('team_page_headline') ?></h1>
	</section>
	<section class="team_cards_section">
		<div class="team_cards_container">
			<?php if (have_rows('team_cards_repeater')) : ?>
				<?php while (have_rows('team_cards_repeater')) : the_row(); ?>
					<div class="individual_player_card">
						<?php $nationality = get_sub_field('nationality');
						if ($nationality == "American") : ?>
							<img class="indv_player_card_flag" src="<?php echo get_template_directory_uri() . '/images/flags/usa.png' ?>" alt="">
						<?php elseif ($nationality == "Canadian") : ?>
							<img class="indv_player_card_flag" src="<?php echo get_template_directory_uri() . '/images/flags/canada.png' ?>" alt="">

						<?php elseif ($nationality == "Mexican") : ?>
							<img class="indv_player_card_flag" src="<?php echo get_template_directory_uri() . '/images/flags/mexico.png' ?>" alt="">
						<?php endif; ?>

						<?php if (get_sub_field('headshot')) : ?>
							<img class="indv_player_card_headshot" src="<?php echo get_sub_field('headshot')['url'] ?>" alt="">
						<?php else : ?>
							<div class="indv_player_card_headshot_placeholder">
								<img class="indv_player_card_headshot" src="<?php echo get_field('player_card_placeholder')['url'] ?>" alt="">
							</div>
						<?php endif; ?>

						<?php if (get_sub_field('gamertag')) : ?>
							<h5 class="indv_player_card_gamertag"><?php echo get_sub_field('gamertag') ?></h5>
						<?php endif; ?>

						<?php if (get_sub_field('full_name')) : ?>
							<p class="indv_player_card_full_name"><?php echo get_sub_field('full_name') ?></p>
						<?php endif; ?>

						<div class="indv_player_card_socials_container">
							<?php if (get_sub_field('twitter_link')) : ?>
								<a href="<?php echo get_sub_field('twitter_link') ?>"><img src="<?php echo get_template_directory_uri() . '/images/icons/twitter.png' ?>" alt=""></a>
							<?php endif; ?>

							<?php if (get_sub_field('twitch_link')) : ?>
								<a href="<?php echo get_sub_field('twitch_link') ?>"><img src="<?php echo get_template_directory_uri() . '/images/icons/twitch.png' ?>" alt=""></a>
							<?php endif; ?>

							<?php if (get_sub_field('youtube_link')) : ?>
								<a href="<?php echo get_sub_field('youtube_link') ?>"><img src="<?php echo get_template_directory_uri() . '/images/icons/youtube.png' ?>" alt=""></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
	
</main>
<?php
get_footer();
