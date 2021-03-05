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

        // var accTitle = $block.find('.accordion-title');

        $(document).off('click', '.accordion-title').on('click', '.accordion-title', function (evt) {
            evt.preventDefault();
            console.log($(this));
            $(this).parent().toggleClass('active');
			$(this).parent().find('.accordion-content').slideToggle( '3000', function() {
				// Animation complete.
			});
        });

    }

    // Initialize dynamic block preview (editor).
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=accordion', initializeBlock);
    }

})(jQuery);