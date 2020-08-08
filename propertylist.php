<section class="portfolio-area">
    <div class="content-width">
    <h2 class="maruwatitle subtitle">Maruwaの管理</h2>
    </div>
    <div class="swiper-container butulog-container">
    <div class="swiper-wrapper butulog-wrap">
    <?php
    $url = "https://butulog.com/wp-json/wp/v2/property?member=60&per_page=12&_embed";
    $json = file_get_contents($url);
    $arr = json_decode($json,true);
    ?>

    <?php
        foreach ($arr as $data):
        $title = $data["title"]["rendered"];
        //$date = date('Y年n月j日', strtotime($data["date"]));
        $link = $data["link"];
        $thum = $data["_embedded"]["wp:featuredmedia"][0]["media_details"]["sizes"]["thumbnail"]["source_url"];
        $add = $data["post_meta"]["address"]; // 所在地
        $finidate = $data["post_meta"]["finished_date"]; // 築年数
        $units = $data["post_meta"]["total_units"]; // 総戸数
        $controlled = $data["post_meta"]["controlled_com"]; //管理会社
        //$controlled = $data["post_meta"]["controlled_com"]; //管理会社
    ?>

    <article class="portfolio-list link-card swiper-slide">
        <a class="card-link animation no-icon" href="<?php echo $link; ?>" target="_blank" rel="noopener noreferrer">
            <figure class="butulog-photo">
                <img src="<?php echo $thum; ?>" alt="<?php echo $title; ?>">
            </figure>
            <div class="port-info">
                <h3 class="portfolio-title"><?php echo $title; ?></h3>
                <table class="property-info" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td class="pro-info-item">所在地</td>
                            <td><?php echo $add; ?></td>
                        </tr>
                        <tr>
                            <td class="pro-info-item">築年月</td>
                            <td><?php echo $finidate; ?></td>
                        </tr>
                        <tr>
                            <td class="pro-info-item">総戸数</td>
                            <td><?php echo $units; ?></td>
                        </tr>
                        <tr>
                            <td class="pro-info-item">管理</td>
                            <td><?php echo $controlled; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </a>
    </article>

    <?php endforeach; ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="learn-link-wrap">
        <a class="learn-more-link white-bg animation" href="<?php echo esc_url( home_url( '/management/' ) ); ?>">Learn more</a>
    </div>

</section>
