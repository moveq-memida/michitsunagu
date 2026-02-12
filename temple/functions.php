<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// サイト情報
define( 'HOME', home_url( '/' ) );
define( 'TITLE', get_option( 'blogname' ) );

// 状態
define( 'IS_ADMIN', is_admin() );
define( 'IS_LOGIN', is_user_logged_in() );
define( 'IS_CUSTOMIZER', is_customize_preview() );

// テーマディレクトリパス
define( 'T_DIRE', get_template_directory() );
define( 'S_DIRE', get_stylesheet_directory() );
define( 'T_DIRE_URI', get_template_directory_uri() );
define( 'S_DIRE_URI', get_stylesheet_directory_uri() );

define( 'THEME_NOTE', 'takara-factory' );
define( 'WPCF7_AUTOP', false );

// Shapo.ioウィジェットID（環境変数で管理可能）
if (!defined('TEMPLE_SHAPO_WIDGET_ID')) {
    define('TEMPLE_SHAPO_WIDGET_ID', '581a6fd630b08ea57682');
}

/**
 * テーマ有効化時のフック（rewrite rulesのフラッシュは1回のみ）
 */
function temple_theme_activation() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'temple_theme_activation' );

/**
 * クエリ変数の追加
 */
add_filter('query_vars', function($vars) {
    $vars[] = 'blog_category_slug';
    $vars[] = 'work_custom_category';
    $vars[] = 'news_category';
    return $vars;
});

/**
 * カスタムフィールド（メタボックス）の追加
 */
add_action('admin_menu', 'add_custom_fields');
add_action('save_post', 'save_custom_fields');

function add_custom_fields() {
    add_meta_box( 'my_sectionid', 'Meta Settings', 'my_custom_fields', 'post' );
    add_meta_box( 'my_sectionid', 'Meta Settings', 'my_custom_fields', 'page' );
    add_meta_box( 'my_sectionid', 'Meta Settings', 'my_custom_fields', 'blog' );
    add_meta_box( 'my_sectionid', 'Meta Settings', 'my_custom_fields', 'voice' );
}

function my_custom_fields() {
    global $post;
    $keywords = get_post_meta($post->ID,'keywords',true);
    $description = get_post_meta($post->ID,'description',true);
    
    echo '<p>キーワード（半角カンマ区切り）<br>';
    echo '<input type="text" name="keywords" value="'.esc_attr($keywords).'" size="60"></p>';
    
    echo '<p>ページの説明（description）160文字以内<br>';
    echo '<input type="text" style="width: 600px;height: 40px;" name="description" value="'.esc_attr($description).'" maxlength="160"></p>';
}

function save_custom_fields( $post_id ) {
    // 自動保存時は何もしない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) return;
    
    if(!empty($_POST['keywords']))
        update_post_meta($post_id, 'keywords', sanitize_text_field($_POST['keywords']) );
    else delete_post_meta($post_id, 'keywords');

    if(!empty($_POST['description']))
        update_post_meta($post_id, 'description', sanitize_text_field($_POST['description']) );
    else delete_post_meta($post_id, 'description');
}

/**
 * メタタグ（description, keywords）の出力
 * 改善版：カスタムフィールドが空の場合は自動生成
 */
function page_description() {
    global $post;
    
    // カスタムフィールドの値を読み込む
    $keywords = get_post_meta($post->ID ?? 0, 'keywords', true);
    $description = get_post_meta($post->ID ?? 0, 'description', true);
    
    // descriptionが空の場合は自動生成
    if (empty($description)) {
        if (is_singular() && $post) {
            // 投稿・固定ページの場合は抜粋または本文から生成
            if (!empty($post->post_excerpt)) {
                $description = wp_trim_words($post->post_excerpt, 20, '...');
            } else {
                $description = wp_trim_words(strip_tags($post->post_content), 20, '...');
            }
        } elseif (is_category()) {
            $description = single_cat_title('', false) . 'の記事一覧';
        } elseif (is_tag()) {
            $description = single_tag_title('', false) . 'の記事一覧';
        } elseif (is_archive()) {
            $description = get_the_archive_title() . 'の記事一覧';
        }
    }
    
    ?>
    <?php if(is_home()): ?>
        <meta name="robots" content="index, follow">
        <?php if (!empty($keywords)): ?>
        <meta name="keywords" content="<?php echo esc_attr($keywords); ?>">
        <?php endif; ?>
        <?php if (!empty($description)): ?>
        <meta name="description" content="<?php echo esc_attr($description); ?>">
        <?php endif; ?>
    <?php elseif(is_singular()): ?>
        <meta name="robots" content="index, follow" />
        <?php if (!empty($keywords)): ?>
        <meta name="keywords" content="<?php echo esc_attr($keywords); ?>">
        <?php endif; ?>
        <?php if (!empty($description)): ?>
        <meta name="description" content="<?php echo esc_attr($description); ?>">
        <?php endif; ?>
    <?php elseif (is_category()): ?>
        <meta name="robots" content="index, follow" />
        <?php if (!empty($description)): ?>
        <meta name="description" content="<?php echo esc_attr($description); ?>">
        <?php endif; ?>
    <?php elseif (is_tag()): ?>
        <meta name="robots" content="noindex, follow" />
        <?php if (!empty($description)): ?>
        <meta name="description" content="<?php echo esc_attr($description); ?>">
        <?php endif; ?>
    <?php elseif(is_404()): ?>
        <meta name="robots" content="noindex, follow">
    <?php else: ?>
        <meta name="robots" content="noindex, follow">
    <?php endif; ?>
    <?php
}

/**
 * OGP（Open Graph Protocol）タグの自動出力
 */
function temple_add_ogp_tags() {
    if (is_front_page() || is_home()) {
        $og_title = get_bloginfo('name');
        $og_description = get_bloginfo('description');
        $og_url = home_url('/');
        $og_type = 'website';
        $og_image = T_DIRE_URI . '/assets/img/logo-color.svg';
    } elseif (is_singular()) {
        global $post;
        $og_title = get_the_title();
        
        // descriptionの取得（カスタムフィールド→抜粋→本文の優先順位）
        $og_description = get_post_meta($post->ID, 'description', true);
        if (empty($og_description)) {
            if (!empty($post->post_excerpt)) {
                $og_description = wp_trim_words($post->post_excerpt, 20, '...');
            } else {
                $og_description = wp_trim_words(strip_tags($post->post_content), 20, '...');
            }
        }
        
        $og_url = get_permalink();
        $og_type = 'article';
        
        // アイキャッチ画像があれば使用
        if (has_post_thumbnail()) {
            $og_image = get_the_post_thumbnail_url($post->ID, 'large');
        } else {
            $og_image = T_DIRE_URI . '/assets/img/logo-color.svg';
        }
    } else {
        $og_title = wp_title('|', false, 'right') . get_bloginfo('name');
        $og_description = get_bloginfo('description');
        $og_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $og_type = 'website';
        $og_image = T_DIRE_URI . '/assets/img/logo-color.svg';
    }
    
    ?>
    <meta property="og:title" content="<?php echo esc_attr($og_title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($og_description); ?>">
    <meta property="og:url" content="<?php echo esc_url($og_url); ?>">
    <meta property="og:type" content="<?php echo esc_attr($og_type); ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <?php
}
add_action('wp_head', 'temple_add_ogp_tags');

/**
 * JSON-LD構造化データの出力
 */
function temple_add_json_ld() {
    $schema = array();
    
    // LocalBusiness（事務所情報）
    $local_business = array(
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => '税理士法人ミチ・ツナグ',
        'address' => array(
            '@type' => 'PostalAddress',
            'streetAddress' => '山越6丁目16-32-2',
            'addressLocality' => '松山市',
            'addressRegion' => '愛媛県',
            'postalCode' => '791-8013',
            'addressCountry' => 'JP'
        ),
        'telephone' => '089-989-6447',
        'url' => home_url('/'),
        'openingHoursSpecification' => array(
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
            'opens' => '09:00',
            'closes' => '17:30'
        )
    );
    $schema[] = $local_business;
    
    // Article（記事ページの場合）
    if (is_singular(array('post', 'blog', 'voice'))) {
        global $post;
        $article = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_the_title(),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'author' => array(
                '@type' => 'Organization',
                'name' => '税理士法人ミチ・ツナグ'
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => '税理士法人ミチ・ツナグ',
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => T_DIRE_URI . '/assets/img/logo-color.svg'
                )
            )
        );
        
        if (has_post_thumbnail()) {
            $article['image'] = get_the_post_thumbnail_url($post->ID, 'large');
        }
        
        $schema[] = $article;
    }
    
    // BreadcrumbList（パンくずリスト）
    if (!is_front_page()) {
        $breadcrumbs = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => array()
        );
        
        $breadcrumbs['itemListElement'][] = array(
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'HOME',
            'item' => home_url('/')
        );
        
        $position = 2;
        
        if (is_singular()) {
            $post_type = get_post_type();
            if ($post_type === 'blog') {
                $breadcrumbs['itemListElement'][] = array(
                    '@type' => 'ListItem',
                    'position' => $position++,
                    'name' => 'お知らせ',
                    'item' => home_url('/blog')
                );
            } elseif ($post_type === 'voice') {
                $breadcrumbs['itemListElement'][] = array(
                    '@type' => 'ListItem',
                    'position' => $position++,
                    'name' => 'お客様の声',
                    'item' => home_url('/voice')
                );
            }
            
            $breadcrumbs['itemListElement'][] = array(
                '@type' => 'ListItem',
                'position' => $position,
                'name' => get_the_title(),
                'item' => get_permalink()
            );
        }
        
        $schema[] = $breadcrumbs;
    }
    
    // 出力
    foreach ($schema as $item) {
        echo '<script type="application/ld+json">' . "\n";
        echo wp_json_encode($item, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        echo "\n" . '</script>' . "\n";
    }
}
add_action('wp_head', 'temple_add_json_ld');

/**
 * canonical URLの出力
 * WPデフォルトのrel_canonicalを削除して独自で出力（アーカイブ等にも対応するため）
 */
remove_action('wp_head', 'rel_canonical');
function temple_add_canonical() {
    if (is_singular()) {
        $canonical_url = get_permalink();
    } elseif (is_front_page() || is_home()) {
        $canonical_url = home_url('/');
    } elseif (is_post_type_archive()) {
        $canonical_url = get_post_type_archive_link(get_queried_object()->name ?? '');
    } else {
        $canonical_url = home_url(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '/');
    }
    
    if (!empty($canonical_url)) {
        echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">' . "\n";
    }
}
add_action('wp_head', 'temple_add_canonical');

/**
 * Mixed Content対策：liquid-speech-balloon のCSSを修正
 */
/**
 * Mixed Content対策：出力バッファでhttp://をhttps://に変換
 * liquid-speech-balloonのインラインCSS内のhttp://画像URLを修正
 */
function temple_start_mixed_content_fix() {
    ob_start('temple_fix_mixed_content_output');
}
function temple_fix_mixed_content_output($buffer) {
    // 自サイトのhttp://参照をhttps://に変換
    $buffer = str_replace('http://www.michitsunagu.com/', 'https://www.michitsunagu.com/', $buffer);
    return $buffer;
}
add_action('template_redirect', 'temple_start_mixed_content_fix');
function temple_end_mixed_content_fix() {
    if (ob_get_level() > 0) {
        ob_end_flush();
    }
}
add_action('shutdown', 'temple_end_mixed_content_fix');

/**
 * セキュリティ：REST APIへのアクセス制限（未認証ユーザー）
 */
function temple_restrict_rest_api($result) {
    if (!is_user_logged_in()) {
        return new WP_Error(
            'rest_not_logged_in',
            'REST APIへのアクセスは認証が必要です。',
            array('status' => 401)
        );
    }
    return $result;
}
add_filter('rest_authentication_errors', 'temple_restrict_rest_api');

/**
 * セキュリティ：XML-RPCの無効化
 */
add_filter('xmlrpc_enabled', '__return_false');

// XML-RPC へのアクセスをブロック
function temple_block_xmlrpc() {
    if (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) {
        header('HTTP/1.1 403 Forbidden');
        die('XML-RPC is disabled.');
    }
}
add_action('init', 'temple_block_xmlrpc', 1);

/**
 * 固定ページとMW WP Formでビジュアルモードを使用しない
 */
function stop_rich_editor($editor) {
    global $typenow;
    global $post;
    if(in_array($typenow, array('page', 'post', 'blog', 'voice', 'mw-wp-form'))) {
        $editor = true;
    }
    return $editor;
}
add_filter('user_can_richedit', 'stop_rich_editor');

/**
 * エディター独自スタイル追加
 */
if(!function_exists('initialize_tinymce_styles')) {
    function initialize_tinymce_styles($init_array) {
        $style_formats = array(
            array(
                'title' => 'Note',
                'inline' => 'span',
                'classes' => 'cmn_note'
            )
        );
        $init_array['style_formats'] = json_encode($style_formats);
        return $init_array;
    }
}
add_filter('tiny_mce_before_init', 'initialize_tinymce_styles', 10000);

/**
 * カスタムタクソノミー（custom_category）の登録
 */
function custom_post_taxonomy() {
    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Custom Categories',
            'singular_name' => 'Custom Category',
            'search_items' => 'Search Custom Categories',
            'all_items' => 'All Custom Categories',
            'parent_item' => 'Parent Custom Category',
            'parent_item_colon' => 'Parent Custom Category:',
            'edit_item' => 'Edit Custom Category',
            'update_item' => 'Update Custom Category',
            'add_new_item' => 'Add New Custom Category',
            'new_item_name' => 'New Custom Category Name',
            'menu_name' => 'Custom Categories',
        ),
        'rewrite' => array('slug' => 'custom-category'),
    );
    register_taxonomy('custom_category', 'work', $args);
}
add_action('init', 'custom_post_taxonomy');

/**
 * デフォルトの「投稿」メニューを非表示
 */
function post_menu_remove() { 
   remove_menu_page('edit.php');
}
add_action('admin_menu', 'post_menu_remove'); 

/**
 * JavaScriptに定数を渡す
 */
function my_script_constants() {
?>
    <script type="text/javascript">
        var templateUrl = '<?php echo esc_js(S_DIRE_URI); ?>';
        var baseSiteUrl = '<?php echo esc_js(home_url()); ?>/consult';
        var themeAjaxUrl = '<?php echo esc_js(admin_url( 'admin-ajax.php' )); ?>';
    </script>
<?php
}
add_action('wp_head', 'my_script_constants');

/**
 * ショートコード：パンくずリストの出力
 */
function my_shortcode() {
    ob_start();
    get_template_part('template-parts/breadcrumbs');
    return ob_get_clean();   
}
add_shortcode( 'my_shortcode', 'my_shortcode' );

/**
 * CSS・スクリプトの読み込み（wp_enqueue経由）
 */
function theme_add_files() {
    global $post;

    // CSS
    wp_enqueue_style('c-reset', T_DIRE_URI.'/assets/css/reset.css', [], '1.0', 'all');
    wp_enqueue_style('c-swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], '8.0', 'all');
    wp_enqueue_style('c-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css', [], '1.9.0', 'all');
    wp_enqueue_style('c-slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css', [], '1.9.0', 'all');
    wp_enqueue_style('c-common', T_DIRE_URI.'/assets/css/common1.css', [], '20260108', 'all');
    wp_enqueue_style('c-style', T_DIRE_URI.'/assets/css/style.css', [], '1.0', 'all');
    wp_enqueue_style('c-animate', T_DIRE_URI.'/assets/css/animate.css', [], '1.0', 'all');
    wp_enqueue_style('c-home', T_DIRE_URI.'/assets/css/home.css', [], '20250130', 'all');
    wp_enqueue_style('c-custom', T_DIRE_URI.'/assets/css/custom.css', [], '1.0', 'all');
    wp_enqueue_style('c-theme', T_DIRE_URI.'/style.css', [], '1.0', 'all');

    // header-b.php使用ページ（front-page, business, service, support, work）用CSS
    if (is_front_page() || is_page(array('business', 'service', 'support', 'work'))) {
        wp_enqueue_style('c-assets-b', T_DIRE_URI.'/assets_b/css/style.css', [], '1.0', 'all');
        wp_enqueue_style('c-noto-serif', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;600;700&display=swap', [], null, 'all');
    }

    // WordPress本体のjquery.jsを読み込まない
    if(!is_admin()) {
        wp_deregister_script('jquery');
    }

    // jQuery（CDN、footerに配置、defer）
    wp_enqueue_script('s-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', [], '3.7.1', array('in_footer' => true, 'strategy' => 'defer'));
    
    // Slick（jQueryに依存、footer）
    wp_enqueue_script('s-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', ['s-jquery'], '1.9.0', true);
    
    // Swiper（独立、footer）
    wp_enqueue_script('s-swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], '8.0', true);
    
    // Font Awesome（Kit版のみ、crossorigin属性付き）
    wp_enqueue_script('s-fontawesome', 'https://kit.fontawesome.com/8cbdf0a85f.js', [], '6.8.1', true);
    
    // テーマJS（footer、jQueryに依存）
    wp_enqueue_script('s-common', T_DIRE_URI.'/assets/js/common.js', ['s-jquery'], '1.0', true);
    wp_enqueue_script('s-datepicker', T_DIRE_URI.'/assets/js/datepicker.min.js', ['s-jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_add_files');

/**
 * inherit__review slick初期化（フロントページのみ）
 */
function inherit_review_slick_init() {
    if (is_front_page()) {
        ?>
        <script>
        jQuery(document).ready(function($) {
            if ($('.inherit__review .review__wrap').length && !$('.inherit__review .review__wrap').hasClass('slick-initialized')) {
                $('.inherit__review .review__wrap').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                    infinite: true,
                    autoplay: false,
                    speed: 500,
                    responsive: [{
                        breakpoint: 728,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true
                        }
                    }]
                });
            }
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'inherit_review_slick_init');

/**
 * Font Awesomeにcrossorigin属性を追加
 */
function add_fontawesome_attributes( $tag, $handle ) {
    if ( 's-fontawesome' === $handle ) {
        return str_replace( 'src', 'crossorigin="anonymous" src', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'add_fontawesome_attributes', 10, 2 );

/**
 * 管理画面用スクリプト（現在は無効化）
 */
function theme_admin_assets() {
    wp_enqueue_script( 'csv-uploader', T_DIRE_URI . '/admin/script.js', array( 'jquery' ) );
}
// add_action('admin_enqueue_scripts', 'theme_admin_assets');

/**
 * タクソノミーのチェックリストをラジオボタンに変更
 */
function custom_term_radio_checklist( $args ) {
    if ( ! empty( $args['taxonomy'] ) && ($args['taxonomy'] === 'blog_category' || $args['taxonomy'] === 'category') ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { 
            if ( ! class_exists( 'WPSE_139269_Walker_Category_Radio_Checklist' ) ) {
                class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, ...$args ) {
                        $output = parent::walk( $elements, $max_depth, ...$args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );
                        return $output;
                    }
                }
            }
            $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
        }
    }
    return $args;
}
add_filter( 'wp_terms_checklist_args', 'custom_term_radio_checklist' );

/**
 * テーマセットアップ
 */
function theme_custom_setup() {
    add_theme_support( 'post-thumbnails' ); 
    add_image_size( "voice_thumb", 340, 340, true );
    add_image_size( "instagram_thumb", 250, 250, true );
    add_image_size( "medium", 1080, 800, true );
    add_image_size( "thumb", 294, 225, true );
    add_image_size( "small", 250, 175, true );
    set_post_thumbnail_size( 294, 225, true );
    add_editor_style('assets/css/reset.css');
    add_editor_style('assets/css/common1.css');
    add_editor_style('assets/css/style.css');
    add_editor_style('editor-style.css');
}
add_action( 'after_setup_theme', 'theme_custom_setup' );

/**
 * コンテンツ内の画像パスを置換
 */
function replaceImagePath( $arg ) {
    $content = str_replace('"images/', '"' . T_DIRE_URI . '/assets/img/', $arg);
    $content = str_replace('"/images/', '"' . T_DIRE_URI . '/assets/img/', $content);
    $content = str_replace(', images/', ', ' . T_DIRE_URI . '/assets/img/', $content);
    $content = str_replace("('images/", "('". T_DIRE_URI . '/assets/img/', $content);
    return $content;
}
add_action('the_content', 'replaceImagePath');

/**
 * 固定ページでwpautopを無効化
 */
function disable_wp_auto_p( $content ) {
    if ( is_singular( 'page' ) ) {
      remove_filter( 'the_content', 'wpautop' );
    }
    remove_filter( 'the_excerpt', 'wpautop' );
    return $content;
}
add_filter( 'the_content', 'disable_wp_auto_p', 0 );

add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Contact Form 7：メール確認バリデーション
 */
add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
function custom_email_confirmation_validation_filter( $result, $tag ) {
    if ( 'your-email-confirm' == $tag->name ) {
        $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
        $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
        
        if ( $your_email != $your_email_confirm ) {
            $result->invalidate( $tag, 'メールアドレスが一致しません。' );
        }
    }
    return $result;
}

/**
 * アイキャッチ画像がない場合のデフォルト画像を取得
 */
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
    $first_img = $matches[1][0] ?? '';
    
    if(empty($first_img)) {
        $first_img = T_DIRE_URI . "/assets/img/noimage.jpg";
    }
    return $first_img;
}

/**
 * SVGファイルのアップロードを許可
 */
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * タクソノミーのチェックリストで選択済みを上に表示しない
 */
function taxonomy_checklist_checked_ontop_filter ($args) {
    $args['checked_ontop'] = false;
    return $args;
}
add_filter('wp_terms_checklist_args','taxonomy_checklist_checked_ontop_filter');

/**
 * 抜粋の文字数を変更
 */
function new_excerpt_length($length) {
    return 113;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * 投稿の閲覧数をカウント
 */
function wp_set_post_views( $postID ) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta( $postID, $count_key, true );

    if( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function wp_get_post_views( $content ) {
    if ( is_single() ) {
        wp_set_post_views(get_the_ID());
    }
    return $content;
}
add_filter( 'the_content', 'wp_get_post_views' );

/**
 * 前後の投稿リンクのカスタマイズ
 */
add_filter( 'previous_post_link', 'filter_single_post_pagination', 10, 4 );
add_filter( 'next_post_link',     'filter_single_post_pagination', 10, 4 );

function filter_single_post_pagination( $output, $format, $link, $post ) {
    if( $post ) {
        $title = get_the_title( $post );
        $url   = get_permalink( $post->ID );
        
        $class = 'prev-btn';
        if ( 'next_post_link' === current_filter() ) {
            $class = 'next-btn';
        }
        if( $link ) {
            $text = $link;
        }
        ob_start();
        ?>
        <a href="<?php echo esc_url($url); ?>" class="page-btn <?php echo esc_attr($class); ?>"><span><?php echo $text; ?></span></a>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    return false;
}

/**
 * シェアボタンの出力
 */
function wp_get_share_btns( $post_id = null ) {
    $post_id      = $post_id ? $post_id : get_the_ID();
    $share_title = html_entity_decode( get_the_title( $post_id ) );
    $share_url   = get_permalink( $post_id );
    $share_btns = [
        'twitter' => [
            'title'       => __( 'Twitter', THEME_NOTE ),
            'icon'        => '<i class="fa-brands fa-square-twitter"></i>',
            'href'        => 'https://twitter.com/intent/tweet?url=' .  urlencode( $share_url ) . '&text=' . urlencode($share_title),
            'class'       => 'twitter-link',
        ],
        'facebook' => [
            'title'       => __( 'Facebook', THEME_NOTE ),
            'icon'        => '<i class="fa-brands fa-square-facebook"></i>',
            'href'        => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode( $share_url ),
            'class'       => 'facebook-link',
        ],
        'line' => [
            'title'       => __( 'LINE', THEME_NOTE ),
            'icon'        => '<i class="fa-brands fa-line"></i>',
            'href'        => 'https://social-plugins.line.me/lineit/share?url=' .  urlencode( $share_url ),
            'class'       => 'line-link',
        ],
    ];
    ob_start();
    ?>
    <div class="share-links">
        <span class="label">この記事をシェアする</span>
        <?php foreach ($share_btns as $key => $btn) : ?>
            <a href="<?php echo esc_url($btn['href']); ?>" class="<?php echo esc_attr($btn['class']); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo $btn['icon']; ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php 
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
}

/**
 * ショートコード：カスタムリンクボタン
 */
function custom_link_btn( $attr ) {
    $args = shortcode_atts( array(
        'link' => '/',
        'text' => 'もっと見る',
    ), $attr );
    
    ob_start();
    $link = $args['link'];
    if (strpos($args['link'], 'http') === false) {
        $link = home_url( $args['link']);
    }
    ?>
    <a href="<?php echo esc_url($link); ?>" class="link-btn mx-auto">
        <span><?php echo esc_html($args['text']); ?></span>
    </a>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('link-btn', 'custom_link_btn');

/**
 * ショートコード：トップページのニュース一覧（Swiper）
 */
function custom_get_news_posts( $attr ) {
    $args = shortcode_atts( array(
        'count' => 6,
        'orderby' => 'post_date',
        'order' => 'DESC',
    ), $attr );
    
    ob_start();

    $post_args = [
        'post_type' => 'blog',
        'post_status' => 'publish',
        'posts_per_page' => $args['count'],
        'orderby' => $args['orderby'],
        'order' => $args['order'],
    ];

    $post_query = new WP_Query( $post_args );
    ?>

    <?php if( $post_query->have_posts() ) : ?>
        <div class="news-swiper-slider">
            <div class="swiper top-news-swiper">
                <div class="swiper-wrapper">
                    <?php while( $post_query->have_posts() ) : $post_query->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="news-item">
                                <?php $thumbs = get_field('thumbs'); ?>
                                <?php if( $thumbs ) : ?>
                                    <a href="<?php the_permalink(); ?>" class="thumb">
                                        <img src="<?php echo esc_url($thumbs[0]['sizes']['small']); ?>" alt="<?php echo esc_attr($thumbs[0]['title']); ?>">
                                    </a>
                                <?php endif; ?>
                                <div class="content">
                                    <div class="blog-concept">
                                        <time class="date"><?php the_time("Y/m/d"); ?>/</time>
                                        <?php $blog_cats = get_the_terms(get_the_ID(), 'blog_category'); ?>
                                        <?php if( $blog_cats ) : ?>
                                            <p class="label"><?php echo esc_html($blog_cats[0]->name); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <h4 class="title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <a href="<?php the_permalink(); ?>" class="link-btn btn-main">
                                        <span>詳しくみる</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('top-news-list', 'custom_get_news_posts');

/**
 * ショートコード：実績一覧（Swiper）
 */
function custom_get_work_posts( $attr ) {
    $args = shortcode_atts( array(
        'count' => 6,
        'orderby' => 'post_date',
        'order' => 'DESC',
    ), $attr );
    
    ob_start();

    $post_args = [
        'post_type' => 'work',
        'post_status' => 'publish',
        'posts_per_page' => $args['count'],
        'orderby' => $args['orderby'],
        'order' => $args['order'],
    ];

    $post_query = new WP_Query( $post_args );
    ?>

    <?php if( $post_query->have_posts() ) : ?>
        <div class="news-swiper-slider">
            <div class="swiper top-work-swiper">
                <div class="swiper-wrapper">
                    <?php while( $post_query->have_posts() ) : $post_query->the_post(); ?>
                        <div class="swiper-slide">
                        <div class="news-item">
                            <?php $thumbs = get_field('thumbs'); ?>
                            <?php if( $thumbs ) : ?>
                            <a href="<?php the_permalink(); ?>" class="thumb work-thumb">
                                <img src="<?php echo esc_url($thumbs[0]['sizes']['small']); ?>"
                                    alt="<?php echo esc_attr($thumbs[0]['title']); ?>">
                            </a>
                            <?php endif; ?>
                            <div class="content">
                                <div class="work-concept">
                                    <time class="date">
                                        <?php the_time("Y/m/d"); ?>
                                    </time>
                                    <p class="label">
                                        <?php  $cat = get_the_terms(get_the_ID(), 'custom_category');?>
                                        <?php echo esc_html($cat[0]->name ?? ''); ?>
                                    </p>
                                </div>
                                <h4 class="title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    <?php endif; ?>
    
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('top-work-list', 'custom_get_work_posts');

/**
 * ショートコード：ブログ一覧
 */
function custom_get_blog_posts( $attr ) {
    $args = shortcode_atts( array(
        'count' => 6,
        'orderby' => 'post_date',
        'order' => 'DESC',
    ), $attr );
    
    ob_start();

    $post_args = [
        'post_type' => 'blog',
        'post_status' => 'publish',
        'posts_per_page' => $args['count'],
        'orderby' => $args['orderby'],
        'order' => $args['order'],
    ];

    $post_query = new WP_Query( $post_args );
    ?>

    <?php if( $post_query->have_posts() ) : ?>
        <div class="news-list">
            <?php while( $post_query->have_posts() ) : $post_query->the_post(); ?>
                <div class="news-item">
                    <?php $thumbs = get_field('thumbs'); ?>
                    <?php if( $thumbs ) : ?>
                        <a href="<?php the_permalink(); ?>" class="thumb">
                            <img src="<?php echo esc_url($thumbs[0]['sizes']['small']); ?>" alt="<?php echo esc_attr($thumbs[0]['title']); ?>">
                        </a>
                    <?php endif; ?>
                    <div class="content">
                        <div class="blog-concept">
                            <time class="date"><?php the_time("Y/m/d"); ?>/</time>
                            <?php $blog_cats = get_the_terms(get_the_ID(), 'blog_category'); ?>
                            <?php if( $blog_cats ) : ?>
                                <p class="label"><?php echo esc_html($blog_cats[0]->name); ?></p>
                            <?php endif; ?>
                        </div>
                        <h4 class="title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>
    
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('blog-list', 'custom_get_blog_posts');

/**
 * カスタムスクリプトのエンキュー
 */
function enqueue_custom_scripts() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

/**
 * Shapo.io APIからレビューを取得（キャッシュ付き）
 */
function temple_get_shapo_reviews( $limit = 7 ) {
    $widget_id = defined( 'TEMPLE_SHAPO_WIDGET_ID' ) ? TEMPLE_SHAPO_WIDGET_ID : '581a6fd630b08ea57682';
    if ( $widget_id === '' ) {
        return array();
    }

    $cache_key = 'temple_shapo_reviews_v1';
    $cached = get_transient( $cache_key );
    if ( is_array( $cached ) ) {
        return $cached;
    }

    $url = 'https://api.shapo.io/widgets/' . rawurlencode( $widget_id );

    $response = wp_remote_get( $url, array( 'timeout' => 8 ) );
    if ( is_wp_error( $response ) ) {
        set_transient( $cache_key, array(), HOUR_IN_SECONDS );
        return array();
    }

    $code = wp_remote_retrieve_response_code( $response );
    if ( $code !== 200 ) {
        set_transient( $cache_key, array(), HOUR_IN_SECONDS );
        return array();
    }

    $data = json_decode( wp_remote_retrieve_body( $response ), true );
    if ( ! is_array( $data ) || empty( $data['testimonials'] ) ) {
        set_transient( $cache_key, array(), HOUR_IN_SECONDS );
        return array();
    }

    $reviews = array();
    foreach ( $data['testimonials'] as $review ) {
        $rating = isset( $review['rating'] ) ? (int) $review['rating'] : 0;
        if ( $rating !== 5 ) {
            continue;
        }
        $reviews[] = array(
            'author_name' => isset( $review['name'] ) ? $review['name'] : '',
            'author_url' => isset( $review['link'] ) ? $review['link'] : '',
            'profile_photo_url' => isset( $review['profileImage'] ) ? $review['profileImage'] : '',
            'text' => isset( $review['message'] ) ? $review['message'] : '',
            'relative_time_description' => isset( $review['date'] ) ? $review['date'] : '',
            'rating' => $rating,
            'is_static' => false,
        );
    }

    if ( count( $reviews ) > $limit ) {
        $reviews = array_slice( $reviews, 0, $limit );
    }

    set_transient( $cache_key, $reviews, 6 * HOUR_IN_SECONDS );
    return $reviews;
}

/**
 * 静的なフォールバック用レビューデータ
 */
function temple_get_static_reviews() {
    $fallback_text = 'Thank you for your kind review. We appreciate your support.';
    $icon = get_template_directory_uri() . '/assets/img/custom/g-icon_red.png';

    return array(
        array(
            'author_name' => 'Google User',
            'author_url' => '',
            'profile_photo_url' => $icon,
            'text' => $fallback_text,
            'relative_time_description' => 'Google review',
            'rating' => 5,
            'is_static' => true,
        ),
        array(
            'author_name' => 'Google User',
            'author_url' => '',
            'profile_photo_url' => $icon,
            'text' => $fallback_text,
            'relative_time_description' => 'Google review',
            'rating' => 5,
            'is_static' => true,
        ),
        array(
            'author_name' => 'Google User',
            'author_url' => '',
            'profile_photo_url' => $icon,
            'text' => $fallback_text,
            'relative_time_description' => 'Google review',
            'rating' => 5,
            'is_static' => true,
        ),
        array(
            'author_name' => 'Google User',
            'author_url' => '',
            'profile_photo_url' => $icon,
            'text' => $fallback_text,
            'relative_time_description' => 'Google review',
            'rating' => 5,
            'is_static' => true,
        ),
        array(
            'author_name' => 'Google User',
            'author_url' => '',
            'profile_photo_url' => $icon,
            'text' => $fallback_text,
            'relative_time_description' => 'Google review',
            'rating' => 5,
            'is_static' => true,
        ),
        array(
            'author_name' => 'Google User',
            'author_url' => '',
            'profile_photo_url' => $icon,
            'text' => $fallback_text,
            'relative_time_description' => 'Google review',
            'rating' => 5,
            'is_static' => true,
        ),
        array(
            'author_name' => 'Google User',
            'author_url' => '',
            'profile_photo_url' => $icon,
            'text' => $fallback_text,
            'relative_time_description' => 'Google review',
            'rating' => 5,
            'is_static' => true,
        ),
    );
}

/**
 * 相続ページ用レビュー取得（動的+静的のミックス）
 */
function temple_get_inherit_reviews( $limit = 7 ) {
    $dynamic = temple_get_shapo_reviews( $limit );
    $static = temple_get_static_reviews();
    $items = array();
    $seen = array();

    if ( is_array( $dynamic ) ) {
        foreach ( $dynamic as $review ) {
            $key = ( isset( $review['author_name'] ) ? $review['author_name'] : '' ) . '|' . ( isset( $review['text'] ) ? $review['text'] : '' );
            if ( $key === '|' ) {
                continue;
            }
            if ( isset( $seen[ $key ] ) ) {
                continue;
            }
            $seen[ $key ] = true;
            $items[] = $review;
            if ( count( $items ) >= $limit ) {
                break;
            }
        }
    }

    $need = $limit - count( $items );
    if ( $need > 0 && is_array( $static ) && ! empty( $static ) ) {
        shuffle( $static );
        foreach ( $static as $review ) {
            $key = ( isset( $review['author_name'] ) ? $review['author_name'] : '' ) . '|' . ( isset( $review['text'] ) ? $review['text'] : '' );
            if ( $key === '|' ) {
                continue;
            }
            if ( isset( $seen[ $key ] ) ) {
                continue;
            }
            $seen[ $key ] = true;
            $items[] = $review;
            if ( count( $items ) >= $limit ) {
                break;
            }
        }
    }

    if ( count( $items ) > 1 ) {
        shuffle( $items );
    }

    return array_slice( $items, 0, $limit );
}
