<section id="contact-area">
    <div class="content-width">
        <h2 class="contacttitle subtitle">Contact</h2>
    </div>
        <div class="contact-box-area content-width">
            <a class="contact-box animation" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                <h3 class="contact-subtitle">お問い合わせ</h3>
                <p class="contact-desc">お気軽にお問い合わせください</p>
            </a>
            <a class="contact-box animation" href="tel:<?php $tel = esc_html(get_option('com_tel')); $tel = str_replace(array('-', 'ー', '−', '―', '‐'), '', $tel); echo $tel; ?>">
                <h3 class="contact-subtitle"><?php echo esc_html(get_option( 'com_tel' )); ?></h3>
                <p class="contact-desc">9:00～18:00（定休日を除く）</p>
            </a>
        </div>
</section>
<?php if ( is_home() || is_front_page() ) : // Home only display ?>
<section id="map-area">
    <div class="content-width">
        <h2 class="maptitle subtitle">Access</h2>
        <p class="map-address">〒426-0072<br/><span class="icon-location"></span><?php echo esc_html(get_option( 'com_add' )); ?></p>
    </div>
    <div class="map-area">
        <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3274.1721427512834!2d138.24655821557516!3d34.85190168039582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601a4ffa8548e09f%3A0x6bb11584bdf933d2!2z5qCq5byP5Lya56S-44Oe44Or44Ov44K144O844OT44K5!5e0!3m2!1sja!2sjp!4v1596507645545!5m2!1sja!2sjp" width="1920" height="640" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" loading="lazy"></iframe>
    </div>
</section>
<?php endif; ?>
<footer id="footer">
    <div class="footer-area content-width">
        <div class="com-add">
            <div class="com-desc"><?php echo get_option( 'blogdescription' ); ?></div>
            <div class="com-name poppins"><?php echo get_option( 'blogname' ); ?></div>
            <div class="com-address"><span class="icon-location"></span><?php echo esc_html(get_option( 'com_add' )); ?></div>
            <div class="com-phone"><span class="icon-phone"></span><?php echo esc_html(get_option( 'com_tel' )); ?></div>
        </div>
        <?php if ( !is_mobile() ) : // PC Only ?>
        <div class="privacy-policy-link-wrap"><?php the_privacy_policy_link(); ?></div>
        <?php endif; ?>
        <div class="copyright">&copy;<?php echo date('Y'); ?> Maruwa service Inc.</div>
        <?php // wp_nav_menu( array('menu' => 'footer-menu', 'container' => 'nav', 'container_id' => 'footer-nav', 'container_class' => 'footer-nav' )); ?>
    </div>
</footer>
<?php if ( !wp_is_mobile() ) : // PC Only ?>
<div id="back-to-top" class="no-print"><a class="back-to-btn" href="#top" aria-label="Page Top"></a></div>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
<?php if ( is_home() || is_front_page() || is_page(array('home')) ) : // Display other than Home ?>
<script>

    var promotion = new Swiper('.home-container', {
        loop: true,
        speed: 600,
        autoplay: {
            delay: 8000,
            disableOnInteraction: false
        },
        slidesPerView: 1.6,
        spaceBetween: 0,
        centeredSlides : true,
        centerInsufficientSlides: true,
        watchOverflow: true,
        pagination: {
            el: '.swiper-pagination',
        },
        breakpoints: {
            767: {
                slidesPerView: 1,
                slidesPerView: 1,
            }
        }
    });

    var promotion = new Swiper('.staff-container', {
        loop: false,
        speed: 800,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false
        },
        slidesPerView: 3,
        spaceBetween: 16,
        centeredSlides: false,
        centerInsufficientSlides: true,
        watchOverflow: true,
        pagination: {
            el: '.swiper-pagination',
        },
        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 16
            },
            767: {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 8,
                slidesPerView: 1,
                centeredSlides : true,
            }
        }
    });

    var promotion = new Swiper('.com-container', {
        loop: true,
        speed: 800,
        autoplay: {
            delay: 4500,
            disableOnInteraction: false
        },
        slidesPerView: 3,
        spaceBetween: 16,
        centeredSlides: false,
        centerInsufficientSlides: true,
        watchOverflow: true,
        pagination: {
            el: '.swiper-pagination',
        },
        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 16
            },
            767: {
                slidesPerView: 1,
                spaceBetween: 8,
                slidesPerView: 1,
                centeredSlides : true,
            }
        }
    });

</script>
<?php endif; ?>
</body>
</html>
