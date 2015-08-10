<?php

/**
 * DATA PREPARATION
 * ================
 * 1. Get ignored pages from config.
 */
$ignore = c::get('sitemap.ignore', []);


/**
 * SITEMAP STRUCTURE
 * =================
 * 1. Send correct content type header
 * 2. Print XML tag (would break PHP parsing, if added below)
 */
header('Content-type: text/xml; charset="utf-8"');
echo '<?xml version="1.0" encoding="utf-8"?>';

?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <?php foreach ($site->index() as $item): ?>
        <?php if (in_array($item->uri(), $ignore)) continue ?>
        <?php if($item->sitemap() != '1') continue ?>

        <url>
            <loc><?= $item->url() ?></loc>
            <priority><?= (!$item->priority()->empty()) ? $item->priority()->xml() : number_format(1 / $item->depth(), 1) ?></priority>
            <lastmod><?= $item->modified('c') ?></lastmod>
        </url>
    <?php endforeach ?>

</urlset>
