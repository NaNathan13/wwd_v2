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
 * @package wilson_web_development
 */

get_header();
?>

<main id="primary" class="site-main front_page_main">
	<?php get_template_part('template-parts/acf_block_declaration'); ?>
</main>

<p></p>
<?php
get_footer();
