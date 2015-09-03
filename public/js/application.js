(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
// Token for AJAX calls
'use strict';

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Vue.js application components
new Vue({
    el: '#etpM-de',

    ready: function ready() {
        this.semanticAnimations();
    },

    components: {
        'message-manager': require('./components/message-manager.js')
    },

    // 'interactive-video': require('./components/interactive-video.js'),
    // Statistik Modul hinzufügen
    // Eine Vue Komponente, die die entsprechenden Daten und die Darstellungsform abfrägt. Über ein Blade View wird dann die Anzeige der Komponenten geregelt
    // 'analytics-graph': require('./components/analytics-graph.js'),
    // Download-Button, die auch die Statistikkomponenete umfasst entwerfen!
    // 'download-button': require('./components/download-button.js'),
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
// HIER DEN php var to js transformer VERWENDEN

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
// });

},{"./components/message-manager.js":4,"./components/semantic-animations.js":8}],2:[function(require,module,exports){
'use strict';

module.exports = {

    template: require('./message-form.template.html'),

    data: function data() {
        return {
            newMessage: {},
            title: '',
            content: '',
            colour: ''
        };
    },

    created: function created() {
        // Event listener zum Öffnen des Semantic Form-Modals (Vue.js Component Event System).
        this.$on('openModal', function () {
            this.openModal();
        });
    },

    ready: function ready() {
        var self = this;

        // Werte "global" zurücksetzen, sobald das Modal ausgeblendet wird.
        $("#message-form").modal({
            //transition: 'vertical flip',
            //closable: false,
            onHidden: function onHidden() {
                // Eingaben löschen.
                self.newMessage = {};
                self.title = '';
                self.content = '';
                self.colour = '';
            }
        });
    },

    methods: {
        openModal: function openModal() {
            $("#message-form").modal('show');
        },

        closeModal: function closeModal() {
            var self = this;

            // Semantic UI Modal schließen
            $("#message-form").modal('hide');
        },

        submitMessage: function submitMessage() {
            // newMessage updaten
            this.newMessage = {
                title: this.title,
                content: this.content,
                // @todo colour noch dynamisieren!
                colour: 'default'
            };

            // Event startet, dass Nachricht gespeichert werden kann.
            this.$dispatch('storeMessage', this.newMessage);

            // Modal schließen.
            this.closeModal();
        }
    }

};

},{"./message-form.template.html":3}],3:[function(require,module,exports){
module.exports = '<div id="message-form" class="ui modal">\n    <div class="header">\n        Neue Nachricht\n    </div>\n    <div class="content">\n\n        <form class="ui form">\n\n            <div class="required field">\n                <label for="title" class="hide">Titel</label>\n                <input name="title" placeholder="Bitte geben Sie einen Titel ein." ref="title" type="text" v-model="title">\n            </div>\n\n            <div class="required field">\n                <label for="content" class="hide">Inhalt</label>\n                <textarea name="content" placeholder="Bitte geben Sie Ihre Nachricht ein." maxLength="500" ref="content" v-model="content"></textarea>\n            </div>\n\n            <div class="inline fields" ref="colour">\n                <label for="colour">Hintergrundfarbe wählen:</label>\n                <div class="field">\n                    <div class="ui radio checkbox">\n                        <input name="colour" type="radio" value="black">\n                        <label>Schwarz</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="ui radio checkbox">\n                        <input name="colour" type="radio" value="yellow">\n                        <label>Gelb</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="ui radio checkbox">\n                        <input name="colour" type="radio" value="green">\n                        <label>Grün</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="ui radio checkbox">\n                        <input name="colour" type="radio" value="blue">\n                        <label>Blau</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="ui radio checkbox">\n                        <input name="colour" type="radio" value="orange">\n                        <label>Orange</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="ui radio checkbox">\n                        <input name="colour" type="radio" value="purple">\n                        <label>Violett</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="ui radio checkbox">\n                        <input name="colour" type="radio" value="pink">\n                        <label>Pink</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="ui radio checkbox">\n                        <input name="colour" type="radio" value="red">\n                        <label>Rot</label>\n                    </div>\n                </div>\n            </div>\n\n            <div class="buttons">\n\n                <div class="ui black reset button" v-on="click: closeModal">\n                    Abbrechen\n                </div>\n\n                <div class="ui positive right labeled submit icon button" v-on="click: submitMessage">\n                    Erstellen\n                    <i class="checkmark icon"></i>\n                </div>\n\n            </div>\n\n        </form>\n    </div>\n</div>\n';
},{}],4:[function(require,module,exports){
'use strict';

module.exports = {

    template: require('./message-manager.template.html'),

    props: ['url'],

    data: function data() {
        return {
            messages: []
        };
    },

    created: function created() {
        // Event listener zum Öffnen des Semantic Form-Modals (Vue Component Event System).
        this.$on('storeMessage', function (newMessage) {
            this.storeMessage(newMessage);
        });
    },

    ready: function ready() {
        this.fetchMessages();
    },

    methods: {
        fetchMessages: function fetchMessages() {
            var self = this;

            // AJAX Abfrage.
            this.$http.get(this.url, function (messages) {
                self.messages = messages;
            }).error(function (data, status, request) {
                console.error('AJAX GET Error: ', request.responseURL, status);
            });
        },

        editMessage: function editMessage(id) {
            // Die entsprechende Nachricht übergeben.

            // Semantic Form Modal öffnen.
            this.openForm();
        },

        storeMessage: function storeMessage(newMessage) {
            var self = this;

            // Datensatz aktualisieren
            // Vor der AJAX Abfrage, um Geschwindigkeit zu simulieren.
            this.messages.push(newMessage);

            // AJAX call um Datensatz auf dem Server zu speichern.
            this.$http.post(this.url, newMessage).success(function () {
                // Datensatz abrufen
                self.fetchMessages();
            }).error(function (data, status, request) {
                console.error('AJAX POST Error: ', request.responseURL, status);
            });
        },

        removeMessage: function removeMessage(id, index) {
            var self = this;

            // Datensatz aktualisieren.
            // Vor der AJAX Abfrage, um Geschwindigkeit zu simulieren.
            // Der Index beginnt bei 0, die id bei 1.
            this.messages.$remove(index);

            // AJAX call um Datensatz vom Server zu löschen.
            this.$http['delete'](this.url + "/" + id).success(function () {
                // Nach erfolgreichem Löschen eine Abfrage zur Sicherheit starten.
                self.fetchMessages();
            }).error(function (data, status, request) {
                console.error('AJAX DELETE Error: ', request.responseURL, status);
            });
        },

        openForm: function openForm() {
            // Semantic Form Modal öffnen.
            this.$broadcast('openModal');
        }

    },

    components: {
        'message': require('./message.js'),
        'message-form': require('./message-form.js')
    }
};

},{"./message-form.js":2,"./message-manager.template.html":5,"./message.js":6}],5:[function(require,module,exports){
module.exports = '<h1 class="hide">Nachrichten</h1>\n\n<div id="message-list" class="ui top attached segment">\n\n    <message v-repeat="messages" on-remove="{{ removeMessage }}" on-edit="{{ editMessage }}"></message>\n\n</div>\n\n<div class="new-message ui bottom attached teal button" v-on="click: openForm">Neue Nachricht erstellen</div>\n\n<message-form></message-form>\n\n<pre>\n    {{ $data | json }}\n</pre>\n';
},{}],6:[function(require,module,exports){
'use strict';

module.exports = {

    template: require('./message.template.html'),

    props: ['id', 'title', 'content', 'colour', 'onEdit', 'onRemove'],

    methods: {

        editMessage: function editMessage() {
            this.onEdit(this.id);
        },

        removeMessage: function removeMessage() {
            this.onRemove(this.id, this.$index);
        }

    }

};

},{"./message.template.html":7}],7:[function(require,module,exports){
module.exports = '<div class="ui {{ colour }} message">\n    <!-- HIER NOCH DIE EVENTS EINFÜGEN -->\n    <i class="close icon" v-on="click: removeMessage"></i>\n    <!-- Über das Event System das Modal öffnen -->\n    <i class="edit icon" v-on="click: editMessage"></i>\n    <div class="header">\n        {{ title }}\n    </div>\n    {{ content }}\n</div>\n\n<pre>\n    {{ $data |json }}\n</pre>\n';
},{}],8:[function(require,module,exports){
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
};

},{}]},{},[1]);
