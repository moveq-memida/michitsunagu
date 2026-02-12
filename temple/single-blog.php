<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
	?>

<section id="mainvisual" class="bg-whitegray">
	<div class="title-div">
		<h1 class="fw-600 fs-40 ls-12 lh-52"><?php the_title(); ?></h1>
		<div class="mt-15 fw-600 fs-16 ls-6 lh-26">Topics</div>
		<div class="row mt-20 fw-300 fs-14 lh-22 mx-0">
		<div class="d-flex col-12 col-md-1">
			<div class="nowrap"><a href="<?php echo home_url(); ?>/">HOME</a></div>
			<div class="mx-20">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="14"
					height="7"
					viewBox="0 0 14 7"
					fill="none"
				>
					<mask
					id="mask0_356_7501"
					style="mask-type: alpha"
					maskUnits="userSpaceOnUse"
					x="0"
					y="0"
					width="14"
					height="7"
					>
					<rect width="14" height="7" fill="#D9D9D9" />
					</mask>
					<g mask="url(#mask0_356_7501)">
					<path
						fill-rule="evenodd"
						clip-rule="evenodd"
						d="M10.3165 0.318322C10.5117 0.123059 10.8283 0.123059 11.0236 0.318322L13.8424 3.13717C13.8456 3.14021 13.8488 3.14331 13.8519 3.14645C13.926 3.22047 13.9719 3.31193 13.9898 3.40761C14.0193 3.56439 13.9733 3.73254 13.852 3.85386C13.8482 3.85766 13.8443 3.8614 13.8404 3.86506L11.0235 6.68198C10.8282 6.87724 10.5117 6.87724 10.3164 6.68198C10.1211 6.48672 10.1211 6.17014 10.3164 5.97487L12.2913 4H0.5C0.223858 4 0 3.77614 0 3.5C0 3.22386 0.223858 3 0.5 3H12.291L10.3165 1.02543C10.1212 0.830166 10.1212 0.513584 10.3165 0.318322Z"
						fill="#363744"
					/>
					</g>
				</svg>
			</div>
		</div>
		<div class="d-flex col-12 col-md-1">
			<div class="nowrap"><a href="<?php echo esc_url(home_url('/')); ?>blog">お知らせ</a></div>
			<div class="mx-20">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="14"
					height="7"
					viewBox="0 0 14 7"
					fill="none"
				>
					<mask
					id="mask0_356_7501"
					style="mask-type: alpha"
					maskUnits="userSpaceOnUse"
					x="0"
					y="0"
					width="14"
					height="7"
					>
					<rect width="14" height="7" fill="#D9D9D9" />
					</mask>
					<g mask="url(#mask0_356_7501)">
					<path
						fill-rule="evenodd"
						clip-rule="evenodd"
						d="M10.3165 0.318322C10.5117 0.123059 10.8283 0.123059 11.0236 0.318322L13.8424 3.13717C13.8456 3.14021 13.8488 3.14331 13.8519 3.14645C13.926 3.22047 13.9719 3.31193 13.9898 3.40761C14.0193 3.56439 13.9733 3.73254 13.852 3.85386C13.8482 3.85766 13.8443 3.8614 13.8404 3.86506L11.0235 6.68198C10.8282 6.87724 10.5117 6.87724 10.3164 6.68198C10.1211 6.48672 10.1211 6.17014 10.3164 5.97487L12.2913 4H0.5C0.223858 4 0 3.77614 0 3.5C0 3.22386 0.223858 3 0.5 3H12.291L10.3165 1.02543C10.1212 0.830166 10.1212 0.513584 10.3165 0.318322Z"
						fill="#363744"
					/>
					</g>
				</svg>
			</div>
		</div>
		<div class="d-flex col-12 col-md-6">
			<div class="fs-16 lh-22 ls-8 nowrap">
			<?php the_title(); ?>
			</div>
		</div>
		</div>
	</div>
	<div class="content-div2">
		<div class="d-flex justify-between row mb-150">
		<div class="col-12 col-md-9 px-0">
			<div class="d-flex align-items">
				<div class="r-2 px-4 py-3 bg-brightblack color-white mr-10">
				<?php $blog_cats = get_the_terms(get_the_ID(), 'blog_category'); ?>
				<?php if( $blog_cats ) : ?>
					<?php echo $blog_cats[0]->name; ?>
				<?php endif; ?>
				</div>
				<?php if ($blog_cats && $blog_cats[0]->name == "お知らせ") : ?>
					<div class="pl-5 icon-new mr-10"></div>
				<?php endif; ?>
				<div class="pl-10"><?php the_time("Y/m/d"); ?></div>
			</div>
			<div class="pt-30 fs-24 lh-31 ls-12">
				<?php the_title(); ?>
			</div>
			<!-- <div class="mt-50 r-3 px-20 py-7 bg-brightblack color-white fs-20 fw-600 lh-26">
				一番大きい見出しが入ります
			</div> -->
			<div class="mt-50 d-flex align-items">
				<!-- <div class="line-sep" style="width: 0.3rem !important; height: 2.4rem !important"></div>
					<div class="fs-18 lh-23 fw-600 pl-15">
						中くらいの見出しが入ります
					</div>
				</div> -->
				<div class="mt-30 mx-50 p-example-single">										
					<?php $thumbs = get_field('thumbs'); ?>
					<?php if( $thumbs ) : ?>
						<div class="single-swiper">
							<div class="swiper swiper-main">
								<div class="swiper-wrapper">
									<?php foreach ($thumbs as $thumb) : ?>
										<div class="swiper-slide">
											<figure class="thumb">
												<img src="<?php echo esc_url($thumb['sizes']['medium']); ?>" alt="<?php echo esc_html($thumb['title']); ?>">
											</figure>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<!-- <div class="swiper swiper-thumbs">
								<div class="swiper-wrapper">
									<?php foreach ($thumbs as $thumb) : ?>
										<div class="swiper-slide">
											<figure class="thumb">
												<img src="<?php echo esc_url($thumb['sizes']['thumb']); ?>" alt="<?php echo esc_html($thumb['title']); ?>">
											</figure>
										</div>
									<?php endforeach; ?>
								</div>
							</div> -->
						</div>
					<?php endif; ?>
					<div class="pt-30">
						<span class="fs-16 lh-25 fw-300">
								<?php the_content(); ?>
						</span>
					</div>
					<div class="mt-50 text-center mb-10">
						<a href="<?php echo esc_url(home_url('/')); ?>blog">
						<button
						href="#"
						class="btn-custom bg-gray3 r-25"
						style="width: 30rem"
						>
						お知らせ一覧に戻る
						</button>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 col-md-2 px-0">
			<div class="fw-300 fs-20 lh-26 pb-10">
				Topics
				<div class="mt-20 line-sep2"></div>
			</div>
			<?php
				$args = shortcode_atts( array(
					'count' => -1,
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
				<?php while( $post_query->have_posts() ) : $post_query->the_post(); ?>
				<a href="<?php the_permalink(); ?>">
			<div class="pt-30">
				<div class="fs-14 lh-18 ls-7 fw-300">
					<?php the_title(); ?>
				</div>
				<div class="pt-5 d-flex justify-between align-items fs-13 lh-16 fw-300">
					<div><?php the_time('Y/m/d'); ?></div>
					<div class="icon-arrow"></div>
				</div>
			</div>
				</a>
				<?php endwhile; ?>				
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
	</section>

	<?php
		endwhile;
	endif;
	?>

<?php get_footer();?>
