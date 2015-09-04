
var Core = function($) {
    'use strict';

    var self = this;

    // Cached DOM lements
    this.$document = $(document);
    this.elements = {
        html: $('html'),
    };

    // Component instances
    this.sidebar = null;
    this.dropdown = null;
    this.theme = null;

    /**
     * Initialization.
     *
     * @since 1.0.0
     */
    this.init = function() {

        // Cache common DOM elements
        self.elements.$html = $('html');

        // Initialize sidebar component
        self.sidebar = new Sidebar($, self);

        // Initialize dropdown component
        self.dropdown = new Dropdown($, self);

        // Initialize theme component
        self.theme = new Theme($, self);

        /* Initialize fitvids.js plugin */
        self.initEmbeddedVideos();
    };

    this.initEmbeddedVideos = function() {
        var selectors = [
            'iframe[src*=\'instagram.com\'][src*=\'embed\']',
            'iframe[src*=\'soundcloud.com/player\']',
            'iframe[src*=\'embed.spotify.com\']',
            'iframe[src*=\'vine.co\']',
        ];

        $('.js-page-content').fitVids({customSelector: selectors.join()});
    };

    // Run initialization
    self.init();
};
