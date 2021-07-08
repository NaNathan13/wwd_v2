<?php

/**
 * The template for displaying event archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wilson_Web_development
 */

get_header();
?>

<main id="primary" class="site-main archive_events_main">
	<div class="page_wrapper">
		<section class="fifty_fifty_hero_section">
			<div class="fifty_fifty_hero_container">
				<div class="fifty_fifty_hero_headline <?php if (!get_the_post_thumbnail_url()) : echo "full_width";
														endif; ?>">
					<h1>Our Upcoming Events and Games</h1>
				</div>
				<?php if (get_the_post_thumbnail_url()) : ?>
					<div class="fifty_fifty_hero_image">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
					</div>
				<?php endif; ?>
			</div>
		</section>

		<?php
		$args = array(
			'post_type' => 'events',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'meta_key'  => 'event_date',
			'orderby'   => 'meta_value_num',
			'order' => 'ASC',

		);


		$loop = new WP_Query($args);
		while ($loop->have_posts()) : $loop->the_post();
			$eventDescription = get_field('event_description');
			if (get_field('opponent_logo')) {
				$opponentLogo =  get_field('opponent_logo')['url'];
			} else {
				$opponentLogo = get_template_directory_uri() . '/images/opponent_logo_default.png';
			}
		?>
			<?php
			$endOfDay = strtotime("tomorrow") - 1;
			$unixtimestamp = strtotime(get_field('event_date'));
			$date_fr = date("Y-m-d", $unixtimestamp);
			if ($unixtimestamp > $endOfDay) :  ?>
				<section class="events_section">
					<div class="event_card_container ">
						<div class="event_card_date_wrapper">
							<h4><?php echo get_field('event_date') ?></h4>
							<h4><?php echo get_field('event_time') ?></h4>
						</div>
						<?php if (get_field('event_type') == "Team vs Team") : ?>
							<div class="event_card_vs_wrapper">
								<h3> <?php echo get_field('event_title') ?></h3>
								<div class="event_card_vs_logos_wrapper">
									<img src="<?php echo get_template_directory_uri() . '/images/rbg_logo.png' ?>" alt="">
									<p>VS</p>
									<img src="<?php echo $opponentLogo ?>" alt="">
								</div>
							</div>
						<?php elseif (get_field('event_type') == "General Stream") : ?>
							<div class="event_card_stream_wrapper">
								<h3> <?php echo get_field('event_title') ?></h3>
								<img src="<?php echo get_field('event_image')['url'] ?>" alt="">
								<p><?php echo wp_trim_words(get_field('event_description')) ?></p>
							</div>
						<?php else : ?>
							<h1>else</h1>
						<?php endif; ?>
						<div class="event_card_cta_wrapper">
							<a class="" href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>
				<?php endif; ?>

			<?php endwhile;
		wp_reset_postdata(); ?>
				</section>

	</div>

</main>

<?php
get_footer();
