<!DOCTYPE HTML>
<html class="no-js white normal sans-serif <?= r($case, $case, 'with-sidebar with-animation') ?>" lang="<?= $site->contentlanguage()?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">

        <meta name="generator" content="<?= Theme::generator() ?>">
        <title><?= $page->metaTitle() ?></title>
        <meta name="description" content="<?= $page->metaDescription() ?>">
        <meta name="author" content="<?= $page->metaAuthor() ?>">

        <meta property="og:url" content="<?= $page->url() ?>">
        <meta property="og:site_name" content="<?= $site->title()->escape('attr') ?>">
        <meta property="og:title" content="<?= $page->metaTitle() ?>">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?= $page->metaDescription() ?>">
        <meta property="og:locale" content="<?= $site->contentlanguage()?>">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="<?= $page->metaTitle() ?>">
        <meta name="twitter:description" content="<?= $page->metaDescription() ?>">

        <meta name="HandheldFriendly" content="true">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <?= $site->faviconCode() ?>

        <link rel="canonical" href="<?= $page->url() ?>">
        <?php if ($prev = $page->prevArticle()): ?>
            <link rel="prev" href="<?= $prev->url() ?>">
        <?php endif ?>
        <?php if ($next = $page->nextArticle()): ?>
            <link rel="next" href="<?= $next->url() ?>">
        <?php endif ?>

        <?= $site->googleMeta() ?>
        <?= $site->bingMeta() ?>

        <?= css('//fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic|Open+Sans:400italic,700italic,400,700') ?>
        <?= css('assets/css/main.min.css') ?>
        <?= Theme::generateStyles() ?>
    </head>
    <body>
        <div class="wrap">
