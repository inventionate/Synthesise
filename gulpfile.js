//////////////////////////////////////////////////
// GULP ASSET PIPELINE
//////////////////////////////////////////////////

/**
 * Gulp based Asset Pipeline.
 * Support Assets: CoffeeScript, LESS, Images.
 * No Notify support (incompatible with Vagrant).
 * Use callbacks for dependent tasks!
 *
 * copyright    Fabian Mundt
 */
//////////////////////////////////////////////////
// PLUGINS
//////////////////////////////////////////////////

var gulp        = require('gulp'),
    // JS
    uglify      = require('gulp-uglify'),
    coffee      = require('gulp-coffee'),
    // CSS
    less        = require('gulp-less'),
    prefix      = require('gulp-autoprefixer'),
    minifycss   = require('gulp-minify-css'),
    // IMAGE
    imagemin    = require('gulp-imagemin'),
    // UTIL
    concat      = require('gulp-concat'),
    rename      = require('gulp-rename'),
    rev         = require('gulp-rev'),
    rimraf      = require('gulp-rimraf'),
    changed     = require('gulp-changed'),
    newer       = require('gulp-newer'),
    fingerprint = require('gulp-fingerprint'),
    // DEV
    codecept    = require('gulp-codeception'),
    watch       = require('gulp-watch'),
    plumber     = require('gulp-plumber'),
    // Livereload
    livereload  = require('gulp-livereload');

//////////////////////////////////////////////////
// PATHS
//////////////////////////////////////////////////

var paths = {
  assets: 'resources/assets',

  build: 'resources/assets/build',

  tests: 'tests',

  public: 'public',

  bower: {
    // @todo Automatisch laden
    animate:    'bower_components/animate.css',
    bootstrap:  'bower_components/bootstrap',
    flowplayer: 'bower_components/flowplayer',
    jquery:     'bower_components/jquery',
    modernizr:  'bower_components/modernizr',
    qunit:      'bower_components/qunit',
    typewatch:  'bower_components/jquery-typewatch',
    livereload: 'bower_components/livereload/dist/livereload.js',
    spinjs:     'bower_components/spin.js',
    chartjs:    'bower_components/chartjs'
  }
};

//////////////////////////////////////////////////
// Rev Manifest
//////////////////////////////////////////////////

var manifest = require( './' + paths.assets + '/rev-manifest.json');

//////////////////////////////////////////////////
// SSH Secret
//////////////////////////////////////////////////

var secret = require('./secret.json');

//////////////////////////////////////////////////
// JS Tasks
//////////////////////////////////////////////////

var libs = [
    paths.bower.modernizr + '/modernizr.js',
    paths.bower.jquery + '/dist/jquery.js',
    paths.bower.spinjs + '/spin.js',
    paths.bower.bootstrap + '/dist/js/bootstrap.js',
    paths.bower.flowplayer + '/flowplayer.js',
    paths.bower.typewatch + '/jquery.typewatch.js',
    paths.bower.spinjs + '/jquery.spin.js',
    paths.bower.chartjs + '/Chart.js'
  ];

gulp.task('js:vendor', function(done) {
  gulp.src(libs)
    .pipe(newer(paths.build + '/js/libs/vendor.js'))
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest(paths.build + '/js'))
    .on('end', done);
});

gulp.task('coffee:build', function(done) {
  gulp.src(paths.assets + '/coffee/*.coffee')
    .pipe(newer(paths.build + '/js/cofee'))
    .pipe(coffee({bare: true}))
    .pipe(concat('frontend.js'))
    .pipe(gulp.dest(paths.build + '/js'))
    .on('end', done);
});

gulp.task('js:build', ['coffee:build','js:vendor'], function() {
  gulp.src([
      paths.build + '/js/vendor.js',
      paths.build + '/js/frontend.js'
    ])
    .pipe(newer(paths.build + '/js/application.js'))
    .pipe(concat('application.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.build + '/js'));
});

//////////////////////////////////////////////////
// CSS Tasks
//////////////////////////////////////////////////

gulp.task('less:build', function() {
  gulp.src([
    paths.bower.flowplayer + '/skin/minimalist.css',
    paths.bower.bootstrap + '/dist/css/bootstrap.css',
    paths.assets + '/less/application.less',
    paths.bower.animate + '/animate.css'
    ])
    .pipe(newer(paths.build + '/css/application.css'))
    .pipe(concat('application.less'))
    .pipe(less({
      paths: [
        paths.assets + '/less'
      ],
      }))
    .pipe(prefix())
    .pipe(fingerprint(manifest, {prefix: '../'}))
    .pipe(minifycss({keepSpecialComments:0}))
    .pipe(gulp.dest(paths.build + '/css'));
});

//////////////////////////////////////////////////
// FONT Tasks
//////////////////////////////////////////////////

gulp.task('publish:fonts', ['publish:assets','publish:flash'], function () {
  gulp.src(paths.bower.bootstrap + '/dist/fonts/*.*')
    .pipe(newer(paths.public + '/fonts'))
    .pipe(gulp.dest(paths.public + '/fonts'));
});

//////////////////////////////////////////////////
// COPY Tasks
//////////////////////////////////////////////////

gulp.task('publish:flash', function () {
  gulp.src(paths.bower.flowplayer + '/flowplayer.swf')
    .pipe(newer(paths.public + '/flash'))
    .pipe(gulp.dest(paths.public + '/flash'));
});

//////////////////////////////////////////////////
// IMG Tasks
//////////////////////////////////////////////////

gulp.task('img:build', function () {
  gulp.src([
    paths.assets + '/img/*',
    paths.bower.flowplayer +'/skin/img/*'
    ])
    .pipe(plumber())
    .pipe(newer(paths.build + '/img'))
    .pipe(imagemin())
    .pipe(gulp.dest(paths.build + '/img'));
});

//////////////////////////////////////////////////
// BUILD Tasks
//////////////////////////////////////////////////

gulp.task('build:assets', ['js:build','less:build','img:build']);

//////////////////////////////////////////////////
// PUBLISH Tasks
/////////////////////////////////////////////////

gulp.task('publish:assets', ['clean:public','build:assets'], function () {
  gulp.src([
    paths.build + '/**',
    '!' + paths.build + '/js/vendor.js',
    '!' + paths.build + '/js/frontend.js'
    ])
    .pipe(rev())
    .pipe(gulp.dest(paths.public))
    .pipe(rev.manifest())
    .pipe(gulp.dest(paths.assets));
});

gulp.task('publish', ['publish:fonts']);

//////////////////////////////////////////////////
// CLEAN Tasks
//////////////////////////////////////////////////

gulp.task('clean:build', function () {
  gulp.src(paths.build,{read: false})
    .pipe(rimraf());
});

gulp.task('clean:public', function () {
  gulp.src([
    paths.public + '/css',
    paths.public + '/js',
    paths.public + '/fonts',
    paths.public + '/img'
    ], {read: false})
    .pipe(rimraf());
});

//////////////////////////////////////////////////
// LIVERELOAD Tasks
//////////////////////////////////////////////////

gulp.task('publish:lr', function() {
  gulp.src(paths.bower.livereload)
    .pipe(newer(paths.public + '/js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.public + '/js'));
});

gulp.task('clean:lr', function () {
  gulp.src(paths.public + '/js/livereload.js',{read: false})
    .pipe(rimraf());
});

//////////////////////////////////////////////////
// WATCH Tasks
//////////////////////////////////////////////////

gulp.task('watch:assets', function() {
  gulp.watch([
    paths.assets + '/coffee/**/*.coffee',
    paths.assets + '/less/**/*.less',
    paths.assets + '/img/**/*.png',
    paths.assets + '/img/**/*.jpg',
    paths.assets + '/img/**/*.gif'
    ],
    ['publish:assets']);
})

gulp.task('watch:public', ['watch:assets','publish:lr'], function() {
  livereload.listen();
  gulp.watch([
    paths.public + '/js/**/*.js',
    paths.public + '/css/**/*.css',
    paths.public + '/img/**/*.png',
    paths.public + '/img/**/*.jpg',
    paths.public + '/img/**/*.gif',
    './app/views/**/*'
    ])
    .on('change', livereload.changed);
})

gulp.task('watch:tests', function() {
  gulp.watch(paths.tests + '/**/*.php', ['codecept']);
})

gulp.task('watch', ['watch:public']);

//////////////////////////////////////////////////
// CODECEPTION Tasks
//////////////////////////////////////////////////

gulp.task('codecept', function() {
  var options = {notify: false, testSuite: 'integration'};
  gulp.src('tests/**/*.php')
    .pipe(codecept('', options));
});

//////////////////////////////////////////////////
// QUNIT Tasks
//////////////////////////////////////////////////

gulp.task('publish:qunit', function() {
  gulp.src(paths.bower.qunit + '/qunit/*')
    .pipe(newer(paths.public + '/qunit'))
    .pipe(gulp.dest(paths.public + '/qunit'));
});

gulp.task('clean:qunit', function () {
  gulp.src(paths.public + '/qunit',{read: false})
    .pipe(rimraf());
});

//////////////////////////////////////////////////
// DEFAULT Tasks
//////////////////////////////////////////////////

gulp.task('default', ['watch:public']);
