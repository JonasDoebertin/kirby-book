<?php

class Theme
{
    /**
     * Theme Name.
     * @var string
     */
    const NAME = 'Kirby Book';

    /**
     * Theme Version.
     * @var string
     */
    const VERSION = '1.0.0-dev';

    /**
     * Get the themes generator string.
     *
     * @since 1.0.0
     * @return string
     */
    public static function generator()
    {
        return self::NAME . ' ' . self::VERSION;
    }

    protected static function options()
    {
        $options = [];

        // Highlight color
        $options['highlightColor'] = site()->highlight();

        return $options;
    }

    protected static function option($key, $default)
    {
        static $options = null;

        if (is_null($options)) {
            $options = self::options();
        }

        return (isset($options[$key]) && !is_null($options[$key]) ? $options[$key] : $default);
    }

    public static function trumps()
    {
        $options = self::options();

        $css = '@charset "utf-8";';

        // Highlight text color
        $css .= '.highlight--text{color:' . self::option('highlightColor', 'inherit') . '!important;}';

        // Highlight border color
        $css .= '.highlight--border{border-color:' . Helpers::hexToRgba(self::option('highlightColor', 'inherit'), 0.5) . '!important;}';

        return $css;
    }
}
