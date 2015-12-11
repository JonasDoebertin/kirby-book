/**
 * Modules
 */
var $          = require('jquery'),
    dropdown   = require('./components/dropdown'),
    navigation = require('./components/navigation'),
    print      = require('./components/print.js'),
    sidebar    = require('./components/sidebar'),
    theme      = require('./components/theme');





function boot() {
    dropdown.init();
    navigation.init();
    oembed.init();
    print.init();
    sidebar.init();
    theme.init();
}

boot();





module.exports = {};
