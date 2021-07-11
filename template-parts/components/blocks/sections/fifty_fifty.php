<section class="fifty_fifty_section">
    <div class="fifty_fifty_container">
        <h2><?php the_sub_field('headline') ?></h2>
        <?php if (get_sub_field('image_side') == 'left') : ?>
            <h2>image left</h2>
            <div class="fifty_fifty_image">
                <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
            </div>

            <div class="fifty_fifty_content">
                <?php the_sub_field('content') ?>
            </div>
        <?php else : ?>
            <h2>image right</h2>
            <div class="fifty_fifty_content">
                <?php the_sub_field('content') ?>
            </div>

            <div class="fifty_fifty_image">
                <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
            </div>
        <?php endif; ?>
        <p></p>
    </div>
</section>