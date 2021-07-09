<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wilson_web_development
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php echo get_template_part('template-parts/components/shop_rbg'); ?>
	<?php echo get_template_part('template-parts/components/our_teams'); ?>
	<?php echo get_template_part('template-parts/components/sponsors'); ?>
	<?php echo get_template_part('template-parts/components/twitch_cta'); ?>
	<?php echo get_template_part('template-parts/components/discord_cta'); ?>
</aside><!-- #secondary -->