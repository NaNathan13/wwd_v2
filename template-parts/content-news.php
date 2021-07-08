<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wilson_Web_development
 */

?>

<article class="news_article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="news_card_image">
		<img class="news_post_thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
	</div>
	<div class="news_card_details">
		<h3><?php echo the_title(); ?></h3>
		<p>Posted on: <?php echo get_the_date(); ?></p>
		<div class="news_card_details_excerpt">
			<?php echo the_excerpt(); ?>
		</div>
		<a class="news_card_cta cta_btn" href="<?php echo get_permalink(); ?>">Read More!</a>
	</div>


</article>