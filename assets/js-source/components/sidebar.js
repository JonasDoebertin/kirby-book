/**
 * Modules
 */
var $        = require('jquery'),
    platform = require('./platform'),
    store    = require('store');

/**
 * Local Variables
 */
var $document = $(document),
    $html     = $('html');





function init() {

    // Bind toggle event handler
    $document.on('click', '.js-action-toggle-sidebar', function(event) {
        event.preventDefault();
        toggleSidebar(null, true);
    });

    // Hide the navigation on mobile devices
    if (platform.isMobile) {
        toggleSidebar(false, false);
    }
    // On screens that are large enough we'll initialize the last state
    else {
        toggleSidebar(store.get('sidebar', true), false);
    }
}

function toggleSidebar(show, animation) {

    // Abort if the sidebar shall be shown but is already visible
    if (show !== null && isVisible() === show) {
        return;
    }

    // Initialize show parameter
    if (show === null) {
        show = !isVisible();
    }

    // Initialize animation parameter
    if (animation === null) {
        animation = true;
    }

    // Toggle classes on <html> element
    $html.toggleClass('with-animation', animation);
    $html.toggleClass('with-sidebar', show);

    // Save state
    store.set('sidebar', show);
}

function isVisible() {
    return $html.hasClass('with-sidebar');
}





/**
 * Exports
 */
module.exports = {
    init: init,
    toggle: toggleSidebar,
    visible: isVisible
};
