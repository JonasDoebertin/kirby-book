<?php

c::set('panel.stylesheet', 'assets/css/panel.min.css');

c::set('markdown.extra', true);

c::set('routes', [

    [
        'pattern' => 'api/theme/custom.min.css',
        'action'  => function() {
            return new Response(Theme::trumps(), 'css', 200);
        },
    ],

]);
