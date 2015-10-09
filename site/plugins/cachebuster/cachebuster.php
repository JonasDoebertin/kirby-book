<?php
/**
 * Cachebuster Plugin
 *
 * @since 1.0.0
 *
 * @author Made by Bastian Allgeier <bastian@getkirby.com>
 * @author Modified by Jonas Döbertin <hello@jd-powered.net>
 */


/* Abort if cachebusting has been disabled */
if (!c::get('plugin.cachebuster.enabled', false)) {
    return;
}

/* Save previous JS and CSS handlers */
$kirby    = kirby();
$handlers = [
    'js'      => $kirby->option('js.handler'),
    'css'     => $kirby->option('css.handler'),
];

/**
 * Cachebusting enabled CSS handler.
 *
 * @since 1.0.0
 */
$kirby->options['css.handler'] = function ($url, $media = false) use ($handlers, $kirby) {

    /* Handle arrays with multiple urls */
    if (is_array($url)) {
        $css = array();
        foreach ($url as $u) {
            $css[] = call($handlers['css'], $u);
        }
        return implode(PHP_EOL, $css) . PHP_EOL;
    }

    /* Generate absolute filename */
    $file = $kirby->roots()->index() . DS . $url;

    /* Generate filename with embedded modification timestamp */
    if (file_exists($file)) {
        $modified = F::modified($file);
        $url = dirname($url) . '/' . F::name($url) . '.' . $modified . '.' . F::extension($url);
    }

    /* Run through previous CSS handler and return */
    return call($handlers['css'], array($url, $media));
};

/**
 * Cachebusting enabled JS handler.
 *
 * @since 1.0.0
 */
$kirby->options['js.handler'] = function ($src, $async = false) use ($handlers, $kirby) {

    /* Handle arrays with multiple urls */
    if (is_array($src)) {
        $js = array();
        foreach($src as $s){
            $js[] = call($handlers['js'], $s);
        }
        return implode(PHP_EOL, $js) . PHP_EOL;
    }

    /* Generate absolute filename */
    $file = $kirby->roots()->index() . DS . $src;

    /* Generate filename with embedded modification timestamp */
    if (file_exists($file)) {
        $modified = F::modified($file);
        $src = dirname($src) . '/' . F::name($src) . '.' . $modified . '.' . F::extension($src);
    }

    /* Run through previous JS handler and return */
    return call($handlers['js'], array($src, $async));
};
