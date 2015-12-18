<?php foreach ($page->getArticles() as $article): ?>
    <article class="page">
        <div class="page__wrap">

            <?php /* Article headline */ ?>
            <h2 class="page__headline  highlight--text  highlight--border">
                <?php if (($article->intendedTemplate() !== 'home') or $article->inToc()->bool()): ?>
                    <?= $article->tocNumber() ?>
                <?php endif ?>
                <?= $article->headline()->or($article->title())->html() ?>
            </h2>

            <?php /* Article content */ ?>
            <div class="page__content  js-page-content">
                <?= $article->text()->kirbytext() ?>
            </div>

        </div>
    </article>
<?php endforeach ?>

<?php if ($page->autoPrint()->isTrue()): ?>
    <script>
        // Fire as soon as the window finished loading
        window.addEventListener('load', function () {
            window.removeEventListener('load', arguments.callee, false);

            // Apply an additional delay of .5s so JS plugins can finish
            // loading before triggering the print dialogue
            window.setTimeout(function () {
                window.print();
            }, 500);
        }, false);
    </script>
<?php endif ?>
