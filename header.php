<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo get_option( 'blog_charset' ); ?>">
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-title" content="MARUWA">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="email=no,telephone=no,address=no">
<?php if( !is_user_logged_in()):?>
<?php get_template_part('analytics'); // Including analytics.php ?>
<?php endif; ?>
</head>
<body id="top" <?php body_class(); ?>>
    <div id="container" class="clearfix">
        <header id="header">
            <div class="head-area content-width">
                <?php if ( is_home() || is_front_page() ) : // Home only display ?>
                <h1 id="site-title"><?php echo esc_html(get_option( 'blogname' )); ?></h1>
                <?php else: // Display other than home ?>
                <div id="site-title"><?php echo esc_html(get_option( 'blogname' )); ?></div>
                <?php endif; ?>
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div id="main-logo">
                        <img width="180" height="38" src="<?php $logopath='/images/maruwa-logo.svg'; echo esc_url( get_theme_file_uri( $logopath )); echo '?'.date('mdyHi',filemtime( get_theme_file_path( $logopath ))); ?>" class="shop-btn" alt="マルワサービス">
                    </div>
                </a>

                <?php if ( wp_is_mobile() ) : // SP Tablet Only ?>
                <div class="menu-btn">
                    <button class="btn-open" href="javascript:void(0)" aria-label="Menu"></button>
                </div>
                <div class="overlay">
                    <div class="menu-layout">
                        <?php wp_nav_menu( array('menu' => 'sp-nav', 'container' => 'nav', 'container_id' => 'nav', 'container_class' => 'main-nav' )); ?>
                        <div class="call-area">
                            <a href="tel:<?php $tel = esc_html(get_option('com_tel')); $tel = str_replace(array('-', 'ー', '−', '―', '‐'), '', $tel); echo $tel; ?>"><span class="icon-mobile"></span><?php echo get_option( 'blogname' ); ?>に電話する</a>
                        </div>
                    </div>
                </div>
                <?php else: // PC Only ?>
                <?php wp_nav_menu( array('menu' => 'pc-nav', 'container' => 'nav', 'container_id' => 'nav', 'container_class' => 'pc-nav', 'menu_class' => 'pc-menu' )); ?>
                <?php endif; ?>
            </div>
        </header>
