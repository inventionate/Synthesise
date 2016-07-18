// Used packages
// var Vue = require('vue');
import Vue from 'vue/dist/vue.js';
import VueResource from 'vue-resource';

Vue.use(VueResource);

// Vue debug mode
// Vue.config.debug = true;

// Token for AJAX calls
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Vue components
import MessageManager from './components/MessageManager.vue';
import InteractiveVideo from './components/InteractiveVideo.vue';

// Vue.js application components
new Vue({
    el: '#vue',

    mounted() {
        console.log("Hello!");
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
        trackEvents: require('./components/track-events.js')
    }

});
