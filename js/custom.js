$(document).ready(function() {
	$(".menuIcon").click(function () {
        $(".header__nav").toggle();
    });

		var owl = $('.owl-carousel');
		owl.owlCarousel({
			margin: 10,
			nav: true,
			loop: true,
			autoplay:true,
    	autoplayTimeout:3000,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 5
				}
			}
		});
});
