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
        <div class="page-sec content-width">
            <div class="blog-body content-wrap">
            <?php if(have_posts()): while (have_posts()):the_post(); ?>

            <article class="blog-link-box">
                <a class="blog-link animation" href="<?php the_permalink(); ?>">
                    <figure class="card-photo animation">
                        <?php if ( has_post_thumbnail() ): // Processing when there is a thumbnail ?>
                        <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'blog-eyecatch animation', 'loading' =>'lazy')); ?>
                        <?php else: // Processing when there is no thumbnail ?>
                        <img width="640" height="360" src="<?php echo esc_url( get_theme_file_uri( '/images/no-photo.svg' ) ); ?>" alt="No Photo" class="blog-eyecatch animation">
                        <?php endif; ?>
                    </figure>
                    <div class="blog-link-info">
                        <h3 class="blog-title"><?php echo esc_html( get_the_title() ); ?></h3>
                        <div class="blog-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 40 , '...' ); ?></div>
                        <time class="blog-day" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
                    </div>
                    <?php /* <span class="cat-name"><?php echo $cat_name ?></span> */?>
                </a>
            </article>

            <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
        <div id="tablenav" class="content-width">
            <?php page_navigation(); ?>
        </div>
    </article>
</main>

<?php get_footer(); // Including footer.php ?>
