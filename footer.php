<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wilson_web_development
 */

?>

<footer id="" class="site-footer">
	<div class="footer_socials_container">
		<?php if (have_rows('social_media_repeater', 'option')) : ?>
			<?php while (have_rows('social_media_repeater', 'option')) : the_row(); ?>
				<a href="<?php echo get_sub_field('link', 'option') ?>"><img src="<?php echo get_sub_field('image', 'option')['url'] ?>" alt="" loading="lazy"></a>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="footer_bottom_container">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
		<h6>&copy;Copyright Wilson Web Development <?php echo date("Y"); ?></h6>

	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>