
$(document).ready(function() {
    $('.globalFooter__pagetop').click(function() {
        $('body, html').animate({ scrollTop: 0 }, 500,'easeInOutCubic');
        return false;
    });

    /* vender jquery.biggerlink.js */     
    $('a[target="_blank"]').click(function(){
        window.open(this.href);
        return false;
    });
         
    $('a[rel="external"]').click(function(){
        window.open(this.href);
        return false;
    });
         
    $('.bl').biggerlink();

    $('.result_list__item__spec').heightLine();
	
	$('.ingred__text').css('user-select', 'none')
	.on('copy paste contextmenu', false);


    $('.step__shortcut__item a').click(function(){

      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top - 50;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;

    });


});


$("a").on('click',function(){
    var category = 'outlink';
    var action = 'click';
    var label = $(this).attr('href');

    if (label.indexOf('http://decorte-test2.broad.ne.jp') !== -1 || label.indexOf('http://decorte-test.broad.ne.jp') !== -1 || label.indexOf('http://www.cosmedecorte.com/') !== -1 || label.indexOf('http') === -1 ) {
        category = 'inlink';
    }
    ga('send', 'event', category, action, label);
});

