title: Includes
pages:
    template: include
    num: zero
files:
    hide: true
preview: false
deletable: false
icon: puzzle-piece

fields:
    aboutHeadline:
        type: headline
        label: How to use Includes
    about:
        type: info
        text: >
            Includes are a great way to store reusable pieces of text that can be added to any number of chapters or articles.

            <pre class="theme__code-block"><code>&#40;include: system-requirements&#41;

                &#40;include: my-copyright&#41;
            </code></pre>


    title:
        type: title
        default: Includes
        readonly: true
    sitemap:
        type: hidden
        value: 0
