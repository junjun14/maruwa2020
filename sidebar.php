<aside id="aside" class="sidebar-wrap">

    <h3 class="aside-title"><span class="icon-folder"></span>カテゴリ</h3>
    <ul class="archives-list aside-link">
        <?php
        $args = array(
            'orderby' => 'name'
        );
        $categories = get_categories( $args );
        foreach ( $categories as $category ) {
            $cat_link = get_category_link($category->cat_ID);
            echo '<li class="category-list__item"><a href="' . $cat_link . '">' . $category->name . '</a></li>';
        }
        ?>
    </ul>

    <?php /*
    <h3 class="archives-title">ARCHIVES</h3>
    <ul class="archives-list aside-link">
        <?php // limit=12ヶ月
        $args = array(
            'type'            => 'monthly',
            'limit'           => '12',
            'format'          => 'html',
            'before'          => '',
            'after'           => '',
            'show_post_count' => false,
            'echo'            => 1,
            'order'           => 'DESC',
            'post_type'     => 'post'
        );
        wp_get_archives( $args ); ?>
    </ul>
    */?>
</aside>
