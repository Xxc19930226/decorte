<?php
    $section_1 = array(
        "skincare" => array(
            "name" => "护肤",
            "items" => array(
                "cleansing"     => array("卸妆", "/product/search?category=skincare&amp;sub_category=cleansing&amp;sort=category"),
                "washing"       => array("洁面", "/product/search?category=skincare&amp;sub_category=washing&amp;sort=category"),
                "emulsion"      => array("乳液", "/product/search?category=skincare&amp;sub_category=emulsion&amp;sort=category"),
                "lotion"        => array("化妆水", "/product/search?category=skincare&amp;sub_category=lotion&amp;sort=category"),
                "serum"         => array("美容液", "/product/search?category=skincare&amp;sub_category=serum&amp;sort=category"),
                "cream"         => array("面霜", "/product/search?category=skincare&amp;sub_category=cream&amp;sort=category"),
                "mask"          => array("面膜", "/product/search?category=skincare&amp;sub_category=mask&amp;sort=category"),
                "massage"       => array("按摩", "/product/search?category=skincare&amp;sub_category=massage&amp;sort=category"),
                "sun_products"  => array("防护", "/product/search?category=skincare&amp;sub_category=sun_products&amp;sort=category"),
            ),
        ),
        "basemake" => array(
            "name" => "基础底妆",
            "items" => array(
                "powder_foundation"     => array("粉饼", "/product/search?category=basemake&amp;sub_category=powder_foundation&amp;sort=category"),
                "liquid_foundation"     => array("粉底液", "/product/search?category=basemake&amp;sub_category=liquid_foundation&amp;sort=category"),
                "cream_foundation"      => array("粉底霜", "/product/search?category=basemake&amp;sub_category=cream_foundation&amp;sort=category"),
                "base"                  => array("基底乳", "/product/search?category=basemake&amp;sub_category=base&amp;sort=category"),
                "face_powder"           => array("蜜粉", "/product/search?category=basemake&amp;sub_category=face_powder&amp;sort=category"),
                "concealer"             => array("修颜膏", "/product/search?category=basemake&amp;sub_category=concealer&amp;sort=category"),
                // "control_color"         => array("Control Colors", "/product/search?category=basemake&amp;sub_category=control_color&amp;sort=category"),
            ),
        ),
        "pointmake" => array(
            "name" => "彩妆",
            "items" => array(
                "face_color"            => array("腮红", "/product/search?category=pointmake&amp;sub_category=face_color&amp;sort=category"),
                "eye_color"             => array("眼影", "/product/search?category=pointmake&amp;sub_category=eye_color&amp;sort=category"),
                "eye_brow"              => array("眉笔", "/product/search?category=pointmake&amp;sub_category=eye_brow&amp;sort=category"),
                "eye_liner"             => array("眼线", "/product/search?category=pointmake&amp;sub_category=eye_liner&amp;sort=category"),
                "mascara"               => array("睫毛膏", "/product/search?category=pointmake&amp;sub_category=mascara&amp;sort=category"),
                "lip_color"             => array("唇膏", "/product/search?category=pointmake&amp;sub_category=lip_color&amp;sort=category"),
                // "nail_color"            => array("Nail Colors", "/product/search?category=pointmake&amp;sub_category=nail_color&amp;sort=category"),
                // "point_make_remover"    => array("Makeup Removers", "/product/search?category=pointmake&amp;sub_category=point_make_remover&amp;sort=category"),
            ),
        ),
        /*
        "fragrance" => array(
            "name" => "Fragrances",
            "items" => array(
                "eau_de_toilette"   => array("Eau de Toilette", "/product/search?category=fragrance&amp;sub_category=eau_de_toilette&amp;sort=category"),
                "eau_de_parfum"     => array("Perfume", "/product/search?category=fragrance&amp;sub_category=eau_de_parfum&amp;sort=category"),
            ),
        ),
        "hairbody" => array(
            "name" => "Hair & Body Care",
            "items" => array(
                "hair_care"     => array("Hair Care", "/product/search?category=hair_body&amp;sub_category=hair_care&amp;sort=category"),
                "styling"       => array("Hair Styling", "/product/search?category=hair_body&amp;sub_category=styling&amp;sort=category"),
                "scalp_care"    => array("Scalp Care", "/product/search?category=hair_body&amp;sub_category=scalp_care&amp;sort=category"),
                "body_care"     => array("Body Care", "/product/search?category=hair_body&amp;sub_category=body_care&amp;sort=category"),
                "hand_care"     => array("Hand Care", "/product/search?category=hair_body&amp;sub_category=hand_care&amp;sort=category"),
            ),
        ),
        */
        "accessary" => array(
            "name" => "美容工具",
            "items" => array(
                "skincare_accessory"    => array("护肤工具", "/product/search?category=accessory&amp;sub_category=skincare_accessory&amp;sort=category"),
                "basemake_accessory"    => array("底妆工具", "/product/search?category=accessory&amp;sub_category=basemake_accessory&amp;sort=category"),
                "pointmake_accessory"   => array("彩妆工具", "/product/search?category=accessory&amp;sub_category=pointmake_accessory&amp;sort=category"),
            ),
        ),
    );
    $section_2 = array(
        "skincare" => array(
            "name" => "护肤",
            "items" => array(
                "保湿护理"    => "/product/search?category=skincare&amp;effect=moisture_care&amp;sort=category",
                "美白护理"    => "/product/search?category=skincare&amp;effect=whitening_care&amp;sort=category",
                "活力护理"    => "/product/search?category=skincare&amp;effect=aging_care&amp;sort=category",
                "光泽护理"       => "/product/search?category=skincare&amp;effect=shiny_care&amp;sort=category",
                "毛孔护理"    => "/product/search?category=skincare&amp;effect=pores_care&amp;sort=category",
                // "钝化护理"    => "/product/search?category=skincare&amp;effect=stain_care&amp;sort=category",
                // "皮肤突破"    => "/product/search?category=skincare&amp;effect=pimple_care&amp;sort=category",
                // "皮质护理"    => "/product/search?category=skincare&amp;effect=sebum_care&amp;sort=category",
                "眼部护理"    => "/product/search?category=skincare&amp;effect=eye_care&amp;sort=category",
                "紧致护理"    => "/product/search?category=skincare&amp;effect=tightening_care&amp;sort=category",
                "角层护理"   => "/product/search?category=skincare&amp;effect=horny_care&amp;sort=category",
                // "浮肿护理"    => "/product/search?category=skincare&amp;effect=puffy_care&amp;sort=category",
                "UV 护理"     => "/product/search?category=skincare&amp;effect=uv_care&amp;sort=category",
                // "敏感皮肤护理" => "/product/search?category=skincare&amp;effect=sensitive_care&amp;sort=category",
            ),
        ),
        "basemake" => array(
            "name" => "底妆",
            "items" => array(
                "遮盖"    => "/product/search?category=basemake&amp;effect=cover&amp;sort=category",
                "自然"    => "/product/search?category=basemake&amp;effect=natural&amp;sort=category",
                // "Matte"        => "/product/search?category=basemake&amp;effect=mat&amp;sort=category",
                "光泽"    => "/product/search?category=basemake&amp;effect=shiny&amp;sort=category",
                "持久"    => "/product/search?category=basemake&amp;effect=lasting&amp;sort=category",
                "防紫外线" => "/product/search?category=basemake&amp;effect=uv_cut&amp;sort=category",
                "保湿"    => "/product/search?category=basemake&amp;effect=moisture&amp;sort=category",
                "美白"    => "/product/search?category=basemake&amp;effect=whitening&amp;sort=category",
                "透明感"  => "/product/search?category=basemake&amp;effect=translucent&amp;sort=category",
                "提升"    => "/product/search?category=basemake&amp;effect=lift_up&amp;sort=category",
                // "Control"  => "/product/search?category=basemake&amp;effect=control&amp;sort=category",
            ),
        ),
    );
?>
<link rel="stylesheet" type="text/css" media="screen" href="/sharejs/dist/css/share.min.css">
<!--<script type="text/javascript" src="/sharejs/dist/js/social-share.min.js"></script>-->
<script type="text/javascript" src="/sharejs/dist/js/jquery.share.min.js"></script>
<style>
.wechat-qrcode{
  top:inherit !important;
  height: 146px !important;
}
@font-face {
  font-family: 'hy';
  src: url("/fonts/hy.ttf");
}
@media screen and (max-width: 736px) {
    .social-share .icon-wechat .wechat-qrcode{
        left:-155px;
    }
}
</style>

<header class="global-header">
    <div class="global-header__container" style="overflow:initial">
        <h1 class="global-header__logo">
            <a href="/" class="global-header__logo__link">黛珂</a>
        </h1>
        <div class="global-header__mobile-triggers">
            <div class="global-header__mobile-triggers__container">
                <span class="global-header__mobile-triggers__node m--search">
                    <i class="icon-search2"></i>
                </span>
                <span class="global-header__mobile-triggers__node m--menu">
                    <i class="icon-menu2"></i><br><span class="global-header__mobile-triggers__text"><img src="/images/header/text_menu.png" /></span>
                </span>
            </div>
        </div>
        <nav class="global-header__nav">
            <div class="global-header__nav__container">
                <ul class="global-header__nav__list" style="overflow:inherit">
                    <li class="global-header__nav__list__item m--type-menu">
                        <div class="global-header__nav__list__item__container">
                            <span class="global-header__nav__list__item__link">菜单</span>
                        </div>
                    </li>
                    <li class="global-header__nav__list__item m--type-product">
                        <div class="global-header__nav__list__item__container m--dropdown">
                            <span class="global-header__nav__list__item__link">产品<i class="icon-chevron-thin-down"></i></span>
                        </div>
                        <div class="l--products-menu m--dropdown-menu">
                            <div class="l--products-menu__container">
                                <div class="l--products-menu__categories">
                                    <div class="l--products-menu__categories__container">
                                        <div class="l--products-menu__categories__node m--type-category">
                                            <div class="l--products-menu__categories__node__head m--dropdown">
                                                <span class="l--products-menu__categories__node__head__contents">按产品类别查找<i class="icon-chevron-thin-down"></i></span>
                                            </div>
                                            <div class="l--products-menu__categories__node__contents m--dropdown-menu">
                                                <div class="l--products-menu__categories__node__contents__container">
                                                    <div class="l--products-category">
                                                        <div class="l--products-category__container">
                                                            <div class="l--products-category__preview">
                                                                <div class="l--products-category__preview__container">
                                                                    <img src="/images/header/category/skincare.png" alt="商品画像の代替テキスト">
                                                                </div>
                                                            </div>
                                                            <div class="l--products-category__items">
                                                                <?php foreach ($section_1 as $iname => $category) : ?>
                                                                    <div class="l--products-category__items__item m--<?php echo $iname; ?>">
                                                                        <div class="l--products-category__items__item__head m--dropdown" data-name="<?php echo $iname ?>">
                                                                            <span class="l--products-category__items__item__head__contents">
                                                                                <?php echo $category["name"] ?>
                                                                            </span>
                                                                            <i class="icon-chevron-thin-down"></i>
                                                                        </div>
                                                                        <div class="l--products-category__items__item__contents m--dropdown-menu">
                                                                            <?php foreach ($category["items"] as $fname => $data) : ?>
                                                                                <a href="<?php echo $data[1] ?>" class="l--products-category__items__item__node"><?php echo $data[0] ?></a>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="l--products-menu__categories__node m--type-purpose">
                                            <div class="l--products-menu__categories__node__head m--dropdown">
                                                <span class="l--products-menu__categories__node__head__contents">按功能查找<i class="icon-chevron-thin-down"></i></span>
                                            </div>
                                            <div class="l--products-menu__categories__node__contents m--dropdown-menu">
                                                <div class="l--products-menu__categories__node__contents__container">
                                                    <div class="l--products-category">
                                                        <div class="l--products-category__container">
                                                            <div class="l--products-category__items">
                                                                <?php foreach ($section_2 as $iname => $category) : ?>
                                                                    <div class="l--products-category__items__item m--<?php echo $iname; ?>">
                                                                        <div class="l--products-category__items__item__head m--dropdown">
                                                                            <span class="l--products-category__items__item__head__contents">
                                                                                <?php echo $category["name"] ?>
                                                                            </span>
                                                                            <i class="icon-chevron-thin-down"></i>
                                                                        </div>
                                                                        <div class="l--products-category__items__item__contents m--dropdown-menu">
                                                                            <?php foreach ($category["items"] as $item => $link) : ?>
                                                                                <a href="<?php echo $link ?>" class="l--products-category__items__item__node"><?php echo $item ?></a>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="l--products-menu__categories__node m--type-line">
                                            <div class="l--products-menu__categories__node__head">
                                                <a href="/line.html" class="l--products-menu__categories__node__head__contents">按产品系列查找</a>
                                            </div>
                                            <div class="l--products-menu__categories__node__contents">
                                                <div class="l--products-menu__categories__node__contents__container">
                                                    <div class="l--line-list-thumbs">
                                                        <div class="l--line-list-thumbs__container">
                                                            <div class="l--line-list-thumbs__links">
                                                                <a href="/aq_meliority" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_aqm.png" /></a>
                                                                <a href="/aq_mw" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_aqmw.png" /></a>
                                                                <a href="/aq" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_aq.png" /></a>
                                                                <a href="/cellgenie" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_cellgenie.png" /></a>
                                                                <!--<a href="/phytotune" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_phytotune.png" /></a>-->
                                                                <a href="/moisture_liposome" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_liposome.png" /></a>
                                                                <!--<a href="/ip_shot" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_ip_shot.png" /></a>-->
                                                                <!--<a href="/ever_crystal" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_evercrystal.png" /></a>
                                                                <a href="/even_perfect" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_evenperfect.png" /></a>
                                                                <a href="/lacouture" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_lacouture.png" /></a>
                                                                <a href="/de_la_vie" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_delavie.png" /></a>
                                                                <a href="/vice_virtue" class="l--line-list-thumbs__links__node"><img src="/images/header/navi/logo/logo_vv.png" /></a>-->
<!--                                                                <a href="/liposome" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_ltl.png" /></a>-->
                                                                <a href="/whitelogist" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_whitelogist.png" /></a>
                                                                <a href="/cyclic_key/" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_cyclickey.png" /></a>
                                                                <a href="/clay_blanc" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_clayblanc.png" /></a>
                                                                <a href="/prime_latte" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_primelatte.png" /></a>
                                                                <a href="/vita_de_reve" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_vitadereve.png" /></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php /*
                                                    <div class="l--line-list-others">
                                                        <div class="l--line-list-others__container">
                                                            <div class="l--line-list-others__head">其他产品系列</div>
                                                            <div class="l--line-list-others__links">
                                                                <div class="l--line-list-others__links__container">
                                                                    <a href="/liposome" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_ltl.png" /></a>
                                                                    <a href="/whitelogist" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_whitelogist.png" /></a>
                                                                    <a href="/cyclic_key/" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_cyclickey.png" /></a>
                                                                    <!--<a href="/honeydew" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_honeydew.png" /></a>-->
                                                                    <a href="/clay_blanc" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_clayblanc.png" /></a>
                                                                    <a href="/prime_latte" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_primelatte.png" /></a>
                                                                    <a href="/vita_de_reve" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_vitadereve.png" /></a>
                                                                    <!--<a href="/maquiexpert" class="l--line-list-others__links__node"><img src="/images/header/navi/logo/logo_maquiexpert.png" /></a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    */ ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="l--products-menu__categories__node m--type-popular">
                                            <div class="l--products-menu__categories__node__head m--dropdown">
                                                <span class="l--products-menu__categories__node__head__contents">从受欢迎的产品中查找<i class="icon-chevron-thin-down"></i></span>
                                            </div>
                                            <div class="l--products-menu__categories__node__contents m--dropdown-menu">
                                                <div class="l--products-menu__categories__node__contents__container">
                                                    <div class="l--popular-ranking-menu">
                                                        <div class="l--popular-ranking-menu__container">
                                                            <div class="l--popular-ranking-menu__anchors">
                                                                <a href="/?ranking=skincare" class="l--popular-ranking-menu__anchors__node">护肤</a>
                                                                <a href="/?ranking=basemake" class="l--popular-ranking-menu__anchors__node">底妆</a>
                                                                <a href="/?ranking=pointmake" class="l--popular-ranking-menu__anchors__node">彩妆</a>
                                                            </div>
                                                            <div class="l--popular-ranking-menu__best">
                                                                <a href="/bestcosme.html" class="l--popular-ranking-menu__best__link">获奖信息</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="global-header__nav__list__item m--type-news">
                        <div class="global-header__nav__list__item__container m--dropdown">
                            <span class="global-header__nav__list__item__link">最新情报<i class="icon-chevron-thin-down"></i></span>
                        </div>
                        <div class="l--header-submenu m--dropdown-menu">
                            <div class="l--header-submenu__container">
                                <div class="l--news-links">
                                    <div class="l--news-links__container">
                                        <a href="/news.html?section=newitem" class="l--news-links__link">最新消息</a>
                                        <!--
                                        <a href="/news.html?section=campaign" class="l--news-links__link">Sales Campaign</a>
                                        <a href="/news.html?section=event" class="l--news-links__link">Events</a>
                                        -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--
                    <li class="global-header__nav__list__item m--type-shop">
                        <div class="global-header__nav__list__item__container">
                            <a href="http://www.e-map.ne.jp/asp/decorte/" target="_blank" class="global-header__nav__list__item__link">购买渠道</a>
                        </div>
                    </li>
                    -->
                    <li class="global-header__nav__list__item m--type-shop">
                        <div class="global-header__nav__list__item__container m--dropdown">
                            <span class="global-header__nav__list__item__link">购买渠道<i class="icon-chevron-thin-down"></i></span>
                        </div>
                        <div class="l--header-submenu m--dropdown-menu">
                            <div class="l--header-submenu__container">
                                <div class="l--news-links">
                                    <div class="l--news-links__container">
                                        <a href="http://cn-cosmedecorte.com/" target="_blank" class="l--news-links__link">在线购买</a>
                                        <a href="/shop.html" class="l--news-links__link">线下门店</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="global-header__nav__list__item m--type-cafe">
                        <div class="global-header__nav__list__item__container">
                            <a href="/salon.html" target="_blank" class="global-header__nav__list__item__link">黛珂珍颜会</a>
                        </div>
                    </li>
                    <li class="global-header__nav__list__item m--type-salon">
                        <div class="global-header__nav__list__item__container">
                            <a href="/cafe.html" class="global-header__nav__list__item__link">黛珂美颜中心</a>
                        </div>
                    </li>
                    <li class="global-header__search">
                        <div class="global-header__search__container icon-search2">
                            <input class="global-header__search__input" name="keyword" value="" maxlength="255" type="text">
                            <input class="global-header__search__submit" alt="" type="submit" value="搜索">
                        </div>
                    </li>
                </ul>
                <div class="global-header__nav__others">
                    <div class="global-header__nav__others__container">
                        <div class="global-header__nav__others__header">
                            <span class="global-header__nav__others__header__content">Other content</span>
                        </div>
                        <div class="global-header__nav__others__body">
                            <div class="global-header__nav__others__body__container">
                                <a class="global-header__nav__others__body__link" href="/bestcosme.html" target="_blank">获奖信息</a>
                                <a class="global-header__nav__others__body__link" href="/salon.html">会员权益</a>
                                <a class="global-header__nav__others__body__link" href="/moisture_liposome/concept.html">LIPOSOME的秘密</a>
                                <a class="global-header__nav__others__body__link" href="/images/home/footer/ruye.html">乳液先行</a>
                                <!--
                                <a class="global-header__nav__others__body__link" href="/bestcosme">Best Cosmetics Awards News</a>
                                <a class="global-header__nav__others__body__link" href="/liposome/concept.html#movie">The Secret of the Liposome</a>
                                <a class="global-header__nav__others__body__link" href="/maison.html">MAISON des FLEURS</a>
                            -->
                            </div>
                        </div>
                        <div class="global-header__nav__others__footer">
                            <div class="global-header__nav__others__footer__container">
                                <!-- NOTE: this works for non-iPhone6 devices
                                <div class="social-share" data-initialized="true" data-wechat-qrcode-helper="">
                                    <a href="#" class="social-share-icon icon-wechat" style="width:26px;height:26px;margin:0;border:0"></a>
                                </div>
                              -->
                                <div class="social-share"></div>
                                <!--
                                <a href="https://www.facebook.com/cosmedecorte" target="_blank" class="global-header__nav__others__footer__link">
                                <div class="icon_circle"><i class="icon icon-facebook"></i></div>
                                </a>
                                <a href="https://www.youtube.com/user/cosmedecortecom" target="_blank" class="global-header__nav__others__footer__link">
                                <div class="icon_circle"><i class="icon icon-youtube"></i></div>
                                </a>
                                <a href="/app.html" class="global-header__nav__others__footer__link">
                                <div class="icon_circle"><i class="icon icon-mobile2"></i></div>
                                </a>
                                <a href="/faq" class="global-header__nav__others__footer__link">
                                <div class="icon_circle"><span class="text icon">Q</span></div>
                                </a>
                            -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="global-header__nav__notice">
                    <div class="global-header__nav__notice__container">
                      Celebrating its 45th anniversary, COSMEDECORTE has revamped its brand logo for enhanced clarity and presence, in the drive to promote further dissemination in Japan and other countries. The change in brand logo is currently underway, starting with new products. The logo change in product packages will eventually take place for our current products. But please note that product quality will remain unchanged for both the existing and new packages.
                    </div>
                </div>
            -->
            </div>
            <div class="global-header__nav__mobile-menu-close-trigger">
                <img src="/images/header/close.png" alt="閉じる画像の代替テキスト">
            </div>
        </nav>
        <div class="global-header__social" style="margin:10px">
          <!--
          <div class="social-share" data-initialized="true" data-wechat-qrcode-helper="">
            <a href="#" class="social-share-icon icon-wechat" style="width:26px;height:26px;margin:0;border:0"></a>
          </div>
        -->
          <div class="social-share"></div>
        </div>
    </div>
</header>
<div class="global-header-mobile-search">
    <div class="global-header-mobile-search__container">
        <input class="global-header-mobile-search__input" name="keyword" value="" maxlength="255" type="text">
        <input class="global-header-mobile-search__submit" alt="" type="submit" value="検索">
        <span class="global-header-mobile-search__close">
            <i class="icon-cross"></i>
        </span>
    </div>
</div>

<script>
var $config = {
    sites: ['wechat'],
};

$('.social-share').share($config);
$('.social-share-icon.icon-wechat').css({
  'width':'26px',
  'height':'26px',
  'margin':'0',
  'border':'0'
});
</script>
