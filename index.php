<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wilson_web_development
 */

get_header();
?>

<main id="primary" class="site-main news_template">

	<div class="page_grid page_wrapper">
		<section class="page_content">
			<section class="hero_fifty_fifty_section">
				<div class="hero_fifty_fifty_container">
					<div class="hero_fifty_fifty_headline full_width">
						<h1>NEWS</h1>
					</div>
				</div>
			</section>
			<?php
			if (have_posts()) :

				if (is_home() && !is_front_page()) :
			?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
			<?php
				endif;
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content-news', get_post_type());

				endwhile;

				the_posts_navigation();

			else :
				get_template_part('template-parts/content', 'none');

			endif;
			?>
		</section>

		<?php echo get_sidebar(); ?>
	</div>


</main>

<?php
get_sidebar();
get_footer();
