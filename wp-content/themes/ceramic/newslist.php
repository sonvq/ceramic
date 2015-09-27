<section class="news-list">
    <div class="separate-horizontal-line"></div>
    <div class="contentblock-title">
        <p class="bold-title"><?php echo __("News", "ceramic"); ?></p> 
    </div>
    <div class="separate-horizontal-line"></div>
</section>
<?php
$status_post = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'tax_query' => array(array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
            'operator' => 'NOT IN'
        ))
        ));
?>
<?php if ($status_post->have_posts()): ?>
    <section class="news-list-wrap">
        <div class="container">
            <div class="row">
                <div id="news-carousel" class="multiple-items">
                <?php while ($status_post->have_posts()): $status_post->the_post(); ?>
                    <div class="col-md-3 news-block">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        <?php endif; ?>
                        <p class="news-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php echo get_the_title(); ?>
                            </a>
                        </p>
                        <p class="news-time"><?php echo get_the_time('d/m/Y - H:i'); ?></p>
                        <p class="news-excerpt">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>