<!DOCTYPE HTML>
<html class="no-js  white normal sans-serif with-sidebar with-animation" lang="<?= $site->contentlanguage()?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">

        <title><?= $page->metaTitle() ?></title>
        <meta name="description" content="<?= $page->metaDescription()->escape('attr') ?>">
        <meta name="generator" content="<?= Theme::generator() ?>">
        <meta name="author" content="<?= $page->metaAuthor()->escape('attr') ?>">

        <meta name="HandheldFriendly" content="true">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <?= $site->googleMeta() ?>
        <?= $site->bingMeta() ?>

        <?= $site->faviconCode() ?>

        <?= css('//fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic|Open+Sans:400italic,700italic,400,700') ?>
        <?= css('assets/css/main.min.css') ?>
        <?= Theme::generateStyles() ?>
    </head>
    <body>
        <div class="wrap">
