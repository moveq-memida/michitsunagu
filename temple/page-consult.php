<?php

	/*
	Template Name: FrontPage
	*/

	if ( ! defined( 'ABSPATH' ) ) exit;
	get_header();

?>
<script src="<?php echo T_DIRE_URI; ?>/assets/js/top_page.js"></script>

<div class="frontview">
	<img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/frontview_back.png" alt="back" class="pc">
	<img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/frontview_back_sp.png" alt="back" class="sp">
	<div class="question__items">
	  <img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/frontview_chat.png" alt="chat" class="pc">
	  <img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/frontview_chat_sp.png" alt="chat" class="sp">
	</div>
	<div class="contact__wrapper">
		<div class="title">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/title.png" alt="title" class="pc">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/title_sp.png" alt="title" class="sp">
		</div>
		<a href="<?php echo esc_url(home_url('/')); ?>contact" class="mail__link">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/mail_link.png" alt="title" class="pc">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/mail_link_sp.png" alt="title" class="sp">
		</a>
		<div class="work__time">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/work__time.png" alt="work__time" class="pc">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/work__time_sp.png" alt="work__time" class="sp">
		</div>
		
	</div>
	<div class="topic_div pc-flex">
			<?php $result = new WP_Query( array('post_type'=>'blog','posts_per_page' => 1) );  
				//print_r($result->posts); ?>
				<?php while ( $result->have_posts() ) : $result->the_post(); ?>
				<a href="<?php the_permalink(); ?>">
				<div class="flex btn_hover" style="cursor: pointer">
					<div class="topic_date"><?php the_time('Y/m/d'); ?></div>
					<div class="topic_content">
						<?php the_title(); ?>
						<img src="<?php echo T_DIRE_URI; ?>/assets/img/arrow.png" />
					</div>
				</div>
				</a>
				<?php endwhile; ?>
				<a href="<?php echo esc_url(home_url('/')); ?>blog">
				<button type="button" class="topic_btn btn_hover bounceIn">
					お知らせ一覧へ
				</button>
				</a>
				<button type="button" class="topic_close_btn"></button>
	</div>
	<div class="topic_div_sp sp-flex">
			<?php $result = new WP_Query( array('post_type'=>'blog','posts_per_page' => 1) );  
				//print_r($result->posts); ?>
				<?php while ( $result->have_posts() ) : $result->the_post(); ?>
				<a href="<?php the_permalink(); ?>">
					    <div class="topic_date_sp"><?php the_time('Y/m/d'); ?></div>
						<div class="row" style="align-items: baseline">
							<div class="topic_content_sp col-10">
								<?php the_title(); ?>
							</div>
							<div class="col-2">
								<img src="<?php echo T_DIRE_URI; ?>/assets/img/arrow.png " />
							</div>
						</div>
					
				</a>
			<?php endwhile; ?>
			<button type="button" class="topic_close_btn"></button>
	</div>
</div>
		
<main id="main">
<!-- 	
	<section id="mainvisual_pc" class="pc">
		<div class="back_green_first"></div>
		<div class="top_div">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/home_back1.jpg" class="top_div_img" />
			<div class="top_main_text_parent">
			<div class="top_main_text">
				ミチ・ツナグは、<br />お客様の相続を共に考える
				<span class="escort">伴走者</span>です
			</div>
			<div class="top_main_subtext">
				相続税申告件数は2022年実績で数十件以上、<br />全国の税理士が1年で取り扱う件数の数十倍の実績を誇ります。
			</div>
			</div>
			<div class="topic_div">
			<?php $result = new WP_Query( array('post_type'=>'blog','posts_per_page' => 1) );  
				//print_r($result->posts); ?>
				<?php while ( $result->have_posts() ) : $result->the_post(); ?>
				<a href="<?php the_permalink(); ?>">
				<div class="flex btn_hover" style="cursor: pointer">
					<div class="topic_date"><?php the_time('Y/m/d'); ?></div>
					<div class="topic_content">
						<?php the_title(); ?>
						<img src="<?php echo T_DIRE_URI; ?>/assets/img/arrow.png" />
					</div>
				</div>
				</a>
				<?php endwhile; ?>
				<a href="<?php echo esc_url(home_url('/')); ?>blog">
				<button type="button" class="topic_btn btn_hover bounceIn">
					お知らせ一覧へ
				</button>
				</a>
				<button type="button" class="topic_close_btn"></button>
			</div>
		</div>
	</section>
	<section id="mainvisual_sp" class="sp">
		<div class="back_green_sp"></div>
		<div class="top_div_sp">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/home_back2_sp.png" class="top_div_img" />
			<div class="top_main_text_parent_sp">
			<div class="top_main_text_sp">
				ミチ・ツナグは、<br />お客様の相続を共に考える
				<span class="escort">伴走者</span>です
			</div>
			<div class="top_main_subtext_sp">
				相続税申告件数は2022年実績で数十件以上、<br />全国の税理士が1年で取り扱う件数の数十倍の実績を誇ります。
			</div>

			<div class="row topic_sp">
				<div class="col-11">
				<div class="topic_div_sp">
					<div class="topic_date_sp">2023/09/13</div>
					<div class="row" style="align-items: baseline">
					<div class="topic_content_sp col-10">
						お知らせのタイトルがここに入りますお知らせのタイトルがここに入ります。
					</div>
					<div class="col-2">
						<img src="<?php echo T_DIRE_URI; ?>/assets/img/arrow.png " />
					</div>
					</div>
				</div>
				</div>
				<div class="col-1">
				<button type="button" class="topic_close_btn_sp"></button>
				</div>
			</div>
			</div>
		</div>
	</section> -->
	<section id="ourmission" class="pc">
		<div class="flex">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_boss.png" class="img_boss" />
			<div class="mission_content">
			<div class="row justify-center flex">
				<svg
				xmlns="http://www.w3.org/2000/svg"
				width="6"
				height="6"
				viewBox="0 0 8 8"
				fill="none"
				>
				<circle cx="4" cy="4" r="4" fill="#70C03F" />
				</svg>
				<div class="mission ml-10 fs-16">当事務所のミッション</div>
			</div>
			<div class="row justify-center flex mb-40">
				<div class="mission ml-10 mission_title">Our Mission</div>
			</div>
			<div class="row justify-center mb-30">
				<div class="in_top">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="8"
					height="6"
					viewBox="0 0 10 8"
					fill="none"
				>
					<path
					d="M0 7.99587V4.05196C0 1.72884 0.630373 0.864419 2.95129 0L3.98281 1.43169C2.23496 1.89091 1.83381 2.37715 1.80516 4.05196H4.21203V7.99587H0ZM5.78796 7.99587V4.05196C5.78796 1.72884 6.41834 0.864419 8.73925 0L9.77077 1.43169C8.02292 1.89091 7.62178 2.37715 7.59312 4.05196H10V7.99587H5.78796Z"
					fill="#70C03F"
					/>
				</svg>
				</div>
				<div class="fs-18 fw-600">
				窓口一つで相続が完了する安心をあなたに
				</div>
				<div class="in_bottom">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="8"
					height="6"
					viewBox="0 0 10 8"
					fill="none"
				>
					<path
					d="M10 0.00412941V3.94804C10 6.27116 9.36963 7.13558 7.04871 8L6.01719 6.56831C7.76504 6.10909 8.16619 5.62285 8.19484 3.94804H5.78797V0.00412941H10ZM4.21204 0.00412941V3.94804C4.21204 6.27116 3.58166 7.13558 1.26075 8L0.229226 6.56831C1.97708 6.10909 2.37822 5.62285 2.40688 3.94804H0V0.00412941H4.21204Z"
					fill="#70C03F"
					/>
				</svg>
				</div>
			</div>
			<div class="row justify-center flex mb-30">
				<div class="col-5 fs-16">
				「法にもとづいたサービスだけでは不十分だ」という思いからワンストップサービスが不可欠なものと考えています。
				</div>
			</div>
			<div class="row justify-center flex mb-30">
				<div class="col-5 ls-20 fs-16">
				相続が発生すると、悲しむ時間もないまま相続の手続きや相続税の申告に追われ、各専門家を何度も行き来して疲弊する姿をたくさん見てきました。
				</div>
			</div>
			<div class="row justify-center flex mb-40">
				<div class="col-5 ls-20 fs-16">
				窓口一つで全てが完了する安心感をご提供することで、家族を想う時間をつくりだすお手伝いをします。
				</div>
			</div>
			<div class="row justify-center flex mb-60">
				<div class="ls-20 mr-10 fs-14 fw-600">代 表</div>
				<div class="ls-20 mr-10 fs-18 fw-600">佐々木 良道</div>
				<div class="mission fs-14 fw-600">Sasaki Yoshimichi</div>
			</div>
			<div class="row justify-center flex mb-60">
				<a href ="<?php echo esc_url(home_url('/')); ?>stuff/#subsection-Representative" class="mission_btn text-center btn_hover col-3 fs-16 fw-600 ls-8">代表について</a>
			</div>
			</div>
		</div>
	</section>
	<section id="ourmission_sp" class="sp">
		<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_boss.png" class="img_boss_sp" />
		<div class="row justify-center flex mt-sp-60">
			<svg
			xmlns="http://www.w3.org/2000/svg"
			width="8"
			height="8"
			viewBox="0 0 8 8"
			fill="none"
			>
			<circle cx="4" cy="4" r="4" fill="#70C03F" />
			</svg>
			<div class="mission ml-10 fs-sp-16 fw-sp-300">
			当事務所のミッション
			</div>
		</div>
		<div class="row justify-center flex mb-50">
			<div class="mission mis_title_sp">Our Mission</div>
		</div>
		<div class="row justify-center mb-30">
			<div class="in_top">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				width="10"
				height="8"
				viewBox="0 0 10 8"
				fill="none"
			>
				<path
				d="M0 7.99587V4.05196C0 1.72884 0.630373 0.864419 2.95129 0L3.98281 1.43169C2.23496 1.89091 1.83381 2.37715 1.80516 4.05196H4.21203V7.99587H0ZM5.78796 7.99587V4.05196C5.78796 1.72884 6.41834 0.864419 8.73925 0L9.77077 1.43169C8.02292 1.89091 7.62178 2.37715 7.59312 4.05196H10V7.99587H5.78796Z"
				fill="#70C03F"
				/>
			</svg>
			</div>
			<div class="ls-sp-8 fs-sp-18 fw-sp-600 text-center">
			窓口一つで相続が完了する<br />安心をあなたに
			</div>
			<div class="in_bottom">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				width="10"
				height="8"
				viewBox="0 0 10 8"
				fill="none"
			>
				<path
				d="M10 0.00412941V3.94804C10 6.27116 9.36963 7.13558 7.04871 8L6.01719 6.56831C7.76504 6.10909 8.16619 5.62285 8.19484 3.94804H5.78797V0.00412941H10ZM4.21204 0.00412941V3.94804C4.21204 6.27116 3.58166 7.13558 1.26075 8L0.229226 6.56831C1.97708 6.10909 2.37822 5.62285 2.40688 3.94804H0V0.00412941H4.21204Z"
				fill="#70C03F"
				/>
			</svg>
			</div>
		</div>
		<div class="ourmission_content_sp">
			<div class="fs-sp-16 fw-sp-300 ls-sp-8 mb-10">
			「法にもとづいたサービスだけでは不十分だ」という思いからワンストップサービスが不可欠なものと考えています。
			</div>
			<div class="fs-sp-16 fw-sp-300 ls-sp-8 mb-10">
			相続が発生すると、悲しむ時間もないまま相続の手続きや相続税の申告に追われ、各専門家を何度も行き来して疲弊する姿をたくさん見てきました。
			</div>
			<div class="fs-sp-16 fw-sp-300 ls-sp-8 mb-20">
			窓口一つで全てが完了する安心感をご提供することで、家族を想う時間をつくりだすお手伝いをします。
			</div>
		</div>
		<div class="row justify-center flex mb-sp-30">
			<div class="fs-sp-14 fw-sp-600 ls-sp-8 mr-sp-10">代 表</div>
			<div class="fs-sp-18 fw-sp-600 ls-sp-8 mr-sp-10">佐々木 良道</div>
			<div class="mission fs-sp-14 fw-sp-600 ls-sp-8">
			Sasaki Yoshimichi
			</div>
		</div>
		<div class="row justify-center flex">
		<a href ="<?php echo esc_url(home_url('/')); ?>stuff/#subsection-Representative" class="mission_btn text-center btn_hover col-3 fs-16 fw-600 ls-8">代表について</a>
		</div>
	</section>
	<section id="service" class="service">
		<div class="bg_service">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_tree.png" alt="" class="pc" />
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_tree_sp.png" alt="" class="sp" />
		</div>
		<div class="container">
			<div class="section-title">
			<div class="sub">
				<svg
				xmlns="http://www.w3.org/2000/svg"
				width="8"
				height="8"
				viewBox="0 0 8 8"
				fill="none"
				>
				<circle cx="4" cy="4" r="4" fill="#70C03F" />
				</svg>
				<span></span>サービスについて
			</div>
			<div class="lead">Services</div>
			</div>
			<div class="service-layout">
				<a href="<?php echo esc_url(home_url('/')); ?>voice#sect_voice01" class="service-left">
					<div class="service-item-content">
					<div class="subttl">おもいを <span>ツナグ</span></div>
					<div class="ttl">相続支援</div>
					<p class="text">
						相続に関わる手続きや相談全て当事務所で完結できるよう「<span>ワンストップサービス</span>」を掲げています。手続き後も皆様の財産を守る伴走者となることを使命としています。
					</p>
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/layout_arrow.png" alt="" />
					</div>
				</a>
				<div class="service-middle">
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/service_middle.png" alt="" />
				</div>
				<a href="<?php echo esc_url(home_url('/')); ?>voice#sect_voice02" class="service-right">
					<div class="service-item-content">
					<div class="subttl">おもいを <span>ツナグ</span></div>
					<div class="ttl">事業支援</div>
					<p class="text">
						会計処理にかかる時間の短縮や正確な数字の把握にて経営者様をサポートします。また毎月1回面談を行い、将来の事業計画や経営判断を共に考えてまいります。
					</p>
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/layout_arrow.png" alt="" />
					</div>
				</a>
			</div>
		</div>
	</section>
	<section id="toqa" class="toqa">
		<div class="container flex_column text-center">
			<div class="top_img">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				width="29.2rem"
				height="3.4rem"
				viewBox="0 0 292 34"
				fill="none"
			>
				<path
				fill-rule="evenodd"
				clip-rule="evenodd"
				d="M12.5 0C5.59644 0 0 5.59644 0 12.5V13.5C0 20.4036 5.59645 26 12.5 26H70L80 34V26H279.5C286.404 26 292 20.4036 292 13.5V12.5C292 5.59644 286.404 0 279.5 0H12.5Z"
				fill="#F7F5F4"
				/>
				<text x="17" y="17" fill="#5CBF29" class="toqa_svg_text">
				こんなことでお悩みではありませんか？
				</text>
			</svg>
			</div>
			<div class="top_title mt-10">
			どんな些細な疑問でもお気軽に当事務所までご相談ください
			</div>
			<div class="toqa_content flex_column">
			<div class="flex_row toqa_list">
				<div class="qa_unit flex_row">
				<div class="qa_unit_img">
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/qa_img1.png" />
				</div>
				<div class="qa_unit_content flex_column">
					<div class="qa_unit_title">
					相続に関して誰に何を相談すればいいの？
					</div>
					<div class="qa_unit_subcontent">
					当事務所は「<span>ワンストップサービス</span>」を掲げており、相続に関する煩雑な手続きや申告・相談を一貫して行うことができます。各専門家の事務所を訪ねる負担を軽減することが可能です。
					</div>
				</div>
				</div>
				<div class="qa_unit flex_row">
				<div class="qa_unit_img">
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/qa_img2.png" />
				</div>
				<div class="qa_unit_content flex_column">
					<div class="qa_unit_title">相続税ってどのくらいかかる？</div>
					<div class="qa_unit_subcontent">
					相続税は相続財産が「一定の金額」を超えた場合、超えた分に対し課される税金です。またこの「一定の金額」は、2015年の法改正で引き下げられたため、相続税を払う必要がある方が増えました。
					</div>
				</div>
				</div>
			</div>
			<div class="flex_row toqa_list">
				<div class="qa_unit flex_row">
				<div class="qa_unit_img">
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/qa_img3.png" />
				</div>
				<div class="qa_unit_content flex_column">
					<div class="qa_unit_title">
					相続税を少しでも安く抑えたい！
					</div>
					<div class="qa_unit_subcontent">
					土地やアパート等の不動産や資産をお持ちの場合、評価の仕方や特例の適用をするかどうかの見極めにより、納税額が大きく変わる可能性があります。どの専門家に相談するか見極めることが大切です。
					</div>
				</div>
				</div>
				<div class="qa_unit flex_row">
				<div class="qa_unit_img">
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/qa_img4.png" />
				</div>
				<div class="qa_unit_content flex_column">
					<div class="qa_unit_title">手続きや申告の報酬はいくら？</div>
					<div class="qa_unit_subcontent">
					相続に関する手続きを各専門家に頼むとそれぞれの事務所で報酬が発生するため、高額な費用が掛かります。しかし当事務所は相続財産によって報酬額を明確に決めており、追加料金も一切ございません。
					</div>
				</div>
				</div>
			</div>
			</div>
			<div class="mt-50 row justify-center flex">
				<a href ="<?php echo esc_url(home_url('/')); ?>faq" class="mission_btn btn_hover col-4 fs-16 fw-600 ls-8">よくあるご質問へ</a>
			</div>
		</div>
	</section>
	<a href="<?php echo esc_url(home_url('/')); ?>inher#subsection-procedure" id="supperonestop" class="supperonestop flex justify-center btn_hover">
		<img src="<?php echo T_DIRE_URI; ?>/assets/img/banner_to_superonestop_service.png" class="pc" />
		<img
			src="<?php echo T_DIRE_URI; ?>/assets/img/banner_to_superonestop_service_sp.png"
			class="sp"
		/>
	</a>
	<a href="<?php echo esc_url(home_url('/')); ?>prenatal" class="life-dev">
		<img
			src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/production.png"
			alt="life-dev" class="pc"
		/>
		<img
			src="<?php echo T_DIRE_URI; ?>/assets/img/frontview/production_sp.png"
			alt="life-dev" class="sp"
		/>
	</a>
	<section class="customer" id="customer">
		<div class="flex">
			<svg
			xmlns="http://www.w3.org/2000/svg"
			width="6"
			height="6"
			viewBox="0 0 8 8"
			fill="none"
			>
			<circle cx="4" cy="4" r="4" fill="#70C03F"></circle>
			</svg>
			<div class="mission ml-10 fs-16">お客様の声</div>
		</div>
		<div class="row flex">
			<div class="mission ml-10 mission_title">Customer<br />voices</div>
		</div>
		<div class="flex_row">
			<div class="customer_left flex_column">
				<div class="flex_column">
					<div class="customer_content fs-14 fw-300">
					相続支援・事業支援共に沢山の方からご好評の声を頂いています。相続税の額・会社規模など関係なくご相談を承っておりますので、専門家の助けをご入用としている方はお気軽にご相談ください。
					</div>
					<div class="customer_btn mt-80 text-center row justify-center">
						<a href ="<?php echo esc_url(home_url('/')); ?>voice" class="mission_btn text-center btn_hover col-10 fs-16 fw-600 ls-8">お客様の声一覧へ</a>				
					</div>
				</div>
				<div class="customer_link">
					<button
					type="button"
					class="customer_link_left btn_hover owl-next"
					>
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/link_right.png" />
					</button>
					<button
					type="button"
					class="customer_link_right btn_hover owl-prev"
					>
					<img src="<?php echo T_DIRE_URI; ?>/assets/img/link_left.png" />
					</button>
				</div>
			</div>
			<div class="customer_right col-9">
				<div class="owl-carousel">
					<?php 
						$args = array(
							'post_type'=>'voice',
							'posts_per_page' => -1,                    
							'post_status' => 'publish');
						$result = new WP_Query( $args );  
						while ( $result->have_posts() ) : $result->the_post(); 						
					?>
					<a href="<?php the_permalink(); ?>">
					<div class="item">
						<?php $category = get_field('category'); ?>
						<?php if ($category == '事業支援') : ?>
						<div class="flex_column category1">							
							<div class="item_category">事 業</div>
							<div class="item_content">
								<?php the_content(); ?>
							</div>
							<div class="item_author"><?php echo get_field('job'); ?></div>
						</div>						
						<?php endif; if ($category == '相続支援') : ?>
						<div class="flex_column category2">
							<div class="item_category">相 続</div>
							<div class="item_img">
							<div class="flex">
								<?php if (get_field('sex') == '女性') { ?>
								<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_woman.png" />
								<?php } else { ?>
								<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_man1.png" />
								<?php } ?>
							</div>
							</div>
							<div class="item_content">
								<?php the_content(); ?>
							</div>
							<div class="item_author"><?php echo get_field('age'); ?> <?php echo get_field('sex'); ?></div>
						</div>
						<?php endif; ?>
					</div>
					</a>                   
					<?php         
							endwhile;              
							wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</section>
	<section id="feature" class="feature">
		<div class="feacture_back_green"></div>
		<div class="row justify-center flex">
			<svg
			xmlns="http://www.w3.org/2000/svg"
			width="6"
			height="6"
			viewBox="0 0 8 8"
			fill="none"
			>
			<circle cx="4" cy="4" r="4" fill="#70C03F"></circle>
			</svg>
			<div class="mission ml-10 fs-16">当事務所の特徴</div>
		</div>
		<div class="row justify-center flex">
			<div class="mission ml-10 mission_title">Feature</div>
		</div>
		<div class="row flex_row feacture_content">
			<div class="col-5 flex_video">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_movie.png" />
			</div>
			<div class="col-7 flex_column mt-40">
			<div class="feature_title mb-20">遺言VTR</div>
			<div class="fs-16 fw-300 mb-10 lh-2">
				遺言を書面だけでなく、VTRに遺すお手伝いをしています。表情や話し方から、想いの伝わる遺言やメッセージを遺せます。
			</div>
			<div class="flex mb-10 list">
				<div class="mr-10">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="2.4rem"
					height="2.4rem"
					viewBox="0 0 24 24"
					fill="none"
				>
					<circle
					cx="12"
					cy="12.0005"
					r="11"
					fill="#70C03F"
					stroke="#70C03F"
					stroke-width="2"
					/>
					<rect
					x="5.72168"
					y="10.7783"
					width="8"
					height="2"
					rx="1"
					transform="rotate(45 5.72168 10.7783)"
					fill="#F7F5F4"
					/>
					<rect
					x="17.7432"
					y="7.24316"
					width="2"
					height="13"
					rx="1"
					transform="rotate(45 17.7432 7.24316)"
					fill="#F7F5F4"
					/>
				</svg>
				</div>
				<div class="fs-16 fw-600">家族の皆様に喜んでもらうために</div>
			</div>
			<div class="flex list">
				<div class="mr-10">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="2.4rem"
					height="2.4rem"
					viewBox="0 0 24 24"
					fill="none"
				>
					<circle
					cx="12"
					cy="12.0005"
					r="11"
					fill="#70C03F"
					stroke="#70C03F"
					stroke-width="2"
					/>
					<rect
					x="5.72168"
					y="10.7783"
					width="8"
					height="2"
					rx="1"
					transform="rotate(45 5.72168 10.7783)"
					fill="#F7F5F4"
					/>
					<rect
					x="17.7432"
					y="7.24316"
					width="2"
					height="13"
					rx="1"
					transform="rotate(45 17.7432 7.24316)"
					fill="#F7F5F4"
					/>
				</svg>
				</div>
				<div class="fs-16 fw-600">
				文章にしづらい内容をわかりやすく伝えるために
				</div>
			</div>
			</div>
		</div>
		<div class="row flex_row feacture_content1">
			<div class="feacture_back_green1"></div>
			<div class="col-7 flex_column mt-40">
			<div class="feature_title mb-20">
				お手紙のような遺言で想いを<br />伝える付言(ふげん)
			</div>
			<div class="fs-16 fw-300 mb-10 lh-2">
				遺言には、法的効力を持たないものの、自身の想いや感謝、願いなどを記載できる付言事項(ふげんじこう)と呼ばれるものがあります。ミチ・ツナグでは付言事項の作成のサポートもしております。
			</div>
			</div>
			<div class="col-5 flex_video">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_letter1.png" />
			</div>
		</div>
		<div class="row flex_row feacture_content2">
			<div class="col-5 flex_video">
			<img src="<?php echo T_DIRE_URI; ?>/assets/img/img_build.png" />
			</div>
			<div class="col-7 flex_column mt-40">
			<div class="feature_title mb-20">不動産オーナーの法人化</div>
			<div class="fs-16 fw-300 mb-10 lh-2">
				不動産はひとたび修繕などが発生するとその費用が多額になることが多く、資金管理が非常に重要です。ミチ・ツナグでは不動産オーナーの法人化も積極的にサポートしております。
			</div>
			<div class="flex mb-10 list">
				<div class="mr-10">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="2.4rem"
					height="2.4rem"
					viewBox="0 0 24 24"
					fill="none"
				>
					<circle
					cx="12"
					cy="12.0005"
					r="11"
					fill="#70C03F"
					stroke="#70C03F"
					stroke-width="2"
					/>
					<rect
					x="5.72168"
					y="10.7783"
					width="8"
					height="2"
					rx="1"
					transform="rotate(45 5.72168 10.7783)"
					fill="#F7F5F4"
					/>
					<rect
					x="17.7432"
					y="7.24316"
					width="2"
					height="13"
					rx="1"
					transform="rotate(45 17.7432 7.24316)"
					fill="#F7F5F4"
					/>
				</svg>
				</div>
				<div class="fs-16 fw-600">資金繰りが把握しやすくなる</div>
			</div>
			<div class="flex list mb-10">
				<div class="mr-10">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="2.4rem"
					height="2.4rem"
					viewBox="0 0 24 24"
					fill="none"
				>
					<circle
					cx="12"
					cy="12.0005"
					r="11"
					fill="#70C03F"
					stroke="#70C03F"
					stroke-width="2"
					/>
					<rect
					x="5.72168"
					y="10.7783"
					width="8"
					height="2"
					rx="1"
					transform="rotate(45 5.72168 10.7783)"
					fill="#F7F5F4"
					/>
					<rect
					x="17.7432"
					y="7.24316"
					width="2"
					height="13"
					rx="1"
					transform="rotate(45 17.7432 7.24316)"
					fill="#F7F5F4"
					/>
				</svg>
				</div>
				<div class="fs-16 fw-600">提案できる節税策が増える</div>
			</div>
			<div class="flex list">
				<div class="mr-10">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="2.4rem"
					height="2.4rem"
					viewBox="0 0 24 24"
					fill="none"
				>
					<circle
					cx="12"
					cy="12.0005"
					r="11"
					fill="#70C03F"
					stroke="#70C03F"
					stroke-width="2"
					/>
					<rect
					x="5.72168"
					y="10.7783"
					width="8"
					height="2"
					rx="1"
					transform="rotate(45 5.72168 10.7783)"
					fill="#F7F5F4"
					/>
					<rect
					x="17.7432"
					y="7.24316"
					width="2"
					height="13"
					rx="1"
					transform="rotate(45 17.7432 7.24316)"
					fill="#F7F5F4"
					/>
				</svg>
				</div>
				<div class="fs-16 fw-600">
				認知症になった場合のリスクの軽減に役立つ
				</div>
			</div>
			</div>
		</div>
		<div class="mt-50 justify-center flex">
			<a href ="<?php echo esc_url(home_url('/')); ?>office" class="mission_btn text-center btn_hover col-3 fs-16 fw-600 ls-8">当事務所について</a>							
		</div>
	</section>
	<section class="contact" id="contact">
		<img src="<?php echo T_DIRE_URI; ?>/assets/img/contact_back.png" class="top_div_img1 pc" />
		<img src="<?php echo T_DIRE_URI; ?>/assets/img/contact_back_sp.png" class="top_div_img1 sp" />
		<div class="flex_row container contact_content">
			<div class="flex_column justify-center col-4">
			<div class="flex">
				<div class="mr-10">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="8"
					height="8"
					viewBox="0 0 8 8"
					fill="none"
				>
					<circle cx="4" cy="4" r="4" fill="#F7F5F4" />
				</svg>
				</div>
				<div class="contact_subttl">お問い合わせ</div>
			</div>
			<div class="contact_title">Contact</div>
			</div>
			<div class="flex_column justify-center col-8">
			<div class="contact_list_title mb-10">
				まずはお気軽にご相談・ご連絡ください
			</div>
			<div class="contact_list_subttl mb-25">
				お急ぎの方につきましては、お電話にてミチ・ツナグまでご連絡ください
			</div>
			<div class="justify-center">
				<div class="contact_list_btn flex mb-25">
				<a href="<?php echo esc_url(home_url('/')); ?>contact">	
					<div class="btn_mail btn_hover col-5 color-white">
						<div class="col-10">
						<div class="fs-18">メールでお問い合わせ</div>
						<div class="fs-14">(24時間受付中)</div>
						</div>
						<div class="col-2 px-0">
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="23"
							height="18"
							viewBox="0 0 23 18"
							fill="none"
						>
							<g clip-path="url(#clip0_39_1592)">
							<path
								d="M0.826342 1.84526L0.0986328 2.3319L10.2923 17.4532C10.3554 17.557 10.4403 17.645 10.5408 17.7108C10.6412 17.7766 10.7547 17.8186 10.873 17.8337C10.9913 17.8488 11.1113 17.8367 11.2244 17.7981C11.3375 17.7596 11.4408 17.6957 11.5269 17.611L14.2971 14.8766L16.5642 17.1223C16.6734 17.2304 16.8102 17.3044 16.9588 17.3357C17.1073 17.3669 17.2615 17.3543 17.4033 17.2991C17.5452 17.2439 17.6688 17.1484 17.7598 17.0239C17.8508 16.8994 17.9055 16.7509 17.9174 16.5957L18.3012 11.4674L0.791789 1.53861C0.805107 1.65704 0.762905 1.73995 0.826342 1.84526ZM22.9688 5.71367C22.9287 5.57071 22.8516 5.44161 22.7456 5.34019C22.6396 5.23877 22.5087 5.16883 22.367 5.13786L2.0163 0.183289L1.67285 0.613484C1.56587 0.590038 1.81727 0.795939 1.71297 0.816145L19.4998 10.0401L22.7556 6.52904C22.8599 6.42606 22.9349 6.29582 22.9725 6.15233C23.01 6.00885 23.0088 5.85756 22.9688 5.71477V5.71367Z"
								fill="#F7F5F4"
							/>
							<path
								d="M0.534884 2.57592C0.830292 2.57592 1.06977 2.33009 1.06977 2.02685C1.06977 1.72361 0.830292 1.47778 0.534884 1.47778C0.239476 1.47778 0 1.72361 0 2.02685C0 2.33009 0.239476 2.57592 0.534884 2.57592Z"
								fill="#F7F5F4"
							/>
							<path
								d="M1.89846 0.873823C2.09047 0.873823 2.24613 0.714036 2.24613 0.516929C2.24613 0.319821 2.09047 0.160034 1.89846 0.160034C1.70644 0.160034 1.55078 0.319821 1.55078 0.516929C1.55078 0.714036 1.70644 0.873823 1.89846 0.873823Z"
								fill="#F7F5F4"
							/>
							</g>
							<defs>
							<clipPath id="clip0_39_1592">
								<rect
								width="23"
								height="17.68"
								fill="white"
								transform="translate(0 0.160034)"
								/>
							</clipPath>
							</defs>
						</svg>
						</div>
					</div>
				</a>
				<div class="contact_list_line"></div>
				<a href="#">
					<div class="btn_line btn_hover col-5 color-white">
						<div class="col-10">
						<div class="fs-18">LINEでお問い合わせ</div>
						</div>
						<div class="col-2 px-0">
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="23"
							height="22"
							viewBox="0 0 23 22"
							fill="none"
						>
							<path
							d="M12 18.5034V18.0034H11.5C8.38224 18.0034 5.62095 17.356 3.65381 15.9875C1.71192 14.6365 0.5 12.5545 0.5 9.55167C0.5 6.54882 1.71192 4.46682 3.65381 3.11587C5.62095 1.74736 8.38224 1.09998 11.5 1.09998C14.6178 1.09998 17.3791 1.74736 19.3462 3.11587C21.2881 4.46682 22.5 6.54882 22.5 9.55167C22.5 10.8838 22.2606 11.9157 21.8181 12.7957C21.3741 13.6789 20.7096 14.441 19.812 15.2115C18.9097 15.9861 17.7937 16.7514 16.4561 17.654C16.3527 17.7237 16.2481 17.7942 16.1423 17.8656C14.918 18.6909 13.5296 19.6268 12 20.7656V18.5034Z"
							fill="#F7F5F4"
							stroke="#F7F5F4"
							/>
						</svg>
						</div>
					</div>
				</a>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="contact_list_title tel mr-10">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="2rem"
					height="2rem"
					viewBox="0 0 20 20"
					fill="none"
				>
					<path
					d="M13.952 12.8239L13.4464 13.3566C13.4464 13.3566 12.2431 14.6218 8.95978 11.1672C5.67647 7.71246 6.87979 6.44723 6.87979 6.44723L7.19757 6.11094C7.98312 5.28548 8.05756 3.95911 7.37201 2.9902L5.97202 1.01122C5.12314 -0.188162 3.48426 -0.346904 2.51205 0.676097L0.767613 2.51044C0.286505 3.01842 -0.0357153 3.67455 0.00317331 4.40358C0.103173 6.26968 0.900945 10.2829 5.3498 14.9652C10.0687 19.9297 14.4964 20.1272 16.3064 19.9485C16.8797 19.8921 17.3775 19.584 17.7786 19.1607L19.3564 17.5004C20.423 16.3798 20.123 14.4572 18.7586 13.6729L16.6364 12.4512C15.7408 11.9362 14.652 12.0879 13.952 12.8239Z"
					fill="#F7F5F4"
					/>
				</svg>
				089-989-6447
				</div>
				<div class="contact_list_subttl time fw-600">
				9:00～18:00(土日祝休み)
				</div>
			</div>
			</div>
		</div>
	</section>
	<section class="info">
		<div class="flex_column">
			<div class="info_subttl">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				width="0.8rem"
				height="0.8rem"
				viewBox="0 0 8 8"
				fill="none"
			>
				<ellipse cx="4" cy="3.99856" rx="4" ry="3.99856" fill="#70C03F" />
			</svg>
			当事務所の情報
			</div>
			<div class="info_title">Information</div>
			<div class="info_content">
			<div class="flex list">
				<div class="list_title">事務所名</div>
				<div class="list_content">税理士法人ミチ・ツナグ</div>
			</div>
			<div class="flex list">
				<div class="list_title">代表</div>
				<div class="list_content">
				電話：089 - 989 - 6447
				(営業・勧誘のお電話は全てお控えください)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FAX：089
				- 948 - 6448
				</div>
			</div>
			<div class="flex list">
				<div class="list_title">営業時間</div>
				<div class="list_content">
				9：00～18：00 (休業日：土曜日・日曜日・祝日)
				</div>
			</div>
			<div class="flex list1">
				<div class="list_title">住所</div>
				<div class="list_content">
				〒791-8015愛媛県松山市中央2-23-1平岡ビル202
				(伊予鉄道高浜線「衣山駅」より徒歩9分)
				</div>
			</div>
			<div class="info_map mt-10">
				<iframe
				src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3313.4512831285215!2d132.74161967463738!3d33.852258828265406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1698163954415!5m2!1sen!2sus"
				width="100%"
				height="100%"
				style="border: 0"
				allowfullscreen=""
				loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"
				></iframe>
			</div>
			</div>
		</div>
	</section>
	</main>

<?php get_footer(); ?>


