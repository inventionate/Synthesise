(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
// Vue.js application components
'use strict';

new Vue({
    el: '#etpM-de',

    ready: function ready() {
        this.semanticAnimations();
    },

    components: {
        //    'message-box': require('./components/message-box.js'),
        //    'interactive-video': require('./components/message.js')
        // Statistik Modul hinzufügen
        // Eine Vue Komponente, die die entsprechenden Daten und die Darstellungsform abfrägt. Über ein Blade View wird dann die Anzeige der Komponenten geregelt
        // Download-Button, die auch die Statistikkomponenete umfasst entwerfen!
    },

    methods: {
        semanticAnimations: require('./components/semantic-animations-new.js')
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

},{"./components/semantic-animations-new.js":2}],2:[function(require,module,exports){
'use strict';

module.exports = function () {
    $('.scale').transition('scale in', 1000);

    $('.shake').transition('shake');

    $('.ui.checkbox').checkbox();

    $('.dropdown').dropdown({ transition: 'drop' });

    $('.ui.accordion').accordion();

    $('#faq-accordion').accordion({
        selector: {
            trigger: '.trigger.column'
        }
    });

    $('.ui.message.shake').transition('shake');

    $('#edit-faq').modal('setting', 'transition', 'vertical flip').modal('attach events', '#edit-faq-button', 'show');

    $('#edit-lection').modal('setting', 'transition', 'vertical flip').modal('attach events', 'td.edit > div.ui.button', 'show');

    $('td.edit > div.ui.button').click(function () {

        var name = $(this).attr('data-name');
        $('#edit-lection-name').attr('placeholder', name);

        var lecturer = $(this).attr('data-lecturer');
        $('#edit-lection-lecturer').attr('placeholder', lecturer);

        var section = $(this).attr('data-section');
        $('#edit-lection-section').attr('placeholder', section);

        var lectionAvailable = $(this).attr('data-lection-available');
        $('#edit-lection-available').val(lectionAvailable);
    });

    // Navigation
    $('#submenu').click(function () {
        $('#subnav').toggle('slow');
    });

    console.log("ES FUNKTIONIERT YEAH!!!");
};

},{}]},{},[1]);
