/**
 * Modules
 */
var matchMedia = require('../../../bower_components/matchMedia/matchMedia.js');

/**
 * Local Variables
 */
var mobileQuery = 'only screen and (max-width: 600px)';

/**
 * Exports
 */
module.exports = {
    isMobile: window.matchMedia(mobileQuery).matches
};
