/* global require, module */

var EmberApp = require('ember-cli/lib/broccoli/ember-app');

var pickFiles = require('broccoli-static-compiler');

var app = new EmberApp();

// Use `app.import` to add additional libraries to the generated
// output files.
//
// If you need to use different assets in different
// environments, specify an object as the first parameter. That
// object's keys should be the environment name and the values
// should be the asset to use in that environment.
//
// If the library that you are including contains AMD or ES6
// modules that you would like to import into your application
// please specify an object with the list of modules as keys
// along with the exports of each module as its value.

// Modernizr js import.
app.import('bower_components/modernizr/modernizr.js');

// Bootstrap js import.
app.import('bower_components/bootstrap/dist/js/bootstrap.js');

// Bootstrap css import.
app.import('bower_components/bootstrap/dist/css/bootstrap.css');

// Animate css import.
app.import('bower_components/animate.css/animate.css');

// Put the bootstrap fonts in the place that the bootstrap css expects to find them.
var bootstrapFonts = pickFiles('bower_components/bootstrap/fonts', {
  srcDir: '/',
  destDir: '/assets/fonts'
})

// Put the flash file in the place that flowplayer expects to find it.
var flowplayerFlash = pickFiles('bower_components/flowplayer', {
  srcDir: '/',
  files: ['flowplayer.swf'],
  destDir: '/assets/flash'
})

// // Merge the bootstrapFonts with the ember app tree

module.exports = app.toTree([flowplayerFlash,bootstrapFonts]);
