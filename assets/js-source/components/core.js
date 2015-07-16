
var Core = function($) {
    'use strict';

    var self = this;

    // Cached DOM lements
    this.$document = $(document);
    this.elements = {};

    // Component instances
    this.sidebar = null;

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
    };

    // Run initialization
    self.init();
};
