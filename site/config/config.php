<?php

c::set('panel.stylesheet', 'assets/css/panel.min.css');

c::set('markdown.extra', true);

c::set('routes', [

    /*
        THEME
        =====
        
     */
    [
        'pattern' => 'api/theme/custom.min.css',
        'action'  => function() {
            return new Response(Theme::trumps(), 'css', 200);
        },
    ],

    /*
        SITEMAP
        =======
        1. Reroute calls to "/sitemap" to "/sitemap.xml"
        2. Return "/sitemap" when fetching "sitemap.xml"

        Seems stupid, but from a SEO perspective it's reasonable.
     */
    [
        'pattern' => 'sitemap',
        'action'  => function() {
            go('sitemap.xml');
        },
    ],
    [
        'pattern' => 'sitemap.xml',
        'action'  => function() {
            return site()->visit('sitemap');
        },
    ],

]);
