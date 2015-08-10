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
        width: 1/2
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
        width: 2/4
    highlightColorInfo:
        label: About the Highlight Color
        type: info
        text: The highlight color will be used for links and headlines.
        width: 2/4
    font:
        label: Default Font
        type: radio
        options:
            serif: Serif
            sans-serif: Sans Serif
        columns: 1
        width: 1/2
        required: true
    fontInfo:
        label: About the Default Font
        type: info
        text: The default font will define how a new visitor sees your book. Please note that, regardless of this setting, the visitor will be able to switch between a serif and sans-serif font.
        width: 2/4

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
        icon: google
    bingId:
        label: Bing Webmaster Tools Verification
        type: text
        icon: windows

    headlineAdvancedOptions:
        label: Advanced Options
        type: headline

    tracking:
        label: Tracking Code
        type: textarea
        buttons: false
        icon: bar-chart
