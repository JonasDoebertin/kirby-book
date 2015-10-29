/**
 * Modules
 */
var $ = require('jquery');

/**
 * Local Variables
 */
var prevLink = $('link[rel=prev]'),
    nextLink = $('link[rel=next]'),
    $document = $(document);




/**
 * Initialization.
 *
 * @since 1.1.0
 */
function init() {
    bindPrevNextPageShortcut();
}

function bindPrevNextPageShortcut() {
    $document.on('keydown', function (e) {
        var keyCode = e.keyCode || e.which;

        switch (keyCode) {
            case 37:
                executePrevPageShortcut();
                break;

            case 39:
                executeNextPageShortcut();
                break;
        }
    });
}

function executePrevPageShortcut() {
    if (prevLink.length > 0) {
        window.location.href = prevLink.attr('href');
    }
}

function executeNextPageShortcut() {
    if (nextLink.length > 0) {
        window.location.href = nextLink.attr('href');
    }
}





/**
 * Exports
 */
module.exports = {
    init: init
};
