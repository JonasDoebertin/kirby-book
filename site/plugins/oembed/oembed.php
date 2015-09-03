<?php

Kirbytext::$tags['embed'] = [
    'attr' => [],
    'html' => function($tag) {

        /* Build basic Embera configuration */
        $config = [
            'params' => [
                'width' => 800,
            ],
            'fake' => [
                'width' => 800,
            ]
        ];

        /* Create Embera instance */
        $embera = new \Embera\Embera($config);
        $formatter = new \Embera\Formatter($embera);
        $formatter->setTemplate('<div class="oembed oembed--{type}" style="max-width: 300px">{html}</div>');

        return $formatter->transform($tag->attr('embed'));
    },
];
