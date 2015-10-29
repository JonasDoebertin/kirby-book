
var Navigation = function($, app) {
    'use strict';

    var self = this;

    this.app = app;

    this.elements = {
        prevLink: $('link[rel=prev]'),
        nextLink: $('link[rel=next]')
    };

    /**
     * Initialization.
     *
     * @since 1.0.2
     * @return void
     */
    this.init = function() {

        self.bindPrevNextPageShortcut();

    };

    this.bindPrevNextPageShortcut = function () {
        self.app.$document.on('keydown', function (e) {
            var keyCode = e.keyCode || e.which;

            switch (keyCode) {
                case 37:
                    self.executePrevPageShortcut();
                    break;

                case 39:
                    self.executeNextPageShortcut();
                    break;
            }
        });
    };

    this.executePrevPageShortcut = function () {
        if (self.elements.prevLink.length > 0) {
            window.location.href = self.elements.prevLink.attr('href');
        }
    };

    this.executeNextPageShortcut = function () {
        if (self.elements.nextLink.length > 0) {
            window.location.href = self.elements.nextLink.attr('href');
        }
    };


    this.init();

};
