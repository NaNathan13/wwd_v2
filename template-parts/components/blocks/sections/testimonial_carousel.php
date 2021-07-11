<?php if (get_sub_field('testimonials')) : ?>
    <section class="testimonial_carousel_section">
        <div class="testimonial_carousel_container">
            <?php get_template_part('template-parts/section_headlines'); ?>

            <div class="testimonai_carousel_wrapper">
                <?php while (has_sub_field('testimonials')) : ?>
                    <div class="testimonial_slide">
                        <?php if (get_sub_field('testimonial')) : ?>
                            <p><?php echo get_sub_field('testimonial') ?></p>
                        <?php endif; ?>

                        <?php if (get_sub_field('name')) : ?>
                            <p><?php echo get_sub_field('name') ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<script>
    jQuery(document).ready(function($) {
        $('.testimonai_carousel_wrapper').slick();

    });
</script>