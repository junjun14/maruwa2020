<article class="post-list post-box">
    <a class="news-link ripple" href="<?php the_permaLink(); ?>">
        <figure class="card-photo">
            <?php if ( has_post_thumbnail() ): // Processing when there is a thumbnail ?>
            <?php echo get_the_post_thumbnail($post->ID, 'minimg', array('class' => 'newsthumbnail animation', 'loading' =>'lazy')); ?>
            <?php else: // Processing when there is no thumbnail ?>
            <img width="96" height="96" src="<?php echo esc_url( get_theme_file_uri( '/images/no-photo.svg' ) ); ?>" alt="No Photo" class="newsthumbnail animation">
            <?php endif; ?>
        </figure>
        <div class="post-info-wrap">
            <div class="post-info-area">
                <h3 class="news-title">
                    <?php echo mb_strimwidth($post->post_title, 0, 112, "&hellip;", "UTF-8"); ?>
                </h3>
            </div>
            <div class="news-time"><span class="icon-clock"></span><?php the_time('Y.m.d'); ?></div>
            <?php $days=7; $today=date('U'); $entry=get_the_time('U'); $diff1=date('U',($today - $entry))/86400; if ($days > $diff1) { echo '<p class="new-mark">UP</p>'; } ?>
        </div>
    </a>
</article>
