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
    <article id="article">
        <?php get_template_part('headerimg'); // Including headerimg.php ?>
        <?php get_template_part('breadcrumb'); // Including breadcrumb ?>
        <div class="page-sec towcolum content-width">
            <div class="archive-body content-wrap">
            <?php if(have_posts()): while (have_posts()):the_post(); ?>

                <?php get_template_part('archivepost'); // Including archivepost.php ?>

            <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>

                <div id="tablenav" class="content-width">
                    <?php page_navigation(); ?>
                </div>

            </div>

            <?php get_sidebar(); // Including sidebar.php ?>
        </div>
    </article>
</main>

<?php get_footer(); // Including footer.php ?>
