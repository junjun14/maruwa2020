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
        <?php get_template_part('breadcrumb'); // Including breadcrumb ?>
        <div class="page-sec towcolum content-width">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="page-area content-wrap">

                <div class="modified-date txt-gray">
                    <time class="post-info-day"><span class="icon-clock"></span><?php the_time('Y.m.d') ?></time>
                    <time class="post-mod-day"><span class="icon-spinner11"></span><?php the_modified_date('Y.m.d'); ?></time>
                    <span class="post-info-cat"><span class="icon-folder"></span><?php echo '', get_the_category_list( '&nbsp;,&nbsp;' ); ?></span>
                </div>

                <?php the_content(); ?>

            </div>
            <?php endwhile; ?>
            <?php else : ?>
            <h2 class="title">Not Found.</h2>
            <?php endif; ?>
            <?php get_sidebar(); // Including sidebar.php ?>
        </div>

        <div class="content-width">
            <?php get_template_part('share-button'); // Including share-button.php ?>
        </div>

    </article>
</main>

<?php get_footer(); // Including footer.php ?>
