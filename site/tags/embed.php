<?php

kirbytext::$tags['embed'] = [
    'attr' => [
        'chrome',
        'controls',
        'width',
        'align',
    ],
    'html' => function ($tag) {

        // Wrapper element
        $wrap = new Brick('div');
        $wrap->addClass('oembed');

        // Media anchor element
        $anchor = new Brick('a');
        $anchor->attr('href', $tag->attr('embed'));
        $anchor->addClass('oembed__anchor embedly-card');
        $anchor->data(array(
            'card-chrome'   => Helpers::toBool($tag->attr('chrome'), false) ? '1'   : '0',
            'card-theme'    => 'light',
            'card-controls' => Helpers::toBool($tag->attr('controls'), false) ? '1' : '0',
            'card-width'    => $tag->attr('width', '100%'),
            'card-align'    => Helpers::sanitizeFromArray($tag->attr('align'), ['left', 'center', 'right'], 'center'),
        ));
        $anchor->append($tag->attr('embed'));

        return $wrap->append($anchor);
    },
];
