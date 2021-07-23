<?php if (get_sub_field('gallery_carousel_images')) : ?>
    <section class="gallery_carousel_section">
        <div class="gallery_carousel_container">
            <?php get_template_part('template-parts/section_headlines'); ?>

            <div class="gallery_carousel_images_wrapper">
                <?php while (has_sub_field('gallery_carousel_images')) : ?>
                    <img data-lazy="<?php echo get_sub_field('image')['url'] ?>" alt="">
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php

$numberOfSlidesDesktop = get_sub_field('number_of_slides_desktop');
$numberOfSlidesMobile = get_sub_field('number_of_slides_mobile');
$autoplay = get_sub_field('autoplay');
$dots = get_sub_field('dots');

?>

<script>
    jQuery(document).ready(function($) {
        $('.gallery_carousel_images_wrapper').slick({
            lazyLoad: 'ondemand',
            dots: <?php if ($dots) : echo "true";
                    else : echo "false";
                    endif; ?>,
            infinite: true,
            speed: 600,
            slidesToShow: <?php echo $numberOfSlidesDesktop; ?>,
            slidesToScroll: 1,
            autoplay: <?php if ($autoplay) : echo "true";
                        else : echo "false";
                        endif; ?>,
            autoplaySpeed: 3000,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: <?php echo $numberOfSlidesDesktop; ?>,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: <?php echo $numberOfSlidesDesktop - 1; ?>,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: <?php echo $numberOfSlidesMobile; ?>,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>