<?php $project_counter = new WP_Query('post_type=project-counter&posts_per_page=4'); ?>
<?php if ($project_counter->have_posts()): ?>
    <section class="why-ceramics-data">
        <div class="container">
            <div class="row">
                <?php while ($project_counter->have_posts()): $project_counter->the_post(); ?>
                    <div class="col-md-3 counter">
                        <p data-from="0" data-to="<?php echo types_render_field('number-counter', array('post_id' => get_the_ID(), 'output' => 'raw')); ?>" data-speed="1500" data-refresh-interval="50" class="timer counter-number">0</p>
                        <p class="counter-divider"></p>
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