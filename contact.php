<?php
/*
 * Template Name: Contact
 * description: Page template for contact page.
  

 */

get_header();
?>

<main id="primary" class="site-main contact_main">

	<?php get_template_part('template-parts/heros/fifty_fifty_hero'); ?>



	<section class="contact_form_section">
		<div class="contact_form_container">
			<?php echo do_shortcode('[contact-form-7 id="192" title="Contact form 1"]') ?>
		</div>
	</section>

</main>

<?php
get_footer();
