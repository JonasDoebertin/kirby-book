/*
|-------------------------------------------------------------------------------
| Initialize gulp modules
|-------------------------------------------------------------------------------
|
| Initialize all the modules that we'll be unsing within this gulp file.
|
*/

var requireDir = require('require-dir'),
    tasks      = requireDir('./tasks'),
    gulp       = require('gulp');


/*
|-------------------------------------------------------------------------------
| Standard Functionality
|-------------------------------------------------------------------------------
|
| This set of tasks will expose standard gulp functionality.
|
*/

/* Task: start watcher */
gulp.task('watch', ['watch-js', 'watch-css']);

/* Task: default task */
gulp.task('default', ['watch']);
