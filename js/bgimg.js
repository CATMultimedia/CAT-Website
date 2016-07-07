(function($) {
    var $slides = $('[data-slides]');
    var images = $slides.data('slides');
    var count = images.length;
    var loader = new Array();

	function preload() {
		for (i = 0; i < count; i++) {
			loader[i] = new Image()
			loader[i].src = images[i]
		}
	}

    var slideshow = function() {
        $slides
            .css('background-image', 'url("' + images[Math.floor(Math.random() * count)] + '")')
            .animate({ opacity: 1 }, 400)
            .show(0, function() {
                setTimeout(slideshow, 5000);
            });
    };

	preload();
    slideshow();

}(jQuery));