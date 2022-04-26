window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

import '@popperjs/core'
// import counterUp from 'counterup2';
import WOW from 'wow.js';
import waypoints from 'waypoints/lib/noframework.waypoints.min.js';
import slider from 'jquery-ui/ui/widgets/slider';

const bootstrap = require('bootstrap')

window.$ = window.jQuery = require('jquery');
window.Popper = require('@popperjs/core');
window.bootstrap = bootstrap

require('slick-carousel');
require('imagesloaded');
require('lightcase');
window.waypoints = waypoints;
window.counterUp = require('../vendors/js/jquery.counterup');
require('jquery-countdown');
window.niceSelect = require('../vendors/js/jquery.nice-select.min.js');
require('../vendors/js/jquery.scrollUp.js');
require('../vendors/js/jquery.easing.1.3.js');
// window.slider = slider;
window.WOW = WOW;
require('../vendors/js/share.js');


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
