<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wilson_Web_development
 */

get_header();
?>

<main id="primary" class="site-main single_post_main">
	<div class="page_wrapper ">
		<?php get_template_part('template-parts/heros/fifty_fifty_hero'); ?>
		<div class="single_page_below_hero_wrapper page_grid">
			<?php get_template_part('template-parts/content-page');  ?>
			<?php get_sidebar(); ?>
		</div>

	</div>


</main>

<?php
get_footer();
