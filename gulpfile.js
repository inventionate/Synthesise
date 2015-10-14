var gulp = require('gulp'),
    rsync = require('gulp-rsync'),
    GulpSSH = require('gulp-ssh'),
    fs = require('fs'),
    runSequence = require('run-sequence');

var config = {
  host: 'etpm.ph-karlsruhe.de',
  username: 'etpm',
  privateKey: fs.readFileSync('/home/vagrant/.ssh/id_rsa')
};


var gulpSSH = new GulpSSH({
  ignoreErrors: false,
  sshConfig: config
});

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

var paths_deploy = [
    '!**/.tags',
    '!**/.tags1',
    '!**/.gitignore',
    'app/**',
    'bootstrap/**',
    'config/**',
    'database/**',
    // public wird wegen dem symbolischen Link gesondert übertragen
    '!public/**',
    'resources/lang/**',
    'resources/views/**',
    'storage/**',
    '!storage/logs/**',
    '!storage/framework/views/**',
    '!storage/test.sqlite',
    '.env.production',
    'artisan',
    'composer.json',
    'server.php'
];
gulp.task('deploy-start', function () {
  return gulpSSH
    .shell(['art down']);
});

gulp.task('deploy-app', function() {
    return gulp.src(paths_deploy)
    // Deploy changes.
    .pipe(rsync({
        hostname: 'etpm.ph-karlsruhe.de',
        username: 'etpm',
        destination: '/home/etpm/'
    }));
});

gulp.task('deploy-public', function() {
    return gulp.src([
        'public/**',
        'public/.htaccess',
        '!public/video/**'
    ])
    // Deploy changes.
    .pipe(rsync({
        hostname: 'etpm.ph-karlsruhe.de',
        username: 'etpm',
        root: 'public',
        destination: '/srv/www/vhosts/etpm.ph-karlsruhe.de/'
    }));
});

gulp.task('deploy-end', function () {
  return gulpSSH
    .shell([
        'mv /home/etpm/.env.production /home/etpm/.env',
        'composer update --no-dev',
        'art view:clear',
        'art cache:clear',
        'art route:cache',
        'art config:cache',
        'art up',
    ]);
});

gulp.task('deploy', function() {
    return runSequence(
        'deploy-start',
        'deploy-app',
        'deploy-public',
        'deploy-end'
    );
});
