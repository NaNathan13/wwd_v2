<section class="fifty_fifty_hero_section">
    <div class="fifty_fifty_hero_container">
        <div class="fifty_fifty_hero_headline <?php if (!get_the_post_thumbnail_url()) : echo "full_width";
                                                endif; ?>">
            <h1><?php echo the_title(); ?></h1>
        </div>
        <?php if (get_the_post_thumbnail_url()) : ?>
            <div class="fifty_fifty_hero_image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
</section>