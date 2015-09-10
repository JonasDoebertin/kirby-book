title: Includes
pages:
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
            Includes are a great way to store reusable pieces of content (like tables, code blocks, system-requirements, copyright notices, etc.) that can be reused in any number of chapters or articles.

            <pre class="theme__code-block"><code>## Requirements



                &#40;include: system-requirements&#41;


                ****

                &#40;include: copyright&#41;</code></pre>

    setupHeadline:
        type: headline
        label: Add your Includes
    includes:
        type: structure
        label: Includes
        fields:
            indicator:
                type: text
                label: Indicator
            include:
                type: markdown
                label: Include Text
                tools:
                    - header1
                    - header2
                    - bold
                    - italic
                    - strikethrough
                    - blockquote
                    - unorderedList
                    - orderedList
                    - link
                    - email
                    - image
        entry: >
            <strong>{{indicator}}</strong><br/><br/>
            <em>{{include}}</em>

    title:
        type: title
        default: Includes
        readonly: true
    sitemap:
        type: hidden
        value: 0
