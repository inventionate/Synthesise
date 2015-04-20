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

    new _Analytics2["default"]();

    new _SemanticAnimations2["default"]();

    // @todo ReactKomponenten ggf. anders laden!
    if ($("#interactive-video").length) {
        var name = $("#interactive-video").attr("data-name");
        React.render(React.createElement(_InterativeVideo2["default"], { name: name }), document.getElementById("interactive-video"));
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

},{"./Components/Analytics.js":2,"./Components/InteractiveVideo.jsx":3,"./Components/MessageBox.jsx":5,"./Components/SemanticAnimations.js":8,"./Components/Statistic.jsx":9}],2:[function(require,module,exports){
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
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});
var InteractiveVideo = React.createClass({
    displayName: "InteractiveVideo",

    //Aktuelles Video über ein data-attribut abfragen!
    getDefaultProps: function getDefaultProps() {
        return {
            name: "/video/mittelalter"
        };
    },

    componentDidMount: function componentDidMount() {
        var videoplayer = videojs("videoplayer");
        videoplayer.markers({
            markers: [{ time: 60, text: "this" }, { time: 140, text: "is" }, { time: 400, text: "so" }, { time: 800, text: "cool!" }]
        });
    },

    render: function render() {
        return React.createElement(
            "div",
            null,
            React.createElement(
                "video",
                { id: "videoplayer", className: "video-js vjs-sublime-skin vjs-big-play-centered",
                    poster: "/img/ol_title.jpg",
                    "data-setup": "{ \"controls\": true, \"autoplay\": false, \"preload\": \"auto\", \"width\": \"100%\", \"height\": \"100%\" }"
                },
                React.createElement("source", { type: "video/mp4", src: this.props.name.toString() + ".mp4" }),
                React.createElement("source", { type: "video/webm", src: this.props.name.toString() + ".webm" })
            ),
            React.createElement("img", { src: "/img/etpm_logo.png" })
        );
    }

});

exports["default"] = InteractiveVideo;
module.exports = exports["default"];

},{}],4:[function(require,module,exports){
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

    render: function render() {

        var messageClass = "ui " + this.props.colour + " message";

        return React.createElement(
            "div",
            { className: "message" },
            React.createElement(
                "div",
                { className: messageClass },
                React.createElement("i", { className: "close icon", onClick: this.deleteMessage }),
                React.createElement("i", { className: "edit icon" }),
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

},{}],5:[function(require,module,exports){
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
            data: []
        };
    },

    loadMessagesFromServer: function loadMessagesFromServer() {
        $.ajax({
            url: this.props.url,
            dataType: "json",
            success: (function (data) {
                this.setState({ data: data });
            }).bind(this),
            error: (function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }).bind(this)
        });
    },

    createNewMessageOnServer: function createNewMessageOnServer(message) {
        // Optimistische updates um Geschwindigkeit zu simulieren

        // Aktuelle Daten abfragen
        var messages = this.state.data;

        var newID = 1;

        console.log(messages.length);

        // Auf aktuelle Daten zugreifen, ID auslesen und erhöhen
        if (messages.length > 0) {
            newID = messages[messages.length - 1].id + 1;
        }

        // Wahrscheinliche ID der neuen Nachricht hinzufügen
        message.id = newID;

        // Neue komponente anhängen
        var newMessages = messages.concat([message]);

        // Datensatz aktualisieren
        this.setState({ data: newMessages });

        // Asynchrone Abfrage
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

    componentDidMount: function componentDidMount() {
        // CSRF Token abfragenu
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")
            }
        });

        this.loadMessagesFromServer();
        // @todo Momentan wird "Long Polling" verwendet. Irgendwann wäre es ggf. sinnvoll auf WebSockets umzusteigen.
        setInterval(this.loadMessagesFromServer, this.props.pollInterval);
    },

    // Hier eine Ajaxabfrage einbauen.

    render: function render() {
        return React.createElement(
            "div",
            { className: "message-box" },
            React.createElement(
                "h1",
                { className: "hide" },
                "Nachrichten"
            ),
            React.createElement(_MessageList2["default"], { data: this.state.data, submitDeleteMessage: this.deleteMessageFromServer }),
            React.createElement(_MessageForm2["default"], { onSubmitNewMessage: this.createNewMessageOnServer })
        );
    }

});

exports["default"] = MessageBox;
module.exports = exports["default"];

},{"./MessageForm.jsx":6,"./MessageList.jsx":7}],6:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, '__esModule', {
    value: true
});
var MessageForm = React.createClass({
    displayName: 'MessageForm',

    getInitialState: function getInitialState() {
        return {
            colour: 'default'
        };
    },

    componentDidMount: function componentDidMount() {
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
            onChecked: (function () {

                // Ausgewählte Farbe abfragen und Auswahl zurücksetzen
                var colour = $('.ui.radio.checkbox.checked input').val();
                $('.ui.radio.checkbox.checked').removeClass('checked');

                // Farbe festlegen
                this.setState({
                    colour: colour
                });
            }).bind(this)
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
                $('#new-message').modal('hide');
            }).bind(this)
        }).submit(function (event) {
            // Standardevent verhindern (wie wird der event aber übergeben durch Success?)
            return event.preventDefault();
        });
    },

    openModal: function openModal() {
        $('#new-message').modal('show');
    },

    closeModal: function closeModal() {
        $('#new-message').modal('hide');
    },

    handleSubmit: function handleSubmit() {
        // Variablenwerte auslesen
        var title = React.findDOMNode(this.refs.title).value.trim();
        var content = React.findDOMNode(this.refs.content).value.trim();

        // Callback Datensatz
        this.props.onSubmitNewMessage({
            title: title,
            content: content,
            colour: this.state.colour
        });

        // Auf den Ausgangsstatus zurücksetzen
        this.replaceState(this.getInitialState());

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
                        { className: 'ui form', onSubmit: this.handleSubmit },
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
                            React.createElement('textarea', { name: 'content', placeholder: 'Nachricht eingeben.', ref: 'content' })
                        ),
                        React.createElement(
                            'div',
                            { className: 'inline fields' },
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
                                { className: 'ui black', onClick: this.closeModal },
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

},{}],7:[function(require,module,exports){
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

    render: function render() {

        var messageNodes = $.map(this.props.data, (function (message, index) {
            return React.createElement(_Message2["default"], { key: message.id, id: message.id, title: message.title, content: message.content, colour: message.colour, onDeleteMessage: this.handleDeleteMessage });
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

},{"./Message.jsx":4}],8:[function(require,module,exports){
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

    $('#edit-lection').modal('setting', 'transition', 'vertical flip').modal('attach events', 'td.edit > div.ui.button', 'show');

    $('td.edit > div.ui.button').click(function () {

        var name = $(this).attr('data-name');
        $('#edit-lection-name').attr('placeholder', name);

        var lecturer = $(this).attr('data-lecturer');
        $('#edit-lection-lecturer').attr('placeholder', lecturer);

        var section = $(this).attr('data-section');
        $('#edit-lection-section').attr('placeholder', section);
    });
};

exports['default'] = SemanticAnimations;
module.exports = exports['default'];

},{}],9:[function(require,module,exports){
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
