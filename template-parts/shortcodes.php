<?php

function content_left_box_right_cta_shortcode()
{
	ob_start();
	get_template_part('template-parts/content/shortcodes/content_left_box_right');
	return ob_get_clean();
}

add_shortcode('content_left_box_right_cta_shortcode', 'content_left_box_right_cta_shortcode');