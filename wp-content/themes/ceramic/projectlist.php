<section class="project-list">
    <div class="separate-horizontal-line"></div>
    <div class="contentblock-title">
        <p class="bold-title"><?php echo __("Project", "ceramic"); ?></p> 
    </div>
    <div class="separate-horizontal-line"></div>
</section>
<?php
$args = array('post_type' => 'project', 'posts_per_page' => 9, 'orderby' => 'rand');
$project_list = new WP_Query($args);
?>
<?php if ($project_list->have_posts()): ?>
    <section class="project-list-home">
        <div class="container">
            <div class="row">
                <div class="grid effect-3" id="grid"></div>
                <div class="grid-invi">
                    <?php while ($project_list->have_posts()): $project_list->the_post(); ?>
                        <div class="gridSingleItem"> 
                            <div class="project-list-title-wrap">
                                <p class="project-list-title">
                                    <?php the_title(); ?>
                                </p>
                                <span class="arrow-right-white"></span>
                            </div>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>   
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>