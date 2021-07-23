<?php
function pr($args)
{
    echo '<pre style="background:black;color:white;padding:1em;font-family:Courier;white-space:pre-wrap;">';
    echo '<div style="color:lime;">Debug:</div>';
    foreach (func_get_args() as $arg) {
        echo '<div>' . print_r($arg, true) . '</div>';
    }
    echo '</pre>';
}

function dd($args)
{
    pr($args);
    die;
}


if (!is_admin() && !function_exists('get_field')) {
    function get_field()
    {
        return 'Please install ACF to continue!';
    }
}
/**
 * Include block functionality 
 * @param $name 
 * @param $args
 */
function block($name, $args = [], $echo = true)
{
    $html = '';

    //set each key as a variable
    foreach ($args as $key => $value) {
        $$key = $value;
    }

    if ($echo == false) {
        ob_start();
    }

    //include the template to have access to variables
    $template_location = 'blocks/' . $name . '/' . $name . '.php';
    if (locate_template($template_location)) {
        require(get_template_directory() . '/' . $template_location);
    } else {
        pr($name . ' block not found.');
    }

    if ($echo == false) {
        $html = ob_get_contents();
        ob_end_clean();
    }

    //unset any variables we've created
    foreach ($args as $key => $value) {
        unset($$key);
    }

    return $html;
}

/**
 * Registers wp menus
 * @param $menus - An array of titles
 */
function register_menus($menus)
{
    foreach ($menus as $menu) {
        register_nav_menu(sanitize_title_with_dashes($menu), $menu);
    }
}


//calls a bunch of functions to help the theme out
function theme_configuration($options)
{
    //boolean
    empty($options['remove_comments']) ?: remove_comments_from_wp();
    empty($options['disable_gutenberg']) ?: disable_gutenberg();
    empty($options['show_pages_submenu']) ?: show_pages_submenu();
    //pass args
    empty($options['acf_options_pages']) ?: register_acf_options_pages($options['acf_options_pages']);
    empty($options['menus']) ?: register_menus($options['menus']);
    empty($options['acf_cptui_whitelist_ids']) ?: whitelist_acf_and_cptui($options['acf_cptui_whitelist_ids']);
    empty($options['wysiwyg_colors']) ?: add_wysiwyg_colors($options['wysiwyg_colors']);
    empty($options['hide_wysiwyg_from_templates']) ?: hide_wysiwyg_from_templates($options['hide_wysiwyg_from_templates']);
    empty($options['allow_mime_uploads']) ?: allow_mime_uploads($options['allow_mime_uploads']);
    empty($options['post_types']) ?: create_post_types($options['post_types']);
    empty($options['taxonomies']) ?: create_taxonomies($options['taxonomies']);
}

/**
 * registers ACF options pages
 */
function register_acf_options_pages($pages)
{
    if (function_exists('acf_add_options_page')) {
        foreach ($pages as $page) {
            acf_add_options_page(array(
                'page_title'  => $page,
                'menu_title'  => $page,
                'menu_slug'   => sanitize_title_with_dashes($page),
                'capability'  => 'edit_posts'
            ));
        }
    }
}

/*
 *  Removes content editor from templates
*/
function hide_wysiwyg_from_templates($templateNames)
{
    add_action('admin_init', function ($templates) use ($templateNames) {
        $currentPost = isset($_GET['post']) ? get_post($_GET['post']) : '';
        if (!empty($currentPost)) {
            $currentPost->template = get_post_meta($_GET['post'], '_wp_page_template', TRUE);

            if (in_array($currentPost->template, $templateNames)) {
                remove_post_type_support($currentPost->post_type, 'editor');
            }
        }
    });
}

//disables gutenberg
function disable_gutenberg()
{
    add_filter('use_block_editor_for_post', '__return_false', 10);
}

// Removes all comment support from WP
function remove_comments_from_wp()
{
    add_action('admin_menu', 'my_remove_admin_menus');
    function my_remove_admin_menus()
    {
        remove_menu_page('edit-comments.php');
    }
    // Removes from post and pages
    add_action('init', 'remove_comment_support', 100);

    function remove_comment_support()
    {
        remove_post_type_support('post', 'comments');
        remove_post_type_support('page', 'comments');
    }
    // Removes from admin bar
    function mytheme_admin_bar_render()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
    add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');
}

function whitelist_acf_and_cptui($ids)
{
    $ids = is_array($ids) ? $ids : [$ids];

    if (!in_array(get_current_user_id(), $ids)) {
        remove_action('admin_menu', 'cptui_plugin_menu');
        add_filter('acf/settings/show_admin', '__return_false');
    }
}

/**
 * Add pages submenu of pages to pages
 */
function show_pages_submenu()
{
    add_action('admin_menu', function () {
        global $submenu;
        $pages = get_pages(['post_status' => ['publish', 'pending', 'draft']]);
        foreach ($pages as $page) {
            $prefix = '└ ';

            if ($page->post_parent) {
                continue; //actually lets just do top level
                $prefix = '&nbsp;&nbsp;└&nbsp;';
            }

            $submenu['edit.php?post_type=page'][] = [$prefix . $page->post_title, 'manage_options', get_edit_post_link($page->ID)];
        }
    });
}

/**
 * Add wysiwyg colors to tiny MCE
 */
function add_wysiwyg_colors($colors)
{
    add_filter('tiny_mce_before_init', function ($init) use ($colors) {
        $colors_concat = '';

        foreach ($colors as $name => $color) {
            $colors_concat .= '"' . str_replace('#', '', $color) . '","' . $name . '",';
        }

        // build colour grid default+custom colors
        $init['textcolor_map'] = '[' . $colors_concat . ']';

        return $init;
    });

    add_action('acf/input/admin_footer', function () use ($colors) {
        $colors = json_encode(array_values($colors));
        echo "<script>
        acf.add_filter('color_picker_args', function( args ){
          args.palettes = $colors
          return args;
        });
      </script>";
    });
}

/**
 * Allow mime uploads
 */
function allow_mime_uploads($types)
{
    add_filter('upload_mimes', function ($mimes) use ($types) {
        foreach ($types as $type) {
            foreach ($type as $key => $value) {
                $mimes[$key] = $value;
            }
        }
        return $mimes;
    });
}

/**
 * Create post types
 */
function create_post_types($post_types)
{
    add_action('init', function () use ($post_types) {
        foreach ($post_types as $type) {
            register_post_type($type['slug'], [
                'labels'              => [
                    'name'          => $type['plural'],
                    'singular_name' => $type['singular']
                ],
                'supports'            => !empty($type['supports']) ? $type['supports'] : [],
                'hierarchical'        => isset($type['hierarchical']) ? $type['hierarchical'] : false,
                'public'              => isset($type['public']) ? $type['public'] : true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 5,
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => isset($type['exclude_from_search']) ? $type['exclude_from_search'] : true,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
                'menu_icon'           => !empty($type['icon']) ? $type['icon'] : [],
                'rewrite'             => !empty($type['rewrite_slug']) ? ['with_front' => false, 'slug' => $type['rewrite_slug']] : ['with_front' => false]
            ]);
        }
    });
}

/**
 * Create taxonomies
 */
function create_taxonomies($taxonomies)
{
    add_action('init', function () use ($taxonomies) {
        foreach ($taxonomies as $tax) {
            register_taxonomy($tax['slug'], $tax['post_types'], [
                'labels' => [
                    'name'          => $tax['plural'],
                    'singular_name' => $tax['singular']
                ],
                'hierarchical' => true,
                'show_admin_column' => isset($tax['show_admin_column']) ? $tax['show_admin_column'] : false,
                'rewrite' => [
                    'slug' => isset($tax['rewrite_slug']) ? $tax['rewrite_slug'] : false
                ]
            ]);
        }
    });
}


/*
* Always include below
*/

add_theme_support('post-thumbnails');
add_theme_support('post');
add_theme_support('html5');
add_theme_support('menus');
add_theme_support('responsive-embeds');


//stop WP from automatically cropping and reducing the quality of large image uploads
add_filter('big_image_size_threshold', '__return_false');

// save ACF JSON files
add_filter('acf/settings/save_json', function ($path) {
    return get_stylesheet_directory() . '/acf-json';
});

/**
 * Disable the emojis
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', function ($plugins) {
        if (is_array($plugins)) {
            return array_diff($plugins, ['wpemoji']);
        } else {
            return [];
        }
    });
    add_filter('wp_resource_hints', function ($urls, $relation_type) {
        if ('dns-prefetch' == $relation_type) {
            /** This filter is documented in wp-includes/formatting.php */
            $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

            $urls = array_diff($urls, array($emoji_svg_url));
        }

        return $urls;
    }, 10, 2);
}
add_action('init', 'disable_emojis');

/**
 * Removes WP events from dashboard
 */
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); //WordPress.com Blog
});

/**
 * Adds the site logo to the login page
 */
add_action('login_enqueue_scripts', function () {
    $image_url = wp_get_attachment_image_url(get_field('site_logo', 'options'), 'large');

    $style = "
    <style type='text/css'>
      #login h1 a, .login h1 a {
        background-image: url($image_url);
        width:320px;
        background-size: contain;
        background-repeat: no-repeat;
      }
    </style>
    ";

    echo $style;
});

/**
 * change the WP link on the login page
 */
add_filter('login_headerurl', function () {
    return home_url();
});


/**
 * Convert all wp image uploads to webp images
 */
add_filter('wp_generate_attachment_metadata', function ($meta) {
    $upload_path = wp_upload_dir()['path'];

    if (!empty($meta['file'])) {
        $file_name = basename($meta['file']);
        $variations = [];

        //if this file is an acceptable image, add it to the variations
        if (
            strpos($file_name, '.jpg')
            || strpos($file_name, '.jpeg')
            || strpos($file_name, '.png')
            || strpos($file_name, '.gif')
            || strpos($file_name, '.svg')
        ) {
            $variations[] = $file_name;
        }

        if (!empty($meta['sizes'])) {
            foreach ($meta['sizes'] as $size) {
                $variations[] = $size['file'];
            }
        }

        foreach ($variations as $single) {
            $webp = str_replace(['.jpg', '.jpeg', '.png', '.gif', '.svg'], '.webp', $single);
            try {
                WebPConvert\WebPConvert::convert($upload_path . '/' . $single, $upload_path . '/' . $webp);
            } catch (Exception $e) {
                /* This server probably doesn't have the correct configuration to create webp images */
            }
        }
    }

    return $meta;
});

/**
 * Delete webps when the image is deleted
 */
add_action('delete_attachment', function ($post_id) {
    $upload_path = wp_upload_dir()['path'];
    $meta = wp_get_attachment_metadata($post_id);
    if (!empty($meta['file'])) {
        $variations = [basename($meta['file'])];

        foreach ($meta['sizes'] as $size) {
            $variations[] = $size['file'];
        }

        foreach ($variations as $single) {
            $webp = str_replace(['.jpg', '.jpeg', '.png', '.gif', '.svg'], '.webp', $single);
            @unlink($upload_path . '/' . $webp);
        }
    }
});


function get_attr_from_image_html($html, $attr)
{
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $image = $dom->getElementsByTagName('img');
    return $image[0]->getAttribute($attr);
}

/**
 * Make WP serve next gen images and make em lazy
 */
add_filter('the_content', 'convert_wp_image_html_to_html5');
add_filter('acf_the_content', 'convert_wp_image_html_to_html5');
function convert_wp_image_html_to_html5($html, $id = '')
{
    $images = [];
    $converted_images = [];

    //match all images in this HTML
    preg_match_all('/<img(.*?)src=("|\'|)(.*?)("|\'| )(.*?)>/s', $html, $images);
    if (!empty($images[0])) {
        $images = $images[0];
    }

    //convert any <img> to a <picture> and make everything lazy
    if (!empty($images)) {
        foreach ($images as $image) {
            if (empty($image)) {
                continue;
            }

            $image_src = get_attr_from_image_html($image, 'src');
            $image_srcset = get_attr_from_image_html($image, 'srcset');
            $image_classes = get_attr_from_image_html($image, 'class');

            // make the image lazy (maybe)
            if (strpos($image_classes, 'not-lazy') === false) {
                $lazy_image = str_replace([
                    'class="',
                    'srcset=',
                    'src='
                ], [
                    'class="lazy ',
                    'data-srcset=',
                    'data-src='
                ], $image);
            } else {
                $lazy_image = $image;
            }

            //if there are no classes, add one
            if (empty($image_classes) && !empty($_GET['debug'])) {
                $lazy_image = str_replace('/>', 'class="lazy" />', $lazy_image);
            }

            //build the webp source (if that file is on the server)
            $webp_path = $_SERVER['DOCUMENT_ROOT'] . parse_url($image_src, PHP_URL_PATH);
            $webp_path = str_replace(['.jpg', '.jpeg', '.gif', '.png', '.svg'], '.webp', $webp_path);
            if (file_exists($webp_path)) {
                $webp = '<source type="image/webp" ';
                if (empty($image_srcset)) {
                    $webp .= !empty($image_src) ? 'data-srcset="' . str_replace(['.jpg', '.jpeg', '.gif', '.png'], '.webp', $image_src) . '" ' : '';
                } else {
                    $webp .= !empty($image_srcset) ? 'data-srcset="' . str_replace(['.jpg', '.jpeg', '.gif', '.png'], '.webp', $image_srcset) . '" ' : '';
                }
                $webp .= '>';
            } else {
                $webp = null;
            }

            $picture_classes = implode(' ', array_map(function ($cls) {
                return $cls . '--picture';
            }, explode(' ', $image_classes)));

            //build the new html
            $converted_html = '<picture class="' . $picture_classes . '">';
            $converted_html .= !empty($webp) ? $webp : '';
            $converted_html .= $lazy_image;
            $converted_html .= '</picture>';

            //push the orig and new into an array
            $converted_images[] = [
                'original' => $image,
                'converted' => $converted_html
            ];
        }
    }

    //replace all the originals with the converted html
    foreach ($converted_images as $image) {
        $html = str_replace($image['original'], $image['converted'], $html);
    }

    return $html;
}

// Changes media link to default to none
update_option('image_default_link_type', 'none');
remove_action('wp_head', 'wp_generator');



//remove empty p tags by wpautop and the_content
add_filter('the_content', function ($content) {
    $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
    $content = preg_replace('~\s?<p>(\s)+</p>\s?~', '', $content);
    return $content;
}, 20, 1);

/**
 * Tell woocommerce that our theme can support it
 */
add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});













//Add buttons to TinyMCE
function add_style_select_button($buttons)
{
    array_unshift($buttons, 'fontsizeselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'add_style_select_button');
