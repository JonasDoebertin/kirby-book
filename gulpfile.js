/*
    Initialize Gulp.js modules
 */
var gulp       = require('gulp'),
    sass       = require('gulp-sass'),
    autoprefix = require('gulp-autoprefixer'),
    minifyCSS  = require('gulp-minify-css'),
    uglify     = require('gulp-uglify'),
    rename     = require('gulp-rename'),
    include    = require("gulp-include"),
    sourcemaps = require('gulp-sourcemaps');




/*
    Paths to watch for JS compilation
 */
var jsWatchPaths = [
    'assets/js-source/**/*.js',
    'bower_components/**/*.js'
];

/*
    Paths to include in JS compilation
 */
var jsCompilePaths = [
    'assets/js-source/*.js'
];




/*
    Paths to watch for SCSS compilation
 */
var scssWatchPaths = [
    'assets/scss/**/*.scss',
    'bower_components/**/*.scss'
];

/*
    Paths to include in SCSS compilation
 */
var scssCompilePaths = [
    'assets/scss/*.scss'
];





/*
    Task: Compile and minify SCSS
 */
gulp.task('css', function() {
    return gulp.src(scssCompilePaths)
        .pipe(sourcemaps.init())
        .pipe(sass({errLogToConsole: true}))
        .pipe(autoprefix('last 2 versions', '> 1%', 'ie 8', 'ie 9'))
        .pipe(minifyCSS({compatibility: 'ie8'}))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('assets/css'));
});





/*
    Task: Combine and uglify JS
 */
gulp.task('js', function() {
    return gulp.src(jsCompilePaths)
        .pipe(include())
            .on('error', console.log)
        .pipe(sourcemaps.init())
        .pipe(uglify({preserveComments: 'some'}))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('assets/js'));
});





/*
    Task: Watcher
 */
gulp.task('watch', ['css', 'js'], function() {
    gulp.watch(scssWatchPaths, ['css']);
    gulp.watch(jsWatchPaths, ['js']);
});





/*
    Task: Default
 */
gulp.task('default', ['watch']);
