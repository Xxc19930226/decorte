$(function() {
	// アイテムアコーディオンメニュー開閉処理
	$('dl#lineList dt').bind('click', function(ev){
		var my_dd = $(ev.target).next().get(0);
		$(ev.target).siblings('dd').each(function(i,dd){
			if (my_dd != dd || $(dd).css('display') != 'none'){
				$(dd).slideUp("normal");
			} else {
				$(dd).slideDown("normal").css('z-index','80');
			}
		});
	}).siblings('dd').hide();
	$(".itemList").show();
});
