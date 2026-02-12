<?php

if ($_POST['flag']) {

  get_header();
} else {

  get_header('b');
}

?>



<?php if (!$_POST['flag']): ?>

  <div class="home__frontview">

    <div class="close__btn">

      <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/home/close_btn.png" alt="close__btn">

    </div>

    <h1 class="title">

      どちらを<span>ミチ・ツナグ</span>にご相談しますか？



    </h1>

    <p class="en__txt">pick item</p>



    <form method="POST" action="/" id="flagForm">

      <input type="hidden" name="flag" value="1" />

    </form>



    <div class="page__items">

      <div class="p__item">

        <span class="gap__image01">

          <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/home/gap01.png" alt="gap01" class="pc">

          <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/home/gap01_sp.png" alt="gap01" class="sp">

        </span>

        <h2 class="t_txt">

          <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/home/title01.png" alt="相続について">

        </h2>

        <ul>

          <li>

            相続手続きをすべて専門家に任せたい

          </li>

          <li>

            遺産の分割方法についてアドバイスがほしい

          </li>

          <li>

            相続人が多くて遺産分割や書類のやり取りが大変

          </li>

          <li>

            相続人同士が遠方に住んでいる

          </li>

          <li>

            専門家によって相続税が違うってホント？

          </li>

          <li>

            不動産や預貯金など、相続財産が多岐にわたる

          </li>

          <li>

            相続財産や相続人が特定できない　など…

          </li>

        </ul>

        <span class="arrow">

          <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/home/p_arrow.png" alt="arrow">

        </span>

        <div class="link__btn" id="consult_btn">

          <span class="bg"></span>

          <span class="lbl">相続について相談する</span>

          <span class="circle">

            <span><img src="<?php echo T_DIRE_URI; ?>/assets_b/img/arrow_w.png" alt=""></span>

          </span>

        </div>

      </div>

      <div class="p__item">

        <span class="gap__image02">

          <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/home/gap02.png" alt="gap02">

        </span>

        <h2 class="t_txt">

          <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/home/title02.png" alt="事業支援について">

        </h2>

        <ul>

          <li>

            日々の会計記帳業務に多くの時間を要している

          </li>

          <li>

            気軽に相談でき、迅速なレスポンスがほしい

          </li>

          <li>

            経営判断に必要な税務知識を丁寧に説明してほしい

          </li>

          <li>

            事業を伸ばすため、法人化を検討している

          </li>

          <li>

            EC販売・海外取引に詳しい税理士を探している

          </li>

          <li>

            リアルタイムに事業の財務状況を把握したい

          </li>



        </ul>

        <span class="arrow">

          <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/home/p_arrow02.png" alt="arrow">

        </span>

        <a href="<?php echo home_url() ?>/business" target="_blank" class="link__btn">

          <span class="bg"></span>

          <span class="lbl">事業を手助けしてもらう</span>

          <span class="circle">

            <span><img src="<?php echo T_DIRE_URI; ?>/assets_b/img/arrow_w.png" alt=""></span>

          </span>

        </a>

      </div>

    </div>

  </div>

<?php else: ?>


  <!--------------------------- ここから相続のTOPページのコード ---------------------------->

  <main>
    <!-- float-btn -->
     <a href="<?php echo home_url(); ?>/contact/" class="zoom__float-btn link_hover">
      <div class="float-btn__inner">
        <div class="float-btn__message">
          <p><span>ZOOM</span>でも<br>相談できます！</p>
        </div>
        <div class="float-btn__icon">
          <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/float-btn-icon.png" alt="代表写真アイコン">
        </div>
        <div class="float-btn__txt">
          <p>お問い合わせへ</p>
        </div>
        <div class="close-btn">
          <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/close-btn.png" alt="閉じるボタン" width="40" height="40">
        </div>
      </div>
     </a>

    <!-- fv -->

    <div class="inherit__fv">

      <div class="inherit__fv-content">

        <div class="inherit__fv-title">

          <h1>
            <span class="txt_yellow">相続のお悩み</span>を、<br>
            <span class="txt_yellow">スーパーワンストップ</span>で<br>
            解決する。
          </h1>

        </div>

        <div class="inherit__fv-img">

          <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/hd-main.png" srcset="<?php echo T_DIRE_URI; ?>/assets/img/custom/hd-main.png 1x, <?php echo T_DIRE_URI; ?>/assets/img/custom/hd-main@2x.png 2x" alt="税理士とおじいちゃんのイラスト">

        </div>

      </div>

    </div>

    <section class="inherit__introduction">
      <div class="cta__wrap">
        <div class="main-cta">
          <div class="g-review__area">
            <div class="place">
              <div class="crown-icon"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/crown.png" alt="王冠アイコン"></div>
              <p>愛媛県内</p>
            </div>
            <div class="title">
              <p>Google<br>口コミ数</p>
              <p class="number"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/number1.svg" alt="No.1" width="100" height="100"></p>
            </div>
            <div class="stars-icon"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/stars.png" alt="星アイコン"></div>
          </div>
          <div class="mail-cta__area">
            <p>共に伴走する専門家をお探しの方に</p>
            <a href="https://www.michitsunagu.com/contact/" target="_blank" class="link_hover">
              <p>メールでのご相談はこちら</p>
              <p>( 24時間受付中 )</p>
            </a>
          </div>
        </div>
        <p class="note">※ 2025年 Google口コミ検索独自調べ</p>
        <div class="sub-cta">
          <p class="sub-cta_title"><span class="txt_green">お電話・公式LINE</span>からも<br class="sp_only">ご連絡いただけます</p>
          <p class="office-info">営業時間：9:00～17:00（土日祝休み）</p>
          <div class="btn_wrap">
            <a href="tel:089-989-6447" class="tel-btn link_hover">
              <p>お急ぎの方はお電話でご連絡ください</p>
              <p class="tel-number">089-989-6447</p>
            </a>
            <a href="https://line.me/R/ti/p/@773mzlzl?oat_content=url" target="_blank" class="line-btn link_hover">
              <p><span>LINE</span>からご相談はこちら</p>
            </a>
          </div>
        </div>
      </div>
      <div class="result__block">
        <div class="result__block-content">
          <div class="result__block-inner">
            <div class="img-area">
              <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/shikoku_graph.png" alt="申告実績グラフ">
            </div>
            <div class="txt-area">
              <p class="result__block-title"><span class="inner"><span class="txt_green">年間約50件</span>の申告実績！</span></p>
              <div class="txt_base">
                <p>税理士法人ミチ・ツナグでは、<span class="txt_green">毎年50件ほど</span>の相続税申告をお手伝いしています。これまでに多くのご家族のケースに関わり、複雑な事情や多様な資産構成にも対応してきました。</p>
                <p>たくさんのご家族のケースに関わってきた経験をもとに、<span class="txt_green">あなたのご事情に合わせたご提案</span>ができます。初めての方も安心してご相談ください。</p>
              </div>
            </div>
          </div>
        </div>
        <p class="note">出典：国税庁「令和5年分 相続税の申告状況について」https://www.nta.go.jp/information/release/kokuzeicho/2024/sozoku_shinkoku/pdf/sozoku_shinkoku.pdf税理士事務所数は日本税理士会連合会の登録者数(https://www.nichizeiren.or.jp/cpta/about/enrollment/)に基づき当社算出</p>
      </div>
    </section>

    <section class="inherit__review">
      <h2><span>Google口コミご紹介</span></h2>
      <?php
        $review_items = function_exists( 'temple_get_inherit_reviews' ) ? temple_get_inherit_reviews( 7 ) : array();
      ?>
      <div class="review__wrap">
        <?php foreach ( $review_items as $review ) : ?>
          <?php
            $author_name = isset( $review['author_name'] ) && $review['author_name'] !== '' ? $review['author_name'] : 'Googleユーザー';
            $author_url = isset( $review['author_url'] ) ? $review['author_url'] : '';
            $profile_photo_url = isset( $review['profile_photo_url'] ) && $review['profile_photo_url'] !== '' ? $review['profile_photo_url'] : T_DIRE_URI . '/assets/img/custom/g-icon_red.png';
            $review_text = isset( $review['text'] ) ? $review['text'] : '';
            if ( $review_text === '' ) {
              $review_text = '（口コミ本文なし）';
            }
          ?>
          <div class="review__item">
            <div class="user-info">
              <div class="user-icon">
                <?php if ( $author_url ) : ?>
                  <a href="<?php echo esc_url( $author_url ); ?>" target="_blank" rel="noopener">
                <?php endif; ?>
                  <img src="<?php echo esc_url( $profile_photo_url ); ?>" alt="ユーザーアイコン" width="50" height="50">
                <?php if ( $author_url ) : ?>
                  </a>
                <?php endif; ?>
              </div>
              <div class="user-name">
                <p><?php echo esc_html( $author_name ); ?></p>
                <p class="num">1件クチコミ</p>
              </div>
            </div>
            <div class="user-rating">
              <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/g-stars.png" alt="★★★★★5.0">
            </div>
            <div class="review-content">
              <p><?php echo nl2br( esc_html( $review_text ) ); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="inherit__sns">
      <div class="content__wrap">
        <div class="heading__wrap">
          <div class="ttl__wrap">
            <h2>Instagram・TikTok<br class="sp">更新中です！</h2>
            <p>相続や税金のこと・私たちのことを定期的に発信中です！お気軽にフォロー・保存・いいねしてください♪</p>
          </div>
          <div class="illust__wrap">
            <div class="txt-area"></div>
            <div class="img-area"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/pepole-illu01.png" alt="男女イラスト" width="100%" height="auto"></div>
          </div>
        </div>
        <div class="inherit__sns-content">
          <div class="inherit__sns-btn">
            <a href="https://www.tiktok.com/@michitsunagu" target="_blank" class="tiktok-btn link_hover">
              <div class="inner">
                <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/tiktok_icon.png" alt="TikTokアイコン" width="60px" height="60px">
                <p>Tik Tokはこちら</p>
              </div>
            </a>
            <a href="https://www.instagram.com/michitsunagu/" target="_blank" class="instagram-btn link_hover">
              <div class="inner">
                <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/insta_icon.png" alt="Instagramアイコン" width="60px" height="60px">
                <p>Instagramはこちら</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>


    <section class="inherit__solution">

      <div class="main-part">

        <div class="heading">

          <img class="bigger" src="<?php echo T_DIRE_URI; ?>/assets/img/custom/img_q1.png" alt="">

          <div class="txt">

            <div class="heading-text">

              <div class="first">こんなお悩みの</div><br class="sp">

              <div class="green2">

                <div class="sm">かいけつほうほう</div>

                <div class="big">解決方法</div>

              </div>を

            </div>

            <div class="bot">共に考えてまいります</div>

          </div>

          <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/img_q2.png" alt="">

        </div>

        <div class="items-list">

          <div class="item">

            <div class="item-head">

              <div class="icon_check"></div>

              <p>手続きを全て<br>専門家に任せたい</p>

            </div>

            <div class="item-body">

              <p>

                当事務所は<span>スーパーワンストップ</span>を掲げており、相続に関する煩雑な手続きや申告・相談を一貫して行うことができます。各専門家の事務所を訪ねる負担を軽減することが可能です。

              </p>

            </div>

          </div>

          <div class="item">

            <div class="item-head">

              <div class="icon_check"></div>

              <p>遠縁の相続人が多くて遺産分割や<br>書類のやり取りが大変</p>

            </div>

            <div class="item-body">

              <p>

                他の相続人へのご連絡や書類のやり取りといった煩わしい業務も、<span>当事務所が代行</span>させていただきます。

              </p>

            </div>

          </div>

          <div class="item">

            <div class="item-head">

              <div class="icon_check"></div>

              <p>平日に市役所や法務局に<br>

                行くことができない</p>

            </div>

            <div class="item-body">

              <p>

                金融機関・市役所なのど行政機関は平日しか対応してくれません。当事務所は<span>手続き専属スタッフが回ります</span>ので、お客様にお仕事をお休みいただく必要がございません。

              </p>

            </div>

          </div>

          <div class="item">

            <div class="item-head">

              <div class="icon_check"></div>

              <p>気軽に相談でき、<br>迅速なレスポンスが欲しい</p>

            </div>

            <div class="item-body">

              <p>

                <span>LINE</span>を用いてお客様と職員複数人とでグループを作成することにより、迅速なレスポンスや確認漏れがないよう対応しております

              </p>

            </div>

          </div>

          <div class="item">

            <div class="item-head">

              <div class="icon_check"></div>

              <p>相続税の税務調査が心配

            </div>

            <div class="item-body">

              <p>

                弊社は<span>書面添付</span>を推進しております。書面添付とは税理士が作成する申告書の説明書になります。書面添付をつけることで、調査の可能性が少なくなりますので、申告後の安心に繋がるかと思います。

              </p>

            </div>

          </div>

          <div class="item">

            <div class="item-head">

              <div class="icon_check"></div>

              <p>手続きや申告の報酬はいくら？</p>

            </div>

            <div class="item-body">

              <p>

                多くの方が不安になるのは「報酬額」です。事務所によっては「手続きがすべて終わったら料金が確定する」というケースも。当事務所では<span>財産額に応じてはっきりと報酬額を決めている</span>ため、かかる総額が明確です。お見積りご依頼ください！

              </p>

            </div>

          </div>

        </div>

        <div class="bottom-content">
          <div class="staff-massage"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-message.svg" alt="私たちと一緒に解決していきましょう！"></div>
          <div class="boss-image sp-only"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/boss-image.png" alt="代表者写真"></div>
          <div class="member-iamges_wrap">
            <!-- PC表示用 -->
            <div class="staff-image_wrap staff-image_wrap01 pc-only">
              <div class="staff-image_01"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img01.png" alt="スタッフイラスト"></div>
              <div class="staff-image_02"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img02.png" alt="スタッフイラスト"></div>
              <div class="staff-image_03"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img03.png" alt="スタッフイラスト"></div>
              <div class="staff-image_04"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img04.png" alt="スタッフイラスト"></div>
              <div class="staff-image_05"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img05.png" alt="スタッフイラスト"></div>
            </div>
            <div class="boss-image pc-only"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/boss-image.png" alt="代表者写真"></div>
            <div class="staff-image_wrap staff-image_wrap02 pc-only">
              <div class="staff-image_06"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img06.png" alt="スタッフイラスト"></div>
              <div class="staff-image_07"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img07.png" alt="スタッフイラスト"></div>
              <div class="staff-image_08"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img08.png" alt="スタッフイラスト"></div>
              <div class="staff-image_09"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img09.png" alt="スタッフイラスト"></div>
              <div class="staff-image_10"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img10.png" alt="スタッフイラスト"></div>
            </div>
            <!-- SP表示用（スライドアニメーション） -->
            <div class="staff-slider sp-only">
              <div class="staff-slider__track">
                <!-- 1セット目 -->
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img01.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img02.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img03.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img04.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img05.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img06.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img07.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img08.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img09.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img10.png" alt="スタッフイラスト"></div>
                <!-- 2セット目（ループ用に複製） -->
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img01.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img02.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img03.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img04.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img05.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img06.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img07.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img08.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img09.png" alt="スタッフイラスト"></div>
                <div class="staff-image_item"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/staff-img10.png" alt="スタッフイラスト"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

    <section class="inherit__about-service">



      <div class="title">

        <div class="cal"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/img_p2.png" alt=""></div>

        <div class="comment">

          <div class="union">

            <p>手続き・申告・相談を窓口一つで</p>

          </div>

          <div class="tx">

            スーパーワンストップサービス<span>とは</span>

          </div>

        </div>

      </div>



      <div class="main-part">

        <div class="part1">

          <div class="exp">

            通常、相続手続きは「<span>行政書士</span>」相続税の申告は「<span>税理士</span>」不動産の名義変更は「<span>司法書士</span>」と、<br class="pc">

            手続きごとにいろんな専門家が存在し、各専門家の行える範囲は限られています。

          </div>

          <div class="img-container">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/p1.png" alt="">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/p2.png" alt="">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/p3.png" alt="">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/p4.png" alt="">

          </div>

        </div>

        <div class="part2">

          <div class="exp">

            しかし、<span>行政書士</span>と<span>税理士</span>を同事務所に抱える<br class="sp"> <span>ミチ・ツナグ</span>なら<br>

            煩わしい手続きを<span>窓口ひとつ</span>で完結できます！

          </div>

          <div class="img-container">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/p2-1.png" alt="">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/p2-2.png" alt="">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/p2-3.png" alt="">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/p2-4.png" alt="">

          </div>

        </div>

        <div class="middle-arrow">
          <p>さらに！</p>
        </div>

        <div class="part3">
          <dl class="exp">
            <dt><span class="txt_green">税務署OB</span>による<br>ダブルチェックを行います！</dt>
            <dd class="txt_base">
              <p>申告書の内容は、<span class="txt_green">資産税に詳しい元税務署職員(OB)の税理士</span>がチェック！プロの視点からも確認しているので、税務署から見ても信頼性の高い申告書になります。</p>
              <p>税務調査が入りにくい仕組みも整っているので、より安心です。</p>
            </dd>
          </dl>
          <div class="img-area">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/about-service_image.png" alt="税理士写真">
          </div>
        </div>

      </div>

    </section>

    <div class="middle-content__block">

      <div class="cta__wrap">
        <div class="heading">
          <div class="txt-area">

            <p>相続の手続きや申告・生前対策など、<br>ご相談はお気軽に。</p>

          </div>
          <div class="img-area">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/cta-character.png" alt="">

          </div>
        </div>
        <div class="main-cta">
          <div class="g-review__area">
            <div class="place">
              <div class="crown-icon"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/crown.png" alt="王冠アイコン"></div>
              <p>愛媛県内</p>
            </div>
            <div class="title">
              <p>Google<br>口コミ数</p>
              <p class="number"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/number1.svg" alt="No.1" width="100" height="100"></p>
            </div>
            <div class="stars-icon"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/stars.png" alt="星アイコン"></div>
          </div>
          <div class="mail-cta__area">
            <p>共に伴走する専門家をお探しの方に</p>
            <a href="https://www.michitsunagu.com/contact/" target="_blank" class="link_hover">
              <p>メールでのご相談はこちら</p>
              <p>( 24時間受付中 )</p>
            </a>
          </div>
        </div>
        <p class="note">※ 2025年 Google口コミ検索独自調べ</p>
        <div class="sub-cta">
          <p class="sub-cta_title"><span class="txt_green">お電話・公式LINE</span>からも<br class="sp_only">ご連絡いただけます</p>
          <p class="office-info">営業時間：9:00～17:00（土日祝休み）</p>
          <div class="btn_wrap">
            <a href="tel:089-989-6447" class="tel-btn link_hover">
              <p>お急ぎの方はお電話でご連絡ください</p>
              <p class="tel-number">089-989-6447</p>
            </a>
            <a href="https://line.me/R/ti/p/@773mzlzl?oat_content=url" target="_blank" class="line-btn link_hover">
              <p><span>LINE</span>からご相談はこちら</p>
            </a>
          </div>
        </div>
      </div>

      <dl class="thought__block">
        <dt><span class="txt_green">報酬</span>に関するミチ・ツナグの考え</dt>
        <dd>税理士や行政書士に相談されるときに多くの方が不安になるのは「<span class="txt_green">報酬額</span>」です。事務所によっては「手続きがすべて終わったら料金が確定する」というケースも。しかしご安心ください。当事務所では財産額に応じてはっきりと報酬額を決めているため、<span class="txt_green">かかる総額が明確</span>です。お見積りご依頼ください！<br>
        また、ご相談いただいた際に明確なスケジュールを提示するようにしております。いつまでに何をして、どのタイミングでお支払いが発生するのかがわかれば、見通しがついて安心できるはずです。</dd>
      </dl>

    </div>

    <section class="inherit__menu">
      <h2>メニュー一覧</h2>
      <div class="menu-items__wrap">
        <a href="<?php echo home_url(); ?>/inher_tax" class="menu-item link_hover">
          <div class="menu_item__title-area">
            <p class="menu-item__title">相続税の<span class="txt_green">申告</span></p>
          </div>
          <div class="menu-item__image"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/menu-manga01.png" alt="相続税の申告"></div>
          <div class="menu-item__cta"><p>詳細はこちら</p></div>
        </a>
        <a href="<?php echo home_url(); ?>/inher" class="menu-item link_hover">
          <div class="menu_item__title-area">
            <p class="menu-item__title">相続の<span class="txt_green">手続き</span></p>
          </div>
          <div class="menu-item__image"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/menu-manga02.png" alt="相続税の手続き"></div>
          <div class="menu-item__cta"><p>詳細はこちら</p></div>
        </a>
        <a href="<?php echo home_url(); ?>/estate" class="menu-item link_hover">
          <div class="menu_item__title-area">
            <p class="menu-item__title">不動産<br>オーナーの<span class="txt_green">申告</span></p>
          </div>
          <div class="menu-item__image"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/menu-manga03.png" alt="不動産オーナーの申告"></div>
          <div class="menu-item__cta"><p>詳細はこちら</p></div>
        </a>
        <a href="<?php echo home_url(); ?>/prenatal" class="menu-item link_hover">
          <div class="menu_item__title-area">
            <p class="menu-item__title"><span class="txt_green">生前対策</span></p>
          </div>
          <div class="menu-item__image"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/menu-manga04.png" alt="生前対策"></div>
          <div class="menu-item__cta"><p>詳細はこちら</p></div>
        </a>
      </div>
    </section>

    <div class="white-bg__wrap">
      <section class="review">

        <h2 class="review-hd">

          <span class="green">お客様の声</span>

          <span>紹介</span>

        </h2>

        <div class="review-items">

          <div class="item">

            <p class="item-content">

              納税完了まで申し訳ないくらい時間がかかりましたが、佐々木先生が根気強く親身になって聞き取り、調査、対応してくださり感謝しております。

            </p>

            <p class="item-age">

              50代 女性

            </p>



            <a href="https://www.michitsunagu.com/voice/%e3%81%8a%e3%81%8b%e3%81%92%e3%81%95%e3%81%be%e3%81%a7%e7%b4%8d%e7%a8%8e%e3%81%be%e3%81%a7%e6%bc%95%e3%81%8e%e3%81%a4%e3%81%91%e3%81%9f/" class="item-detail"> 詳しくはこちら</a>



          </div>

          <div class="item">

            <p class="item-content">

              相続手続きだけでなく、相続後のライフプランの提案もしてくださり、安心できています。<br class="pc">

              ありがとうございます。

            </p>

            <p class="item-age">

              70代女性

            </p>



            <a href="https://www.michitsunagu.com/voice/%e7%9b%b8%e7%b6%9a%e7%a8%8e%e3%81%ae%e6%89%8b%e7%b6%9a%e3%81%8d%e3%83%bb%e7%94%b3%e5%91%8a%e3%81%a8%e9%81%ba%e8%a8%80%e6%9b%b8%e4%bd%9c%e6%88%90%e3%81%ae%ef%bc%92%e3%81%a4%e3%82%92%e3%82%b5%e3%83%9d/" class="item-detail"> 詳しくはこちら</a>



          </div>

          <div class="item male">

            <p class="item-content">

              初めての経験だったので、相続の仕組みから、説明をしてくれて安心でした。

              相続後も困ったことがあったときに相談させてもらっています。

            </p>

            <p class="item-age">

              70代 男性

            </p>



            <a href="https://www.michitsunagu.com/voice/%e6%80%a5%e3%81%8e%e3%81%ae%e4%be%9d%e9%a0%bc%e3%81%a0%e3%81%a3%e3%81%9f%e3%81%ae%e3%81%ab%e3%81%8b%e3%81%8b%e3%82%8f%e3%82%89%e3%81%9a%e3%80%81%e4%b8%81%e5%af%a7%e3%81%ab%e5%af%be%e5%bf%9c%e3%81%97/" class="item-detail"> 詳しくはこちら</a>



          </div>



        </div>

        <a href="http://www.michitsunagu.net/voice/" class="btn-tostaff">

          <div class="to">

            <p>お客様の声<span>一覧へ</span></p>

            <div class="bt-go"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/go.png" alt="">

            </div>

            <div class="man">

              <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/rev.png" alt="">

            </div>

          </div>

        </a>

      </section>
      <div class="slider-img__wrap">
        <div class="slider-img__track">
          <!-- 1セット目 -->
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img01.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img02.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img03.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img04.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img05.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img06.png" alt="事務所の様子">
          </div>
          <!-- 2セット目（ループ用に複製） -->
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img01.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img02.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img03.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img04.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img05.png" alt="事務所の様子">
          </div>
          <div class="slider-img__item">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/inherit_slider-img06.png" alt="事務所の様子">
          </div>
        </div>
      </div>
      <section class="introduce">

        <h2>スタッフ<span>紹介</span></h2>

        <div class="contents">

          <div class="photo">

            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/introduce.png" alt="税理士法人ミチ・ツナグ代表：佐々木良道写真" width="100%" height="auto">

          </div>

          <div class="intro-txt">

            <p class="intro-txt__name">税理士法人ミチ・ツナグ代表：佐々木良道</p>

            <div class="txt_base">

              <p>相続手続きは思ったよりも面倒なものです。<span class="w6">誰に何を相談すればよいのかわからない、どうして私ばかり手続きしなくてはいけないのか</span>、と悩まれている方を多く目にしてきました。</p>

              <p>大切な方が亡くなった後は、次のような多忙な日々が待っています。</p>

              <p>・四十九日や遺品整理など、やるべき法事が多い<br>

              ・相続手続きの中には、発生から90日間に行わなければいけないものがある<br>

              ・相続手続きの申告のためには最低でも7種類の手続きが必要である<br>

              ・自分で役所、銀行、法務局などに書類を取りに行かなければいけない<br>

              ・相続人の捺印を集めなければいけないケースが多い<br>
              </p>

              <p>悲しみや忙しさの中、相続人の間でコミュニケーションが不足すれば、トラブルにも発展しかねません。そんな様子を10年間見てきた結果、<span class="w6">法にもとづいたサポートだ</span>けでは不十分だと思うようになりました。</p>

              <p>細やかなサポートを行うことで、当事務所は<span class="green">本当に助かった</span>、<span class="green">担当してもらえてよかった</span>と言われることが増えました。今後も皆様に代わり、面倒で多岐にわたる手続きを含め、一括でお手伝いしてまいります。</p>

            </div>

            <a href="http://www.michitsunagu.net/stuff/#subsection-Representative" class="btn-tostaff">

              <div class="to">

                <p>スタッフ<span>一覧へ</span></p>

                <div class="bt-go"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/go.png" alt="">

                </div>

                <div class="man">

                  <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/introduce2.png" alt="">

                </div>

              </div>





            </a>

          </div>

        </div>

      </section>
    </div>

    <div class="cta__wrap-ending">
      <div class="cta__wrap">
        <div class="heading">
          <div class="txt-area">
            <p>相続の手続きや申告・生前対策など、<br>ご相談はお気軽に。</p>
          </div>
          <div class="img-area">
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/cta-character.png" alt="">
          </div>
        </div>
        <div class="main-cta">
          <div class="g-review__area">
            <div class="place">
              <div class="crown-icon"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/crown.png" alt="王冠アイコン"></div>
              <p>愛媛県内</p>
            </div>
            <div class="title">
              <p>Google<br>口コミ数</p>
              <p class="number"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/number1.svg" alt="No.1" width="100" height="100"></p>
            </div>
            <div class="stars-icon"><img src="<?php echo T_DIRE_URI; ?>/assets/img/custom/stars.png" alt="星アイコン"></div>
          </div>
          <div class="mail-cta__area">
            <p>共に伴走する専門家をお探しの方に</p>
            <a href="https://www.michitsunagu.com/contact/" target="_blank" class="link_hover">
              <p>メールでのご相談はこちら</p>
              <p>( 24時間受付中 )</p>
            </a>
          </div>
        </div>
        <p class="note">※ 2025年 Google口コミ検索独自調べ</p>
        <div class="sub-cta">
          <p class="sub-cta_title"><span class="txt_green">お電話・公式LINE</span>からも<br class="sp_only">ご連絡いただけます</p>
          <p class="office-info">営業時間：9:00～17:00（土日祝休み）</p>
          <div class="btn_wrap">
            <a href="tel:089-989-6447" class="tel-btn link_hover">
              <p>お急ぎの方はお電話でご連絡ください</p>
              <p class="tel-number">089-989-6447</p>
            </a>
            <a href="https://line.me/R/ti/p/@773mzlzl?oat_content=url" target="_blank" class="line-btn link_hover">
              <p><span>LINE</span>からご相談はこちら</p>
            </a>
          </div>
        </div>
      </div>
    </div>


  </main>

  <!--------------------------- ここまで相続のTOPページのコード ---------------------------->

<?php endif; ?>





<?php

if ($_POST['flag']) {

  get_footer();
} else {

  get_footer('b');
}

?>
