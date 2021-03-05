var $ = require('jquery');

module.exports = {
	init: function () {
		$('.nav-toggle').on('click', function () {
            $('.header').toggleClass('active');
            $('.header-nav').toggleClass('active');
            if ( $('.header').hasClass('active') ) {
                // $(this).hide().text('Close').fadeIn(0);
                this.innerHTML = 'Close';
            } else {
                this.innerHTML = 'Menu';
            }
        });
        document.addEventListener('scroll', function(event) {
            var scrollY = window.pageYOffset;
            // console.log('scroll event - ' + scrollY);
            if (scrollY > 200) {
                $('.header').addClass('scrolled');
            } else {
                $('.header').removeClass('scrolled');
            }
        });
	}
}