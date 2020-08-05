<div class="swiper-container home-container">
    <div class="swiper-wrapper host-swiper">
        <?php if( have_rows('home_img_pc') ): ?>
        <?php while( have_rows('home_img_pc') ): the_row();
            $image = get_sub_field('home_imgs_pc');
        ?>
        <figure class="swiper-slide other-photo">
            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
        </figure>

        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>
