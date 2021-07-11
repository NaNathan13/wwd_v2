<?php if (get_sub_field('gallery_images')) : ?>
    <section class="gallery_section">
        <div class="gallery_container">
            <?php get_template_part('template-parts/section_headlines'); ?>

            <div class="gallery_images_wrapper">
                <?php while (has_sub_field('gallery_images')) : ?>
                    <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>