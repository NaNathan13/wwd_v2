<?php if (get_sub_field('columns')) : ?>
    <section class="dynamic_columns_section">
        <div class="dynamic_columns_container">
            <?php
            while (has_sub_field('columns')) :
            ?>

                <div class="dynamic_columns_column">
                    <img src="" alt="">
                    <h3><?php the_sub_field('headline') ?></h3>
                    <h4><?php the_sub_field('subheadline') ?></h4>
                    <p><?php the_sub_field('paragraph') ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>