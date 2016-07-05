// Used packages
var Vue = require('vue');
Vue.use(require('vue-resource'));

// Vue debug mode
// Vue.config.debug = true;

// Token for AJAX calls
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Vue components
import MessageManager from './components/MessageManager.vue';
import InteractiveVideo from './components/InteractiveVideo.vue';

// Vue.js application components
new Vue({
    el: '#etpM-de',

    ready: function () {
        this.semanticAnimations();
    },

    components: {
        // Nachrichtensystem
        'message-manager': MessageManager,
        // Inetraktive Videofunktionen
        'interactive-video': InteractiveVideo
    },

    methods: {
        // Semantic UI Einstellungen
        semanticAnimations: require('./components/semantic-animations.js'),
        // Tracking System
        trackEvents: require('./components/track-events.js')
    }

});
