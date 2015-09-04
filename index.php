<?php

define('DS', DIRECTORY_SEPARATOR);

/* Load dependencies */
require __DIR__ . DS . 'vendor' . DS . 'autoload.php';

/* Load Kirby core */
require __DIR__ . DS . 'kirby' . DS . 'bootstrap.php';

/* Maybe use custom site.php file */
if (file_exists(__DIR__ . DS . 'site.php')) {
    require __DIR__ . DS . 'site.php';
} else {
    $kirby = kirby();
}

/* Render the page */
echo $kirby->launch();
