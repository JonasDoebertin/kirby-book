<aside class="navigation">

    <header class="navigation__item  navigation__header">
        <p>
            <strong><?= $site->title()->html() ?></strong>
        </p>
    </header>

    <hr class="navigation__divider">

    <ol class="navigation__item  summary">
        <?php snippet('navigation/item', ['item' => $site->homePage()]) ?>
        <?php foreach($page->topLevelArticles() as $item): ?>
            <?php snippet('navigation/item', ['item' => $item]) ?>
        <?php endforeach ?>
    </ol>

    <hr class="navigation__divider">

    <footer class="navigation__item  navigation__footer">
        <?= $site->footer()->kirbytext() ?>
    </footer>

</aside>
