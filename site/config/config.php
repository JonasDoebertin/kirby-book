<?php

c::set('routes', [

    [
        'pattern' => 'api/theme/custom.min.css',
        'action'  => function() {
            return new Response(Theme::trumps(), 'css', 200);
        },
    ],

]);
