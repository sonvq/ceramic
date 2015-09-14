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

if (count($all_categories)) {
    foreach ($all_categories as $key => $cat) {
        if ($cat->category_parent == 0) {
            unset($all_categories[$key]);
        }
    }
}
?>
<form class="first-row col-md-9 col-sm-12 col-xs-12" role="search" method="get" action="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>">
    <div class="row">
        <input type="hidden" name="post_type" value="product" />
        <input class="col-md-7 col-sm-12 col-xs-12 search-box" name="s" type="text" placeholder="<?php echo (the_search_query()) ? the_search_query() : __('Tìm kiếm', 'ceramic'); ?>" />
        <div class="col-md-5 col-sm-12 col-xs-12 product-list-input">
            <span class="product-devider"></span>
            <select required name="category">
                <option value="" disabled selected><?php echo __('Danh mục sản phẩm', 'ceramic'); ?></option>
                <?php if (count($all_categories)) : ?>
                    <?php foreach ($all_categories as $single_category) : ?>
                        <option value="<?php echo $single_category->slug?>" <?php echo ($single_category->slug == $_GET['category']) ? 'selected' : ''; ?>> 
                            <?php echo $single_category->name; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>

            </select>
        </div>
        <button type="submit">Submit</button>
    </div>
</form>