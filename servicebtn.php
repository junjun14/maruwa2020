<section id="service">
    <div class="content-width">
    <h2 class="servicetitle subtitle">Service</h2>

        <div class="service-link-box-wrap">
            <div class="service-link-box"><?php // 賃貸仲介 ?>
                <a class="service-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <figure class="service-img">
                        <img width="640" height="395" src="<?php $imgpath='/images/rental-agency.jpg'; echo esc_url( get_theme_file_uri( $imgpath )); echo '?'.date('mdyHi',filemtime( get_theme_file_path( $imgpath ))); ?>" class="shop-btn" alt="賃貸仲介" loading="lazy">
                    </figure>
                    <p class="service-name">賃貸仲介</p>
                </a>
            </div>

            <div class="service-link-box"><?php // 賃貸管理 ?>
                <a class="service-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <figure class="service-img">
                        <img width="640" height="395" src="<?php $imgpath='/images/rental-manage.jpg'; echo esc_url( get_theme_file_uri( $imgpath )); echo '?'.date('mdyHi',filemtime( get_theme_file_path( $imgpath ))); ?>" class="shop-btn" alt="賃貸管理" loading="lazy">
                    </figure>
                    <p class="service-name">賃貸管理</p>
                </a>
            </div>

            <div class="service-link-box"><?php // 売買 ?>
                <a class="service-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <figure class="service-img">
                        <img width="640" height="395" src="<?php $imgpath='/images/buying.jpg'; echo esc_url( get_theme_file_uri( $imgpath )); echo '?'.date('mdyHi',filemtime( get_theme_file_path( $imgpath ))); ?>" class="shop-btn" alt="売買" loading="lazy">
                    </figure>
                    <p class="service-name">売買</p>
                </a>
            </div>

            <div class="service-link-box"><?php // リフォームメンテナンス ?>
                <a class="service-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <figure class="service-img">
                        <img width="640" height="395" src="<?php $imgpath='/images/renovation.jpg'; echo esc_url( get_theme_file_uri( $imgpath )); echo '?'.date('mdyHi',filemtime( get_theme_file_path( $imgpath ))); ?>" class="shop-btn" alt="リフォームメンテナンス" loading="lazy">
                    </figure>
                    <p class="service-name">リフォームメンテナンス</p>
                </a>
            </div>
        </div>

        <div class="learn-link-wrap">
            <a class="learn-more-link animation" href="<?php echo esc_url( home_url( '/' ) ); ?>">Learn more</a>
        </div>

    </div>
</section>
