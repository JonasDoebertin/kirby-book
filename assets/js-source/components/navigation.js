/**
 * Modules
 */
var $         = jQuery = require('jquery'),
    pjax      = require('jquery-pjax'),
    nprogress = require('nprogress');

/**
 * Local Variables
 */
var $document = $(document);




/**
 * Initialization.
 *
 * @since 1.1.0
 */
function init() {
    initPjax();
    bindPjaxHandler();
    bindPrevNextPageShortcut();
}

/**
 * Initialize pjax.
 *
 * @since 1.1.0
 */
function initPjax() {
    $.pjax.defaults.timeout = 1000;
    $.pjax.defaults.container = '#pjax-container';
    $.pjax.defaults.fragment = '#pjax-container';

    nprogress.configure({showSpinner: false});

    $document.on('pjax:start', function () {
        nprogress.start();
    });
    $document.on('pjax:end', function () {
        nprogress.done();
    });
}

/**
 * Bin pjax handler to anchor tags.
 *
 * @since 1.1.0
 */
function bindPjaxHandler() {
    $document.on('click', 'a', function (e) {
        var anchor = $(this);

        if (!anchor.is('[data-no-pjax]')) {
            e.preventDefault();
            navigateTo($(this).attr('href'), false);
        }
    });
}

/**
 * Bin key events for "Previous Page" and "Next Page" keyboard shortcuts.
 *
 * @since 1.1.0
 */
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

/**
 * Handle the "Previous Page" keyboard shortcut.
 *
 * @since 1.1.0
 */
function executePrevPageShortcut() {
    var anchor = $('a[rel=prev]');

    if (anchor.length > 0) {
        navigateTo(anchor.attr('href'));
    }
}

/**
 * Handle the "Next Page" keyboard shortcut.
 *
 * @since 1.1.0
 */
function executeNextPageShortcut() {
    var anchor = $('a[rel=next]');

    if (anchor.length > 0) {
        navigateTo(anchor.attr('href'));
    }
}

/**
 * Navigate to a url.
 *
 * @since 1.1.0
 * @param string
 * @param boolean
 */
function navigateTo(url, forced) {

    if (forced === null) {
        forced = false;
    }

    if (forced) {
        navigateWithForced(url);
    } else {
        navigateWithPjax(url);
    }

}

/**
 * Use pjax to navigate.
 *
 * @since 1.1.0
 * @param string
 */
function navigateWithPjax(url) {
    $.pjax({
        url: url
    });
}

/**
 * Use a forced reload to navigate.
 *
 * @since 1.1.0
 * @param string
 */
function navigateWithForced(url) {
    window.location.href = url;
}





/**
 * Exports
 */
module.exports = {
    init: init,
    navigateTo: navigateTo
};
