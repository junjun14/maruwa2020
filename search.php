<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package d-vision-create.com
 * @subpackage dvision2020
 */

get_header();// header.phpを読み込む ?>

<main id="main">
    <div id="archives" <?php post_class(); ?>>
        <?php get_template_part('headerimg'); // Including headerimg.php ?>
        <?php get_template_part('breadcrumb'); // Including breadcrumb ?>
        <div id="archives-box" class="twocolumn content-width">
            <div class="article-area">
                <?php if (isset($_GET['s']) && empty($_GET['s'])): //キーワード未入力時 ?>
                    <p>検索キーワードが入力されていないようです。<br />お手数ですが、検索フォームにキーワードを入力して再度検索してください。</p>
                    <?php get_search_form() ?>
                <?php else : ?>
                <?php if (have_posts()) : //検索が見つかった時  ?>
                <?php // $allsearch =& new WP_Query("s=$s&showposts=-1"); ?>
                <?php get_search_form() ?>
                <p class="seach-txt"><strong>&quot;<?php echo get_search_query(); ?>&quot;</strong>で検索した結果<strong><?php echo $wp_query->found_posts; ?>件</strong>の情報が見つかりました。</p>
                <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('searchloop'); // Including searchloop.php ?>
                <?php endwhile; ?>
                <?php page_navigation(); ?>
                <?php else : //ページが見つからなかった時 ?>
                    <p>該当するキーワードがあるページが見つかりません...<br />お手数ですが、検索フォームに別のキーワードを入力して再度検索してください。</p>
                    <?php get_search_form() ?>   
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php get_sidebar(); // Including sidebar.php ?> 
        </div>

    </div>
</main>

<?php get_footer(); // footer.phpを読み込む ?>
