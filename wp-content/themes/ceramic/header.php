<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
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

                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <div class="product-basket">
                                        <?php echo __('Wish List', 'ceramic'); ?><b> 5</b>
                                    </div>
                                </div>

                                <div class="social-link col-md-1 col-sm-12 col-xs-12">                                    
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

                            <div class="row">
                                <hr class="no-margin-bottom" />    
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
        <section class="main-slider">
            <?php echo do_shortcode("[huge_it_slider id='2']"); ?>
        </section>
        <!--      End Header      -->