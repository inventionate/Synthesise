<style lang="less">
    @import "../../less/colour.less";
    #interactive-video {
        position: relative;
        padding-bottom: 7em;
        img {
            position: absolute;

            // MEDIA QUERY EINBAUEN!!!
            top: 15px;
            right: 11px;
            width: 5rem;
            opacity: 0.85;
        }

        #infomessage {
            display: none;
        }

        #helpbutton {
            display: none;
            position: absolute;
            top: 90px;
            right: 11px;
        }

        #video-notes {
            height: 0.5em;
            textarea {
                height: 1.5em;
                resize: none;
                border-radius: 0;
            }
            textarea:disabled {
                cursor: not-allowed;
            }
        }
        #videoplayer {
            .vjs-marker {
                margin-left: -10px !important;
                height: 15px !important;
                width: 15px !important;
                border-radius: 50% !important;
                background-color: @red !important;
                margin-bottom: 10px !important;
                z-index: 3;
            }
            .vjs-tip {
                margin-bottom: 15px;
                font-size: 15px;
            }
            .active-marker {
                background-color: @white !important;
                height: 25px !important;
                width: 25px !important;
                margin-bottom: 4px !important;
                margin-left: -15px !important;
                border: 5px solid @black;
                z-index: 4;
            }
        }
    }
    @import "../../less/video-js-skin.less";
    @import "../../less/video-js-markers.less";
</style>

<template>
    <div id="interactive-video">

        <video id="videoplayer" class="video-js vjs-default-skin vjs-big-play-centered vjs-fluid" width="640" height="264">
        </video>

        <img src="/images/etpm_logo_r.png" alt="etpM Logo">

        <div id="infomessage" class="ui huge left corner red label">
            <i class="pause icon"></i>
        </div>

        <div id="helpbutton" class="ui animated fade yellow button">
                <div class="visible content"><i class="large warning sign icon"></i></div>
                <div class="hidden content">unklar</div>
        </div>

        <interactive-video-notes v-if="notes" v-model="noteContent" v-on:input="updateNote(name, markerID, $event)"></interactive-video-notes>

    </div>
</template>

<script>
    import InteractiveVideoNotes from './InteractiveVideoNotes.vue';

    import _ from 'lodash';

    // @TODO Fix no cuepoints bug!

    export default {

        props: [
            'name',
            'path',
            'markers',
            'poster',
            'notes'
        ],

        data() {
            return {
                markerID: 0,
                noteContent: '',
                createNote: true
            };
        },

        mounted() {
            var self = this;
            // jQuery laden
            var $ = require('jquery');
            window.$ = $;
            window.jQuery = $;

            // Load content dynamically.
            this.initVideoJS(
                this.path,
                this.name,
                this.poster,
                this.markers
            );
        },

        methods: {
            initVideoJS(path, name, poster, markers) {

                var self = this;
                // Video.js laden
                var videojs = require('video.js');
                window.videojs = videojs;
                // CSS laden
                require('video.js/dist/video-js.css');
                // Video.js Markers laden
                // Eigener Fork, der das Rundungsproblem behebt und die Marker damit an die richtige Stelle setzt!
                require('./videojs-markers.js');
                // require('videojs-markers');
                // require('videojs-markers/dist/videojs.markers.css');

                $('#videoplayer').append(
                    "<source type='video/mp4' src='/" + path + "'> <source type='video/webm' src='/" + path.substring(0, path.length-4) + ".webm'>"
                );

                // Video.JS konfigurieren
                var synthesise_player = videojs('videoplayer',{
                    'controls': true,
                    'autoplay': false,
                    'preload': 'auto',
                    'fluid': true,
                    'playbackRates': [1, 1.5, 2],
                    'poster': '/' + poster,
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
                    window.synthesise_player = synthesise_player;
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
                    // Show help button
                    .one('playing', function () {
                        $('#helpbutton').show();
                    })
                    // Piwik Analytics integrieren
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

                    // Help Button
                    $('#helpbutton').click(function () {

                        var time_stamp = Math.round(window.synthesise_player.currentTime() / 30) * 30;

                        // Save help point time stamp using AJAX.
                        self.$http.patch(document.URL.replace(/\/$/, '') + '/helppoint', {
                            help_point: time_stamp
                        });

                    });

                });
            },

            observeMarkers(name) {
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
                    if ( self.notes )
                    {
                        self.fetchNote(self.markerID);
                    }
                });
            },

            fetchNote(id) {
                var self = this;

                // Aktualisierungsprozess sichtbar machen, indem die Prozessbar aktiviert wird.
                $('#notes-progress').removeClass('disabled');
                $('#notes-form').addClass('loading');

                // console.log(document.URL.replace(/\/$/, ''));

                // AJAX Abfrage starten.
                this.$http.get(document.URL.replace(/\/$/, '') + '/note', {
                    params: { cuepoint_id: id }
                }).then((response) => {

                    // console.log(response.text());

                    self.noteContent = response.text();

                    if ( response.text() )
                    {
                        self.createNote = false;
                    }
                    else
                    {
                        self.createNote = true;
                    }

                    $('#note-content').val(response.text());
                    $('#notes-progress').addClass('disabled');
                    $('#notes-form').removeClass('loading');

                }, (response) => {

                    console.error('AJAX GET Error: ', response.status);

                });
            },

            updateNote: _.debounce(function (name, id, content) {

                var self = this;

                $('#notes-progress').removeClass('disabled');

                // Fix für leere Nachrichten.
                if ( content )
                {

                    if ( self.createNote )
                    {

                        // Create new note.
                        this.$http.post(document.URL.replace(/\/$/, '') + '/note', {
                            note: content,
                            cuepoint_id: id
                        }).then((response) => {

                            // Die Aktivität des Prozesses lässt sich sicher auch über eine Vue Variable lösen!
                            $('#notes-progress').addClass('disabled');

                            // Analytics Nachricht.
                             _paq.push(['trackEvent', 'Notiz', 'verändert', this.name + ': Fähnchen ' + this.id]);

                        }, (response) => {

                            console.error('AJAX POST Error: ', response.status);

                        });
                    }
                    else
                    {

                        // Update existing note.
                        this.$http.patch(document.URL.replace(/\/$/, '') + '/note', {
                            note: content,
                            cuepoint_id: id
                        }).then((response) => {

                            // Die Aktivität des Prozesses lässt sich sicher auch über eine Vue Variable lösen!
                            $('#notes-progress').addClass('disabled');

                            // Analytics Nachricht.
                             _paq.push(['trackEvent', 'Notiz', 'verändert', this.name + ': Fähnchen ' + this.id]);

                        }, (response) => {

                            console.error('AJAX POST Error: ', response.status);

                        });

                    }

                }
                else
                {

                    // Delete note.
                    this.$http.delete(document.URL.replace(/\/$/, '') + '/note', {
                        params: { cuepoint_id: id }
                    }).then((response) => {

                        // Create new note.
                        self.createNote = true;

                        // Die Aktivität des Prozesses lässt sich sicher auch über eine Vue Variable lösen!
                        $('#notes-progress').addClass('disabled');

                        // Analytics Nachricht.
                         _paq.push(['trackEvent', 'Notiz', 'verändert', this.name + ': Fähnchen ' + this.id]);

                    }, (response) => {

                        console.error('AJAX DELETE Error: ', response.status);

                    });

                }

            }, 500)

        },

        components: {
            InteractiveVideoNotes
        }
    }
</script>
