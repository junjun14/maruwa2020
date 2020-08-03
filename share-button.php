<div class="share-button-box clearfix">
    <div class="social-area">
        <a class="sns-button-plane tw-color animation" href="https://twitter.com/share?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener">
            <span class="sns-name icon-twitter"></span>ツィートする
        </a>
    </div>
    <div class="social-area">
        <a class="sns-button-plane fb-color animation" href="https://www.facebook.com/sharer.php?src=bm&u=<?php echo urlencode( get_permalink() ); ?>&t=<?php echo urlencode( get_the_title() ); ?>" onclick="window.open(this.href, 'FBwindow', 'width=550, height=420, menubar=no, toolbar=no, scrollbars=yes'); return false;">
            <span class="sns-name icon-facebook"></span>シェアする

        </a>
    </div>
    <div class="social-area">
        <a class="sns-button-plane line-color animation" href="https://social-plugins.line.me/lineit/share?url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener">
            <span class="sns-name icon-LINE"></span>LINEに送る
        </a>
    </div>
</div>
