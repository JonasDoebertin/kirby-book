
var Dropdown = function($, app) {
    'use strict';

    var self = this;

    this.app = app;

    /**
     * Initialization.
     *
     * @since 1.0.0
     * @return void
     */
    this.init = function() {

        // Bind toggle event handler to all dropdown containers
        self.app.$document.on('click', '.js-dropdown-toggle', function(event) {
            event.stopPropagation();
            event.preventDefault();
            $(this).toggleClass('with-dropdown');
        });

        // Prevent clicks on dropdown from closing it
        self.app.$document.on('click', '.dropdown', function(event) {
            event.stopPropagation();
        });

        // Hide all dropdown on clicks elsewhere
        self.app.$document.on('click', self.hideAll);
    };

    this.hideAll = function() {
        app.$document.find('.js-dropdown-toggle').toggleClass('with-dropdown', false);
    };

    this.init();

    return {};

};
