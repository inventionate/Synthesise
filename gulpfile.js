var elixir = require('laravel-elixir');

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
        // Modernizr (Minifizierung einarbeiten über scripts)
        .copy("vendor/bower_components/modernizr/modernizr.js","public/js/modernizr.js")
        // Vendor Scripts
        .scripts([
            "react/react.js",
            "jquery/dist/jquery.js",
            "semantic-ui/dist/semantic.js",
            "video.js/dist/video-js/video.js",
            "videojs-markers/dist/videojs-markers.js",
            "jquery-typewatch/jquery.typewatch.js",
            "chartjs/Chart.js"
        ], "public/js/vendor.js", "vendor/bower_components")
        // Application Components
        .browserify("application.js")
        // Version hash
        .version([
                "public/css/application.css",
                "public/js/modernizr.js",
                "public/js/application.js",
                "public/js/vendor.js"
            ])
        .copy("vendor/bower_components/semantic-ui/dist/themes/default/assets/fonts","public/css/themes/default/assets/fonts")
        .copy("vendor/bower_components/video.js/dist/video-js/font","public/css/font")
        .copy("vendor/bower_components/video.js/dist/video-js/video-js.swf","public")
        // Für die lokale Versionen
        .copy("vendor/bower_components/semantic-ui/dist/themes/default/assets/fonts","public/build/css/themes/default/assets/fonts")
        .copy("vendor/bower_components/video.js/dist/video-js/font","public/build/css/font");
    });
