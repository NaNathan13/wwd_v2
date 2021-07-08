<section class="upcoming_events_section">
    <div class="upcoming_events_container">
        <h2>Upcoming <span class="red">Events</span></h2>

        <div class="upcoming_events_wrapper">

            <?php
            $args = array(
                'post_type' => 'events',
                'post_status' => 'publish',
                'posts_per_page' => 5,
                'meta_key'  => 'event_date',
                'orderby'   => 'meta_value_num',
                'order' => 'ASC',

            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                $eventDescription = get_field('event_description');
                if (get_field('opponent_logo')) {
                    $opponentLogo =  get_field('opponent_logo')['url'];
                } else {
                    $opponentLogo = get_template_directory_uri() . '/images/opponent_logo_default.png';
                }
            ?>
                <?php
                $endOfDay = strtotime("tomorrow") - 1;
                $unixtimestamp = strtotime(get_field('event_date'));
                $date_fr = date("Y-m-d", $unixtimestamp);
                if ($unixtimestamp > $endOfDay) :  ?>
                    <?php if (get_field('event_type') == "Team vs Team") : ?>
                        <div class="upcoming_event_card">
                            <h3 classs="upcoming_event_card_title"><?php echo get_field('event_title') ?></h3>
                            <div class="upcoming_event_card_vs_logos">
                                <img src="<?php echo get_template_directory_uri() . '/images/rbg_logo.png' ?>" alt="">
                                <p>VS</p>
                                <img src="<?php echo $opponentLogo ?>" alt="">
                            </div>
                            <div class="upcoming_event_card_dates">
                                <h4 class="upcoming_event_card_date"><?php echo get_field('event_date') ?></h4>
                                <?php if (get_field('event_time')) : ?>
                                    <h4 class="upcoming_event_card_time"><?php echo get_field('event_time') ?></h4>
                                <?php endif; ?>
                            </div>
                            <a class="cta_btn" href="<?php the_permalink(); ?>">Learn More</a>
                        </div>
                    <?php elseif (get_field('event_type') == "General Stream") :
                    ?>
                        <div class="upcoming_event_card">
                            <h3 classs="upcoming_event_card_title"><?php echo get_field('event_title') ?></h3>
                            <div class="upcoming_event_card_featured_image">
                                <img src="<?php echo get_field('event_image')['url'] ?>" alt="">
                            </div>
                            <div class="upcoming_event_card_dates">
                                <h4 class="upcoming_event_card_date"><?php echo get_field('event_date') ?></h4>
                                <?php if (get_field('event_time')) : ?>
                                    <h4 class="upcoming_event_card_time"><?php echo get_field('event_time') ?></h4>
                                <?php endif; ?>
                            </div>
                            <a class="cta_btn" href="<?php the_permalink(); ?>">Learn More</a>
                        </div>
                <?php endif;
                endif; ?>

            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>