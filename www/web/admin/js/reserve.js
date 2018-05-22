
function showConfirm() {
    return confirm('削除しますがよろしいですか？')
}

$(document).ready(function() {

	$('table.stripe-table tr:even').addClass('even-row');
	
//	$('.bl').biggerlink();
	
});

$(function(){
    var agent = navigator.userAgent;
    if(agent.search(/iPhone/) != -1 || agent.search(/iPad/) != -1 || agent.search(/iPod/) != -1 || agent.search(/Android/) != -1){
		if(document.body.scrollTop == 0){
			if ( location.href.indexOf('#') == -1 ) {
				setTimeout(scrollTo, 100, 0, 1);
			}
		}
    }
});
