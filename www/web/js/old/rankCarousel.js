// JavaScript Document
$(function() {
	var liW = parsInt($("#accRanking .rankBox ul li:first").css("width"));
	var duration = 500;		// 速度（msec）
	var slCounter = 0;
	var rightW = 15;		// 右矢印の幅
	var rankW = parseInt($("#ranking").css("width") - rightW);
	var dispCount = parseInt(rankW/liW);	// 1エリアあたりの表示枚数
	var iconW = Math.floor(rankW / dispCount);
	$("#accRanking .rankBox").css("position","relative");
	$("#accRanking .rankBox ul li").each(function(idx,obj) {
		obj.style.position = "relative";
		obj.style.left = idx * (iconW - liW) + "px";
		obj.style.top = "0px";
		obj.style.overflow = "hidden";
	});
	$(".rankNext").click(function() {
		if (slCounter < ($("#accRanking .rankBox ul li").length - dispCount -1)) {
			slCounter++;
			$("#accRanking .rankBox").animate({left:-slCounter*iconW+"px"}, duration);
		}
	});

});