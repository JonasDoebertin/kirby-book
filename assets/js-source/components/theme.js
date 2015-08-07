
var Theme = function($, app) {
    'use strict';

    var self = this;

    this.app = app;

    this.state = {
        font: null,
        size: null
    };

    this.fonts = ['serif', 'sans-serif'];

    this.sizes = ['smaller', 'small', 'normal', 'large', 'larger'];

    /**
     * Initialization.
     *
     * @since 1.0.0
     * @return void
     */
    this.init = function() {

        self.initState();

    };

    this.initState = function() {

        // Find current font
        // TODO: find from store
        $.each(self.fonts, function(index, element) {
            if (self.app.elements.html.hasClass(element)) {
                self.state.font = element;
                // TODO: self.setFont(element);
            }
        });

        // Find current size
        // TODO: find from store
        $.each(self.sizes, function(index, element) {
            if (self.app.elements.html.hasClass('font-size-' + element)) {
                self.state.size = element;
                // TODO: self.setSize(element);
            }
        });

    };



    this.init();

};
