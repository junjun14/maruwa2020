<?php
/**
 * The home template file.
 *
 * This is the theme file in the WEB site EXAMPLE
 * and one of the two required files for a theme (the other being style.css).
 * This template is used to Top page.
 *
 * @package example.net
 * @subpackage EXAMPLE
 */
get_header(); // Including header.php ?>

<main id="main">
    <article id="article" <?php post_class(); ?>>
        <?php get_template_part('headerimg'); // Including headerimg.php ?>
        <div class="page-sec content-width">
            <div class="page-area content-wrap">
                <h2><span class="line-title">お探しのページは見つかりませんでした。</span></h2>
                <ul class="notfound-ul">
                    <li class="notfound-li">アドレス（URL）が変更されている可能性があります。</li>
                    <li class="notfound-li">アドレス（URL）を入力ミスしている可能性があります。</li>
                    <li class="notfound-li">何らかの理由（情報が古くなった等）でページが削除されている可能性があります。</li>
                </ul>

                <div class="center-btn-wrap list-mv01">
                    <a class="center-btn animation" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="icon-home"></span>HOMEに戻る</a>
                </div>

            </div>
        </div>

    </article>
</main>

<?php get_footer(); // Including footer.php ?>
