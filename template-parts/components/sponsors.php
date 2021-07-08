<section class="sponsors_section">
    <div class="sponsors_container">
        <h2>Our <span class="red">Sponsors</span></h2>
        <div class="sponsors_content_container">
            <div class="sponsors_content_wrapper">
                <?php if (have_rows('sponsors_repeater', 'option')) : ?>
                    <?php while (have_rows('sponsors_repeater', 'option')) : the_row(); ?>
                        <a class="sponsor_element" href="<?php echo get_sub_field('link', 'option') ?>"><img src="<?php echo get_sub_field('image', 'option')['url'] ?>" alt="" loading="lazy"></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>