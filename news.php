<section id="news">
    <h2 class="newstitle subtitle">News</h2>
    <?php
    $query = new WP_Query(array(
        'post_type' => 'post',
        'no_found_rows' => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'paged' => $paged,
    ));
    $count = 0;
    if($query->have_posts()):
    while($query->have_posts()) : $query->the_post(); ?>
    <?php get_template_part('newsinfo'); // Including newso ?>
    <div class="learn-link-wrap">
        <a class="learn-more-link white-bg animation" href="<?php echo esc_url( home_url( '/' ) ); ?>">Learn more</a>
    </div>
    <?php endwhile; ?>
    <?php else : ?>
    <p>Article does not exist. orz...</p>
    <?php endif; wp_reset_postdata(); ?>
</section>
