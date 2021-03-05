(function ($) {

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */

    var initializeBlock = function ($block) {
        
        console.log(window.innerWidth);

        var slider = $block.find('.slider .items');
        if (slider.length > 0) {
            for (var i = 0; i < slider.length; i++) {
                // Init first slider
                $(slider[i]).slick();
            }
        }

        var sliderWithNav = $block.find('.slider-with-nav');
        if (sliderWithNav.length > 0) {
            for (var i = 0; i < sliderWithNav.length; i++) {
                var main = $(sliderWithNav[i]).find('.items');
                var nav = $(sliderWithNav[i]).find('.items-nav');


                // window.addEventListener('load', function () {
                    if ( window.innerWidth < 768 ) {
                        // Init first slider
                        $(main).slick();
                    } else if ( window.innerWidth > 768 ) {
                        // Init first slider
                        $(main).slick();
                        // Init nav slider
                        $(nav).slick();
                    }
                // });
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

    // Initialize dynamic block preview (editor).
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=slider', initializeBlock);
    }

})(jQuery);