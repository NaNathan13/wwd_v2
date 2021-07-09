<?php

/**
 * The template for displaying all single Events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wilson_web_development
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="page_wrapper">
        <section class="event_section">
            <a href="/events">Back to events</a>
            <h1><?php echo get_field('event_title') ?></h1>
            <img class="event_featured_image" src="<?php echo get_field('event_image')['url'] ?>" alt="">
            <h2 class="event_date_and_time"><?php echo get_field('event_date') ?> at <?php echo get_field('event_time') ?></h2>
            <p><?php echo get_field('event_description') ?></p>
            <div class="where_to_watch_cta_wrapper">
                <a class="where_to_watch_cta" href="">Where to Watch: <?php echo get_field('event_link_to_watch') ?></a>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();
