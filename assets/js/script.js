(function ($) {
	// Owl Carousel for some Slider or Carousel
	function nizOwl(owl) {
		var itemLg = owl.data('item-lg'),
			itemLg = itemLg ? itemLg : 2,
			itemMd = owl.data('item-md'),
			itemMd = itemMd ? itemMd : 2,
			itemSm = owl.data('item-sm'),
			itemSm = itemSm ? itemSm : 1,
			play = owl.data('autoplay'),
			play = play ? true : false,
			pause = owl.data('pause') ,
			pause = pause ? true : false,
			nav = owl.data('nav'),
			nav = nav ? true : false,
			dots = owl.data('dots'),
			dots = dots ? true : false,
			mouse = owl.data('mouse-drag') ? true : false,
			touch = owl.data('touch-drag') ? true : false,
			loop = owl.data('loop') ? true : false,

			speed = owl.data('speed'),
			speed = speed ? speed : 500,
			delay = owl.data('delay');

		// Initialize carousel
		owl.owlCarousel({
			autoplay: play,
			autoplayHoverPause: pause,
			nav: nav,
			dots: dots,
			mouseDrag: mouse,
			touchDrag: touch,
			loop: loop,
			smartSpeed: speed,
			autoplayTimeout: delay,
			responsive: {
				0: {
					items: itemSm
				},
				600: {
					items: itemMd
				},
				900: {
					items: itemLg
				},
			}
		});
	}
	function nizProductsCarousel($scope) {
		$(document).find('.niz_woopc-products-carousel').each(function () {
			nizOwl( $(this) );
		});
	}

	
	$(document).ready( function () {
		nizProductsCarousel();
	});

})(jQuery);