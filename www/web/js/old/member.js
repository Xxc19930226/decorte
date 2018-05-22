$(document).ready(function() {
	$('body').find('#topMylist').load('/product/mylist');
	$('body').find('#topCheck').load('/product/checked');
	$('body').find('#topRecommend').load('/product/recommended');
});

function drawMemberElements() {
	$('body').find('#entranceMember').load('/member/menu');
	$('body').find('#topMylist').load('/product/mylist');
	$('body').find('#topCheck').load('/product/checked');
	$('body').find('#topRecommend').load('/product/recommended');
}
