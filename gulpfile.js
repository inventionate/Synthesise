var elixir = require('laravel-elixir');

require('laravel-elixir-modernizr');

elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir( function (mix) {
    mix
    // Styles
    .less("application.less")
    // Scripts
    .browserify("application.js")
    // Symbolschriftarten
    .copy(
        "resources/assets/semantic/dist/themes/default/assets/fonts",
        "public/css/themes/default/assets/fonts"
    )
    .copy(
        "node_modules/video.js/dist/font",
        "public/css/font"
    )
    .copy(
        "node_modules/video.js/dist/video-js.swf",
        "public"
    )
    // Für die lokale Versionen
    .copy(
        "resources/assets/semantic/dist/themes/default/assets/fonts",
        "public/build/css/themes/default/assets/fonts")
    .copy(
        "node_modules/video.js/dist/font",
        "public/build/css/font")
    .modernizr()
    // Version hash
    .version([
        "public/css/application.css",
        "public/js/application.js",
        "public/js/vendor/modernizr-custom.js"
    ])
    .browserSync({ proxy: 'synthesise.local'});
});
