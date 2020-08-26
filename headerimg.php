<div class="hero-img-wrap content-width">
<?php if(is_single() || is_page() ): ?>
<figure class="hero-photo no-print">
    <?php if ( has_post_thumbnail() ): // Processing when there is a thumbnail ?>
    <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'header-photo', 'loading' =>'lazy')); ?>
    <?php else: ?>
    <img width="1920" height="1080" src="<?php echo esc_url( get_theme_file_uri( '/images/no-thumbnail.jpg' ) ); ?>" class="header-photo" alt="">
    <?php endif; ?>
</figure>
<?php elseif(is_archive() ): ?>
<figure class="hero-photo no-print">
    <img width="1920" height="480" src="<?php echo esc_url( get_theme_file_uri( '/images/no-thumbnail.jpg' ) ); ?>" class="header-photo" alt="ARCHIVE">
</figure>
<?php elseif(is_404() ): ?>
<figure class="hero-photo no-print">
    <img width="1920" height="1080" src="<?php echo esc_url( get_theme_file_uri( '/images/404-img.jpg' ) ); ?>" class="header-photo" alt="404">
</figure>
<?php endif; ?>

<?php if(is_archive() ): ?>
    <?php the_archive_title( '<h1 id="page-title" class="head-line"><span class="icon-folder"></span>','</h1>' ); ?>
<?php elseif(is_404() ): ?>
    <h1 id="page-title" class="head-line">404 Not Found!!</h1>
<?php elseif(is_page() ): ?>
    <?php the_title( '<h1 id="page-title" class="head-line">','</h1>' ); ?>
<?php else: ?>
    <?php the_title( '<h1 id="page-title" class="head-line">','</h1>' ); ?>
<?php endif; ?>
</div>
