<?php
if (have_rows('page_content')) :
    while (have_rows('page_content')) : the_row();
        // Content
        if (get_row_layout() == 'accordion') :

            get_template_part('../blocks/accordion/accordion');
        elseif (get_row_layout() == 'accordion') :

            get_template_part('../blocks/accordion/accordion');

        endif;
    endwhile;
endif;
