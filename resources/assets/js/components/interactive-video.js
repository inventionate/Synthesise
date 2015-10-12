module.exports = {

    template: require('./interactive-video.template.html'),

    props: [
        'name',
        'path',
        'markers',
        'poster'
    ],

    data: function () {
        return {
            markerID: 0,
            noteContent: ''
        };
    },

    created: function () {
        var self = this;

        this.$on('changedContent', function(updatedContent) {
            this.updateNote(self.name, self.markerID, updatedContent);
        });
    },

    ready: function () {
        var self = this;
        // jQuery laden
        var $ = require('jquery');
        window.$ = $;
        window.jQuery = $;

        // Dynamisch die Inhalte hinzufügen.
        // Löst das Problem, dass nicht barebietet Inhalte verarbeitet werden.
        this.initVideoJS(
            this.path,
            this.name,
            this.poster,
            this.markers
        );

    },

    methods: {
        initVideoJS: function (path, name, poster, markers) {

            var self = this;
            // Video.js laden
            var videojs = require('video.js');
            window.videojs = videojs;
            // Video.js Markers laden
            // Eigener Fork, der das Rundungsproblem behebt und die Marker damit an die richtige Stelle setzt!
            require('./videojs-markers.js');

            $('#videoplayer').append(
                "<source type='video/mp4' src='" + path + ".mp4' /> <source type='video/webm' src='" + path + ".webm' />"
            );

            // Video.JS konfigurieren
            videojs('videoplayer',{
                'controls': true,
                'autoplay': false,
                'preload': 'auto',
                'fluid': true,
                'playbackRates': [1, 1.5, 2],
                'poster': poster,
                plugins: {
                    markers: {
                        markerTip: {
                            display: true,
                            text: function(marker) {
                                return marker.text;
                            }
                        },
            			markers: JSON.parse(markers)
            		}
                }
            })
            .ready( function () {
                this
                .one('loadeddata', function () {
                    // Anzahl der Marker.
                    var countMarkers = $('.vjs-marker').length;
                    // IDs zu den einzelnen Markern hinzufügen.
                    for (var i = 0; i <= countMarkers; i++)
                    {
                        $('.vjs-marker:nth-child('+ (2 + i) +')').attr('id','marker-' + i);
                    }
                    // Interaktive Timeline
                    self.observeMarkers(self.name);

                })
                // Piwik Analytics integrieren
                // @todo Funktionalität prüfen!
                .on('play', function () {
                    return _paq.push(["trackEvent", "Video", "Abgespielt", self.name]);
                })
                .on('pause', function () {
                    return _paq.push(["trackEvent", "Video", "Pausiert", self.name]);
                })
                .on('ended', function () {
                    return _paq.push(["trackEvent", "Video", "Komplett angesehen", self.name]);
                })
                .on('fullscreenchange', function () {
                    return _paq.push(["trackEvent", "Video", "Vollbildmodus", self.name]);
                })
                .on('error', function () {
                    return _paq.push(["trackEvent", "Video", "Fehler", self.name]);
                })
                .on('seeking', function () {
                    return _paq.push(["trackEvent", "Video", "Springen", self.name]);
                })
                .on('durationchange', function () {
                    return _paq.push(["trackEvent", "Video", "Geschwindigkeit verändert", self.name]);
                });
            });
        },

        observeMarkers: function (name) {
            var self = this;

            $('.vjs-marker').on('click touchstart', function() {
                // Überall 'active' Klasse löschen
                $('.vjs-marker').removeClass('active-marker');
                // Aktuellen Marker als aktiven kennzeichnen
                $(this).addClass('active-marker');
                // Formular aktivieren.
                $('#note-content').attr('disabled', false);
                // ID des Markers abfragen.
                self.markerID = $(this).attr('id').replace('marker-','');
                // Fähnchen tracken
                _paq.push(['trackEvent', 'Video', 'Zu Fähnchen gesprungen', name + ': Fähnchen ' + self.markerID]);
                // Vorhandene Notizen abfragen.
                self.fetchNote(self.markerID);
                // Aktualisierung der Notizen überwachen.
                // @todo Das muss anders laufen!
                //self.updateNote(id, videoname);
            });
        },

        fetchNote: function (id) {
            var self = this;

            // Aktualisierungsprozess sichtbar machen, indem die Prozessbar aktiviert wird.
            $('#notes-progress').removeClass('disabled');
            $('#notes-form').addClass('loading');
            // AJAX Abfrage starten.
            this.$http.get(document.URL + '/getnotes/', { cuepointNumber: id } , function ( data ) {

                self.noteContent = data;

                // $('#note-content').val(data);
                $('#notes-progress').addClass('disabled');
                $('#notes-form').removeClass('loading');
            })
            .error( function (data, status, request) {
                console.error('AJAX GET Error: ', request.responseURL, status);
            });
        },

        // @toto Notizfunktion verbessern!
        updateNote: function (name, id, content) {

            this.noteContent = content;

            $('#notes-progress').removeClass('disabled');

            // Fix für leere Nachrichten.
            if ( content === '' )
            {
                content = '[#empty#]';
            }

            // AJAX Post.
            this.$http.post(document.URL + '/postnotes', {
                note: content,
                cuepointNumber: id
            })
            .success( function () {
                // Die Aktivität des Prozesses lässt sich sicher auch über eine Vue Variable lösen!
                $('#notes-progress').addClass('disabled');

                // Analytics Nachricht.
                 _paq.push(['trackEvent', 'Notiz', 'verändert', this.name + ': Fähnchen ' + this.id]);

                 // Content zurücksetzen.
                 this.content = '';
            })
            .error( function (data, status, request) {
                console.error('AJAX POST Error: ', request.responseURL, status);
            });

        }

    },

    components: {
        'interactive-video-notes': require('./interactive-video-notes.js')
    }
};
