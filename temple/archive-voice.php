<?php
    declare(encoding='UTF-8');
	/*
	Template Name: 当事務所について
	*/

	if ( ! defined( 'ABSPATH' ) ) exit;
	get_header();

?>

<main id="main">
    <section id="maintitle" class="maintitle">
        <div class="container">
            <div class="mainheader">
            <div class="title">
                <h1 class="fs-40 bold">お客様の声</h1>
                <div class="fs-20 bold mt-10 mb-20">Customer voices</div>
                <div class="fs-14">
                <span><a href="<?php echo home_url(); ?>/">HOME</a></span>
                <span class="mx-5">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="14"
                    height="7"
                    viewBox="0 0 14 7"
                    fill="none"
                    >
                    <mask
                        id="mask0_288_2597"
                        style="mask-type: alpha"
                        maskUnits="userSpaceOnUse"
                        x="0"
                        y="0"
                        width="14"
                        height="7"
                    >
                        <rect width="14" height="7" fill="#D9D9D9" />
                    </mask>
                    <g mask="url(#mask0_288_2597)">
                        <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M10.3165 0.317833C10.5117 0.122571 10.8283 0.122571 11.0236 0.317833L13.852 3.14626C14.0473 3.34152 14.0473 3.65811 13.852 3.85337C13.8498 3.85552 13.8477 3.85765 13.8455 3.85976L11.0233 6.68198C10.828 6.87724 10.5114 6.87724 10.3162 6.68198C10.1209 6.48672 10.1209 6.17014 10.3162 5.97487L12.291 4H0.5C0.223858 4 0 3.77614 0 3.5C0 3.22386 0.223858 3 0.5 3H12.2915L10.3165 1.02494C10.1212 0.829678 10.1212 0.513095 10.3165 0.317833Z"
                        fill="#363744"
                        />
                    </g>
                    </svg>
                </span>
                <span> お客様の声</span>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section id="mainmiddle" class="mainmiddle">
        <div class="container">
            <div class="subsection-strongpoint pb-80">
            <div id="sect_voice01">
                <span class="fs-50">Inheritance support</span>
            </div>
            <div class="mt-10 fs-24">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="10"
                height="10"
                viewBox="0 0 10 10"
                fill="none"
                >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M3.97908 0.104634C4.53911 -0.0122203 5.12888 -0.0342122 5.72784 0.0539201C8.45949 0.455857 10.3481 2.99605 9.94612 5.7276C9.54417 8.45915 7.00389 10.3477 4.27225 9.94573C2.15146 9.63368 0.538836 8.03276 0.111754 6.05408C0.29545 6.11172 0.486066 6.15567 0.682607 6.18459C2.27678 6.41915 3.78247 5.5946 4.48634 4.24124C4.50275 4.21947 4.51553 4.19463 4.52365 4.16747L4.52779 4.15901L4.52617 4.15836C4.52819 4.15045 4.52982 4.14236 4.53104 4.13411C4.54993 4.00571 4.46116 3.88631 4.33276 3.86742C4.22511 3.85158 4.12379 3.91141 4.08271 4.00682C3.47227 5.20032 2.15046 5.92946 0.750518 5.72347C0.497388 5.68622 0.255512 5.62044 0.0276715 5.52985C-0.0157068 5.12019 -0.00877648 4.69845 0.0539682 4.27206C0.340381 2.32567 1.7125 0.807325 3.46594 0.240681C3.6337 0.186467 3.80495 0.140966 3.97908 0.104634ZM3.00091 2.9019C3.42758 2.96468 3.82435 2.6697 3.88713 2.24305C3.94991 1.81641 3.65493 1.41965 3.22827 1.35687C2.8016 1.29409 2.40483 1.58906 2.34205 2.01571C2.27927 2.44236 2.57425 2.83912 3.00091 2.9019Z"
                    fill="#70C03F"
                />
                </svg>
                <span>相続支援</span>
            </div>
            <div class="support_slider">
                <div class="owl-carousel" id="owl1">
                <?php 
                    $args = array(
                        'post_type'=>'voice',
                        'posts_per_page' => -1,                    
                        'post_status' => 'publish');
                    $args['meta_query'][] = array(
                                    'key'       => 'category',
                                    'value'     => '相続支援',
                                    'compare'   => 'LIKE',
                                );
                    $result = new WP_Query( $args );  
                    $data = array_map(
                        function( $post ) {
                            return (array) $post;
                        },
                        $result->posts
                    );
                    $key = 0;
                    while ( $result->have_posts() ) : $result->the_post(); 
                ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="item btn_hover">
                        <div class="flex_column support">
                        <div class="item_img">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/img/img_woman1.png" />
                        </div>
                        <div class="item_content">
                        <?php $content = mb_substr($data[$key]['post_content'], 0, 30, 'UTF-8');  echo $content.'・・・'; ?>
                        </div>
                        <div class="item_author"><?php echo get_field('age').' '.get_field('sex'); ?></div>
                        </div>
                    </div>
                </a>                   
                <?php         
                        $key++;   
                        endwhile;              
                        wp_reset_postdata();
                ?>
                </div>
                
            </div>
            </div>

            <div class="mt-80">
            <div id="sect_voice02">
                <span class="fs-50">Business support</span>
            </div>
            <div class="mt-10 fs-24">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="10"
                height="10"
                viewBox="0 0 10 10"
                fill="none"
                >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M3.97908 0.104634C4.53911 -0.0122203 5.12888 -0.0342122 5.72784 0.0539201C8.45949 0.455857 10.3481 2.99605 9.94612 5.7276C9.54417 8.45915 7.00389 10.3477 4.27225 9.94573C2.15146 9.63368 0.538836 8.03276 0.111754 6.05408C0.29545 6.11172 0.486066 6.15567 0.682607 6.18459C2.27678 6.41915 3.78247 5.5946 4.48634 4.24124C4.50275 4.21947 4.51553 4.19463 4.52365 4.16747L4.52779 4.15901L4.52617 4.15836C4.52819 4.15045 4.52982 4.14236 4.53104 4.13411C4.54993 4.00571 4.46116 3.88631 4.33276 3.86742C4.22511 3.85158 4.12379 3.91141 4.08271 4.00682C3.47227 5.20032 2.15046 5.92946 0.750518 5.72347C0.497388 5.68622 0.255512 5.62044 0.0276715 5.52985C-0.0157068 5.12019 -0.00877648 4.69845 0.0539682 4.27206C0.340381 2.32567 1.7125 0.807325 3.46594 0.240681C3.6337 0.186467 3.80495 0.140966 3.97908 0.104634ZM3.00091 2.9019C3.42758 2.96468 3.82435 2.6697 3.88713 2.24305C3.94991 1.81641 3.65493 1.41965 3.22827 1.35687C2.8016 1.29409 2.40483 1.58906 2.34205 2.01571C2.27927 2.44236 2.57425 2.83912 3.00091 2.9019Z"
                    fill="#70C03F"
                />
                </svg>
                <span>事業支援</span>
            </div>
            <div class="business_slider">
                <div class="owl-carousel" id="owl2">
                <?php 
                    $args = array(
                        'post_type'=>'voice',
                        'posts_per_page' => -1,                    
                        'post_status' => 'publish');
                    $args['meta_query'][] = array(
                                    'key'       => 'category',
                                    'value'     => '事業支援',
                                    'compare'   => 'LIKE',
                                );
                    $result = new WP_Query( $args );  
                    $data = array_map(
                        function( $post ) {
                            return (array) $post;
                        },
                        $result->posts
                    );
                    $key = 0;
                    while ( $result->have_posts() ) : $result->the_post(); 
                ?>
                <a href="<?php the_permalink(); ?>">
                <div class="item btn_hover">
                    <div class="flex_column business">
                    <div class="item_img">
                        <img src="<?php echo get_field('image'); ?>" class="img_style" />
                    </div>
                    <div class="item_content">
                        <?php $content = mb_substr($data[$key]['post_content'], 0, 20, 'UTF-8');  echo $content.'・・・'; ?>
                    </div>
                    <div class="item_author"><?php echo get_field('job'); ?></div>
                    </div>
                </div>
                </a>                
                <?php         
                        $key++;   
                        endwhile;              
                        wp_reset_postdata();
                ?>
                </div>
            </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            var owl1, owl2;
            owl1 = $("#owl1");
            owl1.owlCarousel({
            margin: 20,
            loop: false,
            autoWidth: true,
            autoplay: true,
            autoplayTimeout: 3000,
            dots: false,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 },
            },
            });
            owl2 = $("#owl2");
            owl2.owlCarousel({
            margin: 20,
            loop: false,
            autoWidth: true,
            dots: false,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 },
            },
            });
        });
    </script>
</main>

<?php get_footer(); ?>