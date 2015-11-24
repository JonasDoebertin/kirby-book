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

/* Paths: paths to include in "Standard" and "Developer" edition releases */
var releasePaths = {
    'standard': [
        '**/*',
        '.htaccess',
        '!{__releases,__releases/**}',
        '!assets/{js-source,js-source/**,scss,scss/**}',
        '!{bin,bin/**}',
        '!{bower_components,bower_components/**}',
        '!{node_modules,node_modules/**}',
        '!site/accounts/root.php',
        '!site/cache/*.epub',
        '!site/config/config.kirby-book.app.php',
        '!{tasks,tasks/**}',
        '!thumbs/*.{jpg,jpeg,png}',
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
        '!site/accounts/root.php',
        '!site/cache/*.epub',
        '!site/config/config.kirby-book.app.php',
        '!tasks/release.js',
        '!thumbs/*.{jpg,jpeg,png}',
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
gulp.task('release-copy', ['release-cleanup', 'css', 'browserify'], function() {
    return gulp.src(releasePaths[args.edition])
        .pipe(gulp.dest('__releases/' + args.tag + '-' + args.edition));
});

/* Task: Create a package from a release directory */
gulp.task('release-package', ['release-copy'], function() {
    return gulp.src('__releases/' + args.tag + '-' + args.edition + '/**', {dot: true})
        .pipe(zip('kirbybook-' + args.tag + '-' + args.edition + '.zip'))
        .pipe(gulp.dest('__releases'));
});

/* Task: Do a release */
gulp.task('release', ['release-package']);
