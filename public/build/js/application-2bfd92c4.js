(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _interopRequireWildcard = function (obj) { return obj && obj.__esModule ? obj : { "default": obj }; };

// Vanilla JS

var _Analytics = require("./Components/Analytics.js");

var _Analytics2 = _interopRequireWildcard(_Analytics);

var _SemanticAnimations = require("./Components/SemanticAnimations.js");

var _SemanticAnimations2 = _interopRequireWildcard(_SemanticAnimations);

// React JS Components

var _MessageBox = require("./Components/MessageBox.jsx");

var _MessageBox2 = _interopRequireWildcard(_MessageBox);

var _InterativeVideo = require("./Components/InteractiveVideo.jsx");

var _InterativeVideo2 = _interopRequireWildcard(_InterativeVideo);

var _Statistic = require("./Components/Statistic.jsx");

var _Statistic2 = _interopRequireWildcard(_Statistic);

$(document).ready(function () {

    // Config Video.js swf Fallback
    videojs.options.flash.swf = "/video-js.swf";

    // Piwik Integration
    new _Analytics2["default"]();

    // Semantic UI
    new _SemanticAnimations2["default"]();

    // @todo ReactKomponenten ggf. anders laden!
    if ($("#interactive-video").length) {
        var name = $("#interactive-video").attr("data-name");
        var path = $("#interactive-video").attr("data-path");
        var markers = $("#interactive-video").attr("data-markers");
        var poster = $("#interactive-video").attr("data-poster");
        React.render(React.createElement(_InterativeVideo2["default"], { name: name, path: path, markers: markers, poster: poster }), document.getElementById("interactive-video"));
    }
    if ($("#messages-manage").length) {
        var url = $("#messages-manage").attr("data-url");
        var pollInterval = $("#messages-manage").attr("data-poll-interval");
        React.render(React.createElement(_MessageBox2["default"], { url: url, pollInterval: pollInterval }), document.getElementById("messages-manage"));
    }
    if ($("#statistic-plays").length) {
        React.render(React.createElement(_Statistic2["default"], null), document.getElementById("statistic-plays"));
    }
});

},{"./Components/Analytics.js":2,"./Components/InteractiveVideo.jsx":3,"./Components/MessageBox.jsx":6,"./Components/SemanticAnimations.js":9,"./Components/Statistic.jsx":10}],2:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var Analytics = function Analytics() {
    _classCallCheck(this, Analytics);

    $(document).on('click', '.download-paper', function () {
        var name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Text', 'Downloaded', name]);
    }).on('click', '.download-further-literature', function () {
        var name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Weiterführende Literaturhinweise', 'Downloaded', name]);
    }).on('click', '.download-info', function () {
        var name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Informationsdokument', 'Downloaded', name]);
    }).on('click', '.download-note', function () {
        var name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Notizen', 'Downloaded', name]);
    });
};

exports['default'] = Analytics;
module.exports = exports['default'];

},{}],3:[function(require,module,exports){
'use strict';

var _interopRequireWildcard = function (obj) { return obj && obj.__esModule ? obj : { 'default': obj }; };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var _InteractiveVideoNotes = require('./InteractiveVideoNotes.jsx');

var _InteractiveVideoNotes2 = _interopRequireWildcard(_InteractiveVideoNotes);

var InteractiveVideo = React.createClass({
    displayName: 'InteractiveVideo',

    getInitialState: function getInitialState() {
        return {};
    },

    componentDidMount: function componentDidMount() {
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
        wrapper.innerHTML = '<video id=\'videoplayer\' class=\'video-js vjs-sublime-skin vjs-big-play-centered\' poster=\'' + this.props.poster.toString() + '\'><source type=\'video/mp4\' src=\'' + this.props.path.toString() + '.mp4\' /><source type=\'video/webm\' src=\'' + this.props.path.toString() + '.webm\' /></video>';
        video = wrapper.firstChild;
        this.refs.videoTarget.getDOMNode().appendChild(video);
        // Videoname
        var videoname = this.props.name.toString();
        // Video.JS mounten

        var videoplayer = videojs('videoplayer', { controls: true, autoplay: false, preload: 'auto', width: '100%', height: '100%' });
        // Marker einsetzen
        videoplayer.markers({
            markerTip: {
                display: true,
                text: function text(marker) {
                    return marker.text;
                }
            },
            markers: JSON.parse(this.props.markers)
        });
        // Die Marker ID für die Notizabfrage beim ersten Abspielen hinzufügen.
        videoplayer
        // Events, die nach dem ersten Abspielen des Videos ausgeführt werden.
        // Hier können auch allgemeine Events registriert werden, die nach der Initialisierung des Player blubbern sollen.
        // Diese Skripte müssen ausgeführt werden, wenn alle Marker geladen sind!
        .one('timeupdate', function () {
            // Anzahl der Marker.
            var countMarkers = $('.vjs-marker').length;
            // IDs zu den einzelnen Markern hinzufügen.
            for (var i = 0; i <= countMarkers; i++) {
                $('.vjs-marker:nth-child(' + (2 + i) + ')').attr('id', 'marker-' + i);
            }
            // Events, wenn auf einen Marker gecklickt wurde.
            $('.vjs-marker').on('click touchstart', function () {
                // Überall 'active' Klasse löschen
                $('.vjs-marker').removeClass('active-marker');
                // Aktuellen Marker als aktiven kennzeichnen
                $(this).addClass('active-marker');
                // Formular aktivieren.
                $('#note-content').attr('disabled', false);
                // ID des Markers abfragen.
                var id = $(this).attr('id').replace('marker-', '');
                // Fähnchen tracken
                _paq.push(['trackEvent', 'Video', 'Zu Fähnchen gesprungen', decodeURIComponent(document.URL.substr(50)) + ': Fähnchen ' + id]);
                // Vorhandene Notizen abfragen.
                self.loadNotesFromServer(id);
                // Aktualisierung der Notizen überwachen.
                self.updateNotesAtServer(id);
            });
        })
        // Piwik Analytics integrieren
        .on('play', function () {
            return _paq.push(['trackEvent', 'Video', 'Abgespielt', videoname]);
        }).on('pause', function () {
            return _paq.push(['trackEvent', 'Video', 'Pausiert', videoname]);
        }).on('ended', function () {
            return _paq.push(['trackEvent', 'Video', 'Komplett angesehen', videoname]);
        }).on('fullscreenchange', function () {
            return _paq.push(['trackEvent', 'Video', 'Vollbildmodus', videoname]);
        }).on('error', function () {
            return _paq.push(['trackEvent', 'Video', 'Fehler', videoname]);
        }).on('seeking', function () {
            return _paq.push(['trackEvent', 'Video', 'Springen', videoname]);
        }).on('durationchange', function () {
            return _paq.push(['trackEvent', 'Video', 'Geschwindigkeit verändert', videoname]);
        });

        // Überlegen wann, wie uns wo der additional content angezeigt wird.

        // Hier die Event Logik für den Klick auf eine Notiz
    },

    loadNotesFromServer: function loadNotesFromServer(markerID) {
        // Aktualisierungsprozess sichtbar machen, indem die Prozessbar aktiviert wird.
        $('#notes-progress').removeClass('disabled');
        $('#notes-form').addClass('loading');
        // AJAX Abfrage starten.
        $.get(document.URL + '/getnotes/', {
            cuepointNumber: markerID
        }).done(function (data) {
            $('#note-content').val(data);
            $('#notes-progress').addClass('disabled');
            $('#notes-form').removeClass('loading');
        }).fail((function () {
            console.error(this.props.url, status, err.toString());
        }).bind(this));
    },

    updateNotesAtServer: function updateNotesAtServer(markerID) {
        // Notizen hochladen (Confidential Refresh!)
        $('#note-content').typeWatch({

            callback: function callback() {

                $('#notes-progress').removeClass('disabled');
                var noteContent = $('#note-content').val();

                $.post(document.URL + '/postnotes', {
                    note: noteContent,
                    cuepointNumber: markerID
                }).done(function () {
                    $('#notes-progress').addClass('disabled');
                    _paq.push(['trackEvent', 'Notiz', 'verändert', decodeURIComponent((document.URL + '/postnotes').substr(50)) + ': Fähnchen ' + markerID]);
                }).fail((function () {
                    console.error(this.props.url, status, err.toString());
                }).bind(this));
            },
            wait: 500,
            highlight: false,
            captureLength: 3
        });
    },

    render: function render() {
        return React.createElement(
            'div',
            null,
            React.createElement('div', { ref: 'videoTarget' }),
            React.createElement('img', { src: '/img/etpm_logo.png' }),
            React.createElement(_InteractiveVideoNotes2['default'], null)
        );
    }

});

exports['default'] = InteractiveVideo;
module.exports = exports['default'];
/* Notizformular einbinden */

},{"./InteractiveVideoNotes.jsx":4}],4:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});
var InteractiveVideoNotes = React.createClass({
    displayName: "InteractiveVideoNotes",

    componentDidMount: function componentDidMount() {
        $("#notes-progress").progress();
    },

    render: function render() {

        return React.createElement(
            "section",
            { id: "video-notes" },
            React.createElement(
                "header",
                null,
                React.createElement(
                    "h3",
                    { className: "hide" },
                    "Notizen"
                )
            ),
            React.createElement(
                "form",
                { id: "notes-form", className: "ui form" },
                React.createElement(
                    "div",
                    { className: "field" },
                    React.createElement(
                        "label",
                        { htmlFor: "note-content", className: "hide" },
                        "Notizen"
                    ),
                    React.createElement("textarea", { disabled: "disabled", id: "note-content", placeholder: "Wählen Sie ein »Fähnchen« und geben Sie Ihre Notizen ein.", maxLength: "500", ref: "textarea" })
                )
            ),
            React.createElement(
                "div",
                { id: "notes-progress", className: "ui disabled bottom attached green indicating progress", "data-percent": "100" },
                React.createElement("div", { className: "bar" })
            )
        );
    }
});

exports["default"] = InteractiveVideoNotes;
module.exports = exports["default"];

},{}],5:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});
var Message = React.createClass({
    displayName: "Message",

    deleteMessage: function deleteMessage() {
        this.props.onDeleteMessage({
            id: this.props.id
        });
    },

    editMessage: function editMessage() {
        this.props.onEditMessage({
            id: this.props.id,
            title: this.props.title,
            content: this.props.content,
            colour: this.props.colour
        });
    },

    render: function render() {

        var messageClass = "ui " + this.props.colour + " message";

        return React.createElement(
            "div",
            { className: "message" },
            React.createElement(
                "div",
                { className: messageClass },
                React.createElement("i", { className: "close icon", onClick: this.deleteMessage }),
                React.createElement("i", { className: "edit icon", onClick: this.editMessage }),
                React.createElement(
                    "div",
                    { className: "header" },
                    this.props.title
                ),
                this.props.content
            )
        );
    }
});

exports["default"] = Message;
module.exports = exports["default"];

},{}],6:[function(require,module,exports){
"use strict";

var _interopRequireWildcard = function (obj) { return obj && obj.__esModule ? obj : { "default": obj }; };

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _MessageList = require("./MessageList.jsx");

var _MessageList2 = _interopRequireWildcard(_MessageList);

var _MessageForm = require("./MessageForm.jsx");

var _MessageForm2 = _interopRequireWildcard(_MessageForm);

var MessageBox = React.createClass({
    displayName: "MessageBox",

    getInitialState: function getInitialState() {
        return {
            data: [],
            latestMessageID: 1,
            modalType: "default",
            editData: []
        };
    },

    loadMessagesFromServer: function loadMessagesFromServer() {
        $.ajax({
            url: this.props.url,
            dataType: "json",
            success: (function (data) {
                var id = 1;
                // Länge des JSON Array überprüfen
                if (Object.keys(data).length > 0) {
                    id = data[Object.keys(data).length - 1].id + 1;
                }
                this.setState({
                    data: data,
                    latestMessageID: id
                });
            }).bind(this),
            error: (function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }).bind(this)
        });
    },

    createNewMessageOnServer: function createNewMessageOnServer(message) {
        // Asynchrone Abfrage
        if (this.state.modalType === "default") {
            // Optimistische updates um Geschwindigkeit zu simulieren

            // Aktuelle Daten abfragen
            var messages = this.state.data; // Muss ein Array sein

            // console.log(messages);
            // console.log(message);

            // Neue komponente anhängen
            var newMessages = messages.concat([message]);

            // console.log(newMessages);

            // Datensatz aktualisieren
            this.setState({ data: newMessages });

            $.ajax({
                url: this.props.url,
                type: "POST",
                dataType: "json",
                data: message,
                success: (function (data) {
                    this.loadMessagesFromServer();
                }).bind(this),
                error: (function (xhr, status, err) {
                    console.error(this.props.url, status, err.toString());
                }).bind(this)
            });
        } else {
            var id = message.id;
            delete message.id;

            $.ajax({
                url: this.props.url + "/" + id,
                type: "PUT",
                dataType: "json",
                data: message,
                success: (function (data) {
                    this.loadMessagesFromServer();
                }).bind(this),
                error: (function (xhr, status, err) {
                    console.error(this.props.url, status, err.toString());
                }).bind(this)
            });
        }
        this.setState({
            modalType: "default"
        });
    },

    deleteMessageFromServer: function deleteMessageFromServer(message) {
        // Optimistische updaten um Geschwindigkeit zu simulieren
        var messages = this.state.data;

        // Zu löschendes Objekt herausfiltern
        var newMessages = $.grep(messages, function (e) {
            return e.id != message.id;
        });

        // Datensatz aktualisieren
        this.setState({ data: newMessages });

        $.ajax({
            url: this.props.url + "/" + message.id,
            type: "POST",
            data: { _method: "delete" },
            success: (function (data) {
                this.loadMessagesFromServer();
            }).bind(this),
            error: (function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }).bind(this)
        });
    },

    handleEditMessageForm: function handleEditMessageForm(message) {

        console.log("edit");

        this.setState({
            modalType: "edit",
            editData: message
        });
    },

    handleCloseModal: function handleCloseModal(status) {

        this.setState({
            modalType: status,
            editData: []
        });
    },

    componentDidMount: function componentDidMount() {
        // CSRF Token abfragenu
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")
            }
        });

        this.loadMessagesFromServer();

        // Long Polling problematisch, da es die Editierfunktion überschreibt
        setInterval(this.loadMessagesFromServer, this.props.pollInterval);
    },

    render: function render() {
        return React.createElement(
            "div",
            { className: "message-box" },
            React.createElement(
                "h1",
                { className: "hide" },
                "Nachrichten"
            ),
            React.createElement(_MessageList2["default"], {
                data: this.state.data,
                submitDeleteMessage: this.deleteMessageFromServer,
                openEditMessageForm: this.handleEditMessageForm }),
            React.createElement(_MessageForm2["default"], {
                onSubmitNewMessage: this.createNewMessageOnServer,
                onCloseModal: this.handleCloseModal,
                modalType: this.state.modalType,
                editData: this.state.editData,
                latestMessageID: this.state.latestMessageID })
        );
    }

});

exports["default"] = MessageBox;
module.exports = exports["default"];

},{"./MessageForm.jsx":7,"./MessageList.jsx":8}],7:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, '__esModule', {
    value: true
});
var MessageForm = React.createClass({
    displayName: 'MessageForm',

    getInitialState: function getInitialState() {
        return {
            title: '',
            content: '',
            colour: 'default',
            stopUpdate: 'no'
        };
    },

    componentDidMount: function componentDidMount() {
        var self = this;

        // Semantic UI DOM Manipulationen durchführen.
        $('#new-message').modal({
            detachable: false,
            transition: 'vertical flip',
            closable: false,
            onHidden: function onHidden() {
                $('.ui.form').form('reset');
            }
        });

        $('.ui.radio.checkbox').checkbox({
            onChecked: function onChecked() {

                // Titel und Inhalt updaten
                self.updateMessage();

                // Auswahl aktualisieren
                $(this).prop('checked', true);

                // Farbauswahl setzen
                var colour = $(this).val();

                self.setState({ colour: colour });
            }
        });

        // Formvalidierung
        $('.ui.form').form({
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
        }, {
            inline: true,
            on: 'blur',
            onSuccess: (function () {
                this.handleSubmit();
                this.closeModal();
            }).bind(this)
        }).submit(function (event) {
            // Standardevent verhindern (wie wird der event aber übergeben durch Success?)
            return event.preventDefault();
        });
    },

    componentWillReceiveProps: function componentWillReceiveProps(nextProps) {

        if (nextProps.modalType === 'edit') {
            // Initalwerte für zu editierende Nachricht setzen
            this.setState({
                title: nextProps.editData.message.title,
                content: nextProps.editData.message.content,
                colour: nextProps.editData.message.colour
            });
        }
    },

    componentDidUpdate: function componentDidUpdate() {

        if (this.props.modalType === 'edit' && this.state.stopUpdate === 'no') {
            // Titel einfügen
            $('input[name=\'title\']').val(this.state.title);

            // Inhalt einfügen
            $('textarea[name=\'content\']').val(this.state.content);

            // Farbauwahl einfügen
            $('input[value=\'' + this.state.colour + '\']').prop('checked', true);

            this.openModal();
        }
    },

    updateMessage: function updateMessage() {

        // Titel auslesen
        var title = React.findDOMNode(this.refs.title).value.trim();

        // Inhalt auslesen
        var content = React.findDOMNode(this.refs.content).value.trim();

        this.setState({
            title: title,
            content: content
        });
    },

    openModal: function openModal() {

        // Hier muss eigentlich rein, dass jetzt keine Updates mehr kommen sollen.
        this.setState({
            stopUpdate: 'yes'
        });

        $('#new-message').modal('show');
    },

    closeModal: function closeModal() {

        $('#new-message').modal('hide');

        this.setState({
            stopUpdate: 'no'
        });

        this.props.onCloseModal('default');
    },

    handleSubmit: function handleSubmit() {

        // Titel und Inhalt aktualisieren
        this.updateMessage();

        // Neue ID festlegen
        var id = this.props.latestMessageID;

        // Ist das Model im Editiermodus
        if (this.props.modalType === 'edit') {
            id = this.props.editData.message.id;
        }

        // Callback Datensatz
        this.props.onSubmitNewMessage({
            id: id,
            title: this.state.title,
            content: this.state.content,
            colour: this.state.colour
        });
        this.setState(this.getInitialState());
        return;
    },

    render: function render() {
        return React.createElement(
            'div',
            { className: 'message-form' },
            React.createElement(
                'div',
                { className: 'new-message ui bottom attached teal button', onClick: this.openModal },
                'Neue Nachricht erstellen'
            ),
            React.createElement(
                'div',
                { id: 'new-message', className: 'ui modal' },
                React.createElement(
                    'div',
                    { className: 'header' },
                    'Neue Nachricht'
                ),
                React.createElement(
                    'div',
                    { className: 'content' },
                    React.createElement(
                        'form',
                        { className: 'ui form' },
                        React.createElement(
                            'div',
                            { className: 'required field' },
                            React.createElement(
                                'label',
                                { htmlFor: 'title', className: 'hide' },
                                'Titel'
                            ),
                            React.createElement('input', { name: 'title', placeholder: 'Titel eingeben.', ref: 'title', type: 'text' })
                        ),
                        React.createElement(
                            'div',
                            { className: 'required field' },
                            React.createElement(
                                'label',
                                { htmlFor: 'content', className: 'hide' },
                                'Inhalt'
                            ),
                            React.createElement('textarea', { name: 'content', placeholder: 'Nachricht eingeben.', maxLength: '500', ref: 'content' })
                        ),
                        React.createElement(
                            'div',
                            { className: 'inline fields', ref: 'colour' },
                            React.createElement(
                                'label',
                                { htmlFor: 'colour' },
                                'Hintergrundfarbe wählen:'
                            ),
                            React.createElement(
                                'div',
                                { className: 'field' },
                                React.createElement(
                                    'div',
                                    { className: 'ui radio checkbox' },
                                    React.createElement('input', { name: 'colour', type: 'radio', value: 'black' }),
                                    React.createElement(
                                        'label',
                                        null,
                                        'Schwarz'
                                    )
                                )
                            ),
                            React.createElement(
                                'div',
                                { className: 'field' },
                                React.createElement(
                                    'div',
                                    { className: 'ui radio checkbox' },
                                    React.createElement('input', { name: 'colour', type: 'radio', value: 'yellow' }),
                                    React.createElement(
                                        'label',
                                        null,
                                        'Gelb'
                                    )
                                )
                            ),
                            React.createElement(
                                'div',
                                { className: 'field' },
                                React.createElement(
                                    'div',
                                    { className: 'ui radio checkbox' },
                                    React.createElement('input', { name: 'colour', type: 'radio', value: 'green' }),
                                    React.createElement(
                                        'label',
                                        null,
                                        'Grün'
                                    )
                                )
                            ),
                            React.createElement(
                                'div',
                                { className: 'field' },
                                React.createElement(
                                    'div',
                                    { className: 'ui radio checkbox' },
                                    React.createElement('input', { name: 'colour', type: 'radio', value: 'blue' }),
                                    React.createElement(
                                        'label',
                                        null,
                                        'Blau'
                                    )
                                )
                            ),
                            React.createElement(
                                'div',
                                { className: 'field' },
                                React.createElement(
                                    'div',
                                    { className: 'ui radio checkbox' },
                                    React.createElement('input', { name: 'colour', type: 'radio', value: 'orange' }),
                                    React.createElement(
                                        'label',
                                        null,
                                        'Orange'
                                    )
                                )
                            ),
                            React.createElement(
                                'div',
                                { className: 'field' },
                                React.createElement(
                                    'div',
                                    { className: 'ui radio checkbox' },
                                    React.createElement('input', { name: 'colour', type: 'radio', value: 'purple' }),
                                    React.createElement(
                                        'label',
                                        null,
                                        'Violett'
                                    )
                                )
                            ),
                            React.createElement(
                                'div',
                                { className: 'field' },
                                React.createElement(
                                    'div',
                                    { className: 'ui radio checkbox' },
                                    React.createElement('input', { name: 'colour', type: 'radio', value: 'pink' }),
                                    React.createElement(
                                        'label',
                                        null,
                                        'Pink'
                                    )
                                )
                            ),
                            React.createElement(
                                'div',
                                { className: 'field' },
                                React.createElement(
                                    'div',
                                    { className: 'ui radio checkbox' },
                                    React.createElement('input', { name: 'colour', type: 'radio', value: 'red' }),
                                    React.createElement(
                                        'label',
                                        null,
                                        'Rot'
                                    )
                                )
                            )
                        ),
                        React.createElement(
                            'div',
                            { className: 'buttons' },
                            React.createElement(
                                'div',
                                { className: 'ui black reset button', onClick: this.closeModal },
                                'Abbrechen'
                            ),
                            React.createElement(
                                'div',
                                { className: 'ui positive right labeled submit icon button' },
                                'Erstellen',
                                React.createElement('i', { className: 'checkmark icon' })
                            )
                        )
                    )
                )
            )
        );
    }

});

exports['default'] = MessageForm;
module.exports = exports['default'];
/* Modal */

},{}],8:[function(require,module,exports){
"use strict";

var _interopRequireWildcard = function (obj) { return obj && obj.__esModule ? obj : { "default": obj }; };

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _Message = require("./Message.jsx");

var _Message2 = _interopRequireWildcard(_Message);

var MessageList = React.createClass({
    displayName: "MessageList",

    handleDeleteMessage: function handleDeleteMessage(message) {
        this.props.submitDeleteMessage({
            id: message.id
        });
    },

    handleEditMessage: function handleEditMessage(message) {
        this.props.openEditMessageForm({
            message: message
        });
    },

    render: function render() {

        var messageNodes = $.map(this.props.data, (function (message, index) {
            return React.createElement(_Message2["default"], { key: message.id, id: message.id, title: message.title, content: message.content, colour: message.colour,
                onDeleteMessage: this.handleDeleteMessage, onEditMessage: this.handleEditMessage });
        }).bind(this));

        return React.createElement(
            "div",
            { className: "message-list" },
            React.createElement(
                "div",
                { className: "ui top attached segment" },
                messageNodes
            )
        );
    }
});

exports["default"] = MessageList;
module.exports = exports["default"];

},{"./Message.jsx":5}],9:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var SemanticAnimations = function SemanticAnimations() {
    _classCallCheck(this, SemanticAnimations);

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

exports['default'] = SemanticAnimations;
module.exports = exports['default'];

},{}],10:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, '__esModule', {
  value: true
});
var SemanticTest = React.createClass({
  displayName: 'SemanticTest',

  componentDidMount: function componentDidMount() {
    $('#new-message').modal('setting', 'transition', 'vertical flip').modal('attach events', '.new-message.button', 'show');
  },

  render: function render() {
    return React.createElement(
      'div',
      null,
      React.createElement(
        'div',
        { className: 'ui top attached segment' },
        React.createElement(
          'div',
          { className: 'ui warning message' },
          React.createElement('i', { className: 'close icon' }),
          React.createElement(
            'div',
            { className: 'header' },
            'You must register before you can do that!'
          ),
          'Visit our registration page, then try again'
        ),
        React.createElement('div', { className: 'ui divider' }),
        React.createElement(
          'div',
          { className: 'ui info message' },
          React.createElement('i', { className: 'close icon' }),
          React.createElement(
            'div',
            { className: 'header' },
            'You must register before you can do that!'
          ),
          'Visit our registration page, then try again'
        )
      ),
      React.createElement(
        'div',
        { className: 'new-message ui bottom attached blue button' },
        'Neue Nachricht erstellen'
      ),
      '// @todo: Eigene Komponente inkl. AJAX Abfragen (CSRF Token über die Meta-Tag Idee).',
      React.createElement(
        'div',
        { id: 'new-message', className: 'ui modal' },
        React.createElement(
          'div',
          { className: 'header' },
          'Neue Nachricht'
        ),
        React.createElement(
          'div',
          { className: 'content' },
          React.createElement(
            'div',
            { className: 'ui medium image' },
            React.createElement('img', { src: '/images/avatar/large/chris.jpg' })
          ),
          React.createElement(
            'div',
            { className: 'description' },
            React.createElement(
              'div',
              { className: 'ui header' },
              'We\'ve auto-chosen a profile image for you.'
            ),
            React.createElement(
              'p',
              null,
              'We\'ve grabbed the following image from the ',
              React.createElement(
                'a',
                { href: 'https://www.gravatar.com', target: '_blank' },
                'gravatar'
              ),
              ' image associated with your registered e-mail address.'
            ),
            React.createElement(
              'p',
              null,
              'Is it okay to use this photo?'
            )
          )
        ),
        React.createElement(
          'div',
          { className: 'actions' },
          React.createElement(
            'div',
            { className: 'ui black button' },
            'Abbrechen'
          ),
          React.createElement(
            'div',
            { className: 'ui positive right labeled icon button' },
            'Erstellen',
            React.createElement('i', { className: 'checkmark icon' })
          )
        )
      )
    );
  }

});

exports['default'] = SemanticTest;
module.exports = exports['default'];

},{}]},{},[1]);
