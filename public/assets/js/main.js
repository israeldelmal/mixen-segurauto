$('.item-nav').on('click', function(event) {
	event.preventDefault();
	let Item = $(this).attr('href');

	if ($(window).width() > 1370) {
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top - 125
		}, 1000);
	} else {
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top
		}, 1000);
		$('body > nav').removeClass('active-nav');
		$('body > button > span').removeClass('active-btn');
	}
});

$('body > button').on('click', function(event) {
	event.preventDefault();
	$('body > nav').toggleClass('active-nav');
	$('body > button > span').toggleClass('active-btn');
});

$('#servicios > div > ul > li > a').on('click', function(event) {
	event.preventDefault();
});