<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wilson_web_development
 */

get_header();
?>

<main id="primary" class="site-main single_post_main">
	<div class="page_wrapper ">
		<?php
		// ID of the current item in the WordPress Loop
		$id = get_the_ID();

		// check if the flexible content field has rows of data
		if (have_rows('page_content', $id)) :

			// loop through the selected ACF layouts and display the matching partial
			while (have_rows('page_content', $id)) : the_row();

				get_template_part('partials/flexible-layouts/' . get_row_layout());

			endwhile;

		elseif (get_the_content()) : ?>
			<h2>No blocks found</h2>
		<?php

		endif;
		?>
	</div>
</main>

<?php
get_footer();
