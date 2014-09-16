//////////////////////////////////////////////////
// REQUIRE
//////////////////////////////////////////////////

var gulp = require('gulp'),

// JS
  jshint = require('gulp-jshint'),
  uglify = require('gulp-uglify'),
  coffee = require('gulp-coffee'),

// CSS
  less = require('gulp-less'),
  prefixer = require('gulp-autoprefixer'),
  minifycss = require('gulp-minify-css'),

// IMAGE
  imagemin = require('gulp-imagemin'),

// UTIL
  concat = require('gulp-concat'),
  rename = require('gulp-rename'),
  rev = require('gulp-rev'),
  clean = require('gulp-clean'),
  changed = require('gulp-changed'),
  newer = require('gulp-newer'),
  fingerprint = require('gulp-fingerprint'),

  // DEV
  notify = require('gulp-notify'),
  livereload = require('gulp-livereload'),
  ssh = require("gulp-shell");


//////////////////////////////////////////////////
// PATHS
//////////////////////////////////////////////////

var paths = {
  app: {
    assets: 'app/assets',
    build: 'app/assets/build'
  },

  public: 'public',

  bower: {
    // TODO: Automatisch laden
    addToHomescreen: 'bower_components/add-to-homescreen',
    animate: 'bower_components/animate.css',
    bootstrap: 'bower_components/bootstrap',
    flowplayer: 'bower_components/flowplayer',
    html5boilerplate: 'bower_components/html5-boilerplate',
    iframeResizer: 'bower_components/iframe-resizer',
    jquery: 'bower_components/jquery',
    modernizr: 'bower_components/modernizr',
    respond: 'bower_components/respond',
    jqueryTypewatch: 'bower_components/jquery-typewatch',
    livereload: 'bower_components/livereload/dist/livereload.js',
    spinjs: 'bower_components/spin.js'
  },

  composer: {
    turbolinks: 'vendor/helthe/turbolinks/Resources/public/js'
  }

};


//////////////////////////////////////////////////
// Rev Manifest
//////////////////////////////////////////////////

var manifest = require('./app/assets/rev-manifest.json');

//////////////////////////////////////////////////
// SSH Secret
//////////////////////////////////////////////////

var secret = require('./secret.json');

//////////////////////////////////////////////////
// JS Tasks
//////////////////////////////////////////////////

var libs = [
  paths.bower.modernizr + '/modernizr.js',
  paths.bower.respond + 'respond.src.js',
  paths.bower.spinjs + '/spin.js',
  paths.bower.jquery + '/dist/jquery.js',
  paths.composer.turbolinks + '/jquery.turbolinks.js',
  // Specific order required by Bootstrap
  paths.bower.bootstrap + '/js/transition.js',
  paths.bower.bootstrap + '/js/alert.js',
  // paths.bower.bootstrap + '/js/button.js',
  // paths.bower.bootstrap + '/js/carousel.js',
  paths.bower.bootstrap + '/js/collapse.js',
  paths.bower.bootstrap + '/js/dropdown.js',
  // paths.bower.bootstrap + '/js/modal.js',
  paths.bower.bootstrap + '/js/tooltip.js',
  // paths.bower.bootstrap + '/js/popover.js',
  // paths.bower.bootstrap + '/js/scrollspy.js',
  // paths.bower.bootstrap + '/js/tab.js',
  // paths.bower.bootstrap + '/js/affix.js',
  paths.bower.html5boilerplate + '/js/plugins.js',
  // jQuery Plugins
  paths.bower.jqueryTypewatch + '/jquery.typewatch.js',
  paths.bower.spinjs + '/jquery.spin.js'
  ];

gulp.task('js:vendor', function()
{
  return gulp.src(libs)
    .pipe(concat('application.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.app.build + '/js'));
});


gulp.task('js:turbolinks', function()
{
  return gulp.src(paths.composer.turbolinks + '/turbolinks.js')
    .pipe(newer(paths.app.build + '/js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.app.build + '/js'));
});

gulp.task('js:iframeResizer', function()
{
  return gulp.src(paths.bower.iframeResizer + '/src/iframeResizer.js')
    .pipe(newer(paths.app.build + '/js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.app.build + '/js'));
});

gulp.task('js:addToHomescreen', function()
{
  return gulp.src(paths.bower.addToHomescreen + '/src/addtohomescreen.js')
    .pipe(newer(paths.public + '/js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.app.build + '/js'));
});

gulp.task('coffee:build', function()
{
  return gulp.src(paths.app.assets + '/coffee/*.coffee')
    .pipe(newer(paths.app.build + '/js'))
    .pipe(coffee({bare: true}))
    .pipe(uglify())
    .pipe(gulp.dest(paths.app.build + '/js'))
});


//////////////////////////////////////////////////
// CSS Tasks
//////////////////////////////////////////////////

gulp.task('less:build', function () {
  return gulp.src([
    paths.app.assets + '/less/application.less',
    paths.bower.animate + '/animate.css'])
    .pipe(concat('application.less'))
    .pipe(less({
      paths: [
        paths.bower.bootstrap + '/less',
        paths.app.assets + '/less/*.less',
      ]}))
    .pipe(fingerprint(manifest, {prefix: '../'}))
    .pipe(minifycss())
    .pipe(gulp.dest(paths.app.build + '/css'))
});

//////////////////////////////////////////////////
// FONT Tasks
//////////////////////////////////////////////////

gulp.task('fonts:publish', ['publish:assets'], function () {
  return gulp.src(paths.bower.bootstrap + '/dist/fonts/*.*')
    .pipe(newer(paths.public + '/fonts'))
    .pipe(gulp.dest(paths.public + '/fonts'))
});

//////////////////////////////////////////////////
// IMG Tasks
//////////////////////////////////////////////////

gulp.task('img:build', function () {
  return gulp.src(paths.app.assets + '/img/*.*')
    .pipe(newer(paths.app.build + '/img'))
    .pipe(gulp.dest(paths.app.build + '/img'))
});

//////////////////////////////////////////////////
// PUBLISHING Tasks
/////////////////////////////////////////////////

gulp.task('publish:assets',
         ['clean:public','build:assets'], function ()
{
  return gulp.src(paths.app.build + '/**')
    .pipe(rev())
    .pipe(gulp.dest(paths.public))
    .pipe(rev.manifest())
    .pipe(gulp.dest(paths.app.assets));
});

gulp.task('publish', ['publish:assets','fonts:publish']);

//////////////////////////////////////////////////
// CLEAN Tasks
//////////////////////////////////////////////////

gulp.task('clean:build', function () {
  return gulp.src(paths.app.build,{read: false})
    .pipe(clean());
});

gulp.task('clean:public', function () {
  return gulp.src([
    paths.public + '/css',
    paths.public + '/js',
    paths.public + '/fonts',
    paths.public + '/img'
    ], {read: false})
    .pipe(clean());
});

//////////////////////////////////////////////////
// BUILD Tasks
//////////////////////////////////////////////////

gulp.task('build:assets', ['js:vendor',
                           'js:turbolinks',
                           'js:iframeResizer',
                           'js:addToHomescreen',
                           'coffee:build',
                           'less:build',
                           'img:build'
                          ]);

//////////////////////////////////////////////////
// LIVERELOAD Tasks
//////////////////////////////////////////////////

gulp.task('publish:lr', function()
{
  return gulp.src(paths.bower.livereload)
    .pipe(uglify())
    .pipe(gulp.dest(paths.public + '/js'));
});

gulp.task('clean:lr', function () {
  return gulp.src(paths.public + '/js/livereload.js',{read: false})
    .pipe(clean());
});

//////////////////////////////////////////////////
// WATCH Tasks
//////////////////////////////////////////////////

gulp.task('watch', function(){
  livereload.listen();
  gulp.watch([paths.app.assets + '/coffee/**/*.coffee',
              paths.app.assets + '/js/**/*.coffee',
              paths.app.assets + '/less/**/*.less',
              paths.app.assets + '/css/**/*.css',
              paths.app.assets + '/img/**/*.png',
              paths.app.assets + '/img/**/*.jpg',
              paths.app.assets + '/img/**/*.gif',
              './app/views/**/*'],
              ['publish'])
              .on('change', livereload.changed);
  // gulp.watch([paths.app.assets + '/img/**/*.png',
  //             paths.app.assets + '/img/**/*.jpg',
  //             paths.app.assets + '/img/**/*.gif'],
  //             ['img:build'])
  //             .on('change', livereload.changed);
})

//////////////////////////////////////////////////
// SSH/SFTP Tasks
//////////////////////////////////////////////////

// gulp.task('ssh:test', function () {
//   ssh.exec({
//     command: ['uptime', 'ls -a'],
//     sshConfig: {
//       host: secret.host,
//       port: 22,
//       username: secret.username,
//       password: secret.password
//     }
//   })
// });

//////////////////////////////////////////////////
// SHELL Tasks
//////////////////////////////////////////////////

//////////////////////////////////////////////////
// DEFAULT Tasks
//////////////////////////////////////////////////

gulp.task('default', ['watch']);
