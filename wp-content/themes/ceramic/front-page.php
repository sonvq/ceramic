<?php get_header(); ?>
<section class="why-ceramics">
    <div class="separate-horizontal-line"></div>
    <div class="contentblock-title">
        <p class="normal-title"><?php echo __("Why choose", "ceramic"); ?></p> 
        <p class="bold-title"><?php echo get_bloginfo('name'); ?></p>
    </div>
    <div class="separate-horizontal-line"></div>
</section>
<?php $project_counter = new WP_Query('post_type=project-counter&posts_per_page=4'); ?>
<?php if ($project_counter->have_posts()): ?>
    <section class="why-ceramics-data">
        <div class="container">
            <div class="row">
                <?php while ($project_counter->have_posts()): $project_counter->the_post(); ?>
                    <div class="col-md-3 counter">
                        <p data-from="0" data-to="<?php echo types_render_field('number-counter', array('post_id' => get_the_ID(), 'output' => 'raw')); ?>" data-speed="4000" data-refresh-interval="50" class="timer counter-number">0</p>
                        <p class="counter-title">
                            <?php the_title(); ?>
                        </p>
                        <p class="counter-description">
                            <?php echo types_render_field('description-counter', array('post_id' => get_the_ID(), 'output' => 'raw')); ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_template_part('productlist', get_post_format()); ?>

<div class="site-content clearfix">

    <h3>Custom HTML Here</h3>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;

    else:
        echo '<p>No content found</p>';
    endif;

    // opinion posts loop begins here
    //$myPosts = new WP_Query('cat=1&posts_per_page=2&orderby=title&order=ASC');
    $myPosts = new WP_Query('cat=1&posts_per_page=2');
    if ($myPosts->have_posts()) :
        while ($myPosts->have_posts()) : $myPosts->the_post();
            ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php
            the_excerpt();
        endwhile;

    else:
        echo '<p>No content found</p>';
    endif;
    wp_reset_postdata();
    ?>

    <span class="horiz-center"><a href="<?php echo get_category_link(1); ?>" class="btn-a">View all News Posts</a></span>    


</div>
<?php get_footer(); ?>

