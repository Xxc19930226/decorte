var myScroll;
is_iScroll = false;
if( (navigator.userAgent.match(/iPhone/i)) ||
    (navigator.userAgent.match(/iPod/i)) ||
    (navigator.userAgent.match(/iPad/i)) ) {
} else if (navigator.userAgent.match(/Android/i)) {
//	is_iScroll = false;
}

// Check screen size on orientation change
window.addEventListener('onorientationchange' in window ? 'orientationchange' : 'resize', setHeight, false);

if ( is_iScroll != undefined && is_iScroll == true ) {
	// Prevent the whole screen to scroll when dragging elements outside of the scroller (ie:header/footer).
	// If you want to use iScroll in a portion of the screen and still be able to use the native scrolling, do *not* preventDefault on touchmove.
	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

	// Load iScroll when DOM content is ready.
	document.addEventListener('DOMContentLoaded', loaded, false);
}


function loaded() {
        setHeight();    // Set the wrapper height. Not strictly needed, see setHeight() function below.
        // Please note that the following is the only line needed by iScroll to work. Everything else here is to make this demo fancier.
        myScroll = new iScroll('scroller', {desktopCompatibility:true});
}

// Change wrapper height based on device orientation. Not strictly needed by iScroll, you may also use pure CSS techniques.
function setHeight() {
/*
        var headerH = document.getElementById('header').offsetHeight;
        var footerH = document.getElementById('footer').offsetHeight;
        var wrapperH = window.innerHeight - headerH - footerH;
        document.getElementById('wrapper').style.height = wrapperH + 'px';
*/
        var headerH = $('#header').height();
        var footerH = $('#footer').height();
        var wrapperH = $(window).height() - headerH - footerH;
        if( (navigator.userAgent.match(/iPhone/i)) ||
//            (navigator.userAgent.match(/iPod/i)) ||
            (navigator.userAgent.match(/iPod/i)) ) {
                wrapperH += 61;
        } else if (navigator.userAgent.match(/iPad/i)) {
                //wrapperH += 61;
        } else if (navigator.userAgent.match(/Android/i)) {
                //wrapperH -= 30;
                //wrapperH += 3;
        }
	if ( is_iScroll != undefined && is_iScroll == true ) {
        	$('#wrapper').css( { 'height' : wrapperH + 'px' } );
	}
}
var isScrollTuning = true;
$(document).ready( function() {
        //setTimeout('window.scrollTo(0, 1)', 100);
	if ( is_iScroll != undefined && is_iScroll == true ) {
		$('select').bind('touchstart', function() {
			event.stopPropagation();
			var targetID = $(this).attr('id');
			setTimeout( function() {
				isScrollTuning = false;
				$('#'+targetID).focus();
				$('#'+targetID).select();
			}, 1 );
		});
		$('select').bind('focus', function() {
			isScrollTuning = false;
		} );
		$('input').bind('focus', function() {
			isScrollTuning = false;
		} );
		$('select').bind('blur', function() {
			isScrollTuning = true;
		} );
		$('input').bind('blur', function() {
			isScrollTuning = true;
		} );
		setInterval( function() {
			setHeight();
			var bodyScrollTop = document.body.scrollTop;
			if ( isScrollTuning == true && bodyScrollTop != 0 ) {
				window.scrollTo(0, 1);
			}
		}, 1000 );
	}

        //window.scrollTo(0, 1);
        //setTimeout(scrollTo, 100, 0, 1);
        if( (navigator.userAgent.match(/iPhone/i)) ||
            (navigator.userAgent.match(/iPod/i)) ||
            (navigator.userAgent.match(/iPad/i)) ) {
                //
        } else if (navigator.userAgent.match(/Android/i)) {
                //setTimeout('window.scrollTo(0, 1)', 100);
                //setTimeout(scrollTo, 100, 0, 1);
                //window.scrollTo(0,1);
        }

});

