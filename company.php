<?php
$paged = get_query_var('paged') ?: 1;
$args = array (
    'post_type' => 'company',
    'no_found_rows' => true,
    'update_post_meta_cache' => true,
    'update_post_term_cache' => true,
    'order' => 'ASC',
    'post_status' => 'publish',
    'paged' => $paged,
    'posts_per_page' => -1,
);
$the_query = new WP_Query( $args );
?>
<?php if( $the_query -> have_posts() ): ?>
<section class="com-box">

    <div class="content-width">
    <h2 class="comtitle subtitle-white">Company</h2>
    </div>
        <div class="swiper-container com-container">
            <div class="swiper-wrapper">
                <?php while ( $the_query -> have_posts()): $the_query -> the_post(); ?>

                <div class="staff-box swiper-slide">
                    <div class="staff-link ripple animation">

                        <div class="com-info-wrap">
                            <p class="com-info no-margin"><?php echo wp_trim_words( get_the_title(), 24 , '...' ); ?></p>
                        </div>
                        <figure class="photo-wrap animation">
                            <?php if ( has_post_thumbnail() ): // アイキャッチがある場合 ?>
                            <?php echo the_post_thumbnail('medium', array('class' => 'staff-img card-img animation')); ?>
                            <?php else: // アイキャッチがない場合 ?>
                            <img width="640" height="480" src="<?php echo esc_url( get_theme_file_uri( '/images/no-staff.svg' ) ); ?>" alt="No Photo" class="staff-img card-img animation">
                            <?php endif; ?>
                        </figure>

                    </div>
                </div>

                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
        </div>

</section>
<?php endif; wp_reset_postdata(); ?>
