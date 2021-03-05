var $ = require('jquery');

module.exports = {
	init: function () {
		$('.layout.accordion .accordion-item .accordion-title').on('click', function (evt) {
			evt.preventDefault();
			$(this).parent().toggleClass('active');
			$(this).parent().find('.accordion-content').slideToggle( '3000', function() {
				// Animation complete.
			});
		});
	}
}
