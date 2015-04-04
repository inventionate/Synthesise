var HelloWorld = require("./HelloWorld.jsx");
var WelcomeAlert = require("./WelcomeAlert.js");

React.render(<HelloWorld />, document.getElementById("react"));

$( document ).ready(function() {
    new WelcomeAlert();
});
