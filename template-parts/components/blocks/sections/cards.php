<?php if (get_sub_field('cards')) : ?>
    <section class="cards_section">
        <div class="cards_container">
            <?php get_template_part('template-parts/section_headlines'); ?>
            <div class="cards_wrapper">
                <?php
                $cardWidth = get_sub_field('card_width');
                $cardAlignment = get_sub_field('card_alignment');
                while (has_sub_field('cards')) : ?>
                    <div class="cards_card align-<?php echo $cardAlignment ?>" style="flex: 0 1 
                <?php
                    if ($cardWidth) {
                        echo $cardWidth;
                    } else {
                        echo "300px";
                    } ?>">
                        <?php if (get_sub_field('icon')) : ?>
                            <img class="card_icon" src="<?php echo get_sub_field('icon')['url'] ?>" alt="">
                        <?php endif; ?>

                        <?php if (get_sub_field('headline')) : ?>
                            <h3 class="card_headline"><?php the_sub_field('headline') ?></h3>
                        <?php endif; ?>

                        <?php if (get_sub_field('subheadline')) : ?>
                            <h4 class="card_subheadline"><?php the_sub_field('subheadline') ?></h4>
                        <?php endif; ?>

                        <?php if (get_sub_field('paragraph')) : ?>
                            <p class="card_paragraph"><?php the_sub_field('paragraph') ?></p>
                        <?php endif; ?>

                        <?php if (get_sub_field('link')) : ?>
                            <div class="card_cta_wrapper">
                                <a class="card_cta" href="<?php echo esc_url(get_sub_field('link')['url']) ?>"><?php echo esc_html(get_sub_field('link')['title']) ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>