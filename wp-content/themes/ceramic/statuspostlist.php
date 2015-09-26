<?php
$status_post = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'tax_query' => array(array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-status'),
            'operator' => 'IN'
        ))
    ));
?>
<?php if ($status_post->have_posts()): ?>
    <section class="hot-deal container">
        <div class="row">
            <?php while ($status_post->have_posts()): $status_post->the_post(); ?>
                <div class="col-md-4 status-block">
                    <div class="status-block-content">
                        <p class="status-excerpt">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                        <span class="status-title-line"></span>
                        <p class="status-title">
                            <?php echo wordwrap(get_the_title(), 15, "<br />\n"); ?>
                        </p>
                        <p class="status-link">
                            <a href="<?php the_permalink(); ?>"><?php echo __("More info", "ceramic"); ?><span class="link-arrow"></span></a>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>