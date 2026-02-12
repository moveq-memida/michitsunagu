<?php

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
        <div class="back_green"></div>
        <div class="title">
            <h1 class="fs-40 bold">不動産オーナーの申告</h1>
            <div class="fs-20 bold mt-10 mb-20">
            Declaration of real estate ownership
            </div>
            <div class="fs-14">
            <span><a href="<?php echo home_url(); ?>">HOME</a></span>
            <span class="mx-5">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="14"
                height="10"
                viewBox="0 0 14 10"
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
                    <rect width="14" height="10" fill="#D9D9D9" />
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
            <span> 不動産オーナーの申告</span>
            </div>
        </div>
        </div>
    </div>
    </section>
    <section id="mainmiddle" class="mainmiddle">
        <div class="container">
            <div class="row">
            <div class="col-12 col-md-3 fs-16">
                <div class="mb-30">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="5"
                    height="5"
                    viewBox="0 0 5 5"
                    fill="none"
                >
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#70C03F" />
                </svg>
                <a href="#導入"><span class="ml-3">導入</span></a>
                </div>
				
                <div class="mb-30">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="5"
                    height="5"
                    viewBox="0 0 5 5"
                    fill="none"
                >
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#70C03F" />
                </svg>
                <a href="#subsection-procedure"
                    ><span class="ml-3">確定申告について</span></a
                >
                </div>
                <div class="mb-5">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="5"
                    height="5"
                    viewBox="0 0 5 5"
                    fill="none"
                >
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#70C03F" />
                </svg>
                <a href="#subsection-Corporation"
                    ><span class="ml-3">法人化による節税対策</span></a
                >
                </div>
            </div>
            <div class="col-12 col-md-9 lh-14">
                <div
                id="subsection-strongpoint"
                class="subsection-strongpoint pb-80"
                >
                <div class="banner row mb-100">
                    <div class="col-4 imgshow">
                    <a href="<?php echo esc_url(home_url('/')); ?>inher_tax">
                        <img
                            src="<?php echo T_DIRE_URI; ?>/assets/img/page-inher-navi-img01.png"
                            style="width: 100%"
                        />
                    </a>
                    </div>
                    <div class="col-4 imgshow">
                    <a href="<?php echo esc_url(home_url('/')); ?>inher">
                        <img
                            src="<?php echo T_DIRE_URI; ?>/assets/img/page-inher-navi-img02.png"
                            style="width: 100%"
                        />
                    </a>
                    </div>
                    <div class="col-4 imgshow">
                    <a href="<?php echo esc_url(home_url('/')); ?>prenatal">
                        <img
                            src="<?php echo T_DIRE_URI; ?>/assets/img/page-inher-navi-img03.png"
                            style="width: 100%"
                        />
                    </a>
                    </div>
                </div>
                <div>
                    <span class="fs-50 bold">Introduction</span>
                </div>
                <div class="mt-10 mb-80 fs-24" id="導入">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="8"
                    height="8"
                    viewBox="0 0 5 5"
                    fill="none"
                    >
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#70C03F" />
                    </svg>
                    <span class="ml-3 bold">導入</span>
                </div>
				<div class="row pl-100 mb-70 images">
                  <div class="col-12 col-md-6 p-7">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/img/estate-img01.png" />
                  </div>
                  <div class="col-12 col-md-6 p-7">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/img/estate-img02.png" />
                  </div>
                  <div class="col-12 col-md-6 p-7">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/img/estate-img03.png" />
                  </div>
                  <div class="col-12 col-md-6 p-7">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/img/estate-img04.png" />
                  </div>
                </div>
                <div class="mb-20">
                    <span class="fs-16">
                    不動産オーナーといっても、持っている不動産の種類によって収入はさまざまです。
                    </span>
                </div>
                <div class="must">
                    <div class="strongmust fw-600">
                    <span class="fs-15">
                        ビルやアパートなどの賃貸物件を所有している
                    </span>
                    </div>
                    <div class="strongmust fw-600 my-10">
                    <span class="fs-15">
                        駐車場として貸している土地を所有している
                    </span>
                    </div>
                    <div class="strongmust fw-600">
                    <span class="fs-15">
                        土地自体を事業用地や居住用地、畑として貸している
                    </span>
                    </div>
                </div>
                <div class="mt-20 mb-10">
                    <span class="fs-16">
                    税理士法人ミチ・ツナグは、こうした不動産収入のある方のサポートに強みを持っています。
                    </span>
                </div>
                <div class="mt-10 mb-10">
                    <span class="fs-16">
                    代表の佐々木は、開業前に地主の方を対象とした「不動産申告」や「相続税対策」を数多く手がけておりました。こうした経験から得たノウハウを活かし、全国地域の不動産オーナー様のサポートをいたします。
                    </span>
                </div>
                <div>
                    <span class="fs-16">
                    また、不動産申告や相続税対策は相続にも直結するため、日ごろから関わりがあることでいざというときにお役に立つことが可能です。
                    </span>
                </div>
                </div>
                <div
                id="subsection-procedure"
                class="mt-80 border-bottom-grey pb-80"
                >
                <div class="Final-tax">
                    <span class="inbox fs-50 bold bg-wheat"
                    >Final tax return</span
                    >
                </div>
                <div class="mt-10 mb-80">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="5"
                    height="5"
                    viewBox="0 0 5 5"
                    fill="none"
                    >
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#70C03F" />
                    </svg>
                    <span class="ml-3 fs-24 bold">確定申告について</span>
                </div>
                <div class="">
                    <div class="sub-feautre-1 pl-10 fs-32 fw-600 mb-30">
                    毎年の不動産所得に関する確定申告｜譲渡所得や贈与税の申告
                    </div>
                    <div class="fs-16">
                    <div>
                        税理士法人ミチ・ツナグでは、不動産所得のある方の確定申告をトータルサポートいたします。
                    </div>
                    <div class="my-10">
                        毎年の確定申告はもちろんですが、不動産を売買した場合の譲渡所得の申告や贈与した場合の贈与税の申告についても対応いたします。
                    </div>
                    <div>
                        不動産の贈与や相続には、適正な評価がされていることが重要であるため、相続専門の税理士法人ミチ・ツナグにとって得意分野といえます。
                    </div>
                    <div class="my-10">
                        また、これらの申告をするにあたっては節税に繋がるさまざまな特例があります。そして、特例を適用するには、期間や期日といった要件が細かく指定されているため、事前の相談が重要となります。
                    </div>
                    <div>
                        不動産を譲渡もしくは贈与しようと考えている場合には、ぜひ一度ご相談ください。
                    </div>
                    </div>
                </div>
                </div>
                <div id="subsection-Corporation" class="mt-80 pb-80">
                <div>
                    <span class="fs-50 bold">Corporation</span>
                </div>
                <div class="mt-10 mb-80">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="5"
                    height="5"
                    viewBox="0 0 5 5"
                    fill="none"
                    >
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#70C03F" />
                    </svg>
                    <span class="ml-3 fs-24 bold"
                    >不動産所得のみでも法人化による節税を｜相続税対策も</span
                    >
                </div>
                <div class="">
                    <div class="fs-16">
                    <div>
                        アパートを数棟所有している場合、不動産管理会社として法人化することで節税となるケースがあります。また、その法人の株主を、子や孫など身内とすることで節税に繋がります。
                    </div>
                    <div class="my-10">
                        法人の株主が相続人となる子や孫になっていることで、認知症になったときの備えができます。
                    </div>
                    <div>
                        さらに、相続が発生した際に、相続人間でトラブルが起き「争族」となってしまった場合の対策にも有効です。
                    </div>
                    <div class="my-10">
                        法人化について、法人設立費用及び開業初年度の決算料はいただかない開業支援を実施しておりますので、お気軽にご相談ください。
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>