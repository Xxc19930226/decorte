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
			<img srec="images/topSlides/vsc_twitter.jpg" alt="" />
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
var toppage_slider = {
    timer: null,
    direction: 1, /* animateする向き -1が↓ 1が↑*/
    animating_f: false, /* 動いている最中はanimateを実行させないフラグ */
    is_out: true, /* mouseがoutの状態であった */
    ani_f_interval: { /* スライドに関する設定値 */
      current: {
          interval: null,
          slide_speed: null
      }, 
      setting: {
        interval: { /* とまっている時間 */
          mousein:  300,
          mouseout: 2000
        },
        slide_speed: { /* アニメーションの時間 */
          mousein:  1800,
          mouseout: 2000
        }
      }
    },
    ani_f:  function() /* mouseonでスライドする関数 */
    { 
        var animate_option = {
          marginTop : parseInt($(".slidepanel").css("margin-top"))- (107 * this.direction)+"px"
        };
        var animate_onstop = (function(ts, dir){
            return function()
            {
                $(".slidepanel").css("margin-top","-107px").css("overflow","hidden");
                if (dir > 0){
                    $(".slidepanel div.column:first").appendTo(".slidepanel");
                }
                else {
                    $(".slidepanel div.column:last").prependTo(".slidepanel");
                }
                ts.animating_f = false;
                ts.ani_fire();
            }
        })(this, this.direction);
        
        this.animating_f = true;
        $(".slidepanel").animate(animate_option, this.ani_f_interval.current.slide_speed, 'swing', animate_onstop);
    },
    ani_fire: function() /* start animation */
    {
        this.timer = setTimeout((function(ts){
            return function()
            {
                ts.ani_f();
            }
        })(this), this.ani_f_interval.current.interval); 
    }
};

$((function(ts) {
    return function() {
        //初期設定
        ts.ani_f_interval.current.interval    = ts.ani_f_interval.setting.interval.mouseout;
        ts.ani_f_interval.current.slide_speed = ts.ani_f_interval.setting.slide_speed.mouseout;
        $(".slidepanel").css("height",107*$(".slidepanel div.column").size()+"px");
        $(".slidepanel div.column:last").prependTo(".slidepanel");
        $(".slidepanel").css("margin-top","-107px");
        
        /* onslide */
        var checkIN = function(e, target)
        {
            /* 本当にIN/OUTかをチェック */
            var tp = $(target).position();
            var tw = $(target).width();
            var th = $(target).height();
            
            var mx = e.clientX;
            var my = e.clientY;
            
            var isIN = 
              (mx > tp.left) &&
                mx < (tp.left + tw) && 
                  (my > tp.top) &&
                    my < (tp.top + th);
            
            return  isIN;
        }
        
        var setDirection = function(e){
            var Yparam = 0;
            var spp = $('.slideshow').position();
            ts.direction = (e.clientY - spp.top + Yparam) < 210 ? -1 : 1;
        }
        
        
        var onMouseSlide = function(e) {
            setDirection(e);
        };
        
        var onMouseOut = function(e) {
            if (checkIN(e, this) == false){
                ts.is_out = true;
                ts.direction = 1;
                //ts.ani_f_interval.current = ts.ani_f_interval.mouseout;
                ts.ani_f_interval.current.interval    = ts.ani_f_interval.setting.interval.mouseout;
                ts.ani_f_interval.current.slide_speed = ts.ani_f_interval.setting.slide_speed.mouseout;
                
            }
        };
        
        var onMouseOver = function(e){
            if (checkIN(e, this) == true){
                // ts.ani_f_interval.current = ts.ani_f_interval.mouseover;
                ts.ani_f_interval.current.interval    = ts.ani_f_interval.setting.interval.mousein;
                ts.ani_f_interval.current.slide_speed = ts.ani_f_interval.setting.slide_speed.mousein;
                
                if (ts.is_out){
                    if (ts.timer){
                        clearTimeout(ts.timer);
                        setDirection(e);
                        if (ts.animating_f == false){
                            ts.ani_f();
                        }
                    }
                }
                ts.is_out = false;
            }
        }
        
        /* setup */
        $('.slideshow')
          .bind('mousemove', onMouseSlide)
            .bind('mouseout', onMouseOut)
              .bind('mouseover', onMouseOver);
        
        ts.ani_fire();
    }
})(toppage_slider));
