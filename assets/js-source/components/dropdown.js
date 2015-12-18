/**
 * Modules
 */
var $ = require('jquery');

/**
 * Variables
 */
var $document = $(document);

/**
 * Initialize dropdowns.
 *
 * @since 1.1.0
 */
function init() {

    // Bind toggle event handler to all dropdown containers
    $document.on('click', '.js-dropdown-toggle', function(event) {
        event.stopPropagation();
        event.preventDefault();

        // Hide all other dropdowns
        hideAll();

        // Show related dropdown
        $(this).toggleClass('with-dropdown');
    });

    // Prevent clicks on dropdown from closing it
    $document.on('click', '.dropdown', function(event) {
        event.stopPropagation();
    });

    // Hide all dropdown on clicks elsewhere
    $document.on('click', hideAll);
}

/**
 * Hide all dropdowns.
 *
 * @since 1.1.0
 */
function hideAll() {
    $document.find('.js-dropdown-toggle').toggleClass('with-dropdown', false);
}

/**
 * Exports
 */
module.exports = {
    init: init,
    hideAll: hideAll
};
