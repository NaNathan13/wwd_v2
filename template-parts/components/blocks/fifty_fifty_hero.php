<section class="fifty_fifty_hero_section">
    <div class="fifty_fifty_hero_container">
        <div class="fifty_fifty_hero_headline">
            <?php if (get_sub_field('page_headline')) : ?>
                <h1><?php the_sub_field('page_headline') ?></h1>
            <?php endif; ?>
        </div>
        <?php if (get_sub_field('image')) : ?>
            <div class="fifty_fifty_hero_image">
                <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
</section>