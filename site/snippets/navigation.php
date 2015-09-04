<aside class="navigation">
    <div class="navigation__wrap">

        <header class="navigation__item  navigation__header">
            <?php if ($site->logo()->isNotEmpty()): ?>
                <img class="navigation__logo" src="<?= $site->logo()->toFile()->url() ?>" alt="<?= $site->title() ?>" />
            <?php endif ?>

            <p>
                <strong><a href="<?= $site->url() ?>"><?= $site->title()->html() ?></a></strong>
            </p>
        </header>

        <hr class="navigation__divider">

        <ol class="navigation__item  summary">
            <?php snippet('navigation/item', ['item' => $site->homePage()]) ?>
            <?php foreach ($page->topLevelArticles() as $item): ?>
                <?php snippet('navigation/item', ['item' => $item]) ?>
            <?php endforeach ?>
        </ol>

        <hr class="navigation__divider">

        <footer class="navigation__item  navigation__footer">
            <?= $site->footer()->kirbytext() ?>
        </footer>

    </div>
</aside>
