/*
|-------------------------------------------------------------------------------
| Initialize gulp modules
|-------------------------------------------------------------------------------
|
| Initialize all the modules that we'll be unsing within this gulp file.
|
*/

var gulp       = require('gulp'),
    sass       = require('gulp-sass'),
    autoprefix = require('gulp-autoprefixer'),
    minifyCSS  = require('gulp-minify-css'),
    rename     = require('gulp-rename'),
    sourcemaps = require('gulp-sourcemaps');


/*
|-------------------------------------------------------------------------------
| Paths
|-------------------------------------------------------------------------------
|
| Set up various paths to watch, compile or pack for releases.
|
*/

/* Paths: paths to watch for SCSS compilation */
var scssWatchPaths = [
    'assets/scss/**/*.scss',
    'bower_components/**/*.scss'
];

/* Paths: paths to base files to include in SCSS compilation */
var scssCompilePaths = [
    'assets/scss/*.scss'
];


/*
|-------------------------------------------------------------------------------
| Compilation
|-------------------------------------------------------------------------------
|
| This set of tasks will handle scss compilation.
|
*/

/* Task: start css watcher */
gulp.task('watch-css', ['css'], function() {
    return gulp.watch(scssWatchPaths, ['css']);
});

/* Task: Compile and minify scss */
gulp.task('css', function() {
    return gulp.src(scssCompilePaths)
        .pipe(sourcemaps.init())
        .pipe(sass({errLogToConsole: true}))
        .pipe(autoprefix('last 2 versions', '> 2%', 'ie 9'))
        .pipe(minifyCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('assets/css'));
});
