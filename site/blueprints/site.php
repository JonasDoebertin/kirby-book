title: Site
pages:
    template:
        - chapter
        - article
files: true

fields:
    headlineGeneral:
        label: General Options
        type: headline
    title:
        label: Book Title
        type:  text
        help: The main title used by your visitors browsers and search engines.
    description:
        label: Book Description
        type:  textarea
        buttons: no
    author:
        label: Author
        type: text

    headlineVisuals:
        label: Visuals
        type: headline
    logo:
        label: Logo
        type: selector
        mode: single
    highlight:
        label: Highlight Color
        type: color
        default: d9342e
        width: 1/4
    primaryColorInfo:
        label: About the Primary Color
        type: info
        text: The primary color will be used for links and headlines.
        width: 3/4

    headlineFooter:
        label: Site Footer
        type: headline
    footer:
        label: Footer text
        type: markdown

    headlineWebmasterTools:
        label: Webmaster Tools
        type: headline
    googleId:
        label: Google Search Console Verification
        type: text
        icon: key
    bingId:
        label: Bing Webmaster Tools Verification
        type: text
        icon: key
