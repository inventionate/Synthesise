import InteractiveVideoNotes from "./InteractiveVideoNotes.jsx";

var InteractiveVideo = React.createClass({

    getInitialState: function () {
        return {

        };
    },

    componentDidMount: function ()
    {
        var self = this;

        // CSRF Token abfragenu
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Video.JS nach dem Laden der React Komponente manuell generieren und dann einsetzen (ReactID Problem umgehen)
        // http://stackoverflow.com/questions/26255344/reactjs-cant-change-video-and-poster-videojs
        // Über das Event componentWillRecieveProps auf die Props Änderungen reagieren
        var video, wrapper;
        wrapper = document.createElement('div');
        // vjs-sublime-skin
        // Eigenen Skin entwickeln!!!
        wrapper.innerHTML = "<video id='videoplayer' class='video-js vjs-default-skin vjs-big-play-centered' poster='" + this.props.poster.toString() + "'><source type='video/mp4' src='" + this.props.path.toString() + ".mp4' /><source type='video/webm' src='" + this.props.path.toString() + ".webm' /></video>";
        video = wrapper.firstChild;
        this.refs.videoTarget.getDOMNode().appendChild(video);
        // Videoname
        var videoname = this.props.name.toString();
        // Video.JS mounten

        var videoplayer = videojs("videoplayer",{ 'controls': true, 'autoplay': false, 'preload': 'auto', 'width': '100%', 'height': '100%' });
        // Marker einsetzen
        videoplayer.markers({
            markerTip:{
                display: true,
                text: function(marker) {
                    return marker.text;
                }
            },
			markers: JSON.parse(this.props.markers)
		});
        // Die Marker ID für die Notizabfrage beim ersten Abspielen hinzufügen.
        videoplayer
        // Events, die nach dem ersten Abspielen des Videos ausgeführt werden.
        // Hier können auch allgemeine Events registriert werden, die nach der Initialisierung des Player blubbern sollen.
        .one('play', function () {
            // Anzahl der Marker.
            var countMarkers = $('.vjs-marker').length;
            // IDs zu den einzelnen Markern hinzufügen.
            for (var i = 0; i <= countMarkers; i++) {
                $('.vjs-marker:nth-child('+ (2 + i) +')').attr('id','marker-' + i);
            }
            // Events, wenn auf einen Marker gecklickt wurde.
            $('.vjs-marker').click(function() {
                // Formular aktivieren.
                $('#note-content').attr('disabled', false);
                // ID des Markers abfragen.
                var id = $(this).attr('id').replace('marker-','');
                // Vorhandene Notizen abfragen.
                self.loadNotesFromServer(id);
                // Aktualisierung der Notizen überwachen.
                self.updateNotesAtServer(id);
            });
        })
        // Piwik Analytics integrieren
        .on('play', function () {
            return _paq.push(["trackEvent", "Video", "Abgespielt", videoname]);
        })
        .on('pause', function () {
            return _paq.push(["trackEvent", "Video", "Pausiert", videoname]);
        })
        .on('ended', function () {
            return _paq.push(["trackEvent", "Video", "Komplett angesehen", videoname]);
        })
        .on('fullscreenchange', function () {
            return _paq.push(["trackEvent", "Video", "Vollbildmodus", videoname]);
        })
        .on('error', function () {
            return _paq.push(["trackEvent", "Video", "Fehler", videoname]);
        })
        .on('seeking', function () {
            return _paq.push(["trackEvent", "Video", "Fehler", videoname]);
        })
        .on('durationchange', function () {
            return _paq.push(["trackEvent", "Video", "Geschwindigkeit verändert", videoname]);
        });

        // Überlegen wann, wie uns wo der additional content angezeigt wird.

        // Hier die Event Logik für den Klick auf eine Notiz

    },

    loadNotesFromServer: function (markerID)
    {
        // Aktualisierungsprozess sichtbar machen, indem die Prozessbar aktiviert wird.
        $('#notes-progress').removeClass('disabled');
        $('#notes-form').addClass('loading');
        // AJAX Abfrage starten.
        $.get(document.URL + '/getnotes/', {
            cuepointNumber: markerID
        })
        .done(function(data) {
            $('#note-content').val(data);
            $('#notes-progress').addClass('disabled');
            $('#notes-form').removeClass('loading');
        })
        .fail(function() {
            console.error(this.props.url, status, err.toString());
        }.bind(this));
    },

    updateNotesAtServer: function (markerID)
    {
        // Notizen hochladen (Confidential Refresh!)
        $('#note-content').typeWatch({

            callback: function() {

                $('#notes-progress').removeClass('disabled');
                var noteContent = $('#note-content').val();

                $.post(document.URL + '/postnotes', {
                    note: noteContent,
                    cuepointNumber: markerID
                })
                .done(function() {
                    $('#notes-progress').addClass('disabled');
                     _paq.push(['trackEvent', 'Notiz', 'verändert', decodeURIComponent((document.URL + '/postnotes').substr(50)) + ': Fähnchen ' + markerID]);
                })
                .fail(function() {
                    console.error(this.props.url, status, err.toString());
                }.bind(this));
            },
            wait: 500,
            highlight: false,
            captureLength: 3
        });
    },

    render: function ()
    {
        return (
        <div>
            <div ref="videoTarget" />
            <img src="/img/etpm_logo.png" />

            {/* Notizformular einbinden */}
            <InteractiveVideoNotes />
        </div>
        );
    }

});

export default InteractiveVideo;
