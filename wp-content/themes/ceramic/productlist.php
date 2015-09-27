<?php
$taxonomy = 'product_cat';
$show_count = 0;
$pad_counts = 0;
$hierarchical = 0;
$title = '';
$empty = 0;

$args = array(
    'taxonomy' => $taxonomy,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty
);
$all_categories = get_categories($args);
?>
<section class="product-list-container container">
    <?php if (count($all_categories)) : ?>
        <?php
        foreach ($all_categories as $cat) :
            if ($cat->category_parent == 0) :
                $category_id = $cat->term_id;

                $args2 = array(
                    'taxonomy' => $taxonomy,
                    'child_of' => 0,
                    'parent' => $category_id,
                    'orderby' => $orderby,
                    'show_count' => $show_count,
                    'pad_counts' => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li' => $title,
                    'hide_empty' => $empty
                );
                $sub_cats = get_categories($args2);
                $countProducts = $cat->count;
                if ($sub_cats && ($countProducts > 0)) :
                    ?>                
                    <div class="row product-list-title">
                        <div class="separate-horizontal-line"></div>
                        <div class="contentblock-title">
                            <p class="bold-title"><?php echo $cat->name; ?></p>
                        </div>
                        <div class="separate-horizontal-line"></div>
                    </div>
                    <div class="row effect-2">
                        <?php
                        $args = array('post_type' => 'product', 'stock' => 1, 'posts_per_page' => 8, 'product_cat' => $cat->slug, 'orderby' => 'date', 'order' => 'ASC');
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            global $product;
                            ?>
                            <div class="col-md-3 single-product">    

                                <a class="product-list-item" href="<?php echo get_permalink($loop->post->ID) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                    <?php
                                    if (has_post_thumbnail($loop->post->ID))
                                        echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                                    else
                                        echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" />';
                                    ?>
                                    <?php 
                                        $now = time(); 
                                        $postDate = strtotime($loop->post->post_date);
                                        $timeDiff = $now - $postDate;
                                        $dateDiff = floor($timeDiff/(60*60*24));
                                        if ($dateDiff < 10) {
                                            echo '<span class="new-product-sticker">' . __("NEW", "ceramic") . '</span><span class="arrow-down-sticker"></span>';
                                        }
                                    ?>
                                    <div class="product-detail">
                                        <h3><?php the_title(); ?></h3>
                                        <p class="sku-product-list">
                                            <?php echo __('Product Code', 'ceramic') . ': '; ?>
                                            <?php if ($product->get_sku()) : ?>
                                                <?php echo $product->get_sku(); ?>
                                            <?php else : ?>
                                                <?php echo 'None'; ?>
                                            <?php endif; ?>
                                        </p>
                                        <div class="hover-product-zoom"></div>
                                    </div>
                                </a>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                    <?php
                endif;
            endif;
            ?>                               

        <?php endforeach; ?>
    <?php endif; ?>
</section>