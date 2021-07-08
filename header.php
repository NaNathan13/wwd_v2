<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wilson_Web_development
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php get_template_part('template-parts/header/tracking'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'Wilson_Web_development'); ?></a>

		<header id="masthead" class="site-header">
			<div class="header_wrapper">
				<div class="nav_top_wrapper">
					<div class="logo_wrapper">
						<a href="/"><img src="<?php echo get_field('logo', 'option')['url'] ?>" alt=""></a>
					</div>
				</div>
				<?php get_template_part('template-parts/header/navigation'); ?>
				<div class="nav_socials_container hide_on_mobile_and_tablet">
					<?php if (have_rows('social_media_repeater', 'option')) : ?>
						<?php while (have_rows('social_media_repeater', 'option')) : the_row(); ?>
							<a href="<?php echo get_sub_field('link', 'option') ?>"><img src="<?php echo get_sub_field('image', 'option')['url'] ?>" alt=""></a>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>


		</header><!-- #masthead -->