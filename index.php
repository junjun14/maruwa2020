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
        <div class="page-sec content-width">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="page-area content-wrap">
                <?php the_content(); ?>

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
