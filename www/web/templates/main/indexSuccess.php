<?php slot('description', 'COSME DECORTE 黛珂,诞生于1970年,集团顶级品牌,由KOSE创始人小林孝三郎先生所亲自开创。因其出色的渗透技术闻名,倡导“乳液先行”理念。') ?>
<?php slot('keywords', 'コスメデコルテ,コーセー,クレンジング,乳液,化粧,美容液,クリーム,保湿,毛穴,ニキビ,美白,エイジング,むくみ,ファンデーション,化粧下地,カバー力,UV,紫外線,SPF') ?>
<?php slot('page_id', 'home') ?>
<?php slot('product_page_flag', true) ?>
<?php slot('facebook_product_title', 'DECORTE') ?>
<?php slot('facebook_product_url', $sf_request->getUri()) ?>
<?php slot('facebook_product_image', 'http://' . $sf_request->getHost() . '/images/faceicon.png') ?>
<?php slot('facebook_product_description', 'DECORTE.コスメデコルテ（コーセー）Webサイト。内面の充実と外見の自信、どちらも最高の状態へ導くことがコスメデコルテの願いです。') ?>

<?php use_stylesheet('home.css') ?>

<style>
.newsindex .category__container {
    padding-top: 0;
    margin-top: 0;
}
.l--poster .l--poster__container{
    height: 700px;
}
.image-base{
    min-height: 700px;
}
@media screen and (max-width: 736px) {
    .l--poster .l--poster__container{
        height: 240px;
    }
    .image-base{
        min-height: 240px;
    }
}
</style>

<div class="fascia">
    <div class="fascia__container">
        <div class="fascia__carousel">
            <div class="fascia__carousel__container">
                <!--
                <a href="/moisture_liposome/" class="fascia__carousel__node l--center pc">
                    <img src="/images/home/top/kv1.jpg" alt="" class="fascia__carousel__node__image">
                </a>
                <a href="/moisture_liposome/" class="fascia__carousel__node l--center sp">
                    <img src="/images/home/top/sp/kv1.jpg" alt="" class="fascia__carousel__node__image">
                </a>
              -->
                <a href="http://cosmedecorte.com.cn/product/aq_meliority/JGCX" class="fascia__carousel__node l--center pc">
                    <img src="/images/home/top/kv4.jpg" alt="" class="fascia__carousel__node__image">
                </a>
                <a href="http://cosmedecorte.com.cn/product/aq_meliority/JGCX" class="fascia__carousel__node l--center sp">
                    <img src="/images/home/top/sp/kv4.jpg" alt="" class="fascia__carousel__node__image">
                </a>
                <a href="/moisture_liposome/" class="fascia__carousel__node pc">
                    <img src="/images/home/top/kv2.jpg" alt="" class="fascia__carousel__node__image">
                </a>
                <a href="/moisture_liposome/" class="fascia__carousel__node sp">
                    <img src="/images/home/top/sp/kv2.jpg" alt="" class="fascia__carousel__node__image">
                </a>
                <a href="/whitelogist/" class="fascia__carousel__node pc">
                    <img src="/images/home/top/kv3.jpg" alt="" class="fascia__carousel__node__image">
                </a>
                <a href="/whitelogist/" class="fascia__carousel__node sp">
                    <img src="/images/home/top/sp/kv3.jpg" alt="" class="fascia__carousel__node__image">
                </a>
            </div>
        </div>
        <div class="fascia__controller">
            <span class="fascia__controller__switch m--current"></span>
            <span class="fascia__controller__switch"></span>
            <!--<span class="fascia__controller__switch"></span>-->
        </div>
    </div>
</div>



<!--<div class="bitrivia">
    <div class="bitrivia__container bl">
        <div class="bitrivia__logo"><img src="/images/home/bi-trivia/title.png" alt="美トリビア45　歴史を紡ぐ、人々の想い"></div>
        <div class="bitrivia__link"><a href="http://cosmedecorte.brandtalk.jp/?utm_source=cosmedecorte.com&utm_medium=brandsite&utm_campaign=beautytrivia" target="_blank">美トリビアを見る</a></div>
    </div>
</div>-->
<style type="text/css">
    .l--poster:nth-child(1){
        background-image: none;
    }
    .l--poster:nth-child(2){
        background-image: none;
    }
    .l--poster:nth-child(3){
        background-image: none;
    }
    .l--poster:nth-child(4){
        background-image: none;
    }
    .news__20160715a .image-base{
        background-image:url("/images/home/bestcosme/banner2.jpg");
    }
    .news__20161016b .image-base{
        background-image:url("/images/home/bestcosme/banner3.jpg");
    }
    .news__20161201b .image-base{
        background-image:url("/images/home/bestcosme/banner4.jpg");
    }
    .news__20161202b .image-base{
        background-image:url("/images/home/bestcosme/banner5.jpg");
    }
    .news__20161203b .image-base{
        background-image:url("/images/home/news/list_item/news2.jpg");
    }
    @media screen and (max-width: 736px) {
        .bn5{
            min-height: 210px;
        }
    }
</style>
<div class="right_first">
    <div class="news__20160715a l--poster white" id="news__20160715a">
        <div class="l--poster__container">
            <a href="/liposome/">
                <div class="image-base"></div>
            </a>
        </div>
    </div>
    <!--
    <div class="news__20161016b l--poster white" id="news__20161016b">
        <div class="l--poster__container">
            <a href="http://cn-cosmedecorte.com/product-581.html" target="_blank">
                <div class="image-base"></div>
            </a>
        </div>
    </div>
  -->
    <div class="news__20161201b l--poster black" id="news__20161201b">
        <div class="l--poster__container">
            <a href="/whitelogist">
                <div class="image-base"></div>
            </a>
        </div>
    </div>
    <!--
    <div class="news__20161201b l--poster black" id="news__20161202b">
        <div class="l--poster__container">
            <a href="aq_mw/b_itemconcept.html">
                <div class="image-base"></div>
            </a>
        </div>
    </div>
-->
    <div class="news__20161202b l--poster black bn5" id="news__20161203b">
        <div class="l--poster__container bn5">
            <a href="aq_mw">
                <div class="image-base bn5"></div>
            </a>
        </div>
    </div>

</div>
<style type="text/css">
.news__list{
    width: 800px;
}
@media screen and (max-width: 736px) {
    .news__list{
      width: 100%;
    }
}
.news__list__item.news__20161201a{
    background-image:url(/images/home/news/list_item/news1.jpg);
}
.news__list__item.news__20161016c{
    background-image:url(/images/home/news/list_item/news2.jpg);
}
.news__list__item.news__20161201a a{
    right:50px;
}
</style>
<div class="news">
    <div class="l-container">
        <ul class="news__list">
            <li class="news__list__item bl news__20161201a" id="news__20161201a"><a href="news.html?section=newitem/#newitem-20170401a"><br><span style="border-bottom:1px solid black;padding:0">新色</span><br>黛珂<br>AQMW<br>魅艺唇膏<br></a></li>
            <li class="news__list__item bl news__20161016c" id="news__20161016c"><a href="news.html?section=newitem/#newitem-20170901a" style="color:black"><br><span style="border-bottom:1px solid black;padding:0">新商品</span><br>黛珂<br>多重防晒乳<br>（防晒乳液）</a></li>
        </ul>
        <!--<ul class="news__list">
            <li class="news__list__item bl news__20161001b" id="news__20161016a"><img src="/images/home/news/list_item/news_bg_20161001b.jpg" alt="" class="ie8"><a href="/aq_meliority/#newitem-20161001b"><span class="type">限定品</span><br>コスメデコルテ<br>AQ ミリオリティ<br>ラグジュリアス コフレ</a></li>
            <li class="news__list__item bl news__20161001c" id="news__20161016b"><img src="/images/home/news/list_item/news_bg_20161001c.jpg" alt="" class="ie8"><a href="/aq_mw/#newitem-20161001c"><span class="type">限定品</span><br>コスメデコルテ<br>AQ MW<br>レプリション 4D キット</a></li>
            <li class="news__list__item bl news__20161001a" id="news__20161016c"><img src="/images/home/news/list_item/news_bg_20161001a.jpg" alt="" class="ie8"><a href="/ip_shot/#newitem-20161001a"><span class="type">新商品</span><br>コスメデコルテ<br>iP.Shot</a></li>
        </ul>-->

    </div>
</div>
<!--
<div class="whatsNewLink">
    <div class="whatsNewLink__container"> <a href="news.html#category__campaign">More latest info</a> </div>
</div>
-->
<!--
<div class="line">
    <div class="line__container">

        <div class="line__title">LINE</div>
        <div class="line__menu">
            <div class="line__menu__container">
                <div class="line__menu__triggers m--select">
                    <select class="line__menu__select">
                      <option value="">Other Product Lines</option>
                        <option value="all">All</option>
                        <option value="agingcare">Aging Care</option>
                        <option value="moisturizing">Moisturizing Care</option>
                        <option value="whitening">Whitening Care</option>
                        <option value="wrinkle">Wrinkle Care</option>
                        <option value="skininanition">Skin Stress Care</option>
                        <option value="basemake">Base Makeup</option>
                        <option value="hairbody">Hair & Body Care</option>
                        <option value="fragrance">Fragrances</option>
                    </select>
                    <span>View More</span>
                </div>
                <div class="line__menu__triggers m--list">
                    <div class="line__menu__list">
                        <span class="line__menu__trigger" data-category="all">All</span>
                        <span class="line__menu__trigger" data-category="agingcare">Aging Care</span>
                        <span class="line__menu__trigger" data-category="moisturizing">Moisturizing Care</span>
                        <span class="line__menu__trigger" data-category="whitening">Whitening Care</span>
                        <span class="line__menu__trigger" data-category="wrinkle">Wrinkle Care</span>
                        <span class="line__menu__trigger" data-category="skininanition">Skin Stress Care</span>
                        <span class="line__menu__trigger" data-category="basemake">Base Makeup</span>
                        <span class="line__menu__trigger" data-category="hairbody">Hair & Body Care</span>
                        <span class="line__menu__trigger" data-category="fragrance">Fragrances</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="line__display">
            <div class="line__display__container">
                <div class="line__display__movie">
                    <a href="/liposome/"><img src="/images/home/line_all/line_movie.gif" alt="" class="line__display__movie__image"></a>
                </div>
            </div>
        </div>

        <div class="line__contents">
            <div class="line__contents__container">
                <div class="l--product-block m--all m--agingcare m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line07_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/liposome">LIPOSOME <small>Treatment Liquid</small><span class="kana">リポソームトリートメント　リキッド</span></a></div>
                </div>
                <div class="l--product-block m--all m--agingcare m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line01_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/aq_meliority">AQ MELIORITY</a></div>
                </div>
                <div class="l--product-block m--all m--agingcare m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line03_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/aq_mw">AQ MW</a></div>
                </div>
                <div class="l--product-block m--all m--agingcare m--whitening m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line04_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/cellgenie">Cellgenie <span class="kana">セルジェニー</span></a></div>
                </div>
                <div class="l--product-block m--all m--moisturizing m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line05_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/phytotune">Phytotune <span class="kana">フィトチューン</span></a></div>
                </div>
                <div class="l--product-block m--all m--moisturizing m--default bl">
                    <div class="l--product-block__image"><img src="/images/home/line_all/line08_b.png" alt=""></div>
                    <div class="l--product-block__text"><a href="/moisture_liposome">MOISTURE LIPOSOME <span class="kana">モイスチュアリポソーム</span></a></div>
                </div>
                <div class="l--product-block m--all m--wrinkle bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line21_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/ip_shot">iP.Shot</a></div>
                </div>
                <div class="l--product-block m--all m--whitening m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line13_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/whitelogist">WHITELOGIST <span class="kana">ホワイトロジスト</span></a></div>
                </div>
                <div class="l--product-block m--all m--skininanition m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line14_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/cyclic_key">CYCLIC KEY <span class="kana">サイクリックキィ</span></a></div>
                </div>
                <div class="l--product-block m--all m--basemake m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line15_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/ever_crystal">EVER CRYSTAL <span class="kana">コスメデコルテ　エバークリスタル</span></a></div>
                </div>
                <div class="l--product-block m--all m--basemake m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line16_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/even_perfect">EVEN PERFECT <span class="kana">コスメデコルテ イーブンパーフェクト</span></a></div>
                </div>
                <div class="l--product-block m--all m--basemake m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line17_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/lacouture">LACOUTURE <span class="kana">ラクチュール</span></a></div>
                </div>
                <div class="l--product-block m--all m--hairbody m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line19_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/de_la_vie">De la Vie <span class="kana">ドゥ ラ ヴィ</span></a></div>
                </div>
                <div class="l--product-block m--all m--fragrance m--default bl">
                    <div class="l--product-block__image"> <img src="/images/home/line_all/line20_b.jpg" alt=""> </div>
                    <div class="l--product-block__text"><a href="/vice_virtue">Vice and Virtue <span class="kana">バイス＆バーチュ</span></a></div>
                </div>
            </div>
        </div>

    </div>
</div>
-->
<section id="ranking" class="ranking">
    <?php include_component('product', 'ranking', array('category_slug' => 'skincare')) ?>
</section>
<style type="text/css">
.information__list__item.m--imcube .banner{
    background-image:url('/images/home/information/im1.jpg');
}
.information__list__item.m--event .banner{
    background-image:url('/images/home/information/im2.jpg');
}
.information__list__item.m--discover .banner{
    background-image:url('/images/home/information/im3.jpg');
}
</style>
<section class="information">
    <div class="information__container">
        <h1 class="information__title">服务信息</h1>
        <ul class="information__list">
            <li class="information__list__item m--imcube bl"><span class="banner"><img src="/images/home/information/sp/im1.jpg" alt="" class="sp"></span><a href="http://cn-cosmedecorte.com/" target="_blank">在线购买</a></li>
            <li class="information__list__item m--shop bl"><span class="banner"><img src="/images/home/information/sp/shop.jpg" alt="" class="sp"></span><a href="/shop.html" target="_blank">店铺信息</a></li>
            <li class="information__list__item m--event bl"><span class="banner"><img src="/images/home/information/sp/im2.jpg" alt="" class="sp"></span><a href="/salon.html" target="_blank">积分兑换</a></li>
            <!--
            <li class="information__list__item m--fansite bl"><span class="banner"><img src="/images/home/information/sp/fansite.jpg" alt="" class="sp"></span><a href="http://cafe.cosmedecorte.com/" target="_blank">Cafe de DECORT&Eacute;<br class="sp">(ファンサイト)</a></li>
        -->
            <li class="information__list__item m--discover bl"><span class="banner"><img src="/images/home/information/sp/im3.jpg" alt="" class="sp"></span><a href="/cafe.html" target="_blank">黛珂美颜中心</a></li>
            <!--
            <li class="information__list__item m--salon bl"><span class="banner"><img src="/images/home/information/sp/salon.jpg" alt="" class="sp"></span><a href="/salon">salon de beaut&eacute; DECORT&Eacute;</a></li>
        -->
        </ul>
        <!--<p class="information__salon"><a href="/salon"><img src="/images/home/information/sp/salon.jpg" alt="salon de beaute" class="sp"></a></p>-->
    </div>
</section>

<section class="andmore">
    <div class="andmore__container">
        <ul class="andmore__list">
            <li class="andmore__list__item"><a href="/bestcosme.html">获奖信息</a></li>
            <li class="andmore__list__item"><a href="/salon.html">会员权益</a></li>
            <li class="andmore__list__item"><a href="/moisture_liposome/concept.html">LIPOSOME的秘密</a></li>
            <li class="andmore__list__item maison"><a href="/images/home/footer/ruye.html">乳液先行</a></li>
        </ul>

        <ul class="andmore__icon">
            <div style="text-align:center;padding:5px 0">
                <img src="/images/home/footer/qrcode.jpg" style="width:100px">
                <p style="margin:0;margin-top:10px;font-size:14px">
                    扫描二维码<br>
                    关注黛珂中国官方微信
                </p>
            </div>
            <!--
            <li class="andmore__icon__item"><a href="https://www.facebook.com/cosmedecorte" target="_blank"><span>Facebook</span><div class="icon_circle"><i class="icon icon-facebook"></i></div></a></li>
            <li class="andmore__icon__item"><a href="https://www.youtube.com/user/cosmedecortecom" target="_blank"><span>YouTube</span><div class="icon_circle"><i class="icon icon-youtube"></i></div></a></li>
            <li class="andmore__icon__item"><a href="/app.html"><span>Smartphone<br>App</span><div class="icon_circle"><i class="icon icon-mobile2"></i></div></a></li>
            <li class="andmore__icon__item"><a href="/faq/"><span>FAQ</span><div class="icon_circle"><span class="text icon">Q</span></div></a></li>
        -->
        </ul>
        <div class="andmore__preview">
            <div class="andmore__preview__container">
            </div>
        </div>
        <!--
        <p class="andmore__notice">DECORTÉ is available with personalized customer service at authorized retailers as a rule and is not sold online.<br>
          Please acknowledge that COSMEDECORTE cannot be held responsible for products purchased online or at unauthorized retailers. <br class="pc">
        To find an authorized retailer near you, please use the store <a href="http://www.e-map.ne.jp/asp/decorte/" target="_blank">search page</a> on this website<br class="pc">
        or call our Customer Service at 0120-763-325.</p>
    -->
    </div>
</section>
