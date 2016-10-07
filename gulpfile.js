var elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');
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
    .webpack("application.js")
    // Symbolschriftarten
    .copy(
        "node_modules/semantic-ui-css/themes/default/assets/fonts",
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
    .copy(
        "node_modules/trumbowyg/dist/ui/icons.svg",
        "public/css/icons"
    )
    .modernizr();
    if(elixir.config.production) {
        mix.version([
            "public/css/application.css",
            "public/js/application.js",
            "public/js/vendor/modernizr-custom.js"
        ])
        .copy(
            "node_modules/semantic-ui-css/themes/default/assets/fonts",
            "public/build/css/themes/default/assets/fonts"
        )
        .copy(
            "node_modules/video.js/dist/font",
            "public/build/css/font"
        );
    } else {
        mix.browserSync({
            proxy: 'etpm.dev'
        });
    }
});
