
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
    };

    // Run initialization
    self.init();
};
