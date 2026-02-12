<?php

	/*
	Template Name: 当事務所について
	*/

	if ( ! defined( 'ABSPATH' ) ) exit;
	get_header();

  $data = get_post();
  // print_r($data);
  // echo '<br>aaa'.$data->post_content;

  if ( have_posts() ) :
		while ( have_posts() ) : the_post();

    $category = get_field('category');
    $content1 =  $data->post_content;
    $content = mb_substr($content1,0,20,'UTF-8');
    // echo $content;
?>


<main id="main">
      <section id="maintitle" class="maintitle">
        <div class="container">
          <div class="mainheader">
            <div class="title">
              <h1 class="fs-40 bold"><?php the_title(); ?></h1>
              <div class="fs-20 bold mt-10 mb-20">Customer voices</div>
              <div class="fs-14">
                <span><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></span>
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
                <span><a href="<?php echo esc_url(home_url('/')); ?>voice"> お客様の声</a></span>
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
                <span> <?php echo $content; ?>・・・</span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="mainremiddle" class="mt-40">
        <div class="back_img mb-90"></div>
        <div class="container">
          <div class="row">
            <div class="col-1 col-md-1"></div>
            <div class="col-10 col-md-10">
              <div class="back-img-inner">
                <div class="color-white pt-30">
                  <div class="pb-20">
                    <span class="fs-13"><?php the_date(); ?></span>
                  </div>
                  <div class="pb-18">
                    <span class="fs-24 bold">
                      <?php the_content(); ?>
                    </span>
                  </div>
                  <div class="pb-80">
                    <button class="r-27 px-10 py-2 fs-14">
                      <?php                        
                        if ($category == "事業支援")
                          echo get_field('job');
                        else if ($category == "相続支援")
                          echo get_field('age').' '.get_field('sex');
                      ?>
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="2" height="25" viewBox="0 0 2 25" fill="none">
                      <rect width="2" height="25" rx="0.5" fill="#F7F5F4" />
                    </svg>
                    <span class="fs-16">
                      <?php  
                        if ($category == "事業支援"){
                          echo('拠点 : ').get_field('address');
                          echo(' <svg xmlns="http://www.w3.org/2000/svg" width="2" height="25" viewBox="0 0 2 25" fill="none"><rect width="2" height="25" rx="0.5" fill="#F7F5F4" /></svg>').' 会社人数 : '.get_field('member');
                        }
                        else if ($category == "相続支援")
                          echo('所在地 : ').get_field('address'); ?>
                    </span>
                  </div>
                </div>
                <div class="maskgroup_inner_img">
                  <img src="<?php echo get_field('image'); ?>" class="r-20" width="100%" alt=""/>
                </div>
              </div>
              <div style="margin-top: -55rem">
                <div class="row">
                  <div class="col-0 col-md-3"></div>
                  <div class="text-center col-12 col-md-6 flex justify-center">
                    <div class="text-left1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 34 12" fill="none">
                        <path d="M0 12V6.08108C0 2.5946 0.882522 1.2973 4.1318 0L5.57593 2.14865C3.12894 2.83784 2.56734 3.56757 2.52722 6.08108H5.89685V12H0ZM8.10315 12V6.08108C8.10315 2.5946 8.98567 1.2973 12.235 0L13.6791 2.14865C11.2321 2.83784 10.6705 3.56757 10.6304 6.08108H14V12H8.10315Z" fill="#363744"/>
                      </svg>
                    </div>
                    <div>
                      <span class="fs-28 bold"><?php the_title(); ?></span>
                    </div>
                    <div class="text-right1">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="14"
                        height="12"
                        viewBox="0 0 34 12"
                        fill="none"
                      >
                        <path
                          d="M14 0V5.91892C14 9.4054 13.1175 10.7027 9.8682 12L8.42407 9.85135C10.8711 9.16216 11.4327 8.43243 11.4728 5.91892H8.10315V0H14ZM5.89685 0V5.91892C5.89685 9.4054 5.01433 10.7027 1.76504 12L0.320916 9.85135C2.76791 9.16216 3.32951 8.43243 3.36963 5.91892H0V0H5.89685Z"
                          fill="#363744"
                        />
                      </svg>
                    </div>
                  </div>
                  <div class="col-0 col-md-3"></div>
                </div>
                <?php if ($category == "事業支援") : ?>
                <div class="mt-50">
                  <div class="mt-30 fs-16">
                    <span>
                      <?php echo get_field('meet'); ?>
                    </span>
                  </div>
                </div>
                <?php endif ?>
                <div class="mt-50">
                  <div class="d-flex align-items">
                    <div class="line-sep bg-green2"></div>
                    <div class="pl-20 fs-20 bold">困っていたこと</div>
                  </div>
                  <div class="mt-30 fs-16">
                    <span>
                      <?php echo get_field('difficult'); ?>
                    </span>
                  </div>
                </div>
                <?php if ($category == "相続支援") : ?>
                <div class="mt-50">
                  <div class="d-flex align-items">
                    <div class="line-sep bg-green2"></div>
                    <div class="pl-20 fs-20 bold">
                      ミチ・ツナグとのお付き合いのきっかけ
                    </div>
                  </div>
                  <div class="mt-30 fs-16">
                    <span>
                      <?php echo get_field('meet'); ?>
                    </span>
                  </div>
                </div>
                <?php endif; ?>
                <div class="mt-50">
                  <div class="d-flex align-items">
                    <div class="line-sep bg-green2"></div>
                    <div class="pl-20 fs-20 bold">支援内容</div>
                  </div>
                  <?php 
                    $data = get_field('support'); $count = 0;
                    foreach ($data as $item)
                      if ($item) $count++;              
                  ?>
                  <div class="mt-40 row">
                    <div class="col-1 col-md-1 cirle_icons">
                      <svg xmlns="http://www.w3.org/2000/svg" width="5rem" height="<?php echo 6*$count; ?>rem" viewBox="0 0 50 <?php echo 6*$count*10+5; ?>" fill="none">
                        <?php if ($count > 1) : ?>
                        <rect x="24" y="<?php echo 35+($count-2)*5; ?>" width="2" height="<?php echo 37.5*$count;?>" fill="#70C03F" />
                        <?php endif; ?>
                        <circle cx="25" cy="25" r="24" fill="#F7F5F4" stroke="#70C03F" stroke-width="2" />
                        <path d="M20.04 31.5976C18.68 31.5976 17.528 31.1496 16.68 30.3016C16.2 29.8216 15.832 29.2616 15.624 28.6856C15.208 27.5496 15 26.3016 15 25.0056C15 23.3096 15.384 21.5496 15.976 20.5736C16.84 19.1336 18.28 18.3496 20.056 18.3496C21.416 18.3496 22.584 18.7976 23.432 19.6456C23.912 20.1256 24.28 20.6856 24.488 21.2616C24.904 22.3816 25.112 23.6616 25.112 24.9736C25.112 26.9416 24.68 28.6696 23.928 29.7096C23.032 30.9576 21.704 31.5976 20.04 31.5976ZM20.056 29.7416C20.76 29.7416 21.384 29.5016 21.784 29.0696C22.504 28.3176 22.904 26.8296 22.904 24.9576C22.904 23.1016 22.504 21.6456 21.784 20.8616C21.4 20.4296 20.76 20.1896 20.04 20.1896C19.272 20.1896 18.712 20.4456 18.248 21.0056C17.544 21.8376 17.192 23.1496 17.192 24.8936C17.192 26.5736 17.496 27.9656 18.008 28.7016C18.504 29.4056 19.176 29.7416 20.056 29.7416Z" fill="#5CBF29" />
                        <path d="M33.7186 31.3416H31.3026C31.3986 30.7176 31.4306 30.0936 31.4306 29.2616V20.4456H30.6626C30.0706 20.4456 29.6066 20.4776 29.0146 20.5416V18.5096C29.5106 18.5896 29.8626 18.6056 30.6146 18.6056H32.0866C32.9026 18.6056 33.1426 18.5896 33.7186 18.5256C33.6226 19.4696 33.5906 20.2056 33.5906 21.1656V29.2616C33.5906 30.1096 33.6226 30.6856 33.7186 31.3416Z" fill="#5CBF29" />
                        <?php if ($count > 1) : ?>
                        <circle cx="25" cy="90" r="24" fill="#F7F5F4" stroke="#70C03F" stroke-width="2" />
                        <path d="M19.04 96.5976C17.68 96.5976 16.528 96.1496 15.68 95.3016C15.2 94.8216 14.832 94.2616 14.624 93.6856C14.208 92.5496 14 91.3016 14 90.0056C14 88.3096 14.384 86.5496 14.976 85.5736C15.84 84.1336 17.28 83.3496 19.056 83.3496C20.416 83.3496 21.584 83.7976 22.432 84.6456C22.912 85.1256 23.28 85.6856 23.488 86.2616C23.904 87.3816 24.112 88.6616 24.112 89.9736C24.112 91.9416 23.68 93.6696 22.928 94.7096C22.032 95.9576 20.704 96.5976 19.04 96.5976ZM19.056 94.7416C19.76 94.7416 20.384 94.5016 20.784 94.0696C21.504 93.3176 21.904 91.8296 21.904 89.9576C21.904 88.1016 21.504 86.6456 20.784 85.8616C20.4 85.4296 19.76 85.1896 19.04 85.1896C18.272 85.1896 17.712 85.4456 17.248 86.0056C16.544 86.8376 16.192 88.1496 16.192 89.8936C16.192 91.5736 16.496 92.9656 17.008 93.7016C17.504 94.4056 18.176 94.7416 19.056 94.7416Z" fill="#5CBF29" />
                        <path d="M33.6146 96.3416H28.4786C27.2306 96.3416 26.9746 96.3576 26.4146 96.4216C26.5106 95.5096 26.6226 94.9496 26.8306 94.3736C27.2626 93.2056 27.9826 92.1816 29.0226 91.2376C29.5826 90.7416 30.0626 90.3736 31.6626 89.3016C33.1346 88.2936 33.5826 87.7656 33.5826 86.9496C33.5826 85.8616 32.7346 85.1896 31.3746 85.1896C30.4466 85.1896 29.7426 85.5096 29.3426 86.1336C29.0706 86.5176 28.9586 86.8696 28.8466 87.6056L26.5586 87.3336C26.7826 86.1176 27.0706 85.4616 27.6626 84.7736C28.4626 83.8456 29.7266 83.3496 31.3266 83.3496C34.1266 83.3496 35.8546 84.6936 35.8546 86.8856C35.8546 87.9416 35.5026 88.7096 34.7186 89.4456C34.2706 89.8616 34.1106 89.9896 32.0306 91.4136C31.3266 91.9096 30.5266 92.5816 30.1266 93.0136C29.6466 93.5256 29.4546 93.8456 29.2146 94.4536H33.6946C34.7026 94.4536 35.5026 94.4056 36.0306 94.3256V96.4376C35.2786 96.3736 34.6386 96.3416 33.6146 96.3416Z" fill="#5CBF29" />
                        <?php 
                          endif; 
                          if ($count > 2) :
                        ?>
                        <circle cx="25" cy="155" r="24" fill="#F7F5F4" stroke="#70C03F" stroke-width="2" />
                        <path d="M19.04 161.63C17.68 161.63 16.528 161.182 15.68 160.334C15.2 159.854 14.832 159.294 14.624 158.718C14.208 157.582 14 156.334 14 155.038C14 153.342 14.384 151.582 14.976 150.606C15.84 149.166 17.28 148.382 19.056 148.382C20.416 148.382 21.584 148.83 22.432 149.678C22.912 150.158 23.28 150.718 23.488 151.294C23.904 152.414 24.112 153.694 24.112 155.006C24.112 156.974 23.68 158.702 22.928 159.742C22.032 160.99 20.704 161.63 19.04 161.63ZM19.056 159.774C19.76 159.774 20.384 159.534 20.784 159.102C21.504 158.35 21.904 156.862 21.904 154.99C21.904 153.134 21.504 151.678 20.784 150.894C20.4 150.462 19.76 150.222 19.04 150.222C18.272 150.222 17.712 150.478 17.248 151.038C16.544 151.87 16.192 153.182 16.192 154.926C16.192 156.606 16.496 157.998 17.008 158.734C17.504 159.438 18.176 159.774 19.056 159.774Z" fill="#5CBF29" />
                        <path d="M26.2066 158.35L28.4946 157.902C28.7026 158.638 28.8466 158.894 29.2466 159.214C29.7746 159.63 30.4146 159.838 31.1826 159.838C32.7666 159.838 33.7746 159.022 33.7746 157.758C33.7746 157.022 33.4546 156.414 32.8786 156.078C32.4946 155.854 31.7426 155.694 31.0386 155.694C30.3346 155.694 29.8706 155.71 29.3266 155.774V153.79C29.8386 153.854 30.1906 153.87 30.8786 153.87C32.4786 153.87 33.4226 153.134 33.4226 151.902C33.4226 150.798 32.6706 150.174 31.3106 150.174C30.5266 150.174 29.9506 150.35 29.5666 150.67C29.2466 150.974 29.0866 151.246 28.8946 151.902L26.6066 151.518C27.0066 150.334 27.3746 149.774 28.1266 149.23C28.9426 148.638 29.9826 148.35 31.2626 148.35C33.9346 148.35 35.6626 149.694 35.6626 151.774C35.6626 152.734 35.2466 153.614 34.5586 154.126C34.2066 154.398 33.8546 154.526 33.0066 154.75C34.1426 154.926 34.7346 155.198 35.2946 155.822C35.8226 156.414 36.0626 157.086 36.0626 158.03C36.0626 158.894 35.6946 159.774 35.1026 160.366C34.2226 161.214 32.8786 161.662 31.1666 161.662C29.2946 161.662 28.0146 161.182 27.1026 160.142C26.7026 159.694 26.4946 159.278 26.2066 158.35Z" fill="#5CBF29" />
                        <?php endif; if ($count > 3) : ?>
                        <circle cx="25" cy="220" r="24" fill="#F7F5F4" stroke="#70C03F" stroke-width="2" />
                        <path d="M19.04 226.598C17.68 226.598 16.528 226.15 15.68 225.302C15.2 224.822 14.832 224.262 14.624 223.686C14.208 222.55 14 221.302 14 220.006C14 218.31 14.384 216.55 14.976 215.574C15.84 214.134 17.28 213.35 19.056 213.35C20.416 213.35 21.584 213.798 22.432 214.646C22.912 215.126 23.28 215.686 23.488 216.262C23.904 217.382 24.112 218.662 24.112 219.974C24.112 221.942 23.68 223.67 22.928 224.71C22.032 225.958 20.704 226.598 19.04 226.598ZM19.056 224.742C19.76 224.742 20.384 224.502 20.784 224.07C21.504 223.318 21.904 221.83 21.904 219.958C21.904 218.102 21.504 216.646 20.784 215.862C20.4 215.43 19.76 215.19 19.04 215.19C18.272 215.19 17.712 215.446 17.248 216.006C16.544 216.838 16.192 218.15 16.192 219.894C16.192 221.574 16.496 222.966 17.008 223.702C17.504 224.406 18.176 224.742 19.056 224.742Z" fill="#5CBF29" />
                        <path d="M36.5586 221.446V223.494C35.9666 223.414 35.6306 223.398 34.9586 223.382H34.3826V224.518C34.3826 225.334 34.4146 225.75 34.5106 226.342H32.2386C32.3346 225.782 32.3666 225.286 32.3666 224.486V223.382H27.9346C26.9906 223.382 26.4786 223.398 25.9346 223.446V221.478C26.4786 220.886 26.6546 220.678 27.2146 220.006L31.0066 215.366C31.7106 214.518 31.9666 214.182 32.3346 213.606H34.4946C34.3986 214.534 34.3826 215.094 34.3826 216.31V221.558H34.9426C35.5826 221.558 35.9666 221.526 36.5586 221.446ZM32.3826 221.574V218.262C32.3826 217.51 32.3986 216.998 32.4626 216.342C32.1426 216.806 31.9506 217.062 31.3746 217.766L28.3026 221.574H32.3826Z" fill="#5CBF29" />
                        <?php endif; ?>
                      </svg>
                    </div>                  
                    <div class="col-11 col-md-11 d-flex justify-around flex-column list_text">                      
                      <div style="" class="d-flex align-items fs-16">
                        <?php echo $data['support01']; ?>
                      </div>
                      <?php if ($count > 1) : ?>
                      <div style="" class="d-flex align-items  fs-16">
                        <?php echo $data['support02']; ?>
                      </div>
                      <?php endif; if ($count > 2) : ?>
                      <div style="" class="d-flex align-items  fs-16">
                        <?php echo $data['support03']; ?>
                      </div>
                      <?php endif; if ($count > 3) : ?>
                      <div style="" class="d-flex align-items  fs-16">
                        <?php echo $data['support04']; ?>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="mt-50 text-center">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="50"
                    height="90"
                    viewBox="0 0 50 90"
                    fill="none"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M40 0H10V50H0L25 90L50 50H40V0Z"
                      fill="#70C03F"
                    />
                  </svg>
                </div>
              </div>
            </div>
            <div class="col-1 col-md-1"></div>
          </div>
        </div>
        <div class="back_content mt-50 mb-50" style="position: relative">
          <div class="container py-50 color-white">
            <span class="fs-16">
              <?php echo get_field('comment'); ?>
            </span>
          </div>
          <!-- <div class="back_content_circle"></div> -->
          <div class="back_content_circle"></div>
          <div class="back_content_circle2"></div>
          <div class="back_content_circle3"></div>
        </div>

        <div class="container">
          <div class="text-center mt-80 mb-150">
            <a href="<?php echo esc_url(home_url('/')); ?>voice">
            <button class="r-25 fs-16 py-12 bg-gray3 px-30 width-30rem btn_hover">
              お客様の声一覧に戻る
            </button>
            </a>
          </div>
        </div>
      </section>
</main>
	<?php
		endwhile;
	endif;
	?>

<?php get_footer(); ?>