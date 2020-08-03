// JavaScript Document



$(document).ready(function() {


    // Passive Event Listener
     document.addEventListener('touchstart', function() {}, {passive: true});

    //smoothscroll
    var pagetop = $('#back-to-top');
    jQuery(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });

    $(function(){
        var windowWidth = $(window).width();
        var windowSm = 767; // Breadth to switch to smartphone
        if (windowWidth <= windowSm) {
            var headerHight = 96; // SP header height
        } else {
            var headerHight = 160; // PC header height
        }
        $('a[href^="#"]:not(a[href="#"])').click(function(){
            var speed = 600;
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top-headerHight;
            $("html, body").animate({scrollTop:position}, speed, 'swing');
            return false;
        });
    });

    // Responsive overlay menu
//    (function ($) {
//
//        $(".menu-btn button").click(function () {
//            event.preventDefault();
//            $(".overlay").fadeToggle(200);
//            $(this).toggleClass('btn-open').toggleClass('btn-close');
//        });
//
//        $('.overlay').on('click', function () {
//            $(".overlay").fadeToggle(200);
//            $(".menu-btn a").toggleClass('btn-open').toggleClass('btn-close');
//        });
//
//        $('.menu a').on('click', function () {
//            event.preventDefault();
//            $(".overlay").fadeToggle(200);
//            $(".menu-btn a").toggleClass('btn-open').toggleClass('btn-close');
//        });
//
//    }(jQuery));

    $(document).ready(function () {

        $(".menu-btn button").click(function () {
            $(".overlay").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });

        $('.overlay').on('click', function () {
            $(".overlay").fadeToggle(200);
            $(".menu-btn button").toggleClass('btn-open').toggleClass('btn-close');
        });

        $('.menu a').on('click', function () {
            $(".overlay").fadeToggle(200);
            $(".menu-btn button").toggleClass('btn-open').toggleClass('btn-close');
        });

    });

    // Ripple Effect
    (function() {
        var ripple, ripples, RippleEffect,loc, cover, coversize, style, x, y, i, num;

        //クラス名rippleの要素を取得
        ripples = document.querySelectorAll('.ripple');

        //位置を取得
        RippleEffect = function(e) {
            ripple = this;//クリックされたボタンを取得
            cover = document.createElement('span');//span作る
            coversize = ripple.offsetWidth;//要素の幅を取得
            loc = ripple.getBoundingClientRect();//絶対座標の取得
            x = e.pageX - loc.left - window.pageXOffset - (coversize / 2);
            y = e.pageY - loc.top - window.pageYOffset - (coversize / 2);
            pos = 'top:' + y + 'px; left:' + x + 'px; height:' + coversize + 'px; width:' + coversize + 'px;';

            //spanを追加
            ripple.appendChild(cover);
            cover.setAttribute('style', pos);
            cover.setAttribute('class', 'rp-effect');//クラス名追加

            //しばらくしたらspanを削除
            setTimeout(function() {
                var list = document.getElementsByClassName( "rp-effect" ) ;
                for(var i =list.length-1;i>=0; i--){//末尾から順にすべて削除
                    list[i].parentNode.removeChild(list[i]);
                }}, 2000)};
        for (i = 0, num = ripples.length; i < num; i++) {
            ripple = ripples[i];
            ripple.addEventListener('mousedown', RippleEffect);
        }
    }());


    // Smartphone tel link
    var ua = navigator.userAgent;
    if(ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0){
        $('.tel-link').each(function(){
            var str = $(this).text();
            $(this).html($('<a>').attr('href', 'tel:' + str.replace(/-/g, '')).append(str + '</a>'));
        });
    }

});
