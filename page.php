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

<main id="primary" class="site-main single_post_main">
	<div class="page_wrapper ">
		<?php
		// check if the flexible content field has rows of data
		if (have_rows('page_content')) :

			// loop through the rows of data
			while (have_rows('flexible_content_field_name')) : the_row();
				if (get_row_layout() == 'fifty_fifty_hero') :
					get_template_part('components/blocks/fifty_fifty_hero');
				elseif (get_row_layout() == 'dnamic_columns') :
					get_template_part('components/blocks/dnamic_columns');
				endif;
			endwhile;
		else :
		?>
			<h2>No Layouts found</h2>
		<?php

		// no layouts found

		endif;
		?>
	</div>
</main>

<?php
get_footer();
