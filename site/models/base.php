<?php

class BasePage extends Page
{
    /**
     * Get all top level chapters and articles.
     *
     * @since 1.0.0
     * @return Pages
     */
    public function topLevelArticles($export = false)
    {
        return site()->pages()->visible()->filter(function ($item) use ($export) {
            if ($export) {
                return ($item->ePub()->int() === 1) and in_array($item->intendedTemplate(), ['chapter', 'article']);
            }

            return in_array($item->intendedTemplate(), ['chapter', 'article']);
        });
    }

    /**
     * Get all articles within the current chapter.
     *
     * @since 1.0.0
     * @return Pages
     */
    public function containedArticles($export = false)
    {
        return $this->children()->visible()->filter(function ($item) use ($export) {
            if ($export) {
                return ($item->ePub()->int() === 1) and in_array($item->intendedTemplate(), ['chapter', 'article']);
            }

            return in_array($item->intendedTemplate(), ['chapter', 'article']);
        });
    }

    /**
     * Get a flat array of all articles.
     *
     * @since 1.0.0
     * @return Pages
     */
    public function getArticles()
    {
        $pages = [];
        $pages[] = site()->homePage();
        foreach ($this->topLevelArticles() as $page) {
            $pages[] = $page;
            $subPages = $page->containedArticles();
            foreach ($subPages as $subPage) {
                $pages[] = $subPage;
            }
        }

        return $pages;
    }

    /**
     * Get the previous article for any page.
     *
     * @since 1.0.0
     * @return Page|boolean
     */
    public function prevArticle()
    {
        // If there is a regular next page and it has children return the last child
        if ($this->hasPrevVisible() and $this->prevVisible()->hasVisibleChildren()) {
            return $this->prevVisible()->children()->visible()->last();
        }

        // If there is a regular previous page return it
        if ($this->hasPrevVisible()) {
            return $this->prevVisible();
        }

        // If the page has a parent return it
        if ($this->parent()->depth() > 0) {
            return $this->parent();
        }

        // No previous page found
        return false;
    }

    /**
     * Get the next article for any page.
     *
     * @since 1.0.0
     * @return Page|boolean
     */
    public function nextArticle()
    {
        // If a page has children return the first of'em
        if ($this->hasVisibleChildren()) {
            return $this->children()->visible()->first();
        }

        // If there is a regular next page return it
        if ($this->hasNextVisible()) {
            return $this->nextVisible();
        }

        // If the parent has a regular next page return it
        if ($this->parent()->hasNextVisible()) {
            return $this->parent()->nextVisible();
        }

        // No next page found
        return false;
    }

    /**
     * Get the meta title of the page.
     *
     * @since 1.0.0
     * @return string
     */
    public function metaTitle()
    {
        if ($this->isHomePage()) {
            return site()->metatitle()->or(site()->title())->escape('html');
        } else {
            return $this->title()->escape('attr') . ' | ' . site()->metatitle()->or(site()->title())->escape('html');
        }
    }
    /**
     * Get the meta description of the page.
     *
     * @since 1.0.0
     * @return string
     */
    public function metaDescription()
    {
        if ($this->isHomePage() or $this->isErrorPage()) {
            return site()->description()->escape('html');
        } else {
            return $this->text()->escape('html')->excerpt(50, 'words');
        }
    }

    /**
     * Get the sites meta author.
     *
     * @since 1.0.0
     * @return string
     */
    public function metaAuthor()
    {
        return site()->author()->escape('html');
    }

    /**
     * Get the "Table of Contents" number for any page.
     *
     * @since 1.0.0
     * @return string
     */
    public function tocNumber()
    {
        $number = $this->num() . '.';

        if (!is_null($parent = $this->parent())) {
            $number = $parent->tocNumber() . $number;
        }

        return $number;
    }

    /**
     * Generate the pages fuzzy "Updated at" string.
     *
     * @since 1.0.0
     * @return string
     */
    public function updated()
    {
        $args = [
            'lang' => site()->contentLanguage(),
        ];

        return relativeDate($this->modified(), $args);
    }

    /**
     * Get a share link for the current page.
     *
     * @since 1.0.0
     * @param  string $service
     * @return string
     */
    public function share($service)
    {
        if (!in_array($service, ['facebook', 'twitter', 'googleplus'])) {
            return '';
        }

        return jdpowered\Share\Share::{$service}($this->url());
    }
}
