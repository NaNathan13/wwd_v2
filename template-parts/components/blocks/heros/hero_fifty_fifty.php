<section class="hero_fifty_fifty_section">
    <div class="hero_fifty_fifty_container">
        <div class="hero_fifty_fifty_headline">
            <?php if (get_sub_field('page_headline')) : ?>
                <h1><?php the_sub_field('page_headline') ?></h1>
            <?php endif; ?>
        </div>
        <?php if (get_sub_field('image')) : ?>
            <div class="hero_fifty_fifty_image">
                <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
</section>