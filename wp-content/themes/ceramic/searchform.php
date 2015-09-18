<?php
$taxonomy = 'product_cat';
$show_count = 0;      // 1 for yes, 0 for no
$pad_counts = 0;      // 1 for yes, 0 for no
$hierarchical = 0;    // 1 for yes, 0 for no  
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
<form class="first-row col-lg-9 col-md-8 col-sm-12 col-xs-12" role="search" method="get" action="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>">
    <div class="row">
        <input type="hidden" name="post_type" value="product" />
        <input class="col-md-7 col-sm-12 col-xs-12 search-box" name="s" type="text" placeholder="<?php echo (the_search_query()) ? the_search_query() : __('Search', 'ceramic'); ?>" />
        <div class="col-md-5 col-sm-12 col-xs-12 product-list-input">
            <span class="product-devider"></span>
            <span class="dropdown-arrow"></span>
            <select required name="category">
                <option value="" disabled selected><?php echo __('Product Categories', 'ceramic'); ?></option>
                <?php if (count($all_categories)) : ?>
                    <?php
                    foreach ($all_categories as $cat) :
                        if ($cat->category_parent == 0) {
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
                            if ($sub_cats) {
                                echo '<optgroup label="' . $cat->name . '">';
                                foreach ($sub_cats as $sub_category) :
                                    ?>
                                    <option value="<?php echo $sub_category->slug ?>" <?php echo ($sub_category->slug == $_GET['category']) ? 'selected' : ''; ?>> 
                                    <?php echo $sub_category->name; ?>
                                    </option>
                                <?php
                                endforeach;
                                echo '</optgroup>';
                            } else { ?>
                                <option value="<?php echo $cat->slug ?>" <?php echo ($cat->slug == $_GET['category']) ? 'selected' : ''; ?>> 
                                <?php echo $cat->name; ?>
                                </option>
                            <?php }
                                
                        }
                        ?>                               

                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit" class="submit-search-btn"></button>
    </div>
</form>