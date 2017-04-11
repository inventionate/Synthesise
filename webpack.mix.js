const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/application.js', 'public/js')
    .extract(['vue', 'jquery', 'sweetalert', 'video.js'])
    .less('resources/assets/less/application.less', 'public/css')
    .copy(
        "node_modules/video.js/dist/video-js.swf",
        "public"
    )
    .version();
    //.browserSync('my-domain.dev');
