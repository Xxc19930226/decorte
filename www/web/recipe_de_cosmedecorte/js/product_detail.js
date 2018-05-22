$(function() { 
$("#igd p.btn").click(function(){
	$("#igd .igdbox").slideToggle("normal");
			   
	var idgs = $('.igdclick01');
	if (idgs.hasClass('btnDisplay')) {
	idgs.removeClass('btnDisplay');
	idgs.addClass('btnNone');
	} else if (idgs.hasClass('btnNone')) {
	idgs.removeClass('btnNone');
	idgs.addClass('btnDisplay');
	}
				
	var idgv = $('.igdclick02');
	if (idgv.hasClass('btnNone')) {
	idgv.removeClass('btnNone');
	idgv.addClass('btnDisplay');
	} else if (idgv.hasClass('btnDisplay')) {
	idgv.removeClass('btnDisplay');
	idgv.addClass('btnNone');
	}

});
});