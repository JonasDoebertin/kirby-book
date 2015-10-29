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
        help: The main title of the book. This will be used at the top of the sidebar, within each pages navigation bar.
    metatitle:
        label: Meta Title
        type:  text
        help: The meta title of the book. This will be used by your visitors browsers and search engines.
    description:
        label: Book Description
        type:  textarea
        buttons: no
        help: The books description will be used within the meta data of the sites home page and will be shown by search engines.
    author:
        label: Author
        type: text
        width: 1/2
        help: The book author will be added to each pages meta data.
    contentlanguage:
        label: Content Language
        type: select
        default: en
        options:
            om: (Afan) Oromo
            ab: Abkhazian
            aa: Afar
            af: Afrikaans
            sq: Albanian
            am: Amharic
            ar: Arabic
            hy: Armenian
            as: Assamese
            ay: Aymara
            az: Azerbaijani
            ba: Bashkir
            eu: Basque
            bn: Bengali
            dz: Bhutani
            bh: Bihari
            bi: Bislama
            br: Breton
            bg: Bulgarian
            my: Burmese
            be: Byelorussian
            km: Cambodian
            ca: Catalan
            zh: Chinese
            co: Corsican
            hr: Croatian
            cs: Czech
            da: Danish
            nl: Dutch
            en: English
            eo: Esperanto
            et: Estonian
            fo: Faeroese
            fj: Fiji
            fi: Finnish
            fr: French
            fy: Frisian
            gl: Galician
            ka: Georgian
            de: German
            el: Greek
            kl: Greenlandic
            gn: Guarani
            gu: Gujarati
            ha: Hausa
            he: Hebrew (former iw)
            hi: Hindi
            hu: Hungarian
            SO: Sprache
            is: Icelandic
            id: Indonesian (former in)
            ia: Interlingua
            ie: Interlingue
            ik: Inupiak
            iu: Inuktitut (Eskimo)
            ga: Irish
            it: Italian
            ja: Japanese
            jw: Javanese
            kn: Kannada
            ks: Kashmiri
            kk: Kazakh
            rw: Kinyarwanda
            ky: Kirghiz
            rn: Kirundi
            ko: Korean
            ku: Kurdish
            lo: Laothian
            la: Latin
            lv: Latvian, Lettish
            ln: Lingala
            lt: Lithuanian
            mk: Macedonian
            mg: Malagasy
            ms: Malay
            ml: Malayalam
            mt: Maltese
            mi: Maori
            mr: Marathi
            mo: Moldavian
            mn: Mongolian
            na: Nauru
            ne: Nepali
            no: Norwegian
            oc: Occitan
            or: Oriya
            ps: Pashto, Pushto
            fa: Persian
            pl: Polish
            pt: Portuguese
            pa: Punjabi
            qu: Quechua
            rm: Rhaeto-Romance
            ro: Romanian
            ru: Russian
            SO: Sprache
            sm: Samoan
            sg: Sangro
            sa: Sanskrit
            gd: Scots Gaelic
            sr: Serbian
            sh: Serbo-Croatian
            st: Sesotho
            tn: Setswana
            sn: Shona
            sd: Sindhi
            si: Singhalese
            ss: Siswati
            sk: Slovak
            sl: Slovenian
            so: Somali
            es: Spanish
            su: Sudanese
            sw: Swahili
            sv: Swedish
            tl: Tagalog
            tg: Tajik
            ta: Tamil
            tt: Tatar
            te: Tegulu
            th: Thai
            bo: Tibetan
            ti: Tigrinya
            to: Tonga
            ts: Tsonga
            tr: Turkish
            tk: Turkmen
            tw: Twi
            ug: Uigur
            uk: Ukrainian
            ur: Urdu
            uz: Uzbek
            vi: Vietnamese
            vo: Volapuk
            cy: Welch
            wo: Wolof
            xh: Xhosa
            yi: Yiddish (former ji)
            yo: Yoruba
            za: Zhuang
            zu: Zulu
        width: 1/2
        required: true
        help: Setting your publications language here will improve search engine visibility of your content.

    headlineVisuals:
        label: Visual Options
        type: headline
    logo:
        label: Logo
        type: selector
        mode: single
        help: Choose any image format and size you like; kirbyBOOK will handle generating the correct image size for you.
    font:
        label: Default Font
        type: radio
        options:
            serif: Serif
            sans-serif: Sans Serif
        columns: 1
        width: 1/2
        required: true
        help: The default font will define how a new visitor sees your book. Please note that, regardless of this setting, the visitor will be able to switch between a serif and sans-serif font.
    highlight:
        label: Highlight Color
        type: color
        default: d9342e
        width: 2/4
        help: The highlight color will be used for both links and main headlines throughout the site.
    customStyles:
        type: textarea
        label: Custom CSS
        buttons: false
        icon: paint-brush
        help: Use this to add custom CSS rules that will be applied to every page across the whole publication. This allows for easy theme customizations without ever touching a code editor.

    headlineFooter:
        label: Site Footer
        type: headline
    footer:
        label: Footer text
        type: markdown
        help: The sites footer text is displayed within the navigation sidebar right below the chapter/article overview. It is perfect for adding a copyright message or something similar and supports standard markdown features.

    headlineWebmasterTools:
        label: Webmaster Tools
        type: headline
        help: Adding your site to Googles *Search Console* or Bings *Webmaster Tools* requires you to add a little authentication key to your pages markup. Instead of manually adding them to the templates, you can simply add these tags here and {{kirbybook}} will take care of the rest for you.
    googleMeta:
        label: Google Search Console Verification Meta Tag
        type: text
        icon: google
    bingMeta:
        label: Bing Webmaster Tools Verification Meta Tag
        type: text
        icon: windows

    headlineAdvancedOptions:
        label: Advanced Options
        type: headline
    faviconCode:
        label: Favicon/Meta Tags
        type: textarea
        buttons: false
        icon: code
        help: >
            Enter all your favicon related markup or other meta tags here. Tip: A great tool to create your favicon images and the necessary code is <a href="http://realfavicongenerator.net/">Real Favicon Generator</a>.
    tracking:
        label: Tracking Code
        type: textarea
        buttons: false
        icon: bar-chart
        help: >
            Enter you Google Analytics tracking code here. Make sure to include all the <code class="theme__inline-code">&lt;script&gt;</code> tags. Other tracking services like Piwik will work well, too.
    scripts:
        label: Custom JavaScript Code
        type: textarea
        buttons: false
        icon: code
        help: >
            Enter any additional JavaScript code snippets here. Make sure to include all the <code class="theme__inline-code">&lt;script&gt;</code> tags.
