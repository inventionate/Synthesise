(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _interopRequireWildcard = function (obj) { return obj && obj.__esModule ? obj : { "default": obj }; };

var _HelloWorld = require("./HelloWorld.jsx");

var _HelloWorld2 = _interopRequireWildcard(_HelloWorld);

var _Analytics = require("./Analytics.js");

var _Analytics2 = _interopRequireWildcard(_Analytics);

var _Test = require("./Test.js");

var _Test2 = _interopRequireWildcard(_Test);

React.render(React.createElement(_HelloWorld2["default"], null), document.getElementById("react"));

$(document).ready(function () {
    new _Analytics2["default"]();
    var Mnews = new _Test2["default"]("Monja", "Santner-Mundt");
    alert(Mnews.info());
    var Fnews = new _Test2["default"]("Fabian", "Mundt");
    alert(Fnews.info());
});

},{"./Analytics.js":2,"./HelloWorld.jsx":3,"./Test.js":4}],2:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var Analytics =

// Dreckige Konvertierung des bestehenden Codes in einen modularen Umgang.

function Analytics() {
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
var HelloWorld = React.createClass({
    displayName: "HelloWorld",

    render: function render() {
        return React.createElement(
            "div",
            null,
            React.createElement(
                "h1",
                null,
                "Cool Stuff"
            ),
            React.createElement(
                "h2",
                null,
                "Dann testen wir mal die Integration der bisherigen Skripte."
            )
        );
    }

});

exports["default"] = HelloWorld;
module.exports = exports["default"];

},{}],4:[function(require,module,exports){
"use strict";

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

Object.defineProperty(exports, "__esModule", {
    value: true
});

var Test = (function () {
    function Test(name, surname) {
        _classCallCheck(this, Test);

        this.name = name;
        this.surname = surname;
    }

    _createClass(Test, [{
        key: "info",
        value: function info() {

            return (this.name + " " + this.surname).toString();
        }
    }]);

    return Test;
})();

exports["default"] = Test;
module.exports = exports["default"];

},{}]},{},[1]);
