<?php
/**
Template Name: page-all
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
        <div class="page-sec towcolum content-width">
            <div class="archive-body content-wrap">
                <?php
                $paged = (int) get_query_var('paged');
                $args = array (
                    //'posts_per_page' => 2,
                    'paged' => $paged,
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                );
                $the_query = new WP_Query( $args );
                ?>
                <?php if( $the_query -> have_posts() ): while ( $the_query -> have_posts()): $the_query -> the_post(); ?>

                <?php get_template_part('archivepost'); // Including archivepost.php ?>

            <?php endwhile; ?>

            <?php else : ?>
            <h2 class="title">Not Found.</h2>
            <?php endif; wp_reset_postdata() ?>

                <div id="tablenav" class="content-width">
                    <?php
                        if ($the_query->max_num_pages > 1){ // ページナビゲーション
                            echo paginate_links(
                                array(
                                    'base' => get_pagenum_link(1).'%_%',
                                    'format' => 'page/%#%/',
                                    'current' => max(1, $paged),
                                    'total' => $the_query->max_num_pages,
                                    'prev_next' => true,
                                    'prev_text' => '« 前へ',
                                    'next_text' => '次へ »',
                                )
                            );
                        }
                    ?>

                    <?php // page_navigation(); ?>
                </div>

            </div>
            <?php get_sidebar(); // Including sidebar.php ?>
        </div>

    </article>
</main>

<?php get_footer(); // Including footer.php ?>
