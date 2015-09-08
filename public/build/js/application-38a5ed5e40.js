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
        // Nachrichtensystem
        'message-manager': require('./components/message-manager.js'),
        // Inetraktive Videofunktionen
        'interactive-video': require('./components/interactive-video.js')
    },

    // @todo Statistik Modul
    // Eine Vue Komponente, die die entsprechenden Daten und die Darstellungsform abfrägt. Über ein Blade View wird dann die Anzeige der Komponenten geregelt
    // 'analytics-graph': require('./components/analytics-graph.js'),
    methods: {
        // Semantic UI Einstellungen
        semanticAnimations: require('./components/semantic-animations.js'),
        // Tracking System
        trackEvents: require('./components/track-events.js')
    }

});

},{"./components/interactive-video.js":4,"./components/message-manager.js":8,"./components/semantic-animations.js":12,"./components/track-events.js":13}],2:[function(require,module,exports){
'use strict';

module.exports = {

    template: require('./interactive-video-notes.template.html'),

    props: ['content'],

    ready: function ready() {
        $('#notes-progress').progress();
    },

    watch: {
        content: function content() {
            this.$dispatch('changedContent', this.content);
        }
    }

};

},{"./interactive-video-notes.template.html":3}],3:[function(require,module,exports){
module.exports = '<section id="video-notes">\n    <header>\n        <h3 class="hide">Notizen</h3>\n    </header>\n\n    <form id="notes-form" class="ui form">\n\n        <div class="field">\n            <label for="note-content" class="hide">Notizen</label>\n            <textarea disabled="disabled"  id="note-content" placeholder="Wählen Sie ein »Fähnchen« und geben Sie Ihre Notizen ein." maxlength="500" ref="note-content" v-model="content" debounce="500"></textarea>\n            <!-- @todo\n\n            - Umgang mit der Disabled-Funktion\n            - Eingabe Delay\n            - Submithandling\n\n         -->\n        </div>\n\n    </form>\n    <div id="notes-progress" class="ui disabled bottom attached green indicating progress" data-percent="100">\n        <div class="bar"></div>\n    </div>\n\n</section>\n';
},{}],4:[function(require,module,exports){
'use strict';

module.exports = {

    template: require('./interactive-video.template.html'),

    props: ['name', 'path', 'markers', 'poster'],

    data: function data() {
        return {
            markerID: 0,
            noteContent: ''
        };
    },

    created: function created() {
        var self = this;

        this.$on('changedContent', function (updatedContent) {
            this.updateNote(self.name, self.markerID, updatedContent);
        });
    },

    ready: function ready() {
        var self = this;

        // Dynamisch die Inhalte hinzufügen.
        // Löst das Problem, dass nicht barebietet Inhalte verarbeitet werden.
        this.initVideoJS(this.path, this.name, this.poster, this.markers);
    },

    methods: {
        initVideoJS: function initVideoJS(path, name, poster, markers) {
            var self = this;
            $('#videoplayer').append("<source type='video/mp4' src='" + path + ".mp4' /> <source type='video/webm' src='" + path + ".webm' />");

            // Video.JS laden
            videojs('videoplayer', {
                'controls': true,
                'autoplay': false,
                'preload': 'auto',
                'poster': poster,
                plugins: {
                    markers: {
                        markerTip: {
                            display: true,
                            text: function text(marker) {
                                return marker.text;
                            }
                        },
                        markers: JSON.parse(markers)
                    }
                }
            }).ready(function () {
                this.one('loadeddata', function () {
                    // Anzahl der Marker.
                    var countMarkers = $('.vjs-marker').length;
                    // IDs zu den einzelnen Markern hinzufügen.
                    for (var i = 0; i <= countMarkers; i++) {
                        $('.vjs-marker:nth-child(' + (2 + i) + ')').attr('id', 'marker-' + i);
                    }
                    // Interaktive Timeline
                    self.observeMarkers(self.name);
                })
                // Piwik Analytics integrieren
                // @todo Funktionalität prüfen!
                .on('play', function () {
                    return _paq.push(["trackEvent", "Video", "Abgespielt", self.name]);
                }).on('pause', function () {
                    return _paq.push(["trackEvent", "Video", "Pausiert", self.name]);
                }).on('ended', function () {
                    return _paq.push(["trackEvent", "Video", "Komplett angesehen", self.name]);
                }).on('fullscreenchange', function () {
                    return _paq.push(["trackEvent", "Video", "Vollbildmodus", self.name]);
                }).on('error', function () {
                    return _paq.push(["trackEvent", "Video", "Fehler", self.name]);
                }).on('seeking', function () {
                    return _paq.push(["trackEvent", "Video", "Springen", self.name]);
                }).on('durationchange', function () {
                    return _paq.push(["trackEvent", "Video", "Geschwindigkeit verändert", self.name]);
                });
            });
        },

        observeMarkers: function observeMarkers(name) {
            var self = this;

            $('.vjs-marker').on('click touchstart', function () {
                // Überall 'active' Klasse löschen
                $('.vjs-marker').removeClass('active-marker');
                // Aktuellen Marker als aktiven kennzeichnen
                $(this).addClass('active-marker');
                // Formular aktivieren.
                $('#note-content').attr('disabled', false);
                // ID des Markers abfragen.
                self.markerID = $(this).attr('id').replace('marker-', '');
                // Fähnchen tracken
                _paq.push(['trackEvent', 'Video', 'Zu Fähnchen gesprungen', name + ': Fähnchen ' + self.markerID]);
                // Vorhandene Notizen abfragen.
                self.fetchNote(self.markerID);
                // Aktualisierung der Notizen überwachen.
                // @todo Das muss anders laufen!
                //self.updateNote(id, videoname);
            });
        },

        fetchNote: function fetchNote(id) {
            var self = this;

            // Aktualisierungsprozess sichtbar machen, indem die Prozessbar aktiviert wird.
            $('#notes-progress').removeClass('disabled');
            $('#notes-form').addClass('loading');
            // AJAX Abfrage starten.
            this.$http.get(document.URL + '/getnotes/', { cuepointNumber: id }, function (data) {

                self.noteContent = data;

                // $('#note-content').val(data);
                $('#notes-progress').addClass('disabled');
                $('#notes-form').removeClass('loading');
            }).error(function (data, status, request) {
                console.error('AJAX GET Error: ', request.responseURL, status);
            });
        },

        // @toto Notizfunktion verbessern!
        updateNote: function updateNote(name, id, content) {

            this.noteContent = content;

            $('#notes-progress').removeClass('disabled');

            // Fix für leere Nachrichten.
            if (content === '') {
                content = '[#empty#]';
            }

            // AJAX Post.
            this.$http.post(document.URL + '/postnotes', {
                note: content,
                cuepointNumber: id
            }).success(function () {
                // Die Aktivität des Prozesses lässt sich sicher auch über eine Vue Variable lösen!
                $('#notes-progress').addClass('disabled');

                // Analytics Nachricht.
                _paq.push(['trackEvent', 'Notiz', 'verändert', this.name + ': Fähnchen ' + this.id]);

                // Content zurücksetzen.
                this.content = '';
            }).error(function (data, status, request) {
                console.error('AJAX POST Error: ', request.responseURL, status);
            });
        }

    },

    components: {
        'interactive-video-notes': require('./interactive-video-notes.js')
    }
};

},{"./interactive-video-notes.js":2,"./interactive-video.template.html":5}],5:[function(require,module,exports){
module.exports = '<div id="interactive-video">\n\n    <video id="videoplayer" class="video-js vjs-default-skin vjs-big-play-centered">\n    </video>\n\n    <interactive-video-notes content="{{ noteContent }}"></interactive-video-notes>\n\n</div>\n';
},{}],6:[function(require,module,exports){
'use strict';

module.exports = {

    template: require('./message-form.template.html'),

    data: function data() {
        return {
            newMessage: {},
            title: '',
            content: '',
            colour: 'default',
            updateMessage: false,
            picked: 'purple'
        };
    },

    created: function created() {
        var self = this;
        // Event listener zum Öffnen des Semantic Form-Modals (Vue.js Component Event System).
        this.$on('editMessage', function (message) {
            self.editMessage(message);
        });
        this.$on('openModal', function () {
            self.openModal();
        });
    },

    ready: function ready() {
        var self = this;

        // Werte "global" zurücksetzen, sobald das Modal ausgeblendet wird.
        $('#message-form')
        // Formvalidierung
        .form({
            fields: {
                title: {
                    identifier: 'title',
                    rules: [{
                        type: 'empty',
                        prompt: 'Bitte geben Sie einen Titel ein.'
                    }]
                },
                content: {
                    identifier: 'content',
                    rules: [{
                        type: 'empty',
                        prompt: 'Bitte geben Sie eine Nachricht ein.'
                    }]
                }
            }
        }).modal({
            onHidden: function onHidden() {
                // Eingaben löschen.
                self.newMessage = {};
                self.title = '';
                self.content = '';
                self.colour = 'default';
            }
        });
    },

    methods: {
        openModal: function openModal() {
            // Semantic UI Modal öffnen
            $("#message-form").modal('show');
        },

        closeModal: function closeModal() {
            // Semantic UI Modal schließen
            $("#message-form").modal('hide');
        },

        submitMessage: function submitMessage() {
            // Formvalidierung
            if ($('#message-form').form('is valid')) {

                // newMessage updaten
                this.newMessage = {
                    title: this.title,
                    content: this.content,
                    colour: this.colour
                };
                // Entscheidung, ob angelegt oder aktualisiert wird.
                if (this.updateMessage) {
                    this.$dispatch('updateMessage', this.newMessage);
                    // Editiermodus deaktivieren
                    this.updateMessage = false;
                } else {
                    // Event startet, dass Nachricht gespeichert werden kann.
                    this.$dispatch('storeMessage', this.newMessage);
                }

                // Modal schließen.
                this.closeModal();
            }
        },

        editMessage: function editMessage(message) {
            // Editiermodus aktivieren
            this.updateMessage = true;
            // Zu editierende Nachricht laden
            this.title = message.title;
            this.content = message.content;
            this.colour = message.colour;
            // Modal öffnen
            this.openModal();
        }
    }

};

},{"./message-form.template.html":7}],7:[function(require,module,exports){
module.exports = '<div id="message-form" class="ui modal">\n    <div class="header">\n        Neue Nachricht\n    </div>\n    <div class="content">\n\n        <form class="ui form">\n\n            <div class="required field">\n                <label for="title" class="hide">Titel</label>\n                <input name="title" placeholder="Bitte geben Sie einen Titel ein." ref="title" type="text" v-model="title">\n            </div>\n\n            <div class="required field">\n                <label for="content" class="hide">Inhalt</label>\n                <textarea name="content" placeholder="Bitte geben Sie Ihre Nachricht ein." maxlength="500" ref="content" v-model="content"></textarea>\n            </div>\n\n            <div class="inline fields" ref="colour">\n                <label for="colour">Hintergrundfarbe wählen:</label>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="default" v-model="colour">\n                        <label>Grau</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="black" v-model="colour">\n                        <label>Schwarz</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="yellow" v-model="colour">\n                        <label>Gelb</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="green" v-model="colour">\n                        <label>Grün</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="blue" v-model="colour">\n                        <label>Blau</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="orange" v-model="colour">\n                        <label>Orange</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="purple" v-model="colour">\n                        <label>Violett</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="pink" v-model="colour">\n                        <label>Pink</label>\n                    </div>\n                </div>\n                <div class="field">\n                    <div class="radio checkbox">\n                        <input name="colour" type="radio" value="red" v-model="colour">\n                        <label>Rot</label>\n                    </div>\n                </div>\n            </div>\n\n            <div class="buttons">\n\n                <div class="ui black reset button" v-on="click: closeModal">\n                    Abbrechen\n                </div>\n\n                <div class="ui positive right labeled submit icon button" v-on="click: submitMessage">\n                    Erstellen\n                    <i class="checkmark icon"></i>\n                </div>\n\n            </div>\n\n        </form>\n    </div>\n</div>\n';
},{}],8:[function(require,module,exports){
'use strict';

module.exports = {

    // @todo index und id system evtl. angleichen, damit es synchron funktioniert und damit übersichtlicher wird.

    template: require('./message-manager.template.html'),

    props: ['url'],

    data: function data() {
        return {
            messages: [],
            indexOfEditedMessage: 0,
            idOfEditedMessage: 0
        };
    },

    created: function created() {
        // Event listener zum Öffnen des Semantic Form-Modals (Vue Component Event System).
        this.$on('storeMessage', function (newMessage) {
            this.storeMessage(newMessage);
        });
        this.$on('updateMessage', function (newMessage) {
            this.updateMessage(newMessage);
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

        editMessage: function editMessage(id, index) {
            // Die entsprechende Nachricht übergeben.
            this.$broadcast('editMessage', this.messages[index]);
            // Den Index der editierten Nachricht setzen
            this.indexOfEditedMessage = index;
            this.idOfEditedMessage = id;
        },

        openForm: function openForm() {
            // Semantic UI Formular öffnen.
            this.$broadcast('openModal');
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

        updateMessage: function updateMessage(newMessage) {
            var self = this;

            // Datensatz aktualisieren.
            // Vor der AJAX Abfrage, um Geschwindigkeit zu simulieren.
            // Das direkte Tauschen der Arrayobjekte wird nicht von Vue erkannt. Daher mü+ssen spezielle Setter verwendet werden.
            this.messages.$set(this.indexOfEditedMessage, newMessage);

            // AJAX call um Datensatz vom Server zu löschen.
            this.$http.put(this.url + "/" + this.idOfEditedMessage, newMessage).success(function () {
                // Nach erfolgreichem Löschen eine Abfrage zur Sicherheit starten.
                self.fetchMessages();
            }).error(function (data, status, request) {
                console.error('AJAX PUT Error: ', request.responseURL, status);
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
        }

    },

    components: {
        'message': require('./message.js'),
        'message-form': require('./message-form.js')
    }
};

},{"./message-form.js":6,"./message-manager.template.html":9,"./message.js":10}],9:[function(require,module,exports){
module.exports = '<h1 class="hide">Nachrichten</h1>\n\n<div id="message-list" class="ui top attached segment">\n\n    <message v-repeat="messages" on-remove="{{ removeMessage }}" on-edit="{{ editMessage }}"></message>\n\n</div>\n\n<div class="new-message ui bottom attached teal button" v-on="click: openForm">Neue Nachricht erstellen</div>\n\n<message-form></message-form>\n\n<!-- <pre>\n    {{ $data | json }}\n</pre> -->\n';
},{}],10:[function(require,module,exports){
'use strict';

module.exports = {

    template: require('./message.template.html'),

    props: ['id', 'title', 'content', 'colour', 'onEdit', 'onRemove'],

    methods: {

        editMessage: function editMessage() {
            this.onEdit(this.id, this.$index);
        },

        removeMessage: function removeMessage() {
            this.onRemove(this.id, this.$index);
        }

    }

};

},{"./message.template.html":11}],11:[function(require,module,exports){
module.exports = '<div class="ui {{ colour }} message">\n    <!-- HIER NOCH DIE EVENTS EINFÜGEN -->\n    <i class="close icon" v-on="click: removeMessage"></i>\n    <!-- Über das Event System das Modal öffnen -->\n    <i class="edit icon" v-on="click: editMessage"></i>\n    <div class="header">\n        {{ title }}\n    </div>\n    {{ content }}\n</div>\n';
},{}],12:[function(require,module,exports){
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

},{}],13:[function(require,module,exports){
'use strict';

module.exports = function (type, name) {

    // Syntax, um die Trackingfunktion zu verwenden:
    // <div class="foo" v-on="click: trackEvent(type, name)">…

    return _paq.push(['trackEvent', type, 'Downloaded', name]);
};

},{}]},{},[1]);
