<?php

c::set('panel.stylesheet', 'assets/css/panel.min.css');

c::set('markdown.extra', true);

c::set('panel.widgets', [
    'glance'  => true,
    'pages'   => true,
    'site'    => true,
    'account' => true,
    'history' => true,
    'about'   => true,
]);

/*
    Relative Date
 */
c::set('relativedate.conjunction', true);
c::set('relativedate.fuzzy', true);
c::set('relativedate.lang', 'en');

c::set('routes', [

    /*
        SITEMAP
        =======
        1. Reroute calls to "/sitemap" to "/sitemap.xml"
        2. Return "/sitemap" when fetching "sitemap.xml"

        Seems stupid, but from a SEO perspective it's reasonable.
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

]);
