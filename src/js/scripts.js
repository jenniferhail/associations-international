var $ = require('jquery');
// var jQuery = require('jquery');
// var jqueryui = require('jquery-ui');
var slick = require('slick-carousel');

var accordions = require('./modules/accordions.js');
var animations = require('./modules/animations.js');
var cards = require('./modules/cards.js');
var menu = require('./modules/menu.js');
// var selects = require('./modules/selects.js');
var sliders = require('./modules/sliders.js');
var styleguide = require('./modules/style-guide.js');
var svg = require('./modules/svg.js');

// styleguide.init();
accordions.init();
svg.init();
animations.init();
cards.init();
menu.init();
// selects.init();
sliders.init();