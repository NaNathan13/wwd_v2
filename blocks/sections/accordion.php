<?php if (get_sub_field('accordion_rows')) : ?>
    <section class="accordion_section">
        <div class="accordion_container">
            <!-- Section Headlines -->
            <?php get_template_part('template-parts/section_headlines'); ?>

            <?php
            $accordionIcon = get_sub_field('icon');
            while (has_sub_field('accordion_rows')) : ?>
                <div class="accordion_row">
                    <div class="accordion_row_headline">
                        <h3><?php echo get_sub_field('row_headline') ?></h3>
                        <img class="accordion_row_icon" src="<?php echo $accordionIcon['url'] ?>" alt="">
                    </div>
                    <div class="accordion_row_content hide">
                        <p><?php the_sub_field('row_content') ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>