<section id="contact-area">
    <div class="content-width">
        <h2 class="contacttitle subtitle">Contact</h2>
    </div>
        <div class="contact-box-area">
            <a class="contact-box" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                <h3 class="contact-subtitle">お問い合わせ</h3>
                <p class="contact-desc">お気軽にお問い合わせください</p>
            </a>
            <a class="contact-box" href="tel:<?php $tel = esc_html(get_option('com_tel')); $tel = str_replace(array('-', 'ー', '−', '―', '‐'), '', $tel); echo $tel; ?>">
                <h3 class="contact-subtitle"><?php echo esc_html(get_option( 'com_tel' )); ?></h3>
                <p class="contact-desc">9:00～18:00（定休日を除く）</p>
            </a>
        </div>
</section>
<footer id="footer">
    <div class="footer-area content-width">
        <div class="com-add">
            <div class="com-name poppins"><?php echo get_option( 'blogname' ); ?></div>
            <div class="com-address"><span class="icon-location"></span><?php echo esc_html(get_option( 'com_add' )); ?></div>
            <div class="com-phone"><span class="icon-phone"></span><?php echo esc_html(get_option( 'com_tel' )); ?></div>
        </div>
        <div class="copyright">&copy;<?php echo date('Y'); ?> Maruwa service Inc.</div>
        <?php // wp_nav_menu( array('menu' => 'footer-menu', 'container' => 'nav', 'container_id' => 'footer-nav', 'container_class' => 'footer-nav' )); ?>
        <?php if ( !is_mobile() ) : // PC Only ?>
        <div class="privacy-policy-link-wrap"><?php the_privacy_policy_link(); ?></div>
        <?php endif; ?>
    </div>
</footer>
<?php if ( wp_is_mobile() ) : // PC Only ?>
<div id="back-to-top" class="no-print"><a class="back-to-btn" href="#top" aria-label="Page Top"></a></div>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
