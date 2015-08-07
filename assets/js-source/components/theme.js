
var Theme = function($, app) {
    'use strict';

    /**
     * Self reference.
     * @type {object}
     */
    var self = this;

    /**
     * Save reference to app object.
     * @type {object}
     */
    this.app = app;

    /**
     * Represents the current state
     * @type {Object}
     */
    this.state = {
        font: 'sans-serif',
        size: 'normal'
    };

    /**
     * All avaiable fonts
     * @type {Array}
     */
    this.fonts = ['serif', 'sans-serif'];

    /**
     * All avaiable font sizes
     * @type {Array}
     */
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
                    self.changeSize(target.data('value'));
            }
        });

    };

    /**
     * Initialize theme with current saved state.
     * @since 1.0.0
     * @return {void}
     */
    this.initState = function() {

        // Find and apply current font
        $.each(self.fonts, function(index, element) {
            if (self.app.elements.html.hasClass(element)) {
                self.state.font = element;
            }
        });
        self.setFont(store.get('font', self.state.font));

        // Find current size
        $.each(self.sizes, function(index, size) {
            if (self.app.elements.html.hasClass(size)) {
                self.state.size = size;
            }
        });
        self.setSize(store.get('size', self.state.size));

    };

    /**
     * Set a new font.
     * @since 1.0.0
     * @param {string}  font
     * @return {void}
     */
    this.setFont = function(font) {
        self.state.font = font;
        self.app.elements.html.removeClass(self.fonts.join(' '));
        self.app.elements.html.addClass(font);
        store.set('font', font);
    };

    /**
     * Change font size upwards or downwards.
     * @since 1.0.0
     * @param {string}  direction
     * @return {void}
     */
    this.changeSize = function(direction) {

        var currentSize, newSize;

        // Get current and new sizes
        currentSize = self.state.size;
        newSize = self.getNextSize(currentSize, direction);

        console.log('Current ' + currentSize);
        console.log('New ' + newSize);
        console.log('Direction ' + direction);

        // Set new size
        self.setSize(newSize);
    };

    /**
     * Set and store a new font size.
     * @since 1.0.0
     * @param {string}  size
     * @return {void}
     */
    this.setSize = function(size) {
        self.state.size = size;
        self.app.elements.html.removeClass(self.sizes.join(' '));
        self.app.elements.html.addClass(size);
        store.set('size', size);

        console.log('Set size to ' + size);
    };

    /**
     * Get the a new font size based on current size and direction.
     * @since 1.0.0
     * @param {string}  current
     * @param {string}  direction
     * @return {string}
     */
    this.getNextSize = function(current, direction) {
        var i = $.inArray(current, self.sizes);

        // Handle invalid values
        if (i === -1) {
            return 'normal';
        }

        // Handle edge cases
        if ((i <= 0) && (direction === 'down')) {
            return current;
        }
        if ((i >= 4) && (direction === 'up')) {
            return current;
        }

        return (direction === 'up') ? self.sizes[++i] : self.sizes[--i];
    };

    /**
     * Run initialization
     */
    this.init();
};
