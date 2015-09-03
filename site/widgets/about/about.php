<?php

return [
    'title' => 'About',
    'options' => [
        [
            'text' => 'Get Support',
            'icon' => 'life-ring',
            'link' => 'mailto:support@jd-powered.net'
        ]
    ],
    'html'  => function() {
        return Tpl::load(__DIR__ . DS . 'template.php');
    }
];
