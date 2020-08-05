<section class="portfolio-area">

    <?php
    $url = "https://butulog.com/wp-json/wp/v2/property?member=18,19,60&per_page=12&_embed";
    $json = file_get_contents($url);
    $arr = json_decode($json,true);
    ?>

    <?php
    foreach ($arr as $data):
    $title = $data["title"]["rendered"];
    //$date = date('Y年n月j日', strtotime($data["date"]));
    $link = $data["link"];
    $thum = $data["_embedded"]["wp:featuredmedia"][0]["media_details"]["sizes"]["medium"]["source_url"];
    ?>

    <section class="portfolio-list link-card">
        <a class="card-link animation" href="<?php echo $link; ?>">
            <figure class="card-photo">
                <img src="<?php echo $thum; ?>" alt="<?php echo $title; ?>">
            </figure>
            <div class="port-info">
                <h3 class="portfolio-title"><?php echo $title; ?></h3>
            </div>
        </a>
    </section>

    <?php endforeach; ?>



</section>
