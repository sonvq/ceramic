<footer class="site-footer">
    <div class="footer-top-divider"></div>
    <div class="container footer-top-content">
        <div class="row">
            <div class="col-md-6">
                <?php
                $args = array(
                    'theme_location' => 'sitemap',
                    'menu_class' => 'sitemap-menu',
                    'container' => ''
                );
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php wp_nav_menu($args); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="footer-logo col-md-3">
                        <a class="" href="<?php echo esc_url(home_url('/')); ?>">
                            <img width="87" height="87" alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri() . '/images/footer-logo.png'; ?>"/>
                        </a>
                        <span class="footer-logo-divider"></span>
                    </div>
                    <div class="footer-contact col-md-9">
                        <?php if (is_active_sidebar('footer-contact-text')): ?>
                            <?php dynamic_sidebar('footer-contact-text'); ?>    
                        <?php endif; ?>                        
                    </div>
                </div>
                    
            </div>
            <div class="col-md-2">
                <?php echo __('Information', 'ceramic'); ?>
                <?php
                $args = array(
                    'theme_location' => 'footer',
                    'menu_class' => 'footer-menu',
                    'container' => ''
                );
                ?>
                <?php wp_nav_menu($args); ?>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>   

<script>
    (function ($) {
        $(document).ready(function () {
            $(".about-us-home").backstretch("<?php echo get_template_directory_uri() . '/images/about-bg.png'; ?>");
            $(".why-ceramics-data").backstretch("<?php echo get_template_directory_uri() . '/images/why-ceramics-bg.png'; ?>");
            
        });
    }(jQuery));

</script>

</body>
</html>