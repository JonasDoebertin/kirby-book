/**
 * Modules
 */
var $        = require('jquery'),
    dropdown = require('./dropdown');

/**
 * Local Variables
 */
var $document = $(document);





function init() {
    // Bind print button event
    $document.on('click', '.js-print-page', function (event) {
        event.preventDefault();
        dropdown.hideAll();
        window.print();
    });
}





/**
 * Exports
 */
module.exports = {
    init: init
};
