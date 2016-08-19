window._ = require('lodash');
window.Cookies = require('js-cookie');

window.$ = window.jQuery = require('jquery');

// import Vue from 'vue/dist/vue.js';
window.Vue = require('vue/dist/vue.js');
require('vue-resource');

Vue.http.interceptors.push(function (request, next) {
    request.headers['X-XSRF-TOKEN'] = Cookies.get('XSRF-TOKEN');

    next();
});

require('sweetalert');

require('jquery-cookiebar');

require('trumbowyg');
require('trumbowyg/dist/langs/de.min.js');
$.trumbowyg.svgPath = '/css/icons/icons.svg';


require('semantic-ui-css/semantic.js');
