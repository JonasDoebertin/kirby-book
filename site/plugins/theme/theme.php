<?php

class theme
{
    /**
     * Theme Name.
     * @var string
     */
    const NAME = 'kirbyBOOK';

    /**
     * Theme Version.
     * @var string
     */
    const VERSION = '1.0.0';

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

    /**
     * Load theme options.
     *
     * @since 1.0.0
     * @return array
     */
    protected static function options()
    {
        return [
            'highlightColor'  => site()->highlight(),
            'contentLanguage' => site()->contentLanguage(),
        ];
    }

    /**
     * Get a theme option.
     *
     * @since 1.0.0
     * @param  string $key
     * @param  mixed  $default
     * @return mixed
     */
    protected static function option($key, $default)
    {
        static $options = null;

        if (is_null($options)) {
            $options = self::options();
        }

        return (isset($options[$key]) && !is_null($options[$key]) ? $options[$key] : $default);
    }

    /**
     * Generate CSS trumps.
     *
     * @since 1.0.0
     * @return string
     */
    public static function generateStyles()
    {
        $options = self::options();

        // Highlight text color
        $css = '.highlight--text{color:' . self::option('highlightColor', 'inherit') . '!important;}';
        $css .= '.highlight--hover-text:hover{color:' . self::option('highlightColor', 'inherit') . '!important;}';

        // Highlight border color
        $css .= '.highlight--border{border-color:' . Helpers::hexToRgba(self::option('highlightColor', 'inherit'), 0.5) . '!important;}';

        // Link color
        $css .= '.navigation__header a:hover,.navigation__footer a:hover,.page__content a,.error__content a{color: ' . self::option('highlightColor', 'inherit') . '!important;}';

        /* Custom site styles */
        if (site()->customStyles()->isNotEmpty()) {
            $css .= site()->customStyles();
        }

        /* Custom page styles */
        if (page()->customStyles()->isNotEmpty()) {
            $css .= page()->customStyles();
        }

        return '<style>' . $css . '</style>';
    }

    /**
     * Apply all active replacements to a string.
     *
     * @since 1.0.0
     * @param  string $text
     * @return string
     */
    public static function applyReplacements($text)
    {
        /* Load all replacements */
        $needles = [];
        $replacements = [];
        foreach (site()->find('replacements')->replacements()->toStructure() as $replacement) {
            $needles[] = '{{' . $replacement->indicator() . '}}';
            $replacements[] = $replacement->replacement();
        }

        /* Replace all occurances */
        return str_ireplace($needles, $replacements, $text);
    }

    /**
     * Try to load language file based on site options.
     *
     * @since 1.0.0
     */
    protected static function loadLanguageFile()
    {
        $path = kirby()->roots->languages() . DS . self::option('contentLanguage', 'en') . '.php';

        if (F::exists($path)) {
            include $path;
        }
    }

    /**
     * Get a translatable string.
     *
     * @since 1.0.0
     * @param  string $key
     * @param  string $default
     * @return string
     */
    public static function lang($key, $default)
    {
        /* Maybe load language file */
        if (!L::get('theme.lang', false)) {
            self::loadLanguageFile();
        }

        return L::get($key, $default);
    }
}
