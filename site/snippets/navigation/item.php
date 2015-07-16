<li class="summary__item  summary__item--<?= $item->intendedTemplate() ?><?php if ($item->isActive()): ?>  summary__item--active<?php endif ?>" data-type="<?= $item->intendedTemplate() ?>" data-depth="<?= $item->depth() ?>">
    <a href="<?= $item->url() ?>"><?= $item->title() ?></a>

    <ol>
        <?php foreach($item->containedArticles() as $subitem): ?>
            <?php snippet('navigation/item', ['item' => $subitem]) ?>
        <?php endforeach ?>
    </ol>
</li>
