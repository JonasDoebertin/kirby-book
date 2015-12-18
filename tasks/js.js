/*
|-------------------------------------------------------------------------------
| Initialize gulp modules
|-------------------------------------------------------------------------------
|
| Initialize all the modules that we'll be unsing within this gulp file.
|
*/

var gulp       = require('gulp'),
    uglify     = require('gulp-uglify'),
    browserify = require('browserify'),
    source     = require('vinyl-source-stream'),
    buffer     = require('vinyl-buffer');


/*
|-------------------------------------------------------------------------------
| Paths
|-------------------------------------------------------------------------------
|
| Set up various paths to watch, compile or pack for releases.
|
*/

/* Paths: paths to watch for JS compilation */
var browserifyWatchPaths = [
    'assets/js-source/**/*.js',
    'bower_components/**/*.js',
    'node_modules/**/*.js'
];

/* Paths: paths to base files to include in JS compilation */
var browserifyCompilePaths = [
    'assets/js-source/main.js'
];


/*
|-------------------------------------------------------------------------------
| Compilation
|-------------------------------------------------------------------------------
|
| This set of tasks will handle js compilation.
|
*/

/* Task: start js watcher */
gulp.task('watch-js', ['browserify'], function() {
    return gulp.watch(browserifyWatchPaths, ['browserify']);
});

/* Task: Combine and uglify js */
gulp.task('browserify', function() {
    return browserify({entries: browserifyCompilePaths})
        .bundle()
        .pipe(source('main.min.js'))
        .pipe(buffer())
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});
