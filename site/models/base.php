<?php

class BasePage extends Page
{
    public function topLevelArticles()
    {
        return site()->pages()->visible()->filter(function ($item) {
            return in_array($item->intendedTemplate(), ['chapter', 'article']);
        });
    }

    public function containedArticles()
    {
        return $this->children()->visible()->filter(function ($item) {
            return in_array($item->intendedTemplate(), ['chapter', 'article']);
        });
    }

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

    public function metaTitle()
    {
        if ($this->isHomePage()) {
            $title = site()->title()->escape('attr');
        } else {
            $title = $this->title()->escape('attr') . ' | ' . site()->title()->escape('attr');
        }

        return $title;
    }

    public function metaDescription()
    {
        if ($this->isHomePage() or $this->isErrorPage()) {
            $description = site()->description()->escape('attr');
        } else {
            $description = $this->text()->excerpt(50, 'words');
        }

        return $description;
    }

    public function metaAuthor()
    {
        return site()->author()->escape('attr');
    }

    public function tocNumber()
    {
        $number = $this->num() . '.';

        if (!is_null($parent = $this->parent())) {
            $number = $parent->tocNumber() . $number;
        }

        return $number;
    }

    public function updated()
    {
        $args = [
            'lang' => site()->contentLanguage(),
        ];

        return relativeDate($this->modified(), $args);
    }

    public function share($service)
    {
        if (!in_array($service, ['facebook', 'twitter', 'googleplus'])) {
            return '';
        }

        return jdpowered\Share\Share::{$service}($this->url());
    }
}
