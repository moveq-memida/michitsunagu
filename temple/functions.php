<?php

if ( ! defined( 'ABSPATH' ) ) exit;



// サイト情報

define( 'HOME', home_url( '/' ) );

define( 'TITLE', get_option( 'blogname' ) );



// 状慁E
define( 'IS_ADMIN', is_admin() );

define( 'IS_LOGIN', is_user_logged_in() );

define( 'IS_CUSTOMIZER', is_customize_preview() );



// チE�Eマディレクトリパス

define( 'T_DIRE', get_template_directory() );

define( 'S_DIRE', get_stylesheet_directory() );

define( 'T_DIRE_URI', get_template_directory_uri() );

define( 'S_DIRE_URI', get_stylesheet_directory_uri() );



define( 'THEME_NOTE', 'takara-factory' );



define( 'WPCF7_AUTOP', false );



error_reporting(0);







flush_rewrite_rules();

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$blog_category_slug = get_query_var('blog_category') ? get_query_var('blog_category') : "100";

add_filter('query_vars', function($vars) {

    $vars[] = 'blog_category_slug';

    return $vars;

});



$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$work_custom_category = get_query_var('work_custom_category') ? get_query_var('work_custom_category') : "100";

add_filter('query_vars', function($vars) {

    $vars[] = 'work_custom_category';

    return $vars;

});



// functions.phpに追加

add_action('admin_menu', 'add_custom_fields');

add_action('save_post', 'save_custom_fields');

 

// 記事�Eージと固定�Eージでカスタムフィールドを表示

function add_custom_fields() {

  add_meta_box( 'my_sectionid', 'Meta Settings', 'my_custom_fields', 'post' );

  add_meta_box( 'my_sectionid', 'Meta Settings', 'my_custom_fields', 'page' );

}

 

function my_custom_fields() {

  global $post;

  $keywords = get_post_meta($post->ID,'keywords',true);

  $description = get_post_meta($post->ID,'description',true);

   

  echo '<p>キーワード（半角カンマ区刁E���E�Ebr>';

  echo '<input type="text" name="keywords" value="'.esc_html($keywords).'" size="60"></p>';

   

  echo '<p>ペ�Eジの説明！Eescription�E�E60斁E��以冁Ebr>';

  echo '<input type="text" style="width: 600px;height: 40px;" name="description" value="'.esc_html($description).'" maxlength="160"></p>';

}

 

// カスタムフィールド�E値を保孁E
function save_custom_fields( $post_id ) {

  if(!empty($_POST['keywords']))

    update_post_meta($post_id, 'keywords', $_POST['keywords'] );

  else delete_post_meta($post_id, 'keywords');

 

  if(!empty($_POST['description']))

    update_post_meta($post_id, 'description', $_POST['description'] );

  else delete_post_meta($post_id, 'description');

}

 

function page_description() {

 

// カスタムフィールド�E値を読み込む

$custom = get_post_custom();

if(!empty( $custom['keywords'][0])) {

  $keywords = $custom['keywords'][0];

}

if(!empty( $custom['description'][0])) {

  $description = $custom['description'][0];

}

?>

  <?php if(is_home()): // トップ�Eージ ?>

  <meta name="robots" content="index, follow">

  <meta name="keywords" content="">

  <meta name="description" content="">

  <?php elseif(is_single()): // 記事�Eージ ?>

  <meta name="robots" content="index, follow" />

  <meta name="keywords" content="<?php echo $keywords ?>">

  <meta name="description" content="<?php echo $description ?>">

  <?php elseif(is_page()): // 固定�Eージ ?>

  <meta name="robots" content="index, follow" />

  <meta name="keywords" content="<?php echo $keywords ?>">

  <meta name="description" content="<?php echo $description ?>">

  <?php elseif (is_category()): // カチE��リーペ�Eジ ?>

  <meta name="robots" content="index, follow" />

  <meta name="description" content="<?php single_cat_title(); ?>の記事一覧">

  <?php elseif (is_tag()): // タグペ�Eジ ?>

  <meta name="robots" content="noindex, follow" />

  <meta name="description" content="<?php single_tag_title("", true); ?>の記事一覧">

  <?php elseif(is_404()): // 404ペ�Eジ ?>

  <meta name="robots" content="noindex, follow">

  <title><?php echo 'お探し�Eペ�Eジが見つかりませんでした'; ?></title>

  <?php else: // そ�E他�Eージ ?>

  <meta name="robots" content="noindex, follow">

  <?php endif; ?>

  <?php

  

}





// 固定�EージとMW WP Formでビジュアルモードを使用しなぁE
function stop_rich_editor($editor) {

    global $typenow;

    global $post;

    if(in_array($typenow, array('page', 'post', 'blog', 'voice', 'mw-wp-form'))) {

        $editor = true;

    }

    return $editor;

}



add_filter('user_can_richedit', 'stop_rich_editor');



// エチE��ター独自スタイル追加

//TinyMCE追加用のスタイルを�E期化

if(!function_exists('initialize_tinymce_styles')) {

    function initialize_tinymce_styles($init_array) {

        //追加するスタイルの配�Eを作�E

        $style_formats = array(

            array(

                'title' => 'Note',

                'inline' => 'span',

                'classes' => 'cmn_note'

            )

        );

        //JSONに変換

        $init_array['style_formats'] = json_encode($style_formats);

        return $init_array;

    }

}



add_filter('tiny_mce_before_init', 'initialize_tinymce_styles', 10000);



function custom_post_taxonomy() {

    $args = array(

        'hierarchical' => true, // Set to true if you want hierarchical (nested) categories like the default "Categories" taxonomy

        'labels' => array(

            'name' => 'Custom Categories', // Replace with your desired label

            'singular_name' => 'Custom Category',

            'search_items' => 'Search Custom Categories',

            'all_items' => 'All Custom Categories',

            'parent_item' => 'Parent Custom Category',

            'parent_item_colon' => 'Parent Custom Category:',

            'edit_item' => 'Edit Custom Category',

            'update_item' => 'Update Custom Category',

            'add_new_item' => 'Add New Custom Category',

            'new_item_name' => 'New Custom Category Name',

            'menu_name' => 'Custom Categories', // Replace with your desired label for the admin menu

        ),

        'rewrite' => array('slug' => 'custom-category'), // Replace with your desired slug

    );

    register_taxonomy('custom_category', 'work', $args); // Replace 'post' with your desired post type (e.g., 'product' if that's your post type)

}

add_action('init', 'custom_post_taxonomy');







function post_menu_remove() { 

   remove_menu_page('edit.php');

}



add_action('admin_menu', 'post_menu_remove'); 



function my_script_constants() {

?>

    <script type="text/javascript">

        var templateUrl = '<?php echo S_DIRE_URI; ?>';

        var baseSiteUrl = '<?php echo home_url(); ?>/consult';

        var themeAjaxUrl = '<?php echo admin_url( 'admin-ajax.php' ) ?>';

    </script>

<?php

}



add_action('wp_head', 'my_script_constants');





function my_shortcode() {

    ob_start();

    get_template_part('template', 'parts/breadcrumbs');

    return ob_get_clean();   

}



add_shortcode( 'my_shortcode', 'my_shortcode' );



// CSS・スクリプトの読み込み

function theme_add_files() {

    global $post;



    wp_enqueue_style('c-reset', T_DIRE_URI.'/assets/css/reset.css', [], '1.0', 'all');

    wp_enqueue_style('c-swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], '1.0', 'all');

    wp_enqueue_style('c-common', T_DIRE_URI.'/assets/css/common1.css', [], '1.0', 'all');

    wp_enqueue_style('c-style', T_DIRE_URI.'/assets/css/style.css', [], '1.0', 'all');

    wp_enqueue_style('c-theme', T_DIRE_URI.'/style.css', [], '1.0', 'all');



    // WordPress本体�Ejquery.jsを読み込まなぁE
    if(!is_admin()) {

        wp_deregister_script('jquery');

    }



    // wp_enqueue_script('s-jquery', T_DIRE_URI.'/assets/js/jquery.min.js', [], '1.0', false); // header.phpでCDN版を読み込むため無効化

    wp_enqueue_script('s-swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], '1.0', true);

    wp_enqueue_script('s-fontawesome', 'https://kit.fontawesome.com/8cbdf0a85f.js', [], '6.8.1', true);

    // wp_enqueue_script('s-common', T_DIRE_URI.'/assets/js/common.js', [], '1.0', true); // header.phpで直接読み込むため無効化

}



add_action('wp_enqueue_scripts', 'theme_add_files');

// inherit__review slick初期化
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



function add_fontawesome_attributes( $tag, $handle ) {

    if ( 's-fontawesome' === $handle ) {

        return str_replace( 'src', 'crossorigin="anonymous" src', $tag );

    }

    return $tag;

}

add_filter( 'script_loader_tag', 'add_fontawesome_attributes', 10, 2 );



function theme_admin_assets() {

    wp_enqueue_script( 'csv-uploader', T_DIRE_URI . '/admin/script.js', array( 'jquery' ) );

}



// add_action('admin_enqueue_scripts', 'theme_admin_assets');



function custom_term_radio_checklist( $args ) {

    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'blog_category' || $args['taxonomy'] === 'category' ) {

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



function replaceImagePath( $arg ) {

    $content = str_replace('"images/', '"' . T_DIRE_URI . '/assets/img/', $arg);

    $content = str_replace('"/images/', '"' . T_DIRE_URI . '/assets/img/', $content);

    $content = str_replace(', images/', ', ' . T_DIRE_URI . '/assets/img/', $content);

    $content = str_replace("('images/", "('". T_DIRE_URI . '/assets/img/', $content);

    return $content;

}



add_action('the_content', 'replaceImagePath');



function disable_wp_auto_p( $content ) {

    if ( is_singular( 'page' ) ) {

      remove_filter( 'the_content', 'wpautop' );

    }

    remove_filter( 'the_excerpt', 'wpautop' );

    return $content;

}



add_filter( 'the_content', 'disable_wp_auto_p', 0 );



add_filter('wpcf7_autop_or_not', '__return_false');



add_filter('query_vars', function($vars) {

	$vars[] = 'news_category';

	return $vars;

});



add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );

  

function custom_email_confirmation_validation_filter( $result, $tag ) {

  if ( 'your-email-confirm' == $tag->name ) {

    $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';

    $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';

  

    if ( $your_email != $your_email_confirm ) {

      $result->invalidate( $tag, '���[���A�h���X����v���܂���B' );

    }

  }

  

  return $result;

}



function catch_that_image() {

    global $post, $posts;

    $first_img = '';

    ob_start();

    ob_end_clean();

    $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);

    $first_img = $matches[1][0];

  

    if(empty($first_img)) {

      $first_img = T_DIRE_URI . "/assets/img/noimage.jpg";

    }

    return $first_img;

  }



//add SVG to allowed file uploads

function add_file_types_to_uploads($file_types){



    $new_filetypes = array();

    $new_filetypes['svg'] = 'image/svg+xml';

    $file_types = array_merge($file_types, $new_filetypes );



    return $file_types;

}

add_action('upload_mimes', 'add_file_types_to_uploads');



function taxonomy_checklist_checked_ontop_filter ($args) {

    $args['checked_ontop'] = false;

    return $args;

}



add_filter('wp_terms_checklist_args','taxonomy_checklist_checked_ontop_filter');



function new_excerpt_length($length) {

    return 113;

}

add_filter('excerpt_length', 'new_excerpt_length');



function new_excerpt_more($more) {

    return '...';

}



add_filter('excerpt_more', 'new_excerpt_more');



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



add_filter( 'previous_post_link', 'filter_single_post_pagination', 10, 4 );

add_filter( 'next_post_link',     'filter_single_post_pagination', 10, 4 );



function filter_single_post_pagination( $output, $format, $link, $post )

{

    if( $post ) {

        $title = get_the_title( $post );

        $url   = get_permalink( $post->ID );

        

        $class = 'prev-btn';



        if ( 'next_post_link' === current_filter() )

        {

            $class = 'next-btn';

        }

        if( $link ) {

            $text = $link;

        }

        ob_start();

        ?>

        <a href="<?php echo $url; ?>" class="page-btn <?php echo $class; ?>"><span><?php echo $text; ?></span></a>

        <?php

        $output = ob_get_contents();

        ob_end_clean();

        return $output;

    }

    return false;

}



function wp_get_share_btns( $post_id = null ) {

    $post_id      = $post_id ? $post_id : get_the_ID();

    $share_title = html_entity_decode( get_the_title( $post_id ) );

    $share_url   = get_permalink( $post_id );

    $share_btns = [

        'twitter' => [

            'title'       => __( 'Twitter', THEME_NOTE ),

            'icon'        => '<i class="fa-brands fa-square-twitter"></i>',

            'href'        => 'https://twitter.com/intent/tweet?url=' .  urlencode( $share_url ) . '&text=' . $share_title . '',

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

            'href'        => 'https://social-plugins.line.me/lineit/share?url' .  urlencode( $share_url ) . '&text=' . $share_title . '',

            'class'       => 'line-link',

        ],

    ];

    ob_start();

    ?>

    <div class="share-links">

        <span class="label">こ�E記事をシェアする</span>

        <?php foreach ($share_btns as $key => $btn) : ?>

            <a href="<?php echo $btn['href']; ?>" class="<?php echo $btn['class']; ?>">

                <?php echo $btn['icon']; ?>

            </a>

        <?php endforeach; ?>

    </div>

    <?php 

    $output = ob_get_contents();

    ob_end_clean();

    echo $output;

}



function custom_link_btn( $attr ) {



    $args = shortcode_atts( array(

        'link' => '/',

        'text' => 'もっと見る',

    ), $attr );

    

    ob_start();

    $link = $args['link'];

    if (strpos($args['link'], 'http') == false) {

        $link = home_url( $args['link']);

    }

    ?>

    <a href="<?php echo $link; ?>" class="link-btn mx-auto">

        <span><?php echo $args['text'] ?></span>

    </a>

    <?php

    $output = ob_get_contents();

    ob_end_clean();

    return $output;

}



add_shortcode('link-btn', 'custom_link_btn');



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

                                        <img src="<?php echo esc_url($thumbs[0]['sizes']['small']); ?>" alt="<?php echo esc_html($thumbs[0]['title']); ?>">

                                    </a>

                                <?php endif; ?>

                                <div class="content">

                                    <div class="blog-concept">

                                        <time class="date"><?php the_time("Y/m/d"); ?>/</time>

                                        <?php $blog_cats = get_the_terms(get_the_ID(), 'blog_category'); ?>

                                        <?php if( $blog_cats ) : ?>

                                            <p class="label"><?php echo $blog_cats[0]->name; ?></p>

                                        <?php endif; ?>

                                    </div>

                                    <h4 class="title">

                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                    </h4>

                                    <a href="<?php the_permalink(); ?>" class="link-btn btn-main">

                                        <span>詳しくみめE/span>

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

                                    alt="<?php echo esc_html($thumbs[0]['title']); ?>">

                            </a>

                            <?php endif; ?>

                            <div class="content">

                                <div class="work-concept">

                                    <time class="date">

                                        <?php the_time("Y/m/d"); ?>

                                    </time>

                                    <p class="label">

                                        <?php  $cat = get_the_terms(get_the_ID(), 'custom_category');?>

                                        <?php echo $cat[0]->name; ?>

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

                            <img src="<?php echo esc_url($thumbs[0]['sizes']['small']); ?>" alt="<?php echo esc_html($thumbs[0]['title']); ?>">

                        </a>

                    <?php endif; ?>

                    <div class="content">

                        <div class="blog-concept">

                            <time class="date"><?php the_time("Y/m/d"); ?>/</time>

                            <?php $blog_cats = get_the_terms(get_the_ID(), 'blog_category'); ?>

                            <?php if( $blog_cats ) : ?>

                                <p class="label"><?php echo $blog_cats[0]->name; ?></p>

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









// function create_news() {



// 	$supports = array(

// 	'title', // post title

// 	'editor', // post content

// 	'author', // post author

// 	'thumbnail', // featured images

// 	'excerpt', // post excerpt

// 	'custom-fields', // custom fields

// 	'comments', // post comments

// 	'revisions', // post revisions

// 	'post-formats', // post formats

// 	);



// 	$labels = array(

// 	'name' => _x('事業のお知らせ', 'plural'),

// 	'singular_name' => _x('事業のお知らせ', 'singular'),

// 	'menu_name' => _x('事業のお知らせ', 'admin menu'),

// 	'name_admin_bar' => _x('事業のお知らせ', 'admin bar'),

// 	'add_new' => _x('Add 事業のお知らせ', 'add new'),

// 	'add_new_item' => __('Add New 事業のお知らせ'),	

// 	'new_item' => __('New 事業のお知らせ'),

// 	'edit_item' => __('Edit 事業のお知らせ'),

// 	'view_item' => __('View 事業のお知らせ'), 

// 	'all_items' => __('All 事業のお知らせ'),

// 	'search_items' => __('Search 事業のお知らせ'),

// 	'not_found' => __('No 事業のお知らせ found.'),

// 	);

// 	$args = array(

// 	'supports' => $supports,

// 	'labels' => $labels,

// 	'public' => true,

// 	'query_var' => true,

// 	'rewrite' => array('slug' => 'news'),

// 	'has_archive' => true,

// 	'hierarchical' => false,

// 	"show_in_rest" => true,

// 	'taxonomies' => array('category', 'post_tag') 

// 	);

// 	register_post_type( 'news', $args);

// }



// // Hooking up our function to theme setup

// add_action( 'init', 'create_news' );







// function create_voice() {



// 	$supports = array(

// 	'title', // post title

// 	'editor', // post content

// 	'author', // post author

// 	'thumbnail', // featured images

// 	'excerpt', // post excerpt

// 	'custom-fields', // custom fields

// 	'comments', // post comments

// 	'revisions', // post revisions

// 	'post-formats', // post formats

// 	);



// 	$labels = array(

// 	'name' => _x('事業のお客様�E声', 'plural'),

// 	'singular_name' => _x('事業のお客様�E声', 'singular'),

// 	'menu_name' => _x('事業のお客様�E声', 'admin menu'),

// 	'name_admin_bar' => _x('事業のお客様�E声', 'admin bar'),

// 	'add_new' => _x('Add 事業のお客様�E声', 'add new'),

// 	'add_new_item' => __('Add New 事業のお客様�E声'),	

// 	'new_item' => __('New 事業のお客様�E声'),

// 	'edit_item' => __('Edit 事業のお客様�E声'),

// 	'view_item' => __('View 事業のお客様�E声'), 

// 	'all_items' => __('All 事業のお客様�E声'),

// 	'search_items' => __('Search 事業のお客様�E声'),

// 	'not_found' => __('No 事業のお客様�E声 found.'),

// 	);

// 	$args = array(

// 	'supports' => $supports,

// 	'labels' => $labels,

// 	'public' => true,

// 	'query_var' => true,

// 	'rewrite' => array('slug' => 'business-voice'),

// 	'has_archive' => true,

// 	'hierarchical' => false,

// 	"show_in_rest" => true,

// 	'taxonomies' => array('category', 'post_tag') 

// 	);

// 	register_post_type( 'business-voice', $args);

// }



// // Hooking up our function to theme setup

// add_action( 'init', 'create_voice' );









function enqueue_custom_scripts() {

  wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);

}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


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













?>




