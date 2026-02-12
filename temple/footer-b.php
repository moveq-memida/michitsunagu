<?php if(!is_front_page()){ ?>
<footer>
        <div class="company-info__wrapper">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6626.680778440221!2d132.73880249357913!3d33.8551175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354fe5f3bb06c6cd%3A0xd5d3813a0db39ad0!2z56iO55CG5aOr5rOV5Lq644Of44OB44O744OE44OK44Kw77yI5L2Q44CF5pyo6Imv6YGT56iO55CG5aOr44O76KGM5pS_5pu45aOr5LqL5YuZ5omA77yJ!5e0!3m2!1sja!2sru!4v1703239377476!5m2!1sja!2sru"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="info__wrapper">
                <p class="t__txt">事務所情報<span>information</span></p>
                <table>
                    <tr>
                        <td>事務所名</td>
                        <td>税理士法人ミチ・ツナグ</td>
                    </tr>
                    <tr>
                        <td>代表</td>
                        <td>佐々木 良道</td>
                    </tr>
                    <tr>
                        <td>連絡先</td>
                        <td>電話：089 - 989 - 6447　FAX：089 - 989 - 6448</td>
                    </tr>
                    <tr>
                        <td>営業時間</td>
                        <td>9：00～17：30 (休業日：土曜日・日曜日・祝日)</td>
                    </tr>
                    <tr>
                        <td>住所</td>
                        <td>〒791-8013<br>
                            愛媛県松山市山越六丁目16-32-2号 (伊予鉄道高浜線「衣山駅」より徒歩17分)</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="footer-menu">
            <ul>
                <li>
                    <a href="<?php echo home_url() ?>/work">士業の業務について</a>
                </li>
                <li>
                    <a href="<?php echo home_url() ?>/service">サービス紹介</a>
                </li>
                <li>
                    <a href="<?php echo home_url() ?>/support">法人設立・開業決算支援</a>
                </li>
            </ul>
            <div class="contact__items">
                <a href="<?php echo home_url() ?>/contact" class="rect__link">
                    <span>メールでお問い合わせ</span>
                </a>
                <a href="https://line.me/R/ti/p/@773mzlzl?oat_content=url" class="rect__link line">
                    <span>LINEでお問い合わせ</span>
                </a>
                <a href="tel:089-989-6447" class="tel__link">
                    <span class="tel">
                        <span class="icon"><img src="<?php echo T_DIRE_URI; ?>/assets_b/img/icon_phone.png" alt="phone"></span>
                        <span class="txt">089-989-6447</span>
                    </span>
                    <span class="work__txt">9:00～17:30(土日祝休み)</span>
                    
                </a>
            </div>
        </div>
        <p class="copyright">&copy; 2023 税理士法人ミチ・ツナグ</p>
        <span class="img__road">
            <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/img_road.png" alt="" class="pc">
            <img src="<?php echo T_DIRE_URI; ?>/assets_b/img/img_road_sp.png" alt="" class="sp">
        </span>
</footer> 
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
