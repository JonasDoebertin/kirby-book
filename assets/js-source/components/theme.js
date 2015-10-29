/**
 * Modules
 */
var $     = require('jquery'),
    store = require('store');

/**
 * Local Variables
 */
var state     = {
        font:  'sans-serif',
        size:  'normal',
        color: 'white'
    },
    fonts     = ['serif', 'sans-serif'],
    sizes     = ['smaller', 'small', 'normal', 'large', 'larger'],
    colors    = ['white', 'sepia'],
    $document = $(document),
    $html     = $('html');





/**
 * Initialization.
 *
 * @since 1.1.0
 */
function init() {

    // Init initial state
    initState();

    // Bind toggle event handler
    $document.on('click', '.js-theme-toggle', function(event) {

        // Preparations
        var target = $(this);
        event.preventDefault();

        // Delegate to related setter
        switch(target.data('toggle')) {
            case 'font':
                setFont(target.data('value'));
                break;
            case 'size':
                changeSize(target.data('value'));
                break;
            case 'color':
                setColor(target.data('value'));
        }
    });

}

/**
 * Initialize theme with current saved state.
 *
 * @since 1.1.0
 */
function initState() {

    // Find and apply current font
    $.each(fonts, function(index, element) {
        if ($html.hasClass(element)) {
            state.font = element;
        }
    });
    setFont(store.get('font', state.font));

    // Find current size
    $.each(sizes, function(index, size) {
        if ($html.hasClass(size)) {
            state.size = size;
        }
    });
    setSize(store.get('size', state.size));

    // Find and apply current color
    $.each(colors, function(index, element) {
        if ($html.hasClass(element)) {
            state.color = element;
        }
    });
    setColor(store.get('color', state.color));

}

/**
 * Set a new font.
 *
 * @since 1.1.0
 * @param string
 */
function setFont(font) {
    state.font = font;
    $html.removeClass(fonts.join(' '));
    $html.addClass(font);
    store.set('font', font);
}

/**
 * Change font size upwards or downwards.
 *
 * @since 1.1.0
 * @param string
 */
function changeSize(direction) {
    var currentSize, newSize;

    // Get current and new sizes
    currentSize = state.size;
    newSize = getNextSize(currentSize, direction);

    // Set new size
    setSize(newSize);
}

/**
 * Set and store a new font size.
 *
 * @since 1.1.0
 * @param string
 */
function setSize(size) {
    state.size = size;
    $html.removeClass(sizes.join(' '));
    $html.addClass(size);
    store.set('size', size);
}

/**
 * Get the a new font size based on current size and direction.
 *
 * @since 1.1.0
 * @param string
 * @param string
 * @return string
 */
function getNextSize(current, direction) {
    var i = $.inArray(current, sizes);

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

    return (direction === 'up') ? sizes[++i] : sizes[--i];
}

/**
 * Set a new color.
 * @since 1.0.0
 * @param {string}  color
 * @return {void}
 */
function setColor(color) {
    state.color = color;
    $html.removeClass(colors.join(' '));
    $html.addClass(color);
    store.set('color', color);
}





/**
 * Exports
 */
module.exports = {
    init: init
};
