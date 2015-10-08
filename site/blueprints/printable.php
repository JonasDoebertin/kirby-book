title: Printable
pages:
    hide: true
files:
    hide: true
deletable: false
icon: print

fields:
    aboutHeadline:
        type: headline
        label: About this special page
    about:
        type: info
        text: >
            The “Printable” special page

    optionsHeadline:
        type: headline
        label: Options
    autoPrint:
        type: checkbox
        label: Automatic Printing
        text: Trigger print dialogue automatically
        default: true
        width: 1/2

    headlineAdvancedOptions:
        label: Advanced Options
        type: headline
    customStyles:
        type: textarea
        label: Custom CSS
        buttons: false
        icon: paint-brush
        help: Use this to add custom CSS rules that will be applied to the print version of your publication. This allows to hide certain JS plugins which could interfere with the print layout.

    title:
        type: title
        default: Printable
        readonly: true
    sitemap:
        type: hidden
        value: 0
