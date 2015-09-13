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
    // Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu'),
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
        'name' => 'Footer Area 1',
        'id' => 'footer1'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 2',
        'id' => 'footer2'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 3',
        'id' => 'footer3'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 4',
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
        'title' => __('Logo', 'ceramic'),
        'priority' => 30,
        'description' => 'Upload a logo to replace the default site logo'
    ));

    $wp_customize->add_setting('customize_logo_settings');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'customize_logo_control', array(
        'label' => __('Add Logo', 'ceramic'),
        'section' => 'customize_logo_section',
        'settings' => 'customize_logo_settings'
    )));
}

add_action('customize_register', 'ceramic_customize_register');
