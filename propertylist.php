<div class="property-area">
<?php
    $url = "https://butulog.com/wp-json/wp/v2/property?per_page=12&_embed";
    //$url = "https://butulog.com/wp-json/wp/v2/property?workscats=15&per_page=12&_embed";
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

<article class="property-list link-card">
    <a class="card-link animation" href="<?php echo $link; ?>">
        <figure class="property-photo">
            <img src="<?php echo $thum; ?>" alt="<?php echo $title; ?>">
        </figure>
        <div class="property-info">
            <h3 class="property-title"><?php echo $title; ?></h3>
        </div>
    </a>
</article>

<?php endforeach; ?>

</div>
