var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    // Styles
    mix.less("application.less")
    // Modernizr
    .copy("vendor/bower_components/modernizr/modernizr.js","public/js/modernizr.js")
    // Vendor Scripts
    .scripts([
        "react/react.js",
        "jquery/dist/jquery.js",
        "semantic-ui/dist/semantic.js",
        "flowplayer/flowplayer.js",
        "jquery-typewatch/jquery.typewatch.js",
        "chartjs/Chart.js"
    ], "public/js/vendor.js", "vendor/bower_components")
    // Application Components
    .browserify("application.js","public/js/application.js", "resources/assets/js")
    // Images
    .copy('resources/assets/img', 'public/img')
    // Version hash
    .version([
        "css/application.css",
        "js/modernizr.js",
        "js/application.js",
        "js/vendor.js"
    ]);
});
