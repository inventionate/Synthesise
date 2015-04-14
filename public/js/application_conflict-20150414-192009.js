(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _interopRequireWildcard = function (obj) { return obj && obj.__esModule ? obj : { "default": obj }; };

// Vanilla JS

var _Analytics = require("./Components/Analytics.js");

var _Analytics2 = _interopRequireWildcard(_Analytics);

var _SemanticAnimations = require("./Components/SemanticAnimations.js");

var _SemanticAnimations2 = _interopRequireWildcard(_SemanticAnimations);

// React JS Components

var _Messages = require("./Components/Messages.jsx");

var _Messages2 = _interopRequireWildcard(_Messages);

var _InteractiveVideo = require("./Components/InteractiveVideo.jsx");

var _InteractiveVideo2 = _interopRequireWildcard(_InteractiveVideo);

var _Statistic = require("./Components/Statistic.jsx");

var _Statistic2 = _interopRequireWildcard(_Statistic);

$(document).ready(function () {

    new _Analytics2["default"]();

    new _SemanticAnimations2["default"]();

    // @todo Nachrichten AJAX programmieren
    React.render(React.createElement(_Messages2["default"], null), document.getElementById("messages-manage"));

    // @todo Interaktives Video erstellen
    React.render(React.createElement(_InteractiveVideo2["default"], null), document.getElementById("interactive-video"));

    // Statistik ausgeben (mehrere Module mit variablen Einstellungen)
    React.render(React.createElement(_Statistic2["default"], null), document.getElementById("statistic-plays"));
});

},{"./Components/Analytics.js":2,"./Components/InteractiveVideo.jsx":3,"./Components/Messages.jsx":4,"./Components/SemanticAnimations.js":5,"./Components/Statistic.jsx":6}],2:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var Analytics = function Analytics() {
    _classCallCheck(this, Analytics);

    $(document).on('click', '.download-paper', function () {
        var name;
        name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Text', 'Downloaded', name]);
    });

    $(document).on('click', '.download-further-literature', function () {
        var name;
        name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Weiterführende Literaturhinweise', 'Downloaded', name]);
    });

    $(document).on('click', '.download-info', function () {
        var name;
        name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Informationsdokument', 'Downloaded', name]);
    });

    $(document).on('click', '.download-note', function () {
        var name;
        name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Notizen', 'Downloaded', name]);
    });

    $(document).on('click', '.monja', function () {
        alert('Monja is crying!');
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

    componentDidMount: function componentDidMount() {},

    render: function render() {
        return React.createElement(
            "div",
            null,
            React.createElement(
                "h1",
                null,
                "Test"
            )
        );
    }

});

exports["default"] = InteractiveVideo;
module.exports = exports["default"];

// <video id="demo" class="video-js vjs-sublime-skin vjs-big-play-centered"
//     poster="/img/ol_title.jpg"
//     data-setup='{ "controls": true, "autoplay": false, "preload": "auto", "width": "100%", "height": "100%" }'>
//     @if( App::environment() === 'production' )
//         @if( Agent::isMobile() || Agent::isTablet() )
//             <source type="video/webm" src="{{ $videopath . '_small' }}.webm">
//             <source type="video/mp4" src="{{ $videopath . '_small' }}.mp4">
//         @elseif( !(stristr($_SERVER['HTTP_USER_AGENT'], 'Safari')) || stristr($_SERVER['HTTP_USER_AGENT'], 'Chrome') )
//             <source type="video/webm" src="{{ $videopath }}.webm">
//         @endif
//         <source type="video/mp4" src="{{ $videopath }}.mp4">
//     @else
//         <source type="video/mp4" src="{{ asset('video') . '/' . Parser::normalizeName($videoname) }}.mp4">
//     @endif
// </video>
// <video id="videoplayer" class="video-js vjs-sublime-skin vjs-big-play-centered" ></video>
// <img src="/img/etpm_logo.png" />

},{}],4:[function(require,module,exports){
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
                    React.createElement(
                        'div',
                        { className: 'header' },
                        'You must register before you can do that!'
                    ),
                    'Visit our registration page, then try again'
                ),
                React.createElement(
                    'div',
                    { className: 'right attached ui icon button' },
                    React.createElement('i', { className: 'edit icon' })
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
//
// {{ count($messages) }}
//
// {{--
// <div class="panel-group" id="accordion-message">
//   <div class="panel panel-default">
//     <div class="panel-heading">
//       <h4 class="panel-title">
//         <a data-toggle="collapse" data-parent="#accordion-message" href="#collapse-current-messages">
//           Nachrichten editieren <span class="badge"></span>
//         </a>
//       </h4>
//     </div>
//     <div id="collapse-current-messages" class="panel-collapse collapse @if ( Session::has('success') ) in @endif">
//       <div class="panel-body">
//         <div id="current-messages">
//         @foreach ($messages as $message)
//           <div class ="message">
//             <div class="alert alert-{{ $message->type }}" role="alert">
//               {{Session::reflash()}}
//               --}}
//               {{-- DELETE FORM --}}
//               {{--{!! Form::open(['id' => 'message-delete-'. $message->id, 'url' => 'api/v1/messages/' . $message->id, 'method' => 'DELETE', 'role' => 'form']) !!}
//
//                 {!! Form::button('<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>', ['type' => 'button', 'class' => 'close']) !!}
//
//               {!! Form::close() !!}
//               --}}
//
//               {{-- UPDATE MESSAGE --}}
//               {{--
//               {!! Form::open(['id' => 'message-update-'. $message->id, 'url' => 'api/v1/messages/' . $message->id, 'method' => 'PATCH', 'role' => 'form']) !!}
//
//                 {!! Form::label('message-content-'. $message->id, 'Messages', ['class' => 'hidden']) !!}
//                 {!! Form::textarea('message'. $message->id, $message->message, ['id' => 'message-content-'. $message->id, 'rows' => '3', 'maxlength' => '300', 'class' => 'form-control message-update-content']) !!}
//
//                 {!! Form::label('message-type-'. $message->id, 'Messages', ['class' => 'hidden']) !!}
//                 {!! Form::select('type', ['info' =>'Information', 'warning' => 'Warnung', 'danger' => 'Wichtig'], $message->type, ['id' => 'message-type-'. $message->id, 'class' => 'message-update-type']) !!}
//                 --}}
//                 {{-- Automatisches Senden beim Verändern des Inhalts (vgl. Notes) --}}
//                 {{--
//               {!! Form::close() !!}
//
//             </div>
//             <div class="ajax-info-{{ $message->id }} progress">
//               <div class="progress-bar progress-bar-success"  role="progressbar" style="width: 100%;"></div>
//               --}}
//               {{-- @todo Auch Screenreder-Info aktualisieren. --}}
//               {{--
//               <span class="sr-only">Aktualisiert</span>
//             </div>
//           </div>
//         @endforeach
//         </div>
//       </div>
//     </div>
//   </div>
//   <div class="panel panel-default">
//     <div class="panel-heading">
//       <h4 class="panel-title">
//         <a data-toggle="collapse" data-parent="#accordion-message" href="#collapse-new-message">
//           Neue Nachrichten erstellen
//         </a>
//       </h4>
//     </div>
//     <div id="collapse-new-message" class="panel-collapse collapse">
//       <div class="panel-body">
//         <div id="new-message">
//           <div class="alert alert-info" role="alert">
//               --}}
//             {{-- @todo Error visualisieren bei fehlerhafter Validierung --}}
//               {{-- STORE FORM --}}
//               {{--
//               {!! Form::open(['id' => 'message-store', 'url' => 'api/v1/messages','role' => 'form']) !!}
//                 {!! Form::label('message-new-content', 'Messages', ['class' => 'hidden']) !!}
//                 {!! Form::textarea('message', '', ['rows' => '3', 'maxlength' => '300', 'class' => 'form-control', 'placeholder' => 'Geben Sie eine neue Nachricht ein.', 'id' => 'message-new-content', 'required']) !!}
//
//                 {!! Form::label('message-type', 'Messages', ['class' => 'hidden']) !!}
//                 {!! Form::select('type', ['info' =>'Information', 'warning' => 'Warnung', 'danger' => 'Wichtig']) !!}
//
//                 {!! Form::submit('Erstellen') !!}
//               {!! Form::close() !!}
//           </div>
//         </div>
//       </div>
//     </div>
//   </div>
// </div> --}}

exports['default'] = SemanticTest;
module.exports = exports['default'];

},{}],5:[function(require,module,exports){
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

    $('.ui.message.shake').transition('shake');
};

exports['default'] = SemanticAnimations;
module.exports = exports['default'];

},{}],6:[function(require,module,exports){
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
