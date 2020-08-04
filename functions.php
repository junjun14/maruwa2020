<?php
// ヘッダーに表示される項目を整理
add_theme_support ('title-tag');
add_filter('the_generator', '__return_empty_string');
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
remove_action('wp_head','wp_resource_hints',2);
add_filter( 'comments_open', '__return_false' ); //コメント機能停止

// リサイズJPEG圧縮率変更
//add_filter('wp_editor_set_quality', function($arg){return 90;});

// xmlrpc.phpの無効化
//function remove_x_pingback($headers) {
//    unset($headers['X-Pingback']);
//    return $headers;
//}
//add_filter('wp_headers', 'remove_x_pingback');

//プラグインの自動更新を有効化
add_filter( 'auto_update_plugin', '__return_true' );

//マイナーアップグレードの自動更新を有効化
add_filter( 'allow_minor_auto_core_updates', '__return_true' );

// キャプション、コメントフォームなどを HTML5 にする
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// Yoast SEO 2ページ目以降 noindex付与
function custom_robots($link) {
    if (is_paged()){
        return "noindex,follow";
    }else{
        return $link;
    }
}
add_filter( 'wpseo_robots', 'custom_robots' );

// 画像アップロード時 HTTPエラーが出る場合がある時の対策
function change_graphic_lib($array) {
    return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}
add_filter( 'wp_image_editors', 'change_graphic_lib' );

// ブロックエディタ全幅サポート
add_theme_support( 'align-wide' );

// .hentryを除く（構造化データマークアップエラー対策）
function remove_hentry( $classes ) {
    $classes = array_diff($classes, array('hentry','post'));
    return $classes;
}
add_filter('post_class', 'remove_hentry');

// お問い合わせページのみ Conact form 7 のcssとjsを読み込み
//add_action( 'wp', function() {
//    if ( is_page( 'contact-us' ) ) return;
//    add_filter( 'wpcf7_load_js', '__return_false' );
//    add_filter( 'wpcf7_load_css', '__return_false' );
//});

// アイキャッチをサポートする
add_theme_support( 'post-thumbnails' );

// 画像サイズ追加
add_image_size( 'minimg', 192, 192, true );

// カテゴリの説明からPタグを削除する
remove_filter('term_description', 'wpautop');

// Feedをサポートする
add_theme_support( 'automatic-feed-links' );
remove_action('wp_head', 'feed_links_extra', 3);

// コメントFeedを出力させない
add_filter('feed_links_show_comments_feed', '__return_false');

// 検索でひらかな、カタカナを曖昧検索させる
function change_search_char( $where, $obj ) {
    if ( $obj->is_search ) {
        $where = str_replace(".post_title", ".post_title COLLATE utf8mb4_unicode_ci", $where );
        $where = str_replace(".post_content", ".post_content COLLATE utf8mb4_unicode_ci", $where );
        $where = str_replace(".post_type", ".post_type COLLATE utf8mb4_unicode_ci", $where );
    }
    return $where;
}
add_filter( 'posts_where', 'change_search_char', 10, 2 );

// 投稿時に全角英数を半角英数にコンバートする
function convert_content( $data ) {
    $convert_fields = array( 'post_title', 'post_content' );
    foreach ( $convert_fields as $convert_field ) {
        $data[$convert_field] = mb_convert_kana( $data[$convert_field], 'rnsKV', 'UTF-8' );
    }
    return $data;
}
add_filter( 'wp_insert_post_data', 'convert_content' );

// jQueryを読み込む
function my_scripts() {
    wp_enqueue_style('mainstyle',esc_url(get_theme_file_uri('style.css')), array(),date('ymdHi',filemtime( get_theme_file_path('style.css'))));
    wp_enqueue_style('litystyle',esc_url(get_theme_file_uri('css/ionicons.min.css')), array(),date('ymdHi',filemtime( get_theme_file_path('css/ionicons.min.css'))));
    wp_enqueue_style('swiper',esc_url(get_theme_file_uri('css/swiper.min.css')), array('mainstyle'),date('ymdHi',filemtime( get_theme_file_path('css/swiper.min.css'))));
    if ( !is_admin() ) {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.5.1.min.js',array(),null, true);
        wp_enqueue_script('property',esc_url(get_theme_file_uri('/js/property.min.js')), array('jquery'),date('ymdHi',filemtime( get_theme_file_path('/js/property.min.js'))), true);
        wp_enqueue_script('swiper',esc_url(get_theme_file_uri('/js/swiper.min.js')), array('property'),date('ymdHi',filemtime( get_theme_file_path('/js/swiper.min.js'))), true);
    }
}
add_action( 'wp_enqueue_scripts', 'my_scripts', 50 );

// 投稿スラッグを自動的に生成する
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );

// アーカイブページの「アーカイブ：」などを消す
function custom_archive_title($title){
    $titleParts=explode(': ',$title);
    if($titleParts[1]){
        return $titleParts[1];
    }
    return $title;
}
add_filter('get_the_archive_title','custom_archive_title');

// comment-reply.js読み込む場所指定
function theme_queue_js(){
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
        wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');

// open-sans style を出力させない
if (!function_exists('remove_wp_open_sans')) :
function remove_wp_open_sans() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
}
add_action( 'wp_enqueue_scripts', 'remove_wp_open_sans');
endif;

// dashiconsを出力しない
function bs_dequeue_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
}
add_action( 'wp_enqueue_scripts', 'bs_dequeue_dashicons' );

// content幅指定
if ( ! isset( $content_width ) ) $content_width = 1024;

// Gutenberg 自動保存のインターバル
add_filter( 'block_editor_settings', function( $editor_settings ){
    $editor_settings['autosaveInterval'] = 600;
    return $editor_settings;
});

// Gutenberg block library css を止める
function remove_block_library_style() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_block_library_style' );

// グーテンベルクCSS
//add_editor_style( 'css/editor-style.css' );
//add_theme_support( 'editor-styles' );

// グーテンベルクCSS
function my_theme_setup() {
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style-editor.css' );
}
add_action( 'after_setup_theme', 'my_theme_setup');
//function gutenberg_stylesheets_custom_demo() {
//    $editor_style_url = get_theme_file_uri('/editor-style.css');
//    wp_enqueue_style( 'theme-editor-style', $editor_style_url );
//}
//add_action( 'enqueue_block_editor_assets', 'gutenberg_stylesheets_custom_demo' );

// 抜粋文字数
function character_limit($length) {
    global $post;
    $content_f = get_the_content();
    $content_f = apply_filters('the_content', $content_f );
    $content = mb_substr(strip_tags($content_f),0,$length);
    return $content.'...';
}

// 投稿・固定ページ一覧の背景色指定
function posts_status_color(){
?>
<style>
    .status-draft{background: #edf9fc !important;}
    .status-pending{background: #ffd7c1 !important;}
    .status-future{background: #c9ffe1 !important;}
    .status-private{background: #faa2a5 !important;}
</style>
<?php
}
add_action('admin_footer','posts_status_color');

// TinyMCE Tableをリサイズさせない
//function customize_tinymce_settings($mceInit) {
//    $mceInit['table_resize_bars'] = false;
//    $mceInit['object_resizing'] = "img";
//    return $mceInit;
//}
//add_filter( 'tiny_mce_before_init', 'customize_tinymce_settings' ,0);

// ページの抜粋サポート
add_post_type_support( 'page', 'excerpt' );

// カスタムメニューをサポート
add_theme_support('menus');

// ログイン画面のロゴ
function my_custom_login_logo() {
    echo '<style type="text/css">
    h1 a { background-image:url('.esc_url(get_theme_file_uri('/images/symbol.svg')).') !important; }
</style>';
}
add_action('login_head', 'my_custom_login_logo');

// アドミンバーにログアウトボタン設置
function add_new_item_in_admin_bar() {
    global $wp_admin_bar;
    $title = sprintf(
        'ログアウト'
    );
    $wp_admin_bar->add_menu(array(
        'id' => 'new_item_in_admin_bar',
        'title' => $title,
        'href' => wp_logout_url()
    ));
}
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');

// ページナビゲーション
function page_navigation() {
    global $wp_rewrite;
    global $wp_query;
    global $paged;
    $paginate_base = get_pagenum_link(1);
    if(($wp_query->max_num_pages) > 1):
    if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
        $paginate_format = '';
        $paginate_base = add_query_arg('paged', '%#%');
    } else {
        $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
            user_trailingslashit('page/%#%/', 'paged');;
        $paginate_base .= '%_%';
    }
    $result = paginate_links( array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $wp_query->max_num_pages,
        'mid_size' => 3,
        'current' => ($paged ? $paged : 1),
    ));
    echo '<p class="local-navigation">'."\n".$result."</p>\n";
    endif;
}

// RSSに画像を読み込む
function rss_edit($content) {
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $img = get_the_post_thumbnail($post->ID);
    } else {
        $img = '<img src="'.esc_url(get_theme_file_uri('/images/com-sns-icon.png')).'" width="1200" height="630" alt="' . esc_html(get_the_title()) . '">';
    }
    $content = '<figure>' . $img . '</figure>' . '</p>' . $content . '</p>' ;
    return $content;
}
add_filter('the_excerpt_rss', 'rss_edit');
add_filter('the_content_feed', 'rss_edit');
// Make sure tags do not disappear
add_filter('content_save_pre','test_save_pre');
function test_save_pre($content){
    global $allowedposttags;
    $allowedposttags['iframe'] = array('class' => array () , 'src'=>array() , 'width'=>array(), 'height'=>array() , 'frameborder' => array() , 'scrolling'=>array(),'marginheight'=>array(), 'marginwidth'=>array());
    return $content;
}

// ヘルプタブ非表示
add_filter('contextual_help', function($old_help, $id, $screen) {
    $screen->remove_help_tabs();
    $screen->set_help_sidebar('');
    return false;
}, 999, 3);

// 管理画面の「Wordpressのご利用ありがとうございます。」の文言を削除
add_filter('admin_footer_text', '__return_empty_string');

// 一般設定に項目追加
function add_contact_info_field( $whitelist_options ) {
    $whitelist_options['general'][] = 'com_add';
    $whitelist_options['general'][] = 'com_tel';
    return $whitelist_options;
}
add_filter( 'whitelist_options', 'add_contact_info_field' );

function regist_contact_info_field() {
    add_settings_field( 'com_add', '住所', 'display_blog_title', 'general' );
    add_settings_field( 'com_tel', '電話番号', 'display_catch_phrase', 'general' );
}
add_action( 'admin_init', 'regist_contact_info_field' );

function display_blog_title() {
    $blog_title = get_option( 'com_add' );
?>
<input name="com_add" type="text" id="com_add" value="<?php echo esc_html( $blog_title ); ?>" class="regular-text">
<?php
}

function display_catch_phrase() {
    $catch_phrase = get_option( 'com_tel' );
?>
<input name="com_tel" type="text" id="com_tel" value="<?php echo esc_html( $catch_phrase ); ?>" class="regular-text">
<?php
}

// 住所取得ショートコード
function comadd() {
    return get_option( 'com_add' );
}
add_shortcode('comaddress', 'comadd');

// 電話番号取得ショートコード
function comtel() {
    return get_option( 'com_tel' );
}
add_shortcode('comphrone', 'comtel');

// 見出しフォーマットのカスタマイズ
function my_tiny_mce_before_init( $init_array ) {
    $init_array['block_formats'] = '段落=p;見出し2=h2;見出し3=h3;見出し4=h4;見出し5=h5';
    $style_formats = array (
        array( 'title' => '画像アイコン無し','block' => 'span','classes' => 'no-icon' )
    );
    $init_array['style_formats'] = json_encode( $style_formats );
    $init['style_formats_merge'] = false;
    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'my_tiny_mce_before_init' );

// フォントサイズのカスタマイズ
function custom_tiny_mce_fontsize_formats( $settings ) {
    $settings[ 'fontsize_formats' ] = '1.2rem 1.6rem 2.4rem 2.8rem 3.2rem';
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'custom_tiny_mce_fontsize_formats' );

// TinyMCE Advancedすべてのタグと属性値を許可する
if ( ! function_exists('tinymce_init') ) {
    function tinymce_init( $init ) {
        $init['verify_html'] = false; // Don't erase empty tags or tags without attributes
        $initArray['valid_children'] = '+body[style], +div[div|span|a], +span[span]'; // Don't erase specified child elements
        return $init;
    }
    add_filter( 'tiny_mce_before_init', 'tinymce_init', 100 );
}

// RSS Copyright
function rss_feed_copyright($content) {
    $content = $content.'<p>Copyright' . date("Y") . ' '.get_option('blogname').'</p>';
    return $content;
}
add_filter('the_excerpt_rss', 'rss_feed_copyright');
add_filter('the_content_feed', 'rss_feed_copyright');
// Delete gallery style
add_filter(
    "use_default_gallery_style",
    "disable_default_gallery_style"
);
function disable_default_gallery_style() {
    return false;
}

// ユーザーエージェントスイッチング *** Only mobile
function is_mobile(){
    $useragents = array(
        'iPhone.*iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*Mobile', // 1.5+ Android *** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// ログイン画面のロゴリンク先変更（Homeへ）
function custom_login_logo_url() {
    return esc_url(home_url());
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

// 投稿・固定ページ一覧に”ID”、”スラッグ”、”文字数”の項目を追加
function add_posts_columns($columns) {
    $columns['postid'] = 'ID';
    $columns['slug'] = 'スラッグ';
    $columns['count'] = '文字数';
    echo '<style type="text/css">
  .fixed .column-postid, .fixed .column-count {width: 5%;}
  .fixed .column-slug {width: 10%;}
  </style>';
    return $columns;
}
function add_posts_columns_row($column_name, $post_id) {
    if ( 'postid' == $column_name ) {
        echo $post_id;
    } elseif ( 'slug' == $column_name ) {
        $slug = get_post($post_id) -> post_name;
        echo $slug;
    } elseif ( 'count' == $column_name ) {
        $count = mb_strlen(strip_tags(get_post_field('post_content', $post_id)));
        echo $count;
    }
}
add_filter( 'manage_posts_columns', 'add_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_posts_columns_row', 10, 2 );

// PHPファイルを呼び出すショートコード
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}
add_shortcode('myphp', 'Include_my_php');

// キャプションカスタマイズ
add_shortcode('caption', 'my_img_caption_shortcode');
function my_img_caption_shortcode($attr, $content = null) {
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>s*)?<img [^>]+>(?:s*</a>)?)(.*)#is', $content, $matches ) ) {
            $content = $matches[1];
            $attr['caption'] = trim( $matches[2] );
        }
    }
    $output = apply_filters('img_caption_shortcode', '', $attr, $content);
    if ( $output != '' )
        return $output;
    extract(shortcode_atts(array(
        'id'    => '',
        'align'    => 'alignnone',
        'width'    => '',
        'caption' => ''
    ), $attr, 'caption'));
    if ( 1 > (int) $width || empty($caption) )
        return $content;
    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

// YouTubeの埋め込みタグカスタマイズ
function custom_youtube_oembed($code){
    if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
        $html = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&rel=0", $code);
        $html = preg_replace('/ width="\d+"/', '', $html);
        $html = preg_replace('/ height="\d+"/', '', $html);
        $html = '<div class="embed-youtube">' . $html . '</div>';
        return $html;
    }
    return $code;
}
add_filter('embed_handler_html', 'custom_youtube_oembed');
add_filter('embed_oembed_html', 'custom_youtube_oembed');
// Make it commented out in posts
function ignore_shortcode( $atts, $content = null ) {
    return null;
}
add_shortcode( 'commentout', 'ignore_shortcode', '9999' );

// 管理者のスラッグを出力しない
function theme_slug_redirect_author_archive() {
    if (is_author() ) {
        wp_redirect( esc_url(home_url()));
        exit;
    }
}
add_action( 'template_redirect', 'theme_slug_redirect_author_archive' );

// WebP アップロードサポート
function custom_mime_types( $mimes ) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter( 'upload_mimes', 'custom_mime_types' );

// SVG アップロードサポート
function my_ext2type($ext2types) {
    array_push($ext2types, array('image' => array('svg', 'svgz')));
    return $ext2types;
}
add_filter('ext2type', 'my_ext2type');
function my_mime_types($mimes){
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'my_mime_types');
function my_mime_to_ext($mime_to_ext) {
    $mime_to_ext['image/svg+xml'] = 'svg';
    return $mime_to_ext;
}
add_filter('getimagesize_mimes_to_exts', 'my_mime_to_ext');

// 最終更新日を転記一覧に表示してソートする
add_filter( 'manage_edit-post_columns', 'aco_last_modified_admin_column' );

// 最終更新日を表示
function aco_last_modified_admin_column( $columns ) {
    $columns['modified-last'] =__( '最終更新日', 'aco' );
    return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'aco_sortable_last_modified_column' );

// コンテンツを変更された時間情報でソート可能にする
function aco_sortable_last_modified_column( $columns ) {
    $columns['modified-last'] = 'modified';
    return $columns;
}
add_action( 'manage_posts_custom_column', 'aco_last_modified_admin_column_content', 10, 2 );

// Format the output
function aco_last_modified_admin_column_content( $column_name, $post_id ) {
    // Don't continue if this is not the modified column
    if ( 'modified-last' != $column_name )
        return;
    $modified_date   = the_modified_date( 'Y年Md日Ag時i分' );
    $modified_author = get_the_modified_author();
    echo $modified_date;
    echo '<br>';
    echo '<strong>' . $modified_author . '</strong>';
}

// ログインページのreCaptchaにmarginをつける
function custom_login() { ?>
<style>
    .inv-recaptcha-holder {
        margin: 0.4em 0 2.4em !important;
    }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login' );

// パスワードリセットを停止
function disable_password_reset() {
    return false;
}
add_filter ( 'allow_password_reset', 'disable_password_reset' );

?>
