<section id="news">
    <div class="content-width">
    <h2 class="newstitle subtitle">News</h2>
        <div id="topics">
        <ul class="tab flexbox fw">
            <li>All</li>
            <li>News</li>
            <li>Blog</li>
            <li>Works</li>
        </ul>
        <div class="info-area topicon">
        <div>
        <?php
        $query = new WP_Query(array(
            'post_type' => 'post',
            'no_found_rows' => true,
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'paged' => $paged,
        ));
        $count = 0;
        if($query->have_posts()):
        while($query->have_posts()) : $query->the_post(); ?>
        <?php get_template_part('newsinfo'); // Including newso ?>
        <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
        </div>
        <div class="hide">
            <?php
            $query = new WP_Query(array(
                'post_type' => 'post',
                'category_name' => 'news',
                'no_found_rows' => true,
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'paged' => $paged,
            ));
            $count = 0;
            if($query->have_posts()):
            while($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('newsinfo'); // Including newso ?>
            <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
        <div class="hide">
            <?php
            $query = new WP_Query(array(
                'post_type' => 'post',
                'category_name' => 'blog',
                'no_found_rows' => true,
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'paged' => $paged,
            ));
            $count = 0;
            if($query->have_posts()):
            while($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('newsinfo'); // Including newso ?>
            <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
        <div class="hide">
            <?php
            $query = new WP_Query(array(
                'post_type' => 'post',
                'category_name' => 'works',
                'no_found_rows' => true,
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'paged' => $paged,
            ));
            $count = 0;
            if($query->have_posts()):
            while($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('newsinfo'); // Including newso ?>
            <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
    </div>
        <div class="learn-link-wrap">
            <a class="learn-more-link white-bg animation" href="<?php echo esc_url( home_url( '/' ) ); ?>">Learn more</a>
        </div>
    </div>
</section>
