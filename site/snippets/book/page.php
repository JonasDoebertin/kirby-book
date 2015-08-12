<article class="page">
    <div class="page__wrap">

        <h2 class="page__headline  highlight--text  highlight--border">
            <?= $page->headline()->or($page->title())->html() ?>
        </h2>

        <div class="page__content">
            <?= $page->text()->kirbytext() ?>
        </div>

        <?php if (($page->intendedTemplate() === 'chapter') && $page->hasVisibleChildren()): ?>
            <nav class="page__children">
                <ul>
                    <?php foreach ($page->children()->visible() as $child): ?>
                        <li>
                            <a href="<?= $child->url() ?>" title="<?= $child->title()->html() ?>"><?= $child->title()->html() ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </nav>
        <?php endif ?>

    </div>
</article>
