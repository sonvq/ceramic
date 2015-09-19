<?php

/*
 * Hide the top toolbar admin wordpress
 */
add_filter('show_admin_bar', '__return_false');

/*
 * Function to include stylesheet and javascript
 */

function ceramic_resources() {
    wp_enqueue_style('ceramic-bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null, 'all');
    wp_enqueue_style('ceramic-header', get_template_directory_uri() . '/css/header.css', array(), null, 'all');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '', TRUE);
    if (is_front_page()) {
        wp_enqueue_style('ceramic-home', get_template_directory_uri() . '/css/home.css', array(), null, 'all');
        wp_enqueue_script('ceramic-home-script', get_template_directory_uri() . '/js/home.js', array('jquery'), '', TRUE);
        wp_enqueue_script('ceramic-counter-script', get_template_directory_uri() . '/js/counter.js', array('jquery'), '', TRUE);
        wp_enqueue_script('ceramic-waypoint-script', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), '', TRUE);
    }

    wp_enqueue_style('ceramic-common', get_template_directory_uri() . '/css/common.css', array(), null, 'all');
    wp_enqueue_style('ceramic-style', get_stylesheet_uri(), '', null, 'all');

    wp_enqueue_script('ceramic-bootstrap-min-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', TRUE);
}

add_action('wp_enqueue_scripts', 'ceramic_resources');

// Get top ancestor
function get_top_ancestor_id() {
    global $post;
    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    return $post->ID;
}

// Does page have children?
function has_children() {
    global $post;
    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

// Customize excerpt word count length
function custom_excerpt_length() {
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

function ceramic_setup() {

    // wp-content/languages/themes/ceramic-it_IT.mo
    load_theme_textdomain('ceramic', trailingslashit(WP_LANG_DIR) . 'themes/');

    // wp-content/themes/child-theme-name/languages/it_IT.mo
    load_theme_textdomain('ceramic', get_stylesheet_directory() . '/languages');

    // wp-content/themes/storefront/languages/it_IT.mo
    load_theme_textdomain('ceramic', get_template_directory() . '/languages');

    // Navigation Menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu',
        'sidebar' => 'Sidebar Menu',
    ));

    // Add featured image support
    add_theme_support('post-thumbnails');

    add_image_size('small-thumnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left', 'top'));

    // Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'ceramic_setup');

// Add Our Widget Locations
function ourWidgetsInit() {
    register_sidebar(array(
        'name' => 'Standard Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="my-special-class">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 1', 'ceramic'),
        'id' => 'footer1'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 2', 'ceramic'),
        'id' => 'footer2'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 3', 'ceramic'),
        'id' => 'footer3'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 4', 'ceramic'),
        'id' => 'footer4'
    ));
}

add_action('widgets_init', 'ourWidgetsInit');

// Customize Appearance Options
function ceramic_customize_register($wp_customize) {
    /*
     * Add logo setting section
     */
    $wp_customize->add_section('customize_logo_section', array(
        'title' => 'Logo',
        'priority' => 30,
        'description' => 'Upload a logo to replace the default site logo'
    ));

    $wp_customize->add_setting('customize_logo_settings');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'customize_logo_control', array(
        'label' => 'Add Logo',
        'section' => 'customize_logo_section',
        'settings' => 'customize_logo_settings'
    )));
}

add_action('customize_register', 'ceramic_customize_register');

// Advanced search functionality
function advanced_search_query($query) {

    if ($query->is_search()) {
        // category terms search.
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => array($_GET['category']))
            ));
        }
        return $query;
    }
}

add_action('pre_get_posts', 'advanced_search_query', 1000);

class Nfr_Menu_Walker extends Walker_Nav_Menu {

    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth. It is possible to set the
     * max depth to include all depths, see walk() method.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {

        if (!$element)
            return;

        $id_field = $this->db_fields['id'];

        // Display this element
        if (is_array($args[0]))
            $args[0]['has_children'] = !empty($children_elements[$element->$id_field]);

        // Adds the 'parent' class to the current item if it has children               
        if (!empty($children_elements[$element->$id_field])) {
            array_push($element->classes, 'parent');
            $element->title .= ' <span class="dropdown-arrow"></span>';
        }

        $cb_args = array_merge(array(&$output, $element, $depth), $args);

        call_user_func_array(array(&$this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // Descend only when the depth is right and there are childrens for this element
        if (($max_depth == 0 || $max_depth > $depth + 1 ) && isset($children_elements[$id])) {

            foreach ($children_elements[$id] as $child) {

                if (!isset($newlevel)) {
                    $newlevel = true;
                    // Start the child delimiter
                    $cb_args = array_merge(array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                }
                $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
            }
            unset($children_elements[$id]);
        }

        if (isset($newlevel) && $newlevel) {
            // End the child delimiter
            $cb_args = array_merge(array(&$output, $depth), $args);
            call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }

        // End this element
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);
    }

}
