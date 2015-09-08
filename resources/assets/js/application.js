// Token for AJAX calls
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Vue.js application components
new Vue({
    el: '#etpM-de',

    ready: function () {
        this.semanticAnimations();
        this.trackEvents();
    },

    components: {
        'message-manager': require('./components/message-manager.js'),
        // 'interactive-video': require('./components/interactive-video.js'),
        // Statistik Modul hinzufügen
        // Eine Vue Komponente, die die entsprechenden Daten und die Darstellungsform abfrägt. Über ein Blade View wird dann die Anzeige der Komponenten geregelt
        // 'analytics-graph': require('./components/analytics-graph.js'),
    },

    methods: {
        semanticAnimations: require('./components/semantic-animations.js'),
        // Track events als allgemeines Klassentracking konzipieren, damit es dynamisch und unabhängig von einem speziellen Template verwendet werden kann (einfachere Lösung).
        trackEvents: require('./components/track-events.js')
    }

});
//
// $( document ).ready( () => {
//
//
//
//     // @todo ReactKomponenten ggf. anders laden!
//     if ( $("#interactive-video").length )
//     {
            // HIER DEN php var to js transformer VERWENDEN

//         var name = $("#interactive-video").attr('data-name');
//         var path = $("#interactive-video").attr('data-path');
//         var markers = $("#interactive-video").attr('data-markers');
//         var poster = $("#interactive-video").attr('data-poster');
//         React.render(<InterativeVideo name = {name} path = {path} markers = {markers} poster = {poster} />, document.getElementById("interactive-video"));
//     }
