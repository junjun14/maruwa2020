<article class="archive-link-box">
    <a class="archive-link animation" href="<?php the_permalink(); ?>">
        <figure class="blog-photo animation">
            <?php if ( has_post_thumbnail() ): // Processing when there is a thumbnail ?>
            <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'blog-eyecatch animation', 'loading' =>'lazy')); ?>
            <?php else: // Processing when there is no thumbnail ?>
            <img width="400" height="225" src="<?php echo esc_url( get_theme_file_uri( '/images/no-photo-l.svg' ) ); ?>" alt="No Photo" class="blog-eyecatch animation">
            <?php endif; ?>
        </figure>
        <div class="blog-link-info">
            <h3 class="blog-title"><?php echo esc_html( get_the_title() ); ?></h3>
            <div class="blog-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 64 , '...' ); ?></div>
        </div>
        <time class="blog-day"><span class="icon-clock"></span><?php the_time('Y.m.d'); ?></time>
    </a>
</article>
