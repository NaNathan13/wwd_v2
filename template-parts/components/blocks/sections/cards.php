<!-- 

To add:

 - Field to control width on desktop
 -->

<?php if (get_sub_field('cards')) : ?>
    <section class="cards_section">
        <div class="cards_container">
            <h2>cards block</h2>
            <?php if (get_sub_field('section_headline')) : ?>
                <h2><?php echo get_sub_field('section_headline') ?></h2>
            <?php endif; ?>

            <?php if (get_sub_field('section_subheadline')) : ?>
                <p><?php echo get_sub_field('section_subheadline') ?></p>
            <?php endif; ?>

            <?php while (has_sub_field('cards')) : ?>
                <div class="cards_card">
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