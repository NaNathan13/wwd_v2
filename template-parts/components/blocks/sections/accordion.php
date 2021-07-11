<!-- 

To add:

 - Field to control width on desktop
 -->

<?php if (get_sub_field('accordion_rows')) : ?>
    <section class="accordion_section">
        <div class="accordion_container">
            <h2>accordion block</h2>
            <h2><?php echo get_sub_field('section_headline') ?></h2>
            <p><?php echo get_sub_field('section_subheadline') ?></p>

            <?php while (has_sub_field('accordion_rows')) : ?>
                <div class="accordion_row">
                    <h3><?php echo get_sub_field('row_headline') ?></h3>
                    <div><?php the_sub_field('row_content') ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>