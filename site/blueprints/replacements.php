title: Replacements
pages:
    template: replacement
    num: zero
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
                    Use a replacement indicator within your pages text like so: <code class="theme__inline-code">{{brandname}}</code>.
                </li>
                <li>
                    Create a replacement with your choosen indicator and add your replacement content, eg.: <code class="theme__inline-code">&lt;strong&gt;brandNAME&lt;/strong&gt;</code>
                </li>
            </ol>


    title:
        type: title
        default: Includes
        readonly: true
    sitemap:
        type: hidden
        value: 0
