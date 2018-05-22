/* =============================================================================
　　slide.js
 ============================================================================= */


/* =============================================================================
　　スライドに290×207の画像が含まれる場合、こちらのスクリプトを使用

　　適用されるHTML
	<div class="slidepanel">
		<div class="column">
			<img src="images/topSlides/vsc_twitter.jpg" alt="" />
		</div>
		<div class="column">
			<img src="images/topSlides/vscrol1.jpg" class="cellTop" alt="" />
			<img src="images/topSlides/vscrol2.jpg" alt="" />
		</div>
		<div class="column">
			<img src="images/topSlides/vscrol3.jpg" class="cellTop" alt="" />
			<img src="images/topSlides/vscrol4.jpg" alt="" />
		</div>
		<div class="column">
			<img src="images/topSlides/vsc_twitter.jpg" alt="" />
		</div>
		<div class="column">
			<img src="images/topSlides/vscrol1.jpg" class="cellTop" alt="" />
			<img src="images/topSlides/vscrol2.jpg" alt="" />
		</div>
		<div class="column">
			<img src="images/topSlides/vscrol3.jpg" class="cellTop" alt="" />
			<img src="images/topSlides/vscrol4.jpg" alt="" />
		</div>
	</div><!-- /.slidepanel -->


$(function(){
	//初期設定
	$(".slidepanel").css("height",214*$(".slidepanel div.column").size()+"px");
	$(".slidepanel div.column:last").prependTo(".slidepanel");
	$(".slidepanel").css("margin-top","-214px");

	//スライド
	var timerID = setInterval(function() {
		$(".slidepanel").animate({
			marginTop : parseInt($(".slidepanel").css("margin-top"))-214+"px"
		}, 3000  ,
		function(){
			$(".slidepanel").css("margin-top","-214px").css("overflow","hidden");
			$(".slidepanel div.column:first").appendTo(".slidepanel");
		});
	},12000);
});

 ============================================================================= */





/* =============================================================================
　　スライドが290×100の画像だけで構成する場合はこちらのスクリプトを使用
　　適用されるHTML
		<div class="slidepanel">
			<div class="column"><img src="images/topSlides/vscrol1.jpg" alt="" /></div>
			<div class="column"><img src="images/topSlides/vscrol2.jpg" alt="" /></div>
			<div class="column"><img src="images/topSlides/vscrol3.jpg" alt="" /></div>
			<div class="column"><img src="images/topSlides/vscrol4.jpg" alt="" /></div>
			<div class="column"><img src="images/topSlides/vscrol5.jpg" alt="" /></div>
			<div class="column"><img src="images/topSlides/vscrol6.jpg" alt="" /></div>
			<div class="column"><img src="images/topSlides/vscrol7.jpg" alt="" /></div>
			<div class="column"><img src="images/topSlides/vscrol8.jpg" alt="" /></div>
		</div><!-- /.slidepanel -->
 ============================================================================= */

$(function(){


	//初期設定
	$(".slidepanel").css("height",107*$(".slidepanel div.column").size()+"px");
	$(".slidepanel div.column:last").prependTo(".slidepanel");
	$(".slidepanel").css("margin-top","-107px");

	//スライド
	var timerID = setInterval(function() {
		$(".slidepanel").animate({
			marginTop : parseInt($(".slidepanel").css("margin-top"))-107+"px"
		}, 3000  ,
		function(){
			$(".slidepanel").css("margin-top","-107px").css("overflow","hidden");
			$(".slidepanel div.column:first").appendTo(".slidepanel");
		});
	},12000);
});
