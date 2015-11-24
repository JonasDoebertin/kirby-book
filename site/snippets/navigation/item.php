<li class="summary__item  summary__item--<?= $item->intendedTemplate() ?><?php if ($item->isActive()): ?>  summary__item--active<?php endif ?>" data-type="<?= $item->intendedTemplate() ?>" data-depth="<?= $item->depth() ?>">
    <a href="<?= $item->url() ?>" class="highlight--hover-text">
        <?php if (($item->intendedTemplate() !== 'home') or $item->inToc()->bool()): ?>
            <span class="strong"><?= $item->tocNumber() ?></span>
        <?php endif ?>
        <?= $item->title() ?>
    </a>

    <?php $containedArticles = $item->containedArticles() ?>
    <?php if ($containedArticles->count() > 0): ?>
        <ol>
            <?php foreach ($item->containedArticles() as $subitem): ?>
                <?php snippet('navigation/item', ['item' => $subitem]) ?>
            <?php endforeach ?>
        </ol>
    <?php endif ?>
</li>
