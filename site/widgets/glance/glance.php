<?php

return [
    'title' => 'At a Glance',
    'html'  => function() {
        $data = [
            'articles' => Helpers::getPagesCount(['article', 'home']),
            'chapters' => Helpers::getPagesCount(['chapter']),
            'words'    => Helpers::getWordsCount(['chapter', 'article', 'home']),
        ];
        return Tpl::load(__DIR__ . DS . 'template.php', $data);
    }
];
