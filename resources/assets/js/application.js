// Token for AJAX calls
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Vue.js application components
new Vue({
    el: '#etpM-de',

    ready: function () {
        this.semanticAnimations();
    },

    components: {
        // Nachrichtensystem
        'message-manager': require('./components/message-manager.js'),
        // Inetraktive Videofunktionen
        'interactive-video': require('./components/interactive-video.js'),
        // @todo Statistik Modul
        // Eine Vue Komponente, die die entsprechenden Daten und die Darstellungsform abfrägt. Über ein Blade View wird dann die Anzeige der Komponenten geregelt
        // 'analytics-graph': require('./components/analytics-graph.js'),
    },

    methods: {
        // Semantic UI Einstellungen
        semanticAnimations: require('./components/semantic-animations.js'),
        // Tracking System
        trackEvents: require('./components/track-events.js')
    }

});
