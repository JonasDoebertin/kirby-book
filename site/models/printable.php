<?php

class PrintablePage extends BasePage
{
    public function getArticles()
    {
        $topPages = $this->topLevelArticles();

        $pages = [];
        $pages[] = site()->homePage();
        foreach ($topPages as $topPage) {
            $pages[] = $topPage;

            $subPages = $topPage->containedArticles();
            foreach ($subPages as $subPage) {
                $pages[] = $subPage;
            }
        }

        return $pages;
    }
}
