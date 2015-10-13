// var gulp = require('gulp');
// var rsync = require('gulp-rsync');
// var GulpSSH = require('gulp-ssh');
// var ssh_config = {
//   host: 'etpm.ph-karlsruhe.de',
// }
//
// var ssh = new GulpSSH({
//   ignoreErrors: false,
//   sshConfig: ssh_config
// });

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

/*
 |--------------------------------------------------------------------------
 | RSync Deploy Management
 |--------------------------------------------------------------------------
 |
 | RSync based deployment.
 |
 */

//  var paths_deploy = [
//      'app/**',
//      'bootstrap/**',
//      'config/**',
//      'database/**',
//      'public/**',
//      'resources/lang/**',
//      'resources/views/**',
//      'storage/**',
//      '!storage/test.sqlite',
//      '.env.production',
//      'artisan.phar',
//      'composer.json',
//      'server.php'
// ];
//
// gulp.task('deploy', function() {
//     return gulp.src(paths_deploy)
//     // Put the application into maintenance mode.
//     .pipe(ssh.shell([
//         'art down'
//     ]))
//     // Deploy changes.
//     .pipe(rsync({
//         hostname: ssh_config.host,
//         destination: '/home/etpm/'
//     }))
//     // Optimize the application and bring it out of maintenance mode.
//     .pipe(ssh.shell([
//         'mv /home/etpm/.env.production /home/etpm/.env',
//         'composer update',
//         'art view:clear',
//         'art cache:clear',
//         'art route:cache',
//         'art config:cache',
//         'art up'
//     ]));
// });
