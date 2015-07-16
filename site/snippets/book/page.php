<article class="page">
    <div class="page__wrap">

        <h2 class="page__headline  highlight--text  highlight--border">
            <?= $page->headline()->html() ?>
        </h2>

        <div class="page__content">
            <?= $page->text()->kirbytext() ?>
        </div>

    </div>
</article>
