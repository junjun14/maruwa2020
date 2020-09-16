<?php
/**
Template Name: page-maruwa
 * The home template file.
 *
 * This is the theme file in the WEB site MARUWA
 * and one of the two required files for a theme (the other being style.css).
 * This template is used to Top page.
 *
 * @package example.net
 * @subpackage MARUWA
 */

get_header(); // Including header.php ?>

<main id="main">
    <article id="article" <?php post_class(); ?>>
        <?php get_template_part('headerimg'); // Including headerimg.php ?>
        <?php get_template_part('breadcrumb'); // Including breadcrumb ?>
        <div class="page-sec content-width">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="page-area content-wrap">

                <div class="butulog-management">

                <?php
                $url = "https://butulog.com/wp-json/wp/v2/property?member=63&per_page=24&_embed";
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

                <article class="portfolio-list link-card butulog-manage-card">
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

                <div class="learn-link-wrap">
                    <a class="learn-more-link animation no-icon" href="https://butulog.com/member/maruwa/" target="_blank" rel="noopener">Learn more</a>
                </div>

                <time class="post-up-day txt-lightgray" datetime="<?php the_modified_date('c'); ?>"><span class="icon-spinner11"></span><?php the_modified_date('Y.m.d'); ?></time>
                <?php get_template_part('share-button'); // Including share-button.php ?>

            </div>
            <?php endwhile; ?>
            <?php else : ?>
            <h2 class="title">Not Found.</h2>
            <?php endif; ?>
        </div>

    </article>
</main>

<?php get_footer(); // Including footer.php ?>
