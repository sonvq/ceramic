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
                            <?php if(get_theme_mod('customize_logo_settings')) : ?>
                                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img width="121" height="96" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url(get_theme_mod('customize_logo_settings')); ?>"/>
                                </a>
                            <?php else : ?>
                                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
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

                            <!--<hr />-->

                            <!-- NAVIGATION BAR -->
                            <nav class="row navbar navbar-default">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <!--<a class="navbar-brand" href="#">Brand</a>-->
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li><a href="#">TRANG CHỦ</a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TH SỨ <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Menu 1</a></li>
                                                    <li><a href="#">Menu 2</a></li>
                                                    <li><a href="#">3</a></li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TH GỐM <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Menu 1</a></li>
                                                    <li><a href="#">Menu 2</a></li>
                                                    <li><a href="#">3</a></li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DỰ ÁN <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Menu 1</a></li>
                                                    <li><a href="#">Menu 2</a></li>
                                                    <li><a href="#">3</a></li>
                                                </ul>
                                            </li>

                                            <li><a href="#">TH CERAMICS</a></li>
                                            <li><a href="#">LIÊN HỆ</a></li>
                                        </ul>

                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="#"><img src="images/facebook_icon.png"></a></li>
                                            <li><a href="#"><img src="images/camera_icon.png"></a></li>
                                            <li><a href="#"><img src="images/wordpress_icon.png"></a></li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                            <!-- END NAVIGATION BAR-->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--      End Header      -->
        
        <!-- site-header -->
        <header class="site-header">
            <div class="hd-search">
                <?php get_search_form(); ?>
            </div>
            <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <h5>
                <?php bloginfo('description'); ?>
                <?php if (is_page('lien-he')) : ?>
                    - Thank you for viewing contact page
                <?php endif; ?>
            </h5>


            <nav class="site-nav">
                <?php
                $args = array(
                    'theme_location' => 'primary'
                );
                ?>
                <?php wp_nav_menu($args); ?>
            </nav>
        </header>