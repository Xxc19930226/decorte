<script type="text/javascript" src="/js/jquery.flickable-1.0b3.js"></script>
<script type="text/javascript" src="/js/thickbox.js"></script>
<script type="text/javascript">
/*
	$("#accRanking .rankBox").carouFredSel({
		items: 6,
		circular: false,
		infinite: false,
		auto: false,
		height: '130',
		prev : {
			button: ".rankPrev"
		},
		next : {
			button: ".rankNext"
		}//,
		//pagination: "rankPager"
	});
*/
	var isIE = false;
	var isiOS = false;
	var isAndroid = false;
	var isFlicking = false;
	var touchDelaySpan = 300;
	if ( $.browser.msie ) {
		isIE = true;
	}
	if( (navigator.userAgent.match(/iPhone/i)) ||
	    (navigator.userAgent.match(/iPod/i)) ||
	    (navigator.userAgent.match(/iPad/i)) ) {
		isiOS = true;
	} else if (navigator.userAgent.match(/Android/i)) {
		isAndroid = true;
	}
	var flickableContainerWidth = null;
	var isThickBox = null;
	setInterval( function() {
		if ( isThickBox == null && $("#TB_window").length == 1 ) {
			isThickBox = true;
		} else if ( isThickBox == true && $("#TB_window").length == 0 ) {
			isThickBox = false;
		}
		if ( isThickBox == false ) {
			isThickBox = null;
//			$('.rankBox').flickable( { elasticConstant : 1.0, friction : 0.1, section : '.ranking' } );
//			$('.rankBox').flickable( { 'elasticConstant' : 1.0, 'friction' : 0.1, 'section' : '.ranking' } );
//			$('.rankBox').flickable( { 'elasticConstant' : 1.0, 'section' : '.ranking' } );
			$('.rankBox').flickable( { 'elasticConstant' : 0.2, 'section' : '.ranking' } );
//			flickableContainerWidth = ($('.ranking').width() + 10 ) * ( $('.ranking').length + 1 );
//			flickableContainerWidth = ($('.ranking').width() + 10 ) * ( $('.ranking').length + 1 );
//			flickableContainerWidth = ($('.ranking').width() + 10 ) * ( $('.ranking').length + 1 ) - 10;
			flickableContainerWidth = ($('.ranking').width() + 10 ) * ( $('.ranking').length + 0 ) - 10;
//			console.log( "flickableContainerWidth[1]:" + flickableContainerWidth );
//			flickableContainerWidth = ($('.ranking').width() + 10 ) * ( $('.ranking').length + 0 ) - 10;
//			$('.ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 100 + 'px', 'padding' : '0' } );
//			$('.rankBox .ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 100 + 'px', 'padding' : '0' } );
//			$('.rankBox .ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 160 + 'px', 'padding' : '0' } );
			$('.rankBox .ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 130 + 'px', 'padding' : '0' } );
//			$('.ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 130 + 'px', 'padding' : '0' } );
			$('.rankBox').flickable( 'refresh' );
		}
	}, 100 );
	setTimeout( function() {
//	setInterval( function() {
//		$('.rankBox').flickable( { 'elasticConstant' : 1.0 });
//		$('.rankBox').flickable( { 'elasticConstant' : 1.0, 'section' : 'p' } );
//		$('.rankBox').flickable( { 'elasticConstant' : 1.0, 'section' : 'div' } );
//		$('.rankBox').flickable( { elasticConstant : 1.0, friction : 0.1, section : '.ranking' } );
//		$('.rankBox').flickable( { 'elasticConstant' : 1.0, 'friction' : 0.1, 'section' : '.ranking' } );
//		$('.rankBox').flickable( { 'elasticConstant' : 1.0, 'section' : '.ranking' } );
		$('.rankBox').flickable( { 'elasticConstant' : 0.2, 'section' : '.ranking' } );
//		flickableContainerWidth = ($('.ranking').width() + 10 ) * ( $('.ranking').length + 1 );
//		flickableContainerWidth = ($('.ranking').width() + 10 ) * ( $('.ranking').length + 1 ) - 10;
		flickableContainerWidth = ($('.ranking').width() + 10 ) * ( $('.ranking').length + 0 ) - 10;
//		console.log( "flickableContainerWidth[1]:" + flickableContainerWidth );
//		$('.ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 100 + 'px', 'padding' : '0' } );
//		$('.rankBox .ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 100 + 'px', 'padding' : '0' } );
//		$('.rankBox .ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 160 + 'px', 'padding' : '0' } );
		$('.rankBox .ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 130 + 'px', 'padding' : '0' } );
//		$('.ui-flickable-container').css( { 'width' : flickableContainerWidth + 'px', 'height' : 130 + 'px', 'padding' : '0' } );
		$('.rankBox').flickable( 'refresh' );
	}, 500 );
	$('.rankBox').bind( 'flick', function() {
		isFlicking = true;
	} );
	$('.rankBox').bind( 'flickdragstart', function() {
		isFlicking = true;
	} );
	$('.rankBox').bind( 'flickdragstop', function() {
		isFlicking = false;
	} );
	var flickableCurrentIndex = null;
	var rankingLength = $('.ranking').length;
	$('.rankBox').bind( 'flickchange', function(event, ui) {
		if ( ui.oldSection != undefined ) {
			var flickableOldIndex = parseInt( ui.oldSection.attr('flickable') );
			flickableCurrentIndex = parseInt( ui.newSection.attr('flickable') );
//			if ( ui.oldSection.attr('flickable') - flickableCurrentIndex > 0 ) {
			if ( flickableOldIndex - flickableCurrentIndex > 0 ) {
				$('.rankNext').css( { 'filter': 'alpha(opacity=100)', 'opacity' : '1' } );
//			} else if ( ui.newSection.attr('flickable') != 0 ) {
			} else if ( flickableCurrentIndex != 0 ) {
				$('.rankPrev').css( { 'filter': 'alpha(opacity=100)', 'opacity' : '1' } );
			}
//			if ( flickableCurrentIndex == 0 ) {
//				$('.rankPrev').css( { 'filter': 'alpha(opacity=0)', 'opacity' : '0' } );
//			}
			if ( flickableCurrentIndex <= 0 ) {
				flickableCurrentIndex = 0;
				$('.rankPrev').css( { 'filter': 'alpha(opacity=0)', 'opacity' : '0' } );
			}
//			if ( flickableCurrentIndex == 4 ) {
//				$('.rankNext').css( { 'filter': 'alpha(opacity=0)', 'opacity' : '0' } );
//			}
			if ( flickableCurrentIndex >= ( rankingLength - 1 ) ) {
				flickableCurrentIndex = rankingLength - 1;
				$('.mListNext').css( { 'filter': 'alpha(opacity=0)', 'opacity' : '0' } );
			}
		}
	} );

	var flickableArray = new Array();
	for ( var i = 0; i < $('.ranking a').length; i++ ) {
		flickableArray[ i ] = $('.ranking a:eq(' + i + ')').attr('href');
		$('.ranking:eq(' + i + ')').attr('flickable', i);
		$('.ranking:eq(' + i + ')').attr('id', 'flickable' + i);
	}
	if ( isIE == true ) {
	} else {
		$('.ranking a').each( function() {
//			$(this).replaceWith($(this).html());
			$(this).removeAttr('href');
		});
		$('.ranking img').each( function() {
			var bindMethod;
			if ( isAndroid == true ) {
				bindMethod = "touchend";
			} else {
				bindMethod = "click";
			}
//			$(this).click( function(e){
//			$(this).bind( 'click', function(e){
			$(this).bind( bindMethod, function(e){
//			$(this).bind( 'touchstart', function(e){
//				var flickHref = flickableArray[$(this).parent().attr('flickable')];
//				var flickHref = flickableArray[$(this).parent().parent().attr('flickable')];
				var flickHref = flickableArray[ parseInt( $(this).parent().parent().attr('flickable') ) ];
//				console.log( "flickHref:" + flickHref );
//				$(this).wrap( '<a href="' + flickHref + '" class="thickbox"></a>' );
//				$(this).attr('href', flickHref);
//				$(this).parent().attr('href', flickHref);
//				tb_init('a.thickbox');
				var a = $(this).parent();
				var thisId = a.parent().attr('id');
//				console.log( "prarent.thisId:" + thisId );
				setTimeout( function() {
					if ( isFlicking == false ) {
						$('#' + thisId + ' a').attr('href', flickHref);
						if ( flickHref.indexOf( '/product' ) == -1 ) {
//							alert( flickHref );
						}
						a.trigger('click');
//						console.log( "href:" + a.parent().html() );
//						console.log( "thisId:" + thisId );
//						console.log( $('#' + thisId + ' a').html() );
//						var title = $('#' + thisId + ' img').attr('alt');
//						$('#' + thisId + ' a').replaceWith( $('#' + thisId + ' a').html() );
//						$('#' + thisId + ' img').attr('title', title);
						$('#' + thisId + ' a').removeAttr('href');
						$('.rankBox').flickable( 'refresh' );
					} else {
						$('#' + thisId + ' a').removeAttr('href');
//						$(this).parent().replaceWith($(this).parent().html());
						return false;
					}
				}, touchDelaySpan );
				return false;
			});
		});
	}

//	$('.rankPrev').hide();
	$('.rankPrev').css( { 'filter': 'alpha(opacity=0)', 'opacity' : '0' } );

	$('.rankNext').bind('click', function() {
//		$('.rankPrev').show();
		$('.rankPrev').css( { 'filter': 'alpha(opacity=100)', 'opacity' : '1' } );
//		$('.rankNext').hide();
		$('.rankNext').css( { 'filter': 'alpha(opacity=0)', 'opacity' : '0' } );
//		$('.rankBox').flickable( 'select', 3 );
		$('.rankBox').flickable( 'select', 4 );
//		$('.rankBox').flickable( 'cancel' );
	} );
	$('.rankPrev').bind('click', function() {
//		$('.rankPrev').hide();
		$('.rankPrev').css( { 'filter': 'alpha(opacity=0)', 'opacity' : '0' } );
//		$('.rankNext').show();
		$('.rankNext').css( { 'filter': 'alpha(opacity=100)', 'opacity' : '1' } );
//		if ( flickableCurrentIndex == 1 ) {
			$('.rankBox').flickable( 'select', 0 );
//		} else {
//			$('.rankBox').flickable( 'select', 1 );
//		}
//		$('.rankBox').flickable( 'cancel' );
	} );

    $('img[title]').tooltip({
		effect: 'fade',
		fadeInSpeed: 600,
		fadeOutSpeed: 600,
		position: 'top right',
		offset: [-5, -30]
		
	});
</script>

<div class="rankingWrapper">
<?php foreach ($products as $idx => $product): ?>
	<div class="ranking">
		<p class="rankNo"><img src="/images/ranking/<?php echo $idx + 1 ?>.gif" alt="No.<?php echo $idx + 1 ?>" /></p><br />
		<?php echo link_to(image_tag(url_for('product_middle_thumbnail', $product), array('alt' => $product['long_name'], 'title' => $product['long_name'])), 'product_show_by_slug', $product, array('class' => 'thickbox')) ?>
	</div>
<?php endforeach ?>
</div>
