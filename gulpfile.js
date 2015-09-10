/*
|-------------------------------------------------------------------------------
| Initialize gulp modules
|-------------------------------------------------------------------------------
|
| Initialize all the modules that we'll be unsing within this gulp file.
|
*/

var gulp       = require('gulp'),
    args       = require('yargs').argv,
    sass       = require('gulp-sass'),
    autoprefix = require('gulp-autoprefixer'),
    minifyCSS  = require('gulp-minify-css'),
    uglify     = require('gulp-uglify'),
    rename     = require('gulp-rename'),
    include    = require("gulp-include"),
    sourcemaps = require('gulp-sourcemaps'),
    zip        = require('gulp-zip'),
    clean      = require('gulp-clean');


/*
|-------------------------------------------------------------------------------
| Paths
|-------------------------------------------------------------------------------
|
| Set up various paths to watch, compile or pack for releases.
|
*/

/* Paths: paths to watch for JS compilation */
var jsWatchPaths = [
    'assets/js-source/**/*.js',
    'bower_components/**/*.js'
];

/* Paths: paths to base files to include in JS compilation */
var jsCompilePaths = [
    'assets/js-source/*.js'
];

/* Paths: paths to watch for SCSS compilation */
var scssWatchPaths = [
    'assets/scss/**/*.scss',
    'bower_components/**/*.scss'
];

/* Paths: paths to base files to include in SCSS compilation */
var scssCompilePaths = [
    'assets/scss/*.scss'
];

/* Paths: paths to include in "Standard" and "Developer" edition releases */
var releasePaths = {
    'standard': [
        '**/*',
        '.htaccess',
        '!{__releases,__releases/**}',
        '!assets/{js-source,js-source/**,scss,scss/**}',
        '!{bower_components,bower_components/**}',
        '!{node_modules,node_modules/**}',
        '!.DS_Store',
        '!.gitignore',
        '!.gitmodules',
        '!.php_cs',
        '!bower.json',
        '!composer.json',
        '!composer.lock',
        '!gulpfile.js',
        '!npm-debug.log',
        '!package.json',
        '!README.md',
        '!TODO'
    ],
    'developer': [
        '**/*',
        '.htaccess',
        '!{__releases,__releases/**}',
        '!{bower_components,bower_components/**}',
        '!{node_modules,node_modules/**}',
        '!.DS_Store',
        '.gitignore',
        '.gitmodules',
        '.php_cs',
        '!npm-debug.log',
        '!README.md',
        '!TODO'
    ]
};


/*
|-------------------------------------------------------------------------------
| Compilation
|-------------------------------------------------------------------------------
|
| This set of tasks will handle js and scss compilation.
|
*/

/* Task: Compile and minify scss */
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

/* Task: Combine and uglify js */
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
|-------------------------------------------------------------------------------
| Releases
|-------------------------------------------------------------------------------
|
| This set of tasks exists to make releasing a new version incredibly easy.
|
*/

/* Task: Clear release directory */
gulp.task('release-cleanup', function() {
    return gulp.src('__releases', {read: false})
        .pipe(clean());
});

/* Task: Copy files for a release */
gulp.task('release-copy', ['release-cleanup', 'css', 'js'], function() {
    return gulp.src(releasePaths[args.edition])
        .pipe(gulp.dest('__releases/' + args.tag + '-' + args.edition));
});

/* Task: Create a package from a release directory */
gulp.task('release-package', ['release-copy'], function() {
    return gulp.src('__releases/' + args.tag + '-' + args.edition + '/**')
        .pipe(zip('kirbybook-' + args.tag + '-' + args.edition + '.zip'))
        .pipe(gulp.dest('__releases'));
});

/* Task: Do a release */
gulp.task('release', ['release-package']);


/*
|-------------------------------------------------------------------------------
| Standard Functionality
|-------------------------------------------------------------------------------
|
| This set of tasks will expose standard gulp functionality.
|
*/

/* Task: start watcher */
gulp.task('watch', ['css', 'js'], function() {
    gulp.watch(scssWatchPaths, ['css']);
    gulp.watch(jsWatchPaths, ['js']);
});

/* Task: default task */
gulp.task('default', ['watch']);
