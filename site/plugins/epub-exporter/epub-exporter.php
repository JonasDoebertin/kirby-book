<?php

use PHPePub\Core\EPub;

class EPubExporter
{
    /**
     * The generated book.
     *
     * @var PHPePub\Core\EPub
     */
    protected $book;

    /**
     * Local copy of Kirbys $site variable.
     *
     * @var Site
     */
    protected $site;

    /**
     * HTMLPurifier instance.
     *
     * @var HTMLPurifier
     */
    protected $purifier;


    /**
     * Main public API.
     *
     * Handles generating the ePub file as well as
     * caching it for subsequent downloads.
     *
     * @since 1.1.0
     */
    public static function export()
    {
        $cacheDir = kirby()->roots->cache();
        $filename = F::safeName(site()->title()) . '.epub';
        $cacheFile = $cacheDir . DS . 'exported-epub-' . $filename;

        // Check for pregenerated ePub file
        if (F::exists($cacheFile) and F::isReadable($cacheFile)) {
            // Send headers to force download
            Header::download([
                'name'     => $filename,
                'size'     => F::size($cacheFile),
                'mime'     => 'application/epub+zip',
                'modified' => F::modified($cacheFile),
            ]);

            // Send file content
            echo F::read($cacheFile);
            die;
        }

        // Generate book
        $exporter = new static();
        $epub = $exporter->build();

        // Save generated ePub to cache
        F::write($cacheFile, $epub->getBook());

        // Send generated ePub as forced download
        $epub->sendBook($filename);
        die;
    }

    /**
     * Remove the cached ePub file.
     *
     * @since 1.1.0
     */
    public static function clearCache()
    {
        $cacheDir = kirby()->roots->cache();
        $filename = F::safeName(site()->title()) . '.epub';
        $cacheFile = $cacheDir . DS . 'exported-epub-' . $filename;

        if (F::exists($cacheFile)) {
            F::remove($cacheFile);
        }
    }

    /**
     * Set up a new instance and prepare ePub generator.
     *
     * @since 1.1.0
     */
    public function __construct()
    {
        // Create local copy of Kirbys $site variable
        $this->site = site();

        // Set up ePub generator
        $this->book = new EPub(EPub::BOOK_VERSION_EPUB3);

        // Set up HTMLPurifier
        $this->initPurifier();

        // Set book meta data
        $this->setTitle();
        $this->setAuthor();
        $this->setPublisher();
        $this->setDescription();
        $this->setSubject();
        $this->setCoverImage();
    }

    /**
     * Add chapters to the book.
     *
     * @since 1.1.0
     */
    public function build()
    {
        $this->book->addCSSFile('styles.css', 'styles', $this->getStyles());

        // Add home page
        $homePage = $this->site->homePage();
        $this->addChapter($homePage);

        // Walk over chapters
        foreach ($homePage->topLevelArticles(true) as $chapter) {
            // Include chapter
            $this->addChapter($chapter);

            // Walk over and include contained articles
            $articles = $chapter->containedArticles(true);
            if ($articles->count() > 0) {
                $this->book->subLevel();
                foreach ($chapter->containedArticles() as $article) {
                    $this->addChapter($article);
                }
                $this->book->backLevel();
            }
        }

        // Finalize and return book.
        $this->book->finalize();

        return $this->book;
    }


    /**************************************************************************\
    *                                META DATA                                 *
    \**************************************************************************/

    /**
     * Set the books required meta data.
     *
     * @since 1.1.0
     */
    protected function setMeta()
    {
        $this->book->setIdentifier($this->site->url() . '?generated=' . time(), EPub::IDENTIFIER_URI);
        $this->book->setLanguage($this->site->contentLanguage());
        $this->book->setDate(time());
        $this->book->setSourceUrl($this->site->url());
    }

    /**
     * Set the books title.
     *
     * @since 1.1.0
     */
    protected function setTitle()
    {
        $title = $this->site->title();
        $this->book->setTitle($title);
    }

    /**
     * Set the books author.
     *
     * @since 1.1.0
     */
    protected function setAuthor()
    {
        $author = $this->site->epubAuthor();
        $sortAuthor = (!$this->site->epubSortAuthor()->empty())
            ? $this->site->epubSortAuthor()
            : $this->site->epubAuthor();

        if (!$author->empty() and !$sortAuthor->empty()) {
            $this->book->setAuthor($author->toString(), $sortAuthor->toStrong());
        }
    }

    /**
     * Set the books publisher.
     *
     * @since 1.1.0
     */
    protected function setPublisher()
    {
        $publisher = $this->site->epubPublisherName();
        $url = $this->site->epubPublisherUrl();
        if (!$publisher->empty()) {
            $this->book->setPublisher($publisher, $url);
        }
    }

    /**
     * Set the books description.
     *
     * @since 1.1.0
     */
    protected function setDescription()
    {
        $description = strip_tags($this->site->epubDescription());
        if (!empty($description)) {
            $this->book->setDescription($description);
        }
    }

    /**
     * Set the books subject.
     *
     * @since 1.1.0
     */
    protected function setSubject()
    {
        $subject = $this->site->epubSubject();
        if (!$subject->empty()) {
            $this->book->setSubject($subject);
        }
    }

    /**
     * Set the books cover image.
     *
     * @since 1.1.0
     */
    protected function setCoverImage()
    {
        $cover = $this->site->epubCover()->toFile();
        if (!is_null($cover)) {
            $this->book->setCoverImage($cover->root());
        }
    }

    /**************************************************************************\
    *                                 CHAPTERS                                 *
    \**************************************************************************/

    /**
     * Add a chapter.
     *
     * @since 1.1.0
     * @param Page
     */
    protected function addChapter($page)
    {
        // Build chapter meta and markup
        $title = strip_tags($page->title()->html());
        $file = Str::slug($page->uri()) . '.html';
        $markup = $this->getChapterStart($title) . $this->getPageMarkup($page) . $this->getChapterEnd();

        // Add chapter to book
        $this->book->addChapter($title, $file, $markup, true, EPub::EXTERNAL_REF_ADD, kirby()->roots->content());
    }

    /**
     * Generate the start of a chapters wrapping markup.
     *
     * @since 1.1.0
     * @param string
     * @return string
     */
    protected function getChapterStart($title)
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"
            . "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"\n"
            . "    \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n"
            . "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n"
            . "<head>"
            . "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n"
            . "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\" />\n"
            . "<title>" . $title . "</title>\n"
            . "</head>\n"
            . "<body>\n";
    }

    /**
     * Generate the end of a chapters wrapping markup.
     *
     * @since 1.1.0
     * @return string
     */
    protected function getChapterEnd()
    {
        return "</body>\n</html>\n";
    }

    /**
     * Generate a pages markup.
     *
     * @since 1.1.0
     * @param  Page   $page
     * @return string
     */
    protected function getPageMarkup($page)
    {
        $markup = '<h1>' . strip_tags($page->headline()->or($page->title())->html()) . '</h1>';
        $markup .= $this->purifyMarkup($page->text()->kirbytext());

        return $markup;
    }

    /**
     * Generate general styles.
     *
     * @since 1.1.0
     * @return string
     */
    protected function getStyles()
    {
        // Page breaks inside tables
        $css = 'table {page-break-inside: avoid;}';
        $css .= 'tr {page-break-inside: avoid; page-break-after: auto; }';
        $css .= 'thead {display: table-header-group;}';

        // Fix italic FontAwesome alternatives
        $css .= '.fa {font-style: normal !important;}';

        return $css;
    }

    /**************************************************************************\
    *                               HTMLPurifier                               *
    \**************************************************************************/

    /**
     * Initialize HTMLPurifier.
     *
     * @since 1.1.0
     */
    protected function initPurifier()
    {
        // Set up allowed elements
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'a[href|target|rel],strong,b,em,i,strike,pre,code,p,ol,ul,li,dl,dt,dd,br,h1,h2,h3,h4,h5,h6,figure,figcaption,img[src|alt],blockquote,q,cite,span,table,thead,tbody,tfoot,tr,td,th,*[style|id|class]');

        // Add <figure> and <figcaption> elements to DTD
        $definition = $config->getHTMLDefinition(true);
        $figure = $definition->addElement('figure', 'Flow', 'Flow', 'Common');
        $figcaption = $definition->addElement('figcaption', 'Flow', 'Flow', 'Common');

        // Instantiate purifier
        $this->purifier = new HTMLPurifier($config);
    }

    /**
     * Purify HTML markup to exclude unwanted elements.
     *
     * @since 1.1.0
     * @param  string $markup
     * @return string
     */
    protected function purifyMarkup($markup)
    {
        return $this->purifier->purify($markup);
    }
}
