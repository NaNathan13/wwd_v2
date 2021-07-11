<?php if (get_sub_field('testimonials')) : ?>
    <section class="testimonial_carousel_section">
        <div class="testimonial_carousel_container">
            <?php get_template_part('template-parts/section_headlines'); ?>

            <div class="testimonai_carousel_wrapper">
                <?php while (has_sub_field('testimonials')) : ?>
                    <div class="testimonial_slide slide">
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
    window.onload = function() {
        const slides = document.querySelectorAll('.slide');
        slides[0].classList.add('activeSlide');
    };

    jQuery(document).ready(function($) {
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');
        const slides = document.querySelectorAll('.slide');
        const numberOfSlides = slides.length;

        let slideNumber = 0;

        // Next Button
        nextBtn.addEventListener("click", () => {
            slides.forEach((slide) => {
                slide.classList.remove("activeSlide");
            });

            slideNumber++;

            if (slideNumber > (numberOfSlides - 1)) {
                slideNumber = 0;
            }

            slides[slideNumber].classList.add("activeSlide");
            clearInterval(playSlider);
            repeater();
            reset_animation();
        });

        // Prev Button
        prevBtn.addEventListener("click", () => {
            slides.forEach((slide) => {
                slide.classList.remove("activeSlide");
            });

            slideNumber--;

            if (slideNumber < 0) {
                slideNumber = numberOfSlides - 1;
            }

            slides[slideNumber].classList.add("activeSlide");
            clearInterval(playSlider);
            repeater();

        });

        //image slider autoplay
        let playSlider;

        let repeater = () => {
            playSlider = setInterval(function() {
                slides.forEach((slide) => {
                    slide.classList.remove("activeSlide");
                });

                slideNumber++;

                if (slideNumber > (numberOfSlides - 1)) {
                    slideNumber = 0;
                }

                slides[slideNumber].classList.add("activeSlide");
            }, 7000);
        }
        repeater();

        console.log("all of carousel js ran")
    });
</script>