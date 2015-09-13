<?php get_header(); ?>
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

