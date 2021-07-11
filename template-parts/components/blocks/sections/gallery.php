<?php if (get_sub_field('gallery_images')) : ?>
    <section class="gallery_section">
        <div class="gallery_container">
            <?php if (get_sub_field('section_headline')) : ?>
                <h2><?php echo get_sub_field('section_headline') ?></h2>
            <?php endif; ?>

            <?php if (get_sub_field('section_subheadline')) : ?>
                <p><?php echo get_sub_field('section_subheadline') ?></p>
            <?php endif; ?>
            <div class="gallery_images_wrapper">
                <?php while (has_sub_field('gallery_images')) : ?>
                    <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
                <?php endwhile; ?>
            </div>
            <p></p>


        </div>
    </section>
<?php endif; ?>