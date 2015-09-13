<?php

function ceramic_resources() {
    wp_enqueue_style('style', get_stylesheet_uri());
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
    $wp_customize->add_setting('ceramic_link_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_setting('ceramic_button_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',
    ));

    $wp_customize->add_section('ceramic_standard_colors', array(
        'title' => __('Standard Colors', 'ceramic'),
        'priority' => 30,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ceramic_link_color_control', array(
        'label' => __('Link Color', 'ceramic'),
        'section' => 'ceramic_standard_colors',
        'settings' => 'ceramic_link_color'
    )));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ceramic_button_color_control', array(
        'label' => __('Button Color', 'ceramic'),
        'section' => 'ceramic_standard_colors',
        'settings' => 'ceramic_button_color'
    )));
}

add_action('customize_register', 'ceramic_customize_register');

// Output Customize CSS
function ceramic_customize_css() {
    ?>
    <style type="text/css">
        a:link,
        a:visited {
            color: <?php echo get_theme_mod('ceramic_link_color'); ?> 
        }

        .site-header nav ul li.current-menu-item a:link,
        .site-header nav ul li.current-menu-item a:visited,
        .site-header nav ul li.current-page-ancestor a:link,
        .site-header nav ul li.current-page-ancestor a:visited {
            background-color: <?php echo get_theme_mod('ceramic_link_color'); ?>;
            color: #fff;
        }
        
        div.hd-search #searchsubmit {
            background-color: <?php echo get_theme_mod('ceramic_button_color'); ?>;
        }
    </style>
<?php
}

add_action('wp_head', 'ceramic_customize_css');
