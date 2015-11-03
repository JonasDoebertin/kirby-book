<?php

/*
|-------------------------------------------------------------------------------
| License Setup
|-------------------------------------------------------------------------------
|
| Please add your license key, which you've received via email after purchasing
| Kirby on http://getkirby.com/buy. It is not permitted to run a public website
| without a valid license key. Please read the End User License Agreement for
| more information: http://getkirby.com/license
|
*/

c::set('license', '');

/*
|-------------------------------------------------------------------------------
| Debugging
|-------------------------------------------------------------------------------
|
| Please add your license key, which you've received via email after purchasing
| Kirby on http://getkirby.com/buy. It is not permitted to run a public website
| without a valid license key. Please read the End User License Agreement for
| more information: http://getkirby.com/license
|
*/

c::set('debug', false);

/*
|-------------------------------------------------------------------------------
| Cachebusting
|-------------------------------------------------------------------------------
|
| Enable site wide cache busting for all JS and CSS assets. This will add
| modification timestamps to the file names of your linked CSS and JS files, as
| long as they are embedded with the css() and js() helpers.
|
*/

c::set('plugin.cachebuster.enabled', true);

/*
|-------------------------------------------------------------------------------
| Markdown Extra
|-------------------------------------------------------------------------------
|
| Enable / disable the Markdown extra parser with additional Markdown features
| like footnotes, definition lists and tables.
|
*/

c::set('markdown.extra', true);

/*
|-------------------------------------------------------------------------------
| Panel Widgets
|-------------------------------------------------------------------------------
|
| Modifying this array allows you to reorder and enable / disable any of the
| panel dahsboard widgets.
|
*/

c::set('panel.widgets', [
    'glance'  => true,
    'pages'   => true,
    'site'    => true,
    'account' => true,
    'history' => true,
    'about'   => true,
]);

/*
|-------------------------------------------------------------------------------
| Relative Date Plugin
|-------------------------------------------------------------------------------
|
| The Relative Date plugin for Kirby CMS displays date and time to a
| human-readable relative format. It converts your absolute date (and time) in
| something relative and more readable.
|
| For an overview of the available configuration options visit:
| https://github.com/distantnative/relative-date#options
|
*/
c::set('relativedate.conjunction', true);
c::set('relativedate.fuzzy', true);
c::set('relativedate.lang', 'en');

/*
|-------------------------------------------------------------------------------
| Routing
|-------------------------------------------------------------------------------
|
| Set up some additional routes here.
|
*/

c::set('routes', [
    /*
        SITEMAP
        =======
        1. Reroute calls to "/sitemap" to "/sitemap.xml"
        2. Return "/sitemap" when fetching "sitemap.xml"
     */
    [
        'pattern' => 'sitemap',
        'action'  => function () {
            go('sitemap.xml');
        },
    ],
    [
        'pattern' => 'sitemap.xml',
        'action'  => function () {
            return site()->visit('sitemap');
        },
    ],
    /*
        EPUB EXPORT
     */
    [
        'pattern' => 'export/epub',
        'action' => function () {

            // Abort if ePub export has been disabled
            if (site()->epub()->int() !== 1) {
                return site()->visit('error');
            }

            // Export as ePub
            EPubExporter::export();
            die;
        },
    ],
]);

/*
|-------------------------------------------------------------------------------
| Custom Panel Styles
|-------------------------------------------------------------------------------
|
| Add some custom CSS rules to the panel to optimize the UX.
|
*/

c::set('panel.stylesheet', 'assets/css/panel.min.css');
