var $ = require('jquery');
var anime = require('animejs');
// var lottie = require('lottie-web');

module.exports = {
	init: function () {

        // console.log('Running animations');

        // Animations for local development 
        
        // lottie.loadAnimation({
        //     container: document.getElementById('lottie-top'), // the dom element that will contain the animation
        //     renderer: 'svg',
        //     loop: true,
        //     autoplay: true,
        //     // path: '/app/themes/mightily/dist/assets/lottie-top/data.json' // the path to the animation json
        //     path: '/assets/lottie-top/data.json' // the path to the animation json
        // });
        // lottie.loadAnimation({
        //     container: document.getElementById('lottie-bottom'), // the dom element that will contain the animation
        //     renderer: 'svg',
        //     loop: true,
        //     autoplay: true,
        //     // path: '/app/themes/mightily/dist/assets/lottie-bottom/data.json' // the path to the animation json
        //     path: '/assets/lottie-bottom/data.json' // the path to the animation json
        // });
        
        anime({
            targets: '.layout.hero.style-3',
            opacity: [0,1],
            duration: 5000,
            delay: 1500
        });

        anime({
            targets: '.layout.hero.style-3.content-left .circle .green',
            rotate: ['40deg', '399deg'],
            loop: true,
            duration: 30000,
            easing: 'linear'
        });

        anime({
            targets: '.layout.hero.style-3.content-right .circle .green',
            rotate: ['12deg', '371deg'],
            loop: true,
            duration: 30000,
            easing: 'linear'
        });

        anime({
            targets: '.layout.hero.style-3 .circle .blue .svg-circle',
            rotate: '-90deg',
            scale: [1, 0.9],
            loop: true,
            duration: 10000,
            easing: 'easeInOutSine',
            direction: 'alternate'
        });

        setTimeout( function() {
            anime({
                targets: '.layout.hero.style-1.content-right .icon .svg g',
                opacity: [0,1],
                duration: 1000,
                endDelay: 1000,
                loop: true,
                ease: 'linear',
                direction: 'alternate',
                delay: anime.stagger(50)
            });
        }, 500);

        setTimeout( function() {
            anime({
                targets: '.layout.hero.style-1.content-left .icon .svg g',
                opacity: [0,1],
                duration: 1000,
                endDelay: 1000,
                loop: true,
                ease: 'linear',
                direction: 'alternate',
                delay: anime.stagger(50)
            });
        }, 500);
        
	}
}