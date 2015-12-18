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
     * Sanitize a string by checkinf if it is of an allowed value.
     *
     * @since 1.1.0
     * @param string
     * @param array
     * @param string
     * @return string
     */
    public static function sanitizeFromArray($actual, $allowed, $fallback)
    {
        return in_array($actual, $allowed) ? $actual : $fallback;
    }

    /**
     * Convert a boolean-like string to an actual boolean.
     *
     * @since 1.1.0
     * @param mixed
     * @param boolean
     * @return boolean
     */
    public static function toBool($actual, $fallback)
    {
        if (is_bool($actual)) {
            return $actual;
        }

        switch ($actual) {
            case 'true':
            case 'yes':
            case '1':
            case 1:
                return true;

            case 'false':
            case 'no':
            case '0':
            case 0:
                return false;

            default:
                return $fallback;
        }
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
            return $panel . '/' . $obj;
        }

        /* Page */
        elseif (is_a($obj, 'Page')) {
            return $panel . '/pages/' . $obj->id() . '/' . $action;
        }

        /* File */
        elseif (is_a($obj, 'File')) {

            /* Site file */
            if ($obj->page()->isSite()) {
                return $panel . '#/files/' . $action . '/' . urlencode($obj->filename());
            }

            /* Page file */
            else {
                return $panel . '/files/' . $obj->page()->id() . '/file/' . urlencode($obj->filename()) . '/' . $action;
            }
        }

        /* User */
        elseif (is_a($obj, 'User')) {
            return $panel . '/users/' . $obj->username() . '/' . $action;
        }
    }
}
