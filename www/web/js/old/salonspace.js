// JavaScript Document

	$(window).bind("load", function() {
	$("div#basic").slideViewerPro({
		thumbs: 6, 
		thumbsTopMargin: 10, 
		thumbsRightMargin: 9,
		autoslide: false, 
		asTimer: 8000, 
		easeTime: 1500,
		typo: false,
		galBorderWidth: 0,
		thumbsBorderColor: "#CCC", 
		thumbsBorderOpacity: 0.5, 
		buttonsTextColor: "#666",
		buttonsWidth: 0,
		thumbsActiveBorderColor: "#333",
		thumbsPercentReduction: 15,	
		shuffle: false
	});
});	