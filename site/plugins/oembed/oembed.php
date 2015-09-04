<?php

Kirbytext::$tags['embed'] = [
    'attr' => [],
    'html' => function ($tag) {

        /* Build basic Embera configuration */
        $config = [
            'allow' => [
                'GithubGist',
                'Instagram',
                'Kickstarter',
                'Soundcloud',
                'Spotify',
                'Twitter',
                'Vimeo',
                'Vine',
                'Youtube',
            ],
            'params' => [
                'width' => 800,
            ],
            'fake' => [
                'width' => 800,
            ],
        ];

        /* Create Embera instance */
        $embera = new \Embera\Embera($config);

        return '<div class="oembed">' . $embera->autoEmbed($tag->attr('embed')) . '</div>';
    },
];
