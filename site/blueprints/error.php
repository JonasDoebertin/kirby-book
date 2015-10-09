title: Error
pages:
    hide: true
files:
    hide: true
deletable: false
icon: exclamation-circle

fields:
    headlineContent:
        type: headline
        label: Content
    title:
        label: Title
        type: text
    headline:
        label: Headline
        type: text
    text:
        label: Text
        type: markdown

    logo:
        label: Logo
        type: selector
        mode: single
        help: Choose any image format and size you like; kirbyBOOK will handle generating the correct image size for you.

    headlineAdvancedOptions:
        label: Advanced Options
        type: headline
    customStyles:
        type: textarea
        label: Custom CSS
        buttons: false
        icon: paint-brush
        help: Use this to add custom CSS rules that will be applied to your publications error page. This allows to hide certain JS plugins or change the pages design.

    sitemap:
        type: hidden
        value: 0
