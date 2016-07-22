// Used packages
import Vue from 'vue/dist/vue.js';
import VueResource from 'vue-resource';
import swal from 'sweetalert/dist/sweetalert.min.js';

Vue.use(VueResource);

// Vue debug mode
// Vue.config.debug = true;

// Token for AJAX calls
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Vue components
// import MessageManager from './components/MessageManager.vue';
// import InteractiveVideo from './components/InteractiveVideo.vue';

// Vue.js application components
new Vue({
    el: '#vue',

    mounted() {

        var $ = require('jquery');
        window.$ = $;
        window.jQuery = $;

        // Cookie Datenschutzhinweis anzeigen
        var cookieBar = require('jquery-cookiebar');
        $.cookieBar({
            message: 'Wir benutzen Cookies, um Ihnen das beste Webseiten-Erlebnis zu ermöglichen.',
            acceptText: 'Ich habe verstanden!',
            fixed: true,
            policyButton: true,
            policyText: 'Datenschutzerklärung',
            policyURL: '/impressum',
            forceShow: true,
        });

        // Semantic UI Animationen laden
        var semantic = require("semantic-ui-css/semantic.js");
        this.semanticAnimations();

    },

    components: {
        // Nachrichtensystem
        // MessageManager,
        // Inetraktive Videofunktionen
        // InteractiveVideo
    },

    methods: {
        // Semantic UI Einstellungen
        semanticAnimations: require('./components/semantic-animations.js'),
        // Tracking System
        trackEvents() {
            return _paq.push(['trackEvent', type, 'Downloaded', name]);
        }
    }

});
