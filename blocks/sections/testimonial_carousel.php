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

<?php 

$autoplay = get_sub_field('autoplay');
$dots = get_sub_field('dots');

?>

<script>
    jQuery(document).ready(function($) {
        $('.testimonai_carousel_wrapper').slick({
            dots: <?php if ($dots) : echo "true";
                    else : echo "false";
                    endif; ?>,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: <?php if ($autoplay) : echo "true";
                        else : echo "false";
                        endif; ?>,
            autoplaySpeed: 5000,
        });
    });
</script>