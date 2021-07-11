<?php
if (have_rows('page_content')) :
    while (have_rows('page_content')) : the_row();

        // Heros
        if (get_row_layout() == 'hero_fifty_fifty') :

            get_template_part('template-parts/components/blocks/heros/hero_fifty_fifty');

        elseif (get_row_layout() == 'hero_parallax') :

            get_template_part('template-parts/components/blocks//heros/hero_parallax');

        elseif (get_row_layout() == 'dynamic_columns') :
            // Sections
            get_template_part('template-parts/components/blocks/sections/dynamic_columns');

        elseif (get_row_layout() == 'fifty_fifty') :

            get_template_part('template-parts/components/blocks/sections/fifty_fifty');

        elseif (get_row_layout() == 'testimonial_carousel') :

            get_template_part('template-parts/components/blocks/sections/testimonial_carousel');

        elseif (get_row_layout() == 'cards') :

            get_template_part('template-parts/components/blocks/sections/cards');

        elseif (get_row_layout() == 'contact_form') :

            get_template_part('template-parts/components/blocks/sections/contact_form');

        elseif (get_row_layout() == 'gallery') :

            get_template_part('template-parts/components/blocks/sections/gallery');

        // Other
        elseif (get_row_layout() == 'wysiwyg') :

            get_template_part('template-parts/components/blocks/wysiwyg');
        endif;
    endwhile;
endif;
?>

<!-- 
    




-->