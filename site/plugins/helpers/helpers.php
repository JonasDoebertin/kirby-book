<?php

class helpers
{
    public static function hexToRgba($hex, $alpha)
    {
        // Remove hash character
        $hex = str_replace('#', '', $hex);

        // Handle shorthand values
        if (strlen($hex) === 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));

        // Handle normal values
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }

        return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $alpha . ')';
    }

    public static function getPages($templates = [])
    {
        return site()->index()->visible()->filter(function ($item) use ($templates) {
            return in_array($item->intendedTemplate(), $templates);
        });
    }

    public static function getPagesCount($templates = [])
    {
        return self::getPages($templates)->count();
    }

    public static function getWordsCount($templates = [])
    {
        $pages = self::getPages($templates);

        $words = 0;
        foreach ($pages as $page) {
            $words += str_word_count(strip_tags($page->text()));
        }

        return $words;
    }

    /**
     * Check if a user is logged in.
     *
     * @since 1.0.0
     * @return boolean
     */
    public static function isLoggedIn()
    {
        return (site()->user() !== false);
    }

    /**
     * Generate a panel url for an object and an action.
     *
     * @since 1.0.0
     * @param  Mixed  $obj
     * @param  string $action
     * @return string
     */
    public static function panelUrl($obj, $action = 'show')
    {
        /* Prepare base url */
        $panel = url('/panel');

        /* String */
        if (is_string($obj)) {
            return $panel . '#/' . $obj;
        }

        /* Page */
        elseif (is_a($obj, 'Page')) {
            return $panel . '#/pages/' . $action . '/' . $obj->id();
        }

        /* File */
        elseif (is_a($obj, 'File')) {

            /* Site file */
            if ($obj->page()->isSite()) {
                return $panel . '#/files/' . $action . '/' . urlencode($obj->filename());
            }

            /* Page file */
            else {
                return $panel . '#/files/' . $action . '/' . $obj->page()->id() . '/' . urlencode($obj->filename());
            }
        }

        /* User */
        elseif (is_a($obj, 'User')) {
            return $panel . '#/users/' . $action . '/' . $obj->username();
        }
    }
}
