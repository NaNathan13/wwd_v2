<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wilson_Web_development
 */

get_header();
?>

<main id="primary" class="site-main front_page_main">
	<div class="page_wrapper">
		<div class="page_hero_container">
			<?php get_template_part('template-parts/heros/home_hero');  ?>
		</div>

		<div class="page_content_container">
			
		</div>

	</div>




</main>

<?php
get_footer();
