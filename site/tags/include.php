<?php

kirbytext::$tags['include'] = [
    'attr' => [
        'include',
    ],
    'html' => function ($tag) {

        // Try to find include
        $include = site()->find('includes')->includes()->toStructure()->filterBy('indicator', $tag->attr('include'))->first();

        // Check for invalid include names
        if (is_null($include)) {
            return '[[Missing include: ' .  $tag->attr('include') . ']]';
        }

        return $include->include()->kirbytext();
    },
];
