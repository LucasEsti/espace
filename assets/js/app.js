/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
const $ = require('jquery');

// create global $ and jQuery variables
global.$ = global.jQuery = $;
// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');
require('moment');
const moment = require('moment');

// create global $ and jQuery variables
global.moment = moment;
require('modal');
require('bootstrap/dist/css/bootstrap.min.css');
require('bootstrap');
require('fullcalendar');
require('fullcalendar/dist/fullcalendar.css');


// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

