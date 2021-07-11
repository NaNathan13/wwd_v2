<?php if (get_sub_field('columns')) : ?>
    <section class="dynamic_columns_section">
        <div class="dynamic_columns_container">
            <?php get_template_part('template-parts/section_headlines'); ?>

            <?php while (has_sub_field('columns')) : ?>
                <div class="dynamic_columns_column">
                    <?php if (get_sub_field('icon')) : ?>
                        <img src="<?php echo get_sub_field('icon')['url'] ?>" alt="">
                    <?php endif; ?>

                    <?php if (get_sub_field('headline')) : ?>
                        <h3><?php the_sub_field('headline') ?></h3>
                    <?php endif; ?>

                    <?php if (get_sub_field('subheadline')) : ?>
                        <h4><?php the_sub_field('subheadline') ?></h4>
                    <?php endif; ?>

                    <?php if (get_sub_field('paragraph')) : ?>
                        <p><?php the_sub_field('paragraph') ?></p>
                    <?php endif; ?>

                    <?php if (get_sub_field('link')) : ?>
                        <a href="<?php echo esc_url(get_sub_field('link')['url']) ?>"><?php echo esc_html(get_sub_field('link')['title']) ?></a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>