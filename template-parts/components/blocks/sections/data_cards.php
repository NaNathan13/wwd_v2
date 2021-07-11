<?php if (get_sub_field('data_cards')) : ?>
    <section class="data_cards_section">
        <div class="data_cards_container">
            <?php get_template_part('template-parts/section_headlines'); ?>

            <div class="data_cards_wrapper">
                <?php while (has_sub_field('data_cards')) : ?>
                    <div class="data_cards_card">
                        <?php if (get_sub_field('headline')) : ?>
                            <h3><?php echo get_sub_field('headline') ?></h3>
                        <?php endif; ?>

                        <?php if (get_sub_field('paragraph')) : ?>
                            <p><?php echo get_sub_field('paragraph') ?></p>
                        <?php endif; ?>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>