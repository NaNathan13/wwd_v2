<?php
if (have_rows('page_content')) :
    while (have_rows('page_content')) : the_row();
        // Content
        if (get_row_layout() == 'content-image') :

            get_template_part('template-parts/components/blocks/content/content-image');

        elseif (get_row_layout() == 'content-spacer') :

            get_template_part('template-parts/components/blocks/content/content-spacer');

        elseif (get_row_layout() == 'content-text') :

            get_template_part('template-parts/components/blocks/content/content-text');

        elseif (get_row_layout() == 'content-wysiwyg') :

            get_template_part('template-parts/components/blocks/content/content-wysiwyg');

        // Heros
        elseif (get_row_layout() == 'hero-fifty_fifty') :

            get_template_part('template-parts/components/blocks/heros/hero-fifty_fifty');

        elseif (get_row_layout() == 'hero-parallax') :

            get_template_part('template-parts/components/blocks/heros/hero-parallax');

        elseif (get_row_layout() == 'hero-static') :

            get_template_part('template-parts/components/blocks/heros/hero-static');

        // Sections
        elseif (get_row_layout() == 'accordion') :

            get_template_part('template-parts/components/blocks/sections/accordion');

        elseif (get_row_layout() == 'cards') :

            get_template_part('template-parts/components/blocks/sections/cards');

        elseif (get_row_layout() == 'content_with_image') :

            get_template_part('template-parts/components/blocks/sections/content_with_image');

        elseif (get_row_layout() == 'contact_form') :

            get_template_part('template-parts/components/blocks/sections/contact_form');

        elseif (get_row_layout() == 'data_cards') :

            get_template_part('template-parts/components/blocks/sections/data_cards');

        elseif (get_row_layout() == 'columns') :

            get_template_part('template-parts/components/blocks/sections/columns');

        elseif (get_row_layout() == 'gallery_carousel') :

            get_template_part('template-parts/components/blocks/sections/gallery_carousel');

        elseif (get_row_layout() == 'testimonial_carousel') :

            get_template_part('template-parts/components/blocks/sections/testimonial_carousel');

        endif;
    endwhile;
endif;
