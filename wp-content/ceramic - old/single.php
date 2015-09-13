<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('content', get_post_format());
    endwhile;

else:
    echo '<p>No content found</p>';
endif;

get_footer();
?>
