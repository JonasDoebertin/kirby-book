
var Theme = function($, app) {
    'use strict';

    var self = this;

    this.app = app;

    this.state = {
        font: 'sans-serif',
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

        // Init initial state
        self.initState();

        // Bind toggle event handler
        self.app.$document.on('click', '.js-theme-toggle', function(event) {

            // Preparations
            var target = $(this);
            event.preventDefault();

            // Delegate to related setter
            switch(target.data('toggle')) {
                case 'font':
                    self.setFont(target.data('value'));
                    break;
                case 'size':
                    self.setSize(target.data('value'));
            }
        });

    };

    this.initState = function() {

        // Find and apply current font
        $.each(self.fonts, function(index, element) {
            if (self.app.elements.html.hasClass(element)) {
                self.state.font = element;
            }
        });
        self.setFont(store.get('font', self.state.font));

        // // Find current size
        // // TODO: find from store
        // $.each(self.sizes, function(index, element) {
        //     if (self.app.elements.html.hasClass('font-size-' + element)) {
        //         self.state.size = element;
        //         // TODO: self.setSize(element);
        //     }
        // });

    };

    this.setFont = function(font) {
        self.state.font = font;
        self.app.elements.html.removeClass(self.fonts.join(' '));
        self.app.elements.html.addClass(font);
        store.set('font', font);
    };



    this.init();

};
