<!-- 

To add:

 - Field to control width on desktop
 -->

<?php if (get_sub_field('accordion_rows')) : ?>
    <section class="accordion_section">
        <div class="accordion_container">
            <?php get_template_part('template-parts/section_headlines'); ?>

            <?php while (has_sub_field('accordion_rows')) : ?>
                <div class="accordion_row">
                    <h3><?php echo get_sub_field('row_headline') ?></h3>
                    <div><?php the_sub_field('row_content') ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>