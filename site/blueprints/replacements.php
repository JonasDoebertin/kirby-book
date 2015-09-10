title: Replacements
pages:
    hide: true
files:
    hide: true
preview: false
deletable: false
icon: pencil-square-o

fields:
    aboutHeadline:
        type: headline
        label: How to use Replacements
    about:
        type: info
        text: >
            Replacements are a great way to apply consistent styles to any number of occurances of a word (or a number of words) across the whole site and to make editing the styles a breeze.

            <ol>
                <li>
                    Create a replacement with your choosen indicator and replacement text, eg.: <code class="theme__inline-code">&lt;strong&gt;brandNAME&lt;/strong&gt;</code> by clicking <strong>Add</strong> below.
                </li>
                <li>
                    Use the replacement indicator within your content like so: <code class="theme__inline-code">{{indicator}}</code>.
                </li>

            </ol>

    setupHeadline:
        type: headline
        label: Add your Replacements
    replacements:
        type: structure
        label: Replacements
        fields:
            indicator:
                type: text
                label: Indicator
            replacement:
                type: markdown
                label: Replacement Text
                tools:
                    - bold
                    - italic
                    - strikethough
                    - link
                    - email
        entry: >
            <strong>{{indicator}}</strong><br/><br/>
            <em>{{replacement}}</em>

    title:
        type: title
        default: Includes
        readonly: true
    sitemap:
        type: hidden
        value: 0
