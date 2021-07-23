<?php

$contentVerticalAlignment = get_sub_field('content_vertical_alignment');
$contentHorizontalAlignment = get_sub_field('content_horizontal_alignment');
$contentBackgroundColor = get_sub_field('content_background_color');



?>

<section class="content_with_image_section">
    <div class="content_with_image_container">
        <?php get_template_part('template-parts/section_headlines'); ?>
        <div class="content_with_image_wrapper 
        <?php
        if (get_sub_field('image_side') == 'right') : echo "reverse";
        endif; ?>">
            <div class="content_with_image_image">
                <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
            </div>
            <div class="content_with_image_content" style="
            <?php
            if ($contentBackgroundColor) {
                echo "background-color: " . $contentBackgroundColor . ";";
            }

            if ($contentVerticalAlignment == "top") {
                echo "justify-content: flex-start;";
            } elseif ($contentVerticalAlignment == "center") {
                echo "justify-content: center;";
            } elseif ($contentVerticalAlignment == "bottom") {
                echo "justify-content: flex-end;";
            }


            if ($contentHorizontalAlignment == "left") {
                echo "align-items: flex-start;";
            } elseif ($contentHorizontalAlignment == "center") {
                echo "align-items: center;";
            } elseif ($contentHorizontalAlignment == "right") {
                echo "align-items: flex-end;";
            }

            ?>">
                <?php the_sub_field('content') ?>
            </div>
        </div>
    </div>
</section>