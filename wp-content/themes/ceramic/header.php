<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php bloginfo('name'); ?></title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,600' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <?php wp_head(); ?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/images/favicon.ico'; ?>" />
    </head>
    <body <?php body_class(); ?>>
        <!--    HEADER  -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="header">
                        <div class="col-md-3">
                            <?php if (get_theme_mod('customize_logo_settings')) : ?>
                                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                                    <img width="121" height="96" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url(get_theme_mod('customize_logo_settings')); ?>"/>
                                </a>
                            <?php else : ?>
                                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                                    <img width="121" height="96" alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri() . '/images/th-ceramic-logo.png'; ?>"/>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-9">
                            <div class="row">
                                <?php get_search_form(); ?>

                                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 social-link-container">
                                    <div class="product-basket">
                                        <?php echo __('Wish List', 'ceramic'); ?><b> 5</b>
                                    </div>
                                    <div class="social-link">
                                        <a target="_blank" href="<?php echo types_render_field('externallinks-url', array('post_id' => 96, 'output' => 'raw')); ?>">
                                            <img src="<?php echo get_template_directory_uri() . '/images/wordpress-icon.png'; ?>">
                                        </a>
                                        <a target="_blank" href="<?php echo types_render_field('externallinks-url', array('post_id' => 95, 'output' => 'raw')); ?>">
                                            <img src="<?php echo get_template_directory_uri() . '/images/instagram-icon.png'; ?>">
                                        </a>
                                        <a target="_blank" href="<?php echo types_render_field('externallinks-url', array('post_id' => 94, 'output' => 'raw')); ?>">
                                            <img src="<?php echo get_template_directory_uri() . '/images/facebook-icon.png'; ?>">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 no-padding-left">
                                    <hr class="no-margin-bottom" />    
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                $walker = new Nfr_Menu_Walker();
                                $args = array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'primary-menu',
                                    'container' => '',
                                    'walker' => $walker
                                );
                                ?>
                                <?php wp_nav_menu($args); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="main-slider relative">
            <?php echo do_shortcode("[huge_it_slider id='2']"); ?>
            <div class="absolute-container no-height">
                <div class="container no-height">                    
                    <div class="row no-height">
                        <hr class="slider-devider" />
                        <div class="col-md-3 menu-sidebar">
                            <?php
                            $walker = new Nfr_Menu_Walker();
                            $args = array(
                                'theme_location' => 'sidebar',
                                'menu_class' => 'sidebar-menu',
                                'container' => '',
                                'walker' => $walker
                            );
                            ?>
                            <?php wp_nav_menu($args); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--      End Header      -->