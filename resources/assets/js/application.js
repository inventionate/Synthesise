// Vue.js application components
new Vue({
    el: '#etpM-de',

    ready: function () {
        this.semanticAnimations();
    },

    components: {
        'message-box': require('./components/message-box.js'),
        'interactive-video': require('./components/interactive-video.js'),
        // Statistik Modul hinzufügen
        // Eine Vue Komponente, die die entsprechenden Daten und die Darstellungsform abfrägt. Über ein Blade View wird dann die Anzeige der Komponenten geregelt
        'analytics-graph': require('./components/analytics-graph.js'),
        // Download-Button, die auch die Statistikkomponenete umfasst entwerfen!
        'download-button': require('./components/download-button.js'),
    },

    methods: {
        semanticAnimations: require('./components/semantic-animations.js')
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
//         var name = $("#interactive-video").attr('data-name');
//         var path = $("#interactive-video").attr('data-path');
//         var markers = $("#interactive-video").attr('data-markers');
//         var poster = $("#interactive-video").attr('data-poster');
//         React.render(<InterativeVideo name = {name} path = {path} markers = {markers} poster = {poster} />, document.getElementById("interactive-video"));
//     }
//     if ( $("#messages-manage").length )
//     {
//         var url = $("#messages-manage").attr('data-url');
//         var pollInterval = $("#messages-manage").attr('data-poll-interval');
//         React.render(<MessageBox url = {url} pollInterval = {pollInterval} />, document.getElementById("messages-manage"));
//     }
//     if ( $("#statistic-plays").length )
//     {
//         React.render(<Statistic />, document.getElementById("statistic-plays"));
//     }
//
// });
