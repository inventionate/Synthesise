//////////////////////////////////////////////////
// REQUIRE
//////////////////////////////////////////////////

var gulp = require('gulp'),
    // JS
    uglify = require('gulp-uglify'),
    coffee = require('gulp-coffee'),
    // CSS
    less = require('gulp-less'),
    prefix = require('gulp-autoprefixer'),
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
    shell = require("gulp-shell"),
    codecept = require('gulp-codeception'),
    watch = require('gulp-watch');

//////////////////////////////////////////////////
// PATHS
//////////////////////////////////////////////////

var paths = {
  app: {
    assets: 'app/assets',
    build: 'app/assets/build'
  },

  tests: 'tests',

  public: 'public_html',

  bower: {
    // @todo Automatisch laden
    animate: 'bower_components/animate.css',
    bootstrap: 'bower_components/bootstrap',
    flowplayer: 'bower_components/flowplayer',
    html5boilerplate: 'bower_components/html5-boilerplate',
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
    paths.bower.jquery + '/dist/jquery.js',
    paths.composer.turbolinks + '/jquery.turbolinks.js',
    paths.bower.html5boilerplate + '/js/plugins.js',
    // paths.bower.spinjs + '/spin.js',
    // Bootstrap
    // @todo Überlegen welche JS Module gelöscht werden können
    paths.bower.bootstrap + '/dist/js/bootstrap.js',
    // jQuery Plugins
    paths.bower.flowplayer + '/flowplayer.js',
    paths.bower.jqueryTypewatch + '/jquery.typewatch.js',
    // paths.bower.spinjs + '/jquery.spin.js'
  ];

gulp.task('js:vendor', function() {
  gulp.src(libs)
    .pipe(newer(paths.app.build + '/js/libs/vendor.js'))
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest(paths.app.build + '/js/libs'));
});


gulp.task('js:turbolinks', function() {
  gulp.src(paths.composer.turbolinks + '/turbolinks.js')
    .pipe(newer(paths.app.build + '/js/libs/turbolinks.js'))
    .pipe(gulp.dest(paths.app.build + '/js/libs'));
});

gulp.task('coffee:build', function() {
  gulp.src(paths.app.assets + '/coffee/*.coffee')
    .pipe(newer(paths.app.build + '/js/cofee'))
    .pipe(coffee({bare: true}))
    .pipe(gulp.dest(paths.app.build + '/js/coffee'));
});

// Die einzelnen JavaScript Pakete kombinieren
// Die Reihenfolge ist sehr wichtig!

var jsapp = [
    paths.app.build + '/js/libs/vendor.js',
    paths.app.build + '/js/coffee/*.js',
    paths.app.build + '/js/libs/turbolinks.js',
  ];

gulp.task('js:build', ['js:vendor','js:turbolinks','coffee:build'], function() {
  gulp.src(jsapp)
    .pipe(newer(paths.app.build + '/js/application.js'))
    .pipe(concat('application.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.app.build + '/js'));
});

//////////////////////////////////////////////////
// CSS Tasks
//////////////////////////////////////////////////

gulp.task('less:build', function () {
  gulp.src([
    paths.bower.flowplayer + '/skin/minimalist.css',
    paths.app.assets + '/less/application.less',
    paths.app.assets + '/less/helpers.less',
    paths.app.assets + '/less/typography.less',
    paths.app.assets + '/less/colour.less',
    paths.app.assets + '/less/layout.less',
    paths.app.assets + '/less/print.less',
    paths.bower.animate + '/animate.css'
    ])
    .pipe(newer(paths.app.build + '/css/application.css'))
    .pipe(concat('application.less'))
    .pipe(less({
      paths: [
        paths.bower.bootstrap + '/less',
        paths.app.assets + '/less'
      ]}))
    .pipe(prefix())
    .pipe(fingerprint(manifest, {prefix: '../'}))
    .pipe(minifycss({keepSpecialComments:0}))
    .pipe(gulp.dest(paths.app.build + '/css'));
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
    paths.app.assets + '/img/*.*',
    paths.bower.flowplayer +'/skin/img/*.png'])
    .pipe(newer(paths.app.build + '/img'))
    .pipe(imagemin())
    .pipe(gulp.dest(paths.app.build + '/img'));
});

//////////////////////////////////////////////////
// BUILD Tasks
//////////////////////////////////////////////////

gulp.task('build:assets', ['js:build','less:build','img:build']);

//////////////////////////////////////////////////
// PUBLISH Tasks
/////////////////////////////////////////////////

gulp.task('publish:assets', ['clean:public','build:assets'], function () {
  return gulp.src([
    paths.app.build + '/**',
    '!' + paths.app.build + '/js/coffee',
    '!' + paths.app.build + '/js/coffee/**',
    '!' + paths.app.build + '/js/libs',
    '!' + paths.app.build + '/js/libs/**'
    ])
    .pipe(rev())
    .pipe(gulp.dest(paths.public))
    .pipe(rev.manifest())
    .pipe(gulp.dest(paths.app.assets));
});

gulp.task('publish', ['publish:fonts'], function () {
  gulp.src('/')
    .pipe(notify({
    title: 'Assets veröffentlicht',
    message: 'Alle Assets wurden erfolgreich veröffentlicht.',
    }));
});

//////////////////////////////////////////////////
// CLEAN Tasks
//////////////////////////////////////////////////

gulp.task('clean:build', function () {
  gulp.src(paths.app.build,{read: false})
    .pipe(clean())
    .pipe(notify({
      title: 'Build Ordner gelöscht',
      message: 'Alle Build Dateien wurden gelöscht.',
    }));
});

gulp.task('clean:public', function () {
  gulp.src([
    paths.public + '/css',
    paths.public + '/js',
    paths.public + '/fonts',
    paths.public + '/img'
    ], {read: false})
    .pipe(clean())
    .pipe(notify({
      title: 'Public Ordner gelöscht',
      message: 'Alle veröffentlichten Dateien wurden gelöscht.',
    }));
});

//////////////////////////////////////////////////
// LIVERELOAD Tasks
//////////////////////////////////////////////////

gulp.task('publish:lr', function() {
  gulp.src(paths.bower.livereload)
    .pipe(newer(paths.public + '/js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.public + '/js'))
    .pipe(notify({
      title: 'Livereload veröffentlicht',
      message: 'Das Livereload Script wurde veröffentlicht.',
    }));
});

gulp.task('clean:lr', function () {
  gulp.src(paths.public + '/js/livereload.js',{read: false})
    .pipe(clean());
});

//////////////////////////////////////////////////
// WATCH Tasks
//////////////////////////////////////////////////

gulp.task('watch:assets', function(){
  gulp.watch([
    paths.app.assets + '/coffee/**/*.coffee',
    paths.app.assets + '/js/**/*.coffee',
    paths.app.assets + '/less/**/*.less',
    paths.app.assets + '/css/**/*.css',
    paths.app.assets + '/img/**/*.png',
    paths.app.assets + '/img/**/*.jpg',
    paths.app.assets + '/img/**/*.gif',
    './app/views/**/*'
    ],
    ['publish']);
})

gulp.task('watch:public', ['watch:assets','publish:lr'], function(){
  livereload.listen();
  gulp.watch([
    paths.public + '/js/**/*.js',
    paths.public + '/css/**/*.css',
    paths.public + '/img/**/*.png',
    paths.public + '/img/**/*.jpg',
    paths.public + '/img/**/*.gif',
    './app/views/**/*'])
    .on('change', livereload.changed);
})

gulp.task('watch:tests', function(){
  gulp.watch(paths.tests + '/**/*.php', ['codecept']);
})

gulp.task('watch', ['watch:public']);

//////////////////////////////////////////////////
// CODECEPTION Tasks
//////////////////////////////////////////////////

gulp.task('codecept', function() {
  var options = {notify: true, testSuite: 'integration'};
  gulp.src('tests/**/*.php')
    .pipe(codecept('', options))
    .on('error', notify.onError({
      title: "Testing Failed",
      message: "Error(s) occurred during test."
    }))
    .pipe(notify({
      title: 'Testing Passed',
      message: 'All tests have passed.',
    }));
});

//////////////////////////////////////////////////
// SHELL Tasks
//////////////////////////////////////////////////

gulp.task('deploy:app', ['clean:build'], shell.task([
  // 'sshpass -p ' + secret.password + ' sftp ' + secret.username + '@' + secret.host + "<<< $'synthesise\n mkdir public_html\n'"
  // 'sshpass -p ' + secret.password + ' scp -r ' localDir %>/bower_components <%= secret.username %>@<%= secret.host %>:synthesise",
  // 'sshpass -p ' + secret.password + ' scp ' localDir %>/bower.json <%= secret.username %>@<%= secret.host %>:synthesise"

  // app folder
  // bootstrap folder
  // artisan file
  // secret_db.json
  // server.php
]));

gulp.task('deploy:doc', shell.task([
  // doc folder
]));

gulp.task('deploy:public', ['clean:lr'], shell.task([
  // public_html folder
]));

gulp.task('deploy:vendor', shell.task([
  // vendor folder
]));

gulp.task('deploy:all', ['deploy:app','deploy:doc','deploy:public','deploy:vendor']);


//////////////////////////////////////////////////
// DEFAULT Tasks
//////////////////////////////////////////////////

gulp.task('default', ['watch:public']);
