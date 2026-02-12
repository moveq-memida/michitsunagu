<?php

    /*
    Template Name: 当事務所について
    */

    if ( ! defined( 'ABSPATH' ) ) exit;
    get_header();
    
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $blog_category_slug = get_query_var('blog_category') ? get_query_var('blog_category') : '';

?>

<main id="main">
    <section id="maintitle" class="maintitle bg-whitegray">
    <div class="container">
        <div class="mainheader">
        <h1 class="fw-600 fs-40">お知らせ</h1>
        <div class="mt-10 fw-600 fs-20">Topics</div>
        <div class="mt-20 d-flex fw-300 fs-14">
            <div class=""><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></div>
            <div class="mx-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7" viewBox="0 0 14 7" fill="none">
                <mask id="mask0_356_7501" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="14" height="7">
                <rect width="14" height="7" fill="#D9D9D9" />
                </mask>
                <g mask="url(#mask0_356_7501)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3165 0.318322C10.5117 0.123059 10.8283 0.123059 11.0236 0.318322L13.8424 3.13717C13.8456 3.14021 13.8488 3.14331 13.8519 3.14645C13.926 3.22047 13.9719 3.31193 13.9898 3.40761C14.0193 3.56439 13.9733 3.73254 13.852 3.85386C13.8482 3.85766 13.8443 3.8614 13.8404 3.86506L11.0235 6.68198C10.8282 6.87724 10.5117 6.87724 10.3164 6.68198C10.1211 6.48672 10.1211 6.17014 10.3164 5.97487L12.2913 4H0.5C0.223858 4 0 3.77614 0 3.5C0 3.22386 0.223858 3 0.5 3H12.291L10.3165 1.02543C10.1212 0.830166 10.1212 0.513584 10.3165 0.318322Z" fill="#363744"/>
                </g>
            </svg>
            </div>
            <div class="">お知らせ</div>
        </div>
		</div>
    </div>
    </section>
    <?php
        $args = [
            'post_type' => 'blog',
            'post_status' => 'publish',
            'paged' => $paged,
            'orderby' => 'post_date',
            'order' => "DESC",
        ];

        $tax_query = [];

        if( !empty($blog_category_slug) ) {
            $tax_query[] = [
                'taxonomy' => 'blog_category',
                'field' => 'slug',
                'terms' => $blog_category_slug
            ];
        }

        if ( !empty($tax_query) ) {
            $args['tax_query'] = $tax_query;
        }
    ?>

<?php $result = new WP_Query( $args ); ?>
    <section id="mainmiddle" class="mainmiddle">
        <div class="container">
            <div class="fs-16">
                <?php
                    $blog_all_cats = get_terms([
                        "taxonomy" => 'blog_category',
                        "hide_empty" => false,
                        "parent" => 0,
                        "orderby"   => "id",
                        "order"     => "ASC" 
                    ]);
                ?>
                <?php if( !empty( $blog_all_cats ) ) : ?>
                    <div class="row">
                        <div class="selfcol sub-feautre-2">
                            <a href="?blog_category=">
                                <button type="button"  class="bg-gray3 r-2 selfbtn">All</button>
                            </a>
                        </div>
                        <?php foreach ( $blog_all_cats as $category ): ?>
                            <div class="selfcol sub-feautre-2">
                                <a href="?blog_category=<?php echo esc_attr($category->slug); ?>">
                                    <button type="button" class="bg-gray3 r-2 selfbtn"><?php echo esc_html($category->name); ?></button>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-80 row flex_column text-box-list">
            <div class="col-0 col-md-1"></div>
            <?php if( $result->have_posts() ) : ?>
                <div class="col-0 col-md-10">
                    <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                        <div class="pr-25 pb-18 text-view">
                            <div class="d-flex align-items mb-10">
                                    <?php $blog_cats = get_the_terms(get_the_ID(), 'blog_category'); ?>
                                    <?php if( $blog_cats ) : ?>
                                        <div class="r-2 bg-brightblack color-white px-4 mr-10">
                                            <?php echo esc_html($blog_cats[0]->name); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($blog_cats && $blog_cats[0]->name == "お知らせ") : ?>
                                        <div class="pl-5 icon-new mr-10"></div>
                                    <?php endif; ?>
                                <div class="pl-5"><?php the_time("Y/m/d"); ?></div>
                            </div>
                                <a href="<?php the_permalink(); ?>">
                            <div class="d-flex justify-between align-items fs-16">
                                    <?php the_title(); ?>
                                <div class="icon-arrow"></div>
                            </div>
                                </a>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata(); 
                            endif;
                        ?>
                </div>
                <div class="wp-pagination">
                <?php if(function_exists('wp_pagenavi')) : ?>
                    <?php wp_pagenavi(array('query' => $result)); ?>
                <?php endif; ?>
                </div>
            <div class="col-0 col-md-1"></div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

