<?php get_header(); ?>

<!-- 3 status post list -->
<?php get_template_part('statuspostlist', get_post_format()); ?>

<!-- Product list -->
<?php get_template_part('productlist', get_post_format()); ?>

<!-- About us -->
<section class="about-us-home">
    <div class="container">
        <div class="row">
            <div class="about-us-content col-md-6 col-md-offset-5">
                <?php echo types_render_field('page-short-description', array('post_id' => 155, 'output' => 'html')); ?>
            </div>
        </div>
    </div>    
</section>

<!-- Project list -->
<?php get_template_part('projectlist', get_post_format()); ?>

<!-- Why Ceramics, statistic -->
<?php get_template_part('projectcount', get_post_format()); ?>

<!-- News list -->
<?php get_template_part('newslist', get_post_format()); ?>

<!-- Footer -->
<?php get_footer(); ?>

