<!doctype html>
<html lang="ja">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<title><?php if (has_slot('title')): ?><?php echo is_array(get_slot('title')) ? implode(' &#124; ', get_slot('title')) : get_slot('title') ?> &#124; <?php endif ?>DECORTE</title>
<?php if (has_slot('keywords')): ?>
<?php echo tag('meta', array('name' => 'keywords', 'content' => (is_array(get_slot('keywords')) ? implode(',', get_slot('keywords')) : get_slot('keywords')) . ',DECORTE'), true) ?>
<?php else: ?>
<?php echo tag('meta', array('name' => 'keywords', 'content' => 'DECORTE'), true) ?>
<?php endif ?>
<?php if (has_slot('description')): ?>
<?php echo tag('meta', array('name' => 'description', 'content' => get_slot('description')), true) ?>
<?php endif ?>

<meta property="og:type" content="product"><?php if (has_slot('og_title')): ?>
<?php echo tag('meta', array('property' => 'og:title', 'content' => is_array(get_slot('og_title')) ? implode(' &#124; ', get_slot('og_title')) : get_slot('og_title')), true) ?>
<?php elseif (has_slot('title')): ?>
<?php echo tag('meta', array('property' => 'og:title', 'content' => (is_array(get_slot('title')) ? implode(' &#124; ', get_slot('title')) : get_slot('title')) . ' &#124; DECORTE'), true) ?>
<?php else: ?>
<?php echo tag('meta', array('property' => 'og:title', 'content' => 'DECORTE'), true) ?>
<?php endif ?>
<?php if (has_slot('og_description')): ?>
<?php echo tag('meta', array('property' => 'og:description', 'content' => get_slot('og_description')), true) ?>
<?php elseif (has_slot('description')): ?>
<?php echo tag('meta', array('property' => 'og:description', 'content' => get_slot('description')), true) ?>
<?php endif ?>
<?php if (has_slot('og_url')): ?>
<?php echo tag('meta', array('property' => 'og:url', 'content' => get_slot('og_url')), true) ?>
<?php else: ?>
<?php echo tag('meta', array('property' => 'og:url', 'content' => $sf_context->getRequest()->getUri()), true) ?>
<?php endif ?>

<?php if (has_slot('og_image')): ?>
<?php echo tag('meta', array('property' => 'og:image', 'content' => get_slot('og_image')), true) ?>
<?php else: ?>
<?php echo tag('meta', array('property' => 'og:image', 'content' => 'http://' . $sf_request->getHost() . '/images/ogp.jpg'), true) ?>
<?php endif ?>
<meta property="og:site_name" content="DECORTE">
<link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="86400">

<meta name="format-detection" content="telephone=no">
<!--[if lt IE 9]>
<script src="/js/vendor/html5shiv.js"></script>
<script src="/js/vendor/css3-mediaqueries.js"></script>
<![endif]-->
<script type="text/javascript">
    var ua = navigator.userAgent;
    if((ua.indexOf('Android') > 0 && ua.indexOf('Mobile') == -1) || ua.indexOf('iPad') > 0 || ua.indexOf('Kindle') > 0 || ua.indexOf('Silk') > 0){
        document.write('<meta name="viewport" content="width=1200, user-scalable=no">');
    } else if ((ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) || ua.indexOf('iPhone') > 0 || ua.indexOf('Blackberry') > 0 || ua.indexOf('iPhone') > 0){
        document.write('<meta name="viewport" content="width=device-width, user-scalable=no">');
    }
</script>
<script src="/js/vendor/modernizr.js"></script>
<?php include_stylesheets() ?>
<?php include_javascripts() ?>
<script src="/js/vendor/selectivizr.js"></script>
<script type="text/javascript" src="//typesquare.com/accessor/script/typesquare.js?Q1T09~0WYXg%3D&fadein=0" charset="utf-8"></script>
</head>
<?php echo tag('body', has_slot('page_id') ? array('id' => get_slot('page_id')) : array(), true) ?>

<?php include_partial('global/header') ?>

<main class="mainContainer">
<?php echo $sf_content ?>
</main>

<footer class="globalFooter">
    <p class="globalFooter__pagetop">PAGETOP</p>
    <nav class="globalFooter__nav">
        <ul>
            <li class="globalFooter__nav__item"><a href="http://www.kose.co.jp/jp/ja/privacy_policy/index.html" target="_blank">Privacy Policy</a></li>
            <li class="globalFooter__nav__item"><a href="http://www.kose.co.jp/jp/ja/kiyaku/index.html" target="_blank">Terms Of Use</a></li>
            <li class="globalFooter__nav__item"><a href="http://www.kose.co.jp/jp/ja/ir/index.html" target="_blank">Corporate</a></li>
        </ul>
    </nav>
    <address class="globalFooter__copyright">
    COPYRIGHT <span>©</span> COSMEDECORTE. ALL RIGHTS RESERVED.
    </address>
</footer>
<?php if ($sf_context->getConfiguration()->isInForcePcMode()): ?>
<p class="mode_change"><?php echo jq_link_to_remote('スマートフォンモードで閲覧する', array('method' => 'get', 'success' => 'location.replace()', 'url' => url_for('mode_pc_reset'))) ?></p>
<?php endif ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3107726-1', 'auto');
  ga('send', 'pageview');
</script>
<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=MNz7hm9";
    s.parentNode.insertBefore(tagjs, s);
  }());
</script>
<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=MNz7hm9" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>

<div class="ebistag" style="display: none;">
<!-- EBiS common tag version2.00 start -->
<script type="text/javascript">
<!--
(function() {
    var host = (location.protocol == 'http:')
             ? 'http://ac.ebis.ne.jp'
             : 'https://ac.ebis.ne.jp';
    var argument = 'zPwx6CSg';
    var url      = host + '/ct_tag.php?argument=' + argument;
    document.write('<scr' + 'ipt type="text/javascript" src="' + url + '"></scr' + 'ipt>');
})();
//-->
</script>
<!-- EBiS common tag end -->

<!-- EBiS common tag version2.00 start -->
<script type="text/javascript">
<!--
(function() {
    var host = (location.protocol == 'http:')
             ? 'http://ac.ebis.ne.jp'
             : 'https://ac.ebis.ne.jp';
    var argument = 'UqdLDpLx';
    var url      = host + '/ct_tag.php?argument=' + argument;
    document.write('<scr' + 'ipt type="text/javascript" src="' + url + '"></scr' + 'ipt>');
})();
//-->
</script>
<!-- EBiS common tag end -->
</div>

<script src="/js/vendor/jquery.easing.min.js"></script>
<script src="/js/vendor/jquery.biggerlink.js"></script>
<script src="/js/vendor/jquery.heightLine.js"></script>
<script src="/js/vendor/smoothscroll.js"></script>
<script src="/js/vendor/velocity.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/exec.js"></script>

</body>
</html>
