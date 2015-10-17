<?php

/**
 * Columns Plugin
 *
 * @since 1.0.1
 *
 * @author Bastian Allgeier <bastian@getkirby.com>
 * @author Modified by Jonas Döbertin <hello@jd-powered.net>
 */
Kirbytext::$pre[] = function ($kirbytext, $text) {

    // Apply RegExp to find all occurances of the (columns…) (…columns)
    // Kirbytext extension and work on their content
    $text = preg_replace_callback('![^`]\(columns(…|\.{3})\)(.*?)[^`]\((…|\.{3})columns\)!is', function ($matches) use ($kirbytext) {

        // Split content by the `++++` delimiter
        $columns = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
        $html = [];

        foreach ($columns as $column) {
            $field = new Field($kirbytext->field->page, null, trim($column));
            $html[] = '<div class="columns__item">' . kirbytext($field) . '</div>';
        }

        return '<div class="columns  columns--' . count($columns) . '">' . implode($html) . '</div>';

    }, $text);

    return $text;
};
