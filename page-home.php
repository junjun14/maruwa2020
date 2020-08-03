<?php
/**
Template Name: page-home
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
        <?php get_template_part('homeimg'); // Including homeimg.php ?>
        <div class="page-sec content-width">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="page-area content-wrap">
                <?php the_content(); ?>
            </div>
            <?php endwhile; ?>
            <?php else : ?>
            <h2 class="title">Not Found.</h2>
            <?php endif; ?>
        </div>

    </article>
</main>

<?php get_footer(); // Including footer.php ?>
