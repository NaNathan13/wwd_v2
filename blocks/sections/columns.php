<?php if (get_sub_field('columns')) :
    $columnsAlignment = get_sub_field('column_alignment');
    $columnsWidth = get_sub_field('column_width');

?>
    <section class="columns_section">
        <div class="columns_container">
            <?php get_template_part('template-parts/section_headlines'); ?>

            <div class="columns_wrapper">
                <?php while (has_sub_field('columns')) : ?>
                    <div class="columns_column align-<?php echo $columnsAlignment ?>" style="flex: 0 1 
                <?php
                    if ($columnsWidth) {
                        echo $columnsWidth;
                    }  ?>">
                        <?php if (get_sub_field('icon')) : ?>
                            <img class="column_icon" src=" <?php echo get_sub_field('icon')['url'] ?>" alt="">
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
        </div>
    </section>
<?php endif; ?>