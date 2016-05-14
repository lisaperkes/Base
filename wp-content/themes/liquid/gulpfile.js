// == GULP REQUIRE MODULES == //

var gulp         = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    browserify   = require('gulp-browserify'),
    cssmin       = require('gulp-cssmin'),
    concat       = require('gulp-concat'),
    livereload   = require('gulp-livereload'),
    notify       = require('gulp-notify'),
    plumber      = require('gulp-plumber'),
    sass         = require('gulp-sass'),
    sourcemaps   = require('gulp-sourcemaps'),
    uglify       = require('gulp-uglify');

// == ASSET PATHS == //

var PATHS = {
  styles: [
    'assets/styles/main.scss'
  ],
  jquery: 'assets/vendor/jquery/dist/jquery.js',
  vendor: [
    //'assets/vendor/what-input/what-input.js',
    'assets/vendor/foundation-sites/js/foundation.core.js',
    'assets/vendor/foundation-sites/js/foundation.util.*.js',
    // Paths to individual JS components defined below
    'assets/vendor/foundation-sites/js/foundation.abide.js',
    'assets/vendor/foundation-sites/js/foundation.accordion.js',
    'assets/vendor/foundation-sites/js/foundation.accordionMenu.js',
    'assets/vendor/foundation-sites/js/foundation.drilldown.js',
    'assets/vendor/foundation-sites/js/foundation.dropdown.js',
    'assets/vendor/foundation-sites/js/foundation.dropdownMenu.js',
    'assets/vendor/foundation-sites/js/foundation.equalizer.js',
    'assets/vendor/foundation-sites/js/foundation.interchange.js',
    'assets/vendor/foundation-sites/js/foundation.magellan.js',
    'assets/vendor/foundation-sites/js/foundation.offcanvas.js',
    'assets/vendor/foundation-sites/js/foundation.orbit.js',
    'assets/vendor/foundation-sites/js/foundation.responsiveMenu.js',
    'assets/vendor/foundation-sites/js/foundation.responsiveToggle.js',
    'assets/vendor/foundation-sites/js/foundation.reveal.js',
    'assets/vendor/foundation-sites/js/foundation.slider.js',
    'assets/vendor/foundation-sites/js/foundation.sticky.js',
    'assets/vendor/foundation-sites/js/foundation.tabs.js',
    'assets/vendor/foundation-sites/js/foundation.toggler.js',
    'assets/vendor/foundation-sites/js/foundation.tooltip.js',
    //'assets/vendor/motion-ui/motion-ui.js',
    //'assets/vendor/slick.js/slick/slick.js',
  ],
  scripts: 'assets/scripts/main.js'
}

// == STYLES TASKS == //

// Only compiles SASS and autoprefixes
gulp.task('styles-dev', function() {
  gulp.src(PATHS.styles)
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass())
    .on('error', notify.onError(function(error) {
      return 'An error occurred while compiling Sass. \n' + error;
    }))
    .pipe(autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9', 'and_chr >= 2.3'],
      cascade: false
    }))
    .pipe(concat('main.css'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('dist/styles/'));
});

// Compiles SASS, autoprefixes then minifies the final version
gulp.task('styles-build', function() {
  gulp.src(PATHS.styles)
    .pipe(plumber())
    .pipe(sass({
      style: 'compressed'
    }))
    .on('error', notify.onError(function(error) {
      return 'An error occurred while compiling Sass. \n' + error;
    }))
    .pipe(autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9', 'and_chr >= 2.3'],
      cascade: false
    }))
    .pipe(concat('main.css'))
    .pipe(gulp.dest('dist/styles/'))
    .pipe(cssmin())
    .pipe(gulp.dest('dist/styles/'));
});

// == SCRIPTS TASKS == //

// Only copies over the javascript files and concatinates them
gulp.task('scripts-dev', function() {
  gulp.src(PATHS.jquery)
    .pipe(plumber())
    .pipe(concat('jquery.js'))
    .pipe(gulp.dest('dist/scripts/'));

  gulp.src(PATHS.vendor)
    .pipe(plumber())
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('dist/scripts/'));

  gulp.src(PATHS.scripts)
    .pipe(plumber())
    .pipe(concat('main.js'))
    .pipe(browserify())
    .on('error', notify.onError(function(error) {
      return 'An error occurred while compiling Javascript. \n' + error;
    }))
    .pipe(gulp.dest('dist/scripts/'));
});

// Uglifies the javascript files then concatinates them
gulp.task('scripts-build', function() {
  gulp.src(PATHS.jquery)
    .pipe(plumber())
    .pipe(concat('jquery.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/scripts/'));

  gulp.src(PATHS.vendor)
    .pipe(plumber())
    .pipe(concat('vendor.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/scripts/'));

  gulp.src(PATHS.scripts)
    .pipe(plumber())
    .pipe(concat('main.js'))
    .pipe(browserify())
    .pipe(uglify())
    .on('error', notify.onError(function(error) {
      return 'An error occurred while compiling Javascript. \n' + error;
    }))
    .pipe(gulp.dest('dist/scripts/'));
});

// == WATCH TASKS == //

// Watches all Sass and JS for any changes, then runs the appropriate
// task. Also watches all PHP, CSS, and the JS folder in the dist
// folder for any changes then triggers livereload
gulp.task('watch', function() {
  gulp.watch('assets/styles/**/*.scss', ['styles-dev']);
  gulp.watch('assets/vendor/**/*.scss', ['styles-dev']);
  gulp.watch('assets/scripts/**/*.js', ['scripts-dev']);

  livereload.listen({
    basePath: './',
  });

  gulp.watch('**/*.php').on('change', livereload.changed).livereload;
  gulp.watch('dist/styles/*.css').on('change', livereload.changed).livereload;
  gulp.watch('dist/scripts/*.js').on('change', livereload.changed).livereload;
});

// == GULP TASKS == //

// Development Task
gulp.task('dev', ['styles-dev', 'scripts-dev']);
// Build Task
gulp.task('build', ['styles-build', 'scripts-build']);
// Default Task
gulp.task('default', ['dev', 'watch']);
