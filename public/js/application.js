(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var HelloWorld = require("./HelloWorld.jsx");
var WelcomeAlert = require("./WelcomeAlert.js");

React.render(React.createElement(HelloWorld, null), document.getElementById("react"));

$(document).ready(function () {
    new WelcomeAlert();
});

},{"./HelloWorld.jsx":2,"./WelcomeAlert.js":3}],2:[function(require,module,exports){
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

},{}],3:[function(require,module,exports){
"use strict";

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } };

Object.defineProperty(exports, "__esModule", {
    value: true
});

var WelcomeAlert = function WelcomeAlert() {
    _classCallCheck(this, WelcomeAlert);

    alert("Hello!");
};

exports["default"] = WelcomeAlert;
module.exports = exports["default"];

},{}]},{},[1]);
