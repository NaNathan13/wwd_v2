<section class="testimonial_carousel_section">
    <div class="testimonial_carousel_container">
        <h2><?php echo get_sub_field('headline'); ?></h2>
        <div class="testimonai_carousel_wrapper">
            <p><?php echo get_sub_field('testimonial') ?></p>
            <p><?php echo get_sub_field('testimonial_name') ?></p>
        </div>
    </div>
</section>

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
    });
</script>