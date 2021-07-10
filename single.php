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
		// check if the flexible content field has rows of data
		if (have_rows('page_content')) :

			// loop through the rows of data
			while (have_rows('page_content')) : the_row();
				if (get_row_layout() == 'fifty_fifty_hero') :
		?>
					<h2>fifty fifty hero is present</h2>
			<?php
					get_template_part('template-parts/components/blocks/fifty_fifty_hero');
				elseif (get_row_layout() == 'dnamic_columns') :
					get_template_part('template-parts/components/blocks/dnamic_columns');
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
