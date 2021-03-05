var $ = require('jquery');
var slick = require('slick-carousel');

module.exports = {
	init: function () {
        var slider = $('.layout.slider .items');
        if (slider.length > 0) {
            for (var i = 0; i < slider.length; i++) {
                // Init first slider
                $(slider[i]).slick();
            }
        }

        var sliderWithNav = $('.layout.slider-with-nav');
        if (sliderWithNav.length > 0) {
            for (var i = 0; i < sliderWithNav.length; i++) {
                var main = $(sliderWithNav[i]).find('.items');
                var nav = $(sliderWithNav[i]).find('.items-nav');

                window.addEventListener('load', function () {
                    if ( window.innerWidth < 768 ) {
                        // Init first slider
                        $(main).slick();
                    } else if ( window.innerWidth > 768 ) {
                        // Init first slider
                        $(main).slick();
                        // Init nav slider
                        $(nav).slick();
                    }
                });
                window.addEventListener('resize', function() {
                    if ( window.innerWidth < 768 && $(nav).hasClass('slick-initialized') ) {
                        $(nav).slick('unslick');
                    } else if ( window.innerWidth > 768 && !$(nav).hasClass('slick-initialized') ) {
                        $(nav).slick();
                    }
                });
                
            }
        }
	}
}