
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

// Eventuell auf Axios umsteigen (von vue-resource)
// window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    // request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    // In Laravel 5.3 there is a Laravel JS object.
    request.headers['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

    next();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

require('sweetalert');

require('jquery-cookiebar');
require('jquery-cookiebar/jquery.cookiebar.css');

require('trumbowyg');
require('trumbowyg/dist/ui/trumbowyg.css');
require('trumbowyg/dist/langs/de.min.js');
require('trumbowyg/dist/ui/icons.svg');
$.trumbowyg.svgPath = '/fonts/vendor/trumbowyg/dist/ui/icons.svg';


require('semantic-ui-css/semantic.js');
require('semantic-ui-css/semantic.css');
