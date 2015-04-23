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
            "video.js/dist/video-js/video.dev.js",
            "videojs-markers/dist/videojs-markers.js",
            "jquery-typewatch/jquery.typewatch.js",
            "chartjs/Chart.js"
        ], "public/js/vendor.js", "vendor/bower_components")
        // Application Components
        .browserify("application.js","public/js/application.js", "resources/assets/js")
        .copy("vendor/bower_components/semantic-ui/dist/themes/default/assets/fonts","public/css/themes/default/assets/fonts")
        .copy("vendor/bower_components/video.js/dist/video-js/font","public/css/font")
        .copy("vendor/bower_components/video.js/dist/video-js/video-js.swf","public");
        // Version hash
        // In der aktuellen Version existiert ein minifaction Bug ("unspecified error" beim Gulpprozess).
        // if (elixir.config.production) {
            mix.version([
                "css/application.css",
                "js/modernizr.js",
                "js/application.js",
                "js/vendor.js"
            ])
            .copy("vendor/bower_components/semantic-ui/dist/themes/default/assets/fonts","public/build/css/themes/default/assets/fonts")
            .copy("vendor/bower_components/video.js/dist/video-js/font","public/build/css/font");
        //}
    });
