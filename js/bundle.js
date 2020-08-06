$(function ()
{

	var urlHash = location.hash;
	if(urlHash) {
			$('body,html').stop().scrollTop(0);
			setTimeout(function(){
					var target = $(urlHash);
					var position = target.offset().top - headerHeight;
					$('body,html').stop().animate({scrollTop:position}, 500);
			}, 100);
	}
	$('a[href^="#"]').click(function() {
			var href= $(this).attr("href");
			var target = $(href);
			var position = target.offset().top - headerHeight;
			$('body,html').stop().animate({scrollTop:position, scrollLeft: 0}, 500);
	});

	// open sp menu
	$('header .sp-menu').click(function() {
		$('header .sp-menu').css('display','none');
		$('header .custom-menu').css('display','block');
	});

	// close sp menu
	$('header .custom-menu img').click(function() {
		$('header .sp-menu').css('display','block');
		$('header .custom-menu').css('display','none');
	});

});
