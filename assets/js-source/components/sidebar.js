
var Sidebar = function($, app) {
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

        // Bind toggle event handler
        self.app.$document.on('click', '.js-action-toggle-sidebar', function(event) {
            event.preventDefault();
            self.toggleSidebar(null, true);
        });

        // Initialize last state
        // if (!self.app.isMobile) {
            self.toggleSidebar(store.get('sidebar', true), false);
        // }
    };

    this.toggleSidebar = function(show, animation) {

        // Abort if the sidebar shall be shown but is already visible
        if (show !== null && this.isVisible() === show) {
            return;
        }

        // Initialize show parameter
        if (show === null) {
            show = !this.isVisible();
        }

        // Initialize animation parameter
        if (animation === null) {
            animation = true;
        }

        // Toggle classes on <html> element
        self.app.elements.$html.toggleClass('with-animation', animation);
        self.app.elements.$html.toggleClass('with-sidebar', show);

        // Save state
        store.set('sidebar', show);
    };

    this.isVisible = function() {

        return self.app.elements.$html.hasClass('with-sidebar');

    };

    this.init();

    return {
        toggle: this.toggleSidebar
    };

};
