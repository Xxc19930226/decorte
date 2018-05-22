
/* jQueryMobile CUSTOM
------------------------------------------------------------*/
$(document).bind("mobileinit", function(){
	$.extend( $.mobile , {
		ajaxLinksEnabled: false,
		ajaxFormsEnabled: false
	});
});


/* ui tab
------------------------------------------------------------*/
$(function() {
$('#ui-tab > ul').tabs();
});

/* fixed clash for iPhone
------------------------------------------------------------*/
var isSlideDownNaviMenu = false;
//var isSlideDownLoginMenu = false;
var isSlideDownLoginMenu = null;
var isFocus = false;
$(document).ready(function(){
	if ( $('#member_name_sei').length > 0 ) {
		jQuery.event.add(window, "load", function(e){
			var target = $('#member_name_sei');
			var width = target.width() / $(window).width() * 100;
//			var height = target.height() / $(window).width() * 100;
//			target.animate( { 'width' : width + '%', 'height' : height + '%' },
			target.animate( { 'width' : width + '%' },
			500);
			var target = $('#member_name_mei');
			var width = target.width() / $(window).width() * 100;
//			var height = target.height() / $(window).width() * 100;
//			target.animate( { 'width' : width + '%', 'height' : height + '%' },
			target.animate( { 'width' : width + '%' },
			500);
		});
	} else if ( $('.reminder').length > 0 && $('#password').length > 0 && $('#password2').length > 0 ) {
		jQuery.event.add(window, "load", function(e){
			var target = $('#password');
			var width = target.width() / $(window).width() * 100;
			target.animate( { 'width' : width + '%' },
			500);
			var target = $('#password2');
			var width = target.width() / $(window).width() * 100;
			target.animate( { 'width' : width + '%' },
			500);
		});
	} else if ( $('.reminder').length > 0 && $('#mail').length > 0 ) {
		jQuery.event.add(window, "load", function(e){
			var target = $('#password');
			var width = target.width() / $(window).width() * 100;
			target.animate( { 'width' : width + '%' },
			500);
		});
	} else if ( $('.contact').length > 0 && $('#contact_articles_name').length > 0 ) {
		jQuery.event.add(window, "load", function(e){
			var target = $('#contact_articles_name');
			var width = target.width() / $(window).width() * 100;
			target.animate( { 'width' : width + '%' },
			500);
		});
	}
});


/* alternate drop down menu
------------------------------------------------------------*/
$(function() {
    $('dl.alternate dt').bind('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        var my_dd = $(e.target).next().get(0);
        /*var my_dt = $(e.target).get(0);*/
		isSlideDownNaviMenu = false;
        $(e.target).siblings('dd').each(function(i,dd){
            if (my_dd != dd || $(dd).css('display') != 'none'){
                $(dd).slideUp("normal");
            } else {
				if ( isSlideDownLoginMenu == true && $('.accordion_head').length > 0 ) {
					$('.accordion_head').each( function() {
						if ( $(this).hasParent('.member_menu') ) {
							$(this).next().slideUp("normal");
							$(this).removeClass("close").addClass("open");
						}
					} );
			        isSlideDownLoginMenu = false;
				}
				isSlideDownNaviMenu = true;
                $(dd).slideDown("normal");
            }
        });
    }).siblings('dd').hide();

	$('input').focus( function() {
		isFocus = true;
	} );
	$('select').focus( function() {
		isFocus = true;
	} );
	$('input').blur( function() {
		isFocus = false;
	} );
	$('select').blur( function() {
		isFocus = false;
	} );

//	$('header', 'section').click( function(e) {
	$('section').click( function(e) {
//        e.preventDefault();
//        e.stopPropagation();
        if ( isFocus == false ) {
			if ( isSlideDownNaviMenu == true && $('dl.alternate dt').length > 0 ) {
		        $('dl.alternate dt').siblings('dd').each(function(i,dd){
	                $(dd).slideUp("normal");
		        });
		        isSlideDownNaviMenu = false;
			}
//			console.log( "isSlideDownLoginMenu:" + isSlideDownLoginMenu );
//			if ( isSlideDownLoginMenu == true && $('.accordion_head').length > 0 && $('.accordion_head').hasParent('.member_menu') ) {
			if ( isSlideDownLoginMenu == true && $('.accordion_head').length > 0 && $('.accordion_head') ) {
				$('.accordion_head').each( function() {
//				$('.accordion_head').hasParent('.member_menu').each( function() {
					if ( $(this).hasParent('.member_menu') ) {
						$(this).next().slideUp("normal");
						$(this).removeClass("close").addClass("open");
					}
				} );
		        isSlideDownLoginMenu = false;
			}
		}
	} );
/*
//    $('dl.alternate dt').outerClick(function(e) {
    $('dl.alternate *').outerClick(function(e) {
    	if ( isLogger == false ) {
			console.log(1);
			isLogger = true;
		}
//        e.preventDefault();
//        e.stopPropagation();
        if ( isFocus == false ) {
			if ( isSlideDown == true ) {
		        $('dl.alternate dt').siblings('dd').each(function(i,dd){
	                $(dd).slideUp("normal");
		        });
		        isSlideDown = false;
			}
		}
	} );
*/
});


/* bigger link
------------------------------------------------------------*/
$(function(){
	$('.bl li').biggerlink();
});

/* accordion
------------------------------------------------------------*/
$(document).ready(function(){
/*
	if ( $('#name_sei') ) {
		$('#name_sei').trigger( 'focus' );
		console.log( "$('#name_sei').trigger( 'focus' );" );
//		$('#name_sei').trigger( 'blur' );
	}
*/
	$('.accordion_head').click(function() {
		$(this).next().slideToggle(//.accordion_headの次の要素（ul）を開閉
		'normal'//,//開閉する速さ
    	//function(){alert('スライド完了')}
		//function(){//開閉後の処理
		//	$(this).inwindow();//開いてはみ出たナビゲーションを内側にスクロール
		//}
		);
		//矢印の向きを変えるためclass付与
//		if($(this).is('.open')){
		if($(this).is('.open') || isSlideDownLoginMenu == null ){
			if ( isSlideDownNaviMenu == true && $('dl.alternate dt').length > 0 ) {
		        $('dl.alternate dt').siblings('dd').each(function(i,dd){
	                $(dd).slideUp("normal");
		        });
		        isSlideDownNaviMenu = false;
			}
			if ( $(this).hasParent('.member_menu') ) {
				isSlideDownLoginMenu = true;
			}
			$(this).removeClass("open").addClass("close");
        }else{
			if ( $(this).hasParent('.member_menu') ) {
				if ( isSlideDownLoginMenu == true && $('.accordion_head').length > 0 && $('.accordion_head') ) {
					$('.accordion_head').each( function() {
						if ( $(this).hasParent('.member_menu') ) {
							$(this).next().slideUp("normal");
							$(this).removeClass("close").addClass("open");
						}
					} );
				}
				isSlideDownLoginMenu = false;
			}
			$(this).removeClass("close").addClass("open");
		}
	}).next().hide();
});


/*
jQuery.fn.inwindow = function(){
	var top    = $(window).scrollTop();
	var bottom = $(window).height() + $(window).scrollTop() + 60;//iPhoneのツールバーの高さ60をプラス
	if(!(this.offset().top  >= top)){
		$(window).scrollTop(this.offset().top);
	}
	if(!(this.offset().top  + this.height() <= bottom)){
		var scrollheight = parseInt($(window).scrollTop() + this.offset().top + this.height() - bottom);
		console.log(scrollheight);
		$(window).jqSmoothScrollTop(scrollheight, 30);
	}
	return this;
};


jQuery.fn.jqSmoothScrollTop = function(scroll_height, speed) {
	return this.each(function() {
		console.log("idousurugyou", scroll_height, speed); 
		var n = 0;
		var scroll_per_count = 8;
		var scroll_minimum = 3;
		var scroll_height_origin = parseInt(scroll_height);
		var scroll_height_begin  = parseInt($(window).scrollTop());
		var scroll_do = function(){
			setTimeout(function(){
				n++;
				var scroll_move_pixel = scroll_height/scroll_per_count
				scroll_height = scroll_height - scroll_move_pixel;
				if (scroll_height <=scroll_minimum){
					scroll_height = scroll_minimum;
				}
				$(window).scrollTop($(window).scrollTop()+scroll_move_pixel);
				if (n > 30){
					console.log("stop counter");
					$(window).scrollTop(parseInt(scroll_height_begin) + parseInt(scroll_height_origin));
				}
				else if (scroll_height_origin - $(window).scrollTop() <= scroll_minimum || Math.abs(scroll_height) <= scroll_minimum)
				{
					console.log("end", Math.abs(scroll_height_origin - $(window).scrollTop()) < scroll_minimum , Math.abs(scroll_height) <= scroll_minimum);
					$(window).scrollTop(parseInt(scroll_height_origin));
				}
				else {
					console.log("@@@@",scroll_height, scroll_height_begin, scroll_height_origin, $(window).scrollTop());
					scroll_do();
				}
			}, speed);
		}
		scroll_do();
	});
};
*/




/*
* Test whether argument elements are parents
* of the first matched element
* @return boolean
* @param objs
* 	a jQuery selector, selection, element, or array of elements
*/
$.fn.hasParent = function(objs) {
	// ensure that objs is a jQuery array
	objs = $(objs); var found = false;
	$(this[0]).parents().andSelf().each(function() {
		if ($.inArray(this, objs) != -1) {
			found = true;
			return false; // stops the each...
		}
	});
	return found;
}


/* change selector for search
------------------------------------------------------------*/
jQuery(document).ready(function() {
	$('#selectCategory1').change(function() {
		setSearchPullDown('selectCategory1', 'selectCategory2');
	});
	$('#selectCategory3').change(function() {
		setSearchPullDown('selectCategory3', 'selectCategory4');
	});
});





/* fade imager @ line top page
------------------------------------------------------------*/
function resizeTopImage() {
	var box = $('.fador');
	var fador_height = box.width() * 0.5839;
	//alert(fador_height);
	$("div.fador").attr("style","height:"+fador_height+"px;");
}

function imagefador() {
	$(".fador").css('background-color','#000');
	$('.fador').hide();
	$(".fador").fadeIn(2000);
	//setTimeout( function() {
		$('.fador ul').fadeIn(3500);
		$('.fador ul').innerfade({ 
			speed: 2000, 
			timeout: 8000, 
			type: 'sequence',
			/*containerheight: '428px',*/
			count: 1
		}); 
	//}, 3000);
};


