<?php

kirbytext::$tags['include'] = array(
    'attr' => [
        'include'
    ],
    'html' => function($tag) {
        // Try to find include
        $include = site()->find('includes/' . $tag->attr('include'));

        // Check for invalid include names
        if (is_null($include) or ($include === false)) {
            return '[Missing include: ' .  $tag->attr('include') . ']';
        }
        return $include->text()->kirbytext();
    }
);
