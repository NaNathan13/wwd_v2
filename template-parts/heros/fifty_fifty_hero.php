<section class="hero_fifty_fifty_section">
    <div class="hero_fifty_fifty_container">
        <div class="hero_fifty_fifty_headline <?php if (!get_the_post_thumbnail_url()) : echo "full_width";
                                                endif; ?>">
            <h1><?php echo the_title(); ?></h1>
        </div>
        <?php if (get_the_post_thumbnail_url()) : ?>
            <div class="hero_fifty_fifty_image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
</section>