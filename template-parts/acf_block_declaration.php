<?php
if (have_rows('page_content')) :
    while (have_rows('page_content')) : the_row();
        // Content
        if (get_row_layout() == 'wysiwyg') :

            get_template_part('template-parts/components/blocks/content/wysiwyg');

        elseif (get_row_layout() == 'text') :

            get_template_part('template-parts/components/blocks/content/text');

        // Heros
        elseif (get_row_layout() == 'hero_fifty_fifty') :

            get_template_part('template-parts/components/blocks/heros/hero_fifty_fifty');

        elseif (get_row_layout() == 'hero_parallax') :

            get_template_part('template-parts/components/blocks//heros/hero_parallax');

        elseif (get_row_layout() == 'hero_static') :

            get_template_part('template-parts/components/blocks/sections/hero_static');

        // Sections
        elseif (get_row_layout() == 'content_with_image') :

            get_template_part('template-parts/components/blocks/sections/content_with_image');

        elseif (get_row_layout() == 'testimonial_carousel') :

            get_template_part('template-parts/components/blocks/sections/testimonial_carousel');

        elseif (get_row_layout() == 'cards') :

            get_template_part('template-parts/components/blocks/sections/cards');

        elseif (get_row_layout() == 'contact_form') :

            get_template_part('template-parts/components/blocks/sections/contact_form');

        elseif (get_row_layout() == 'dynamic_columns') :

            get_template_part('template-parts/components/blocks/sections/dynamic_columns');

        elseif (get_row_layout() == 'gallery') :

            get_template_part('template-parts/components/blocks/sections/gallery');

        elseif (get_row_layout() == 'gallery') :

            get_template_part('template-parts/components/blocks/sections/accordion');

        endif;
    endwhile;
endif;
?>