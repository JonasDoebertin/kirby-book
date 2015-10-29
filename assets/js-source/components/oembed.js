/**
 * Modules
 */
var $       = require('jquery');
    // fitVids = require('../../../bower_components/jquery.fitvids/jquery.fitvids.js');

/**
 * Local Variables
 */
var $document = $(document),
    selectors = [
        'iframe[src*=\'instagram.com\'][src*=\'embed\']',
        'iframe[src*=\'soundcloud.com/player\']',
        'iframe[src*=\'embed.spotify.com\']',
        'iframe[src*=\'vine.co\']',
    ];





function init() {
    // $('.js-page-content').fitVids({customSelector: selectors.join()});
}





/**
 * Exports
 */
module.exports = {
    init: init
};
