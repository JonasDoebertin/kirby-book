<?php

class BasePage extends Page
{

    public function topLevelArticles()
    {
        return site()->pages()->visible()->filter(function($item) {
            return in_array($item->intendedTemplate(), ['chapter', 'article']);
        });
    }

    public function containedArticles()
    {
        return $this->children()->visible()->filter(function($item) {
            return in_array($item->intendedTemplate(), ['chapter', 'article']);
        });
    }

    public function metaTitle()
    {
        if ($this->isHomePage()) {
            $title = site()->title();
        }
        else {
            $title = $this->title() . ' | ' . site()->title();
        }

        return $title;
    }

    public function metaDescription()
    {
        return site()->description()->html();
    }

    public function metaAuthor()
    {
        return site()->author()->html();
    }

}
