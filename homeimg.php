<div class="swiper-container home-container">
    <div class="swiper-wrapper host-swiper">
        <figure class="swiper-slide other-photo">
            <img width="715" height="242" src="https://www.housemate-navi.jp/network/bunner/img/10_network_715-242.jpg?<?php echo date("YmdHis");?>" class="attachment-full size-full" alt="物件のこと何でも話せる友がいる、ハウスメイト">
        </figure>
        <?php if( have_rows('home_img_pc') ): ?>
        <?php while( have_rows('home_img_pc') ): the_row();
            $image = get_sub_field('home_imgs_pc');
        ?>
        <figure class="swiper-slide other-photo">
            <?php echo wp_get_attachment_image( $image, 'homeimg' ); ?>
        </figure>

        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>
