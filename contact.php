<?php
/*
 * Template Name: Contact
 * description: Page template for contact page.
  

 */

get_header();
?>

<main id="primary" class="site-main contact_main">

	<?php get_template_part('template-parts/heros/hero_fifty_fifty'); ?>



	<section class="contact_form_section">
		<div class="contact_form_container">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</section>

</main>

<?php
get_footer();
