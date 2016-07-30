require('./bootstrap.js');

require('./semantic-animations.js');

require('./cookie-bar.js');

// Vue components
// import MessageManager from './components/MessageManager.vue';
import InteractiveVideo from './components/InteractiveVideo.vue';

// Vue.js application components
new Vue({
    el: '#vue',

    components: {
        // Nachrichtensystem
        // MessageManager,
        // Inetraktive Videofunktionen
        InteractiveVideo
    },

    methods: {
        // Tracking System
        trackEvents() {
            return _paq.push(['trackEvent', type, 'Downloaded', name]);
        }
    }

});
