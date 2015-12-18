<article class="page">
    <div class="page__wrap">

        <?php /* Page headline */ ?>
        <h2 class="page__headline  highlight--text  highlight--border">
            <?= $page->headline()->or($page->title())->html() ?>
        </h2>

        <?php /* Page content */ ?>
        <div class="page__content  js-page-content">
            <?= $page->text()->kirbytext() ?>
        </div>

        <?php /* Chapters only: Included articles */ ?>
        <?php if (($page->intendedTemplate() === 'chapter') && $page->hasVisibleChildren()): ?>
            <nav class="page__children">
                <ol>
                    <?php foreach ($page->children()->visible() as $child): ?>
                        <li>
                            <a class="page__child  highlight--hover-text" href="<?= $child->url() ?>" title="<?= $child->headline()->or($child->title())->html() ?>">
                                <span class="strong"><?= $child->tocNumber() ?></span>
                                <?= $child->title()->html() ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ol>
            </nav>
        <?php endif ?>

        <?php /* Logged in only: Panel links */ ?>
        <?php if (Helpers::isLoggedIn()): ?>
            <nav class="page__edit  clearfix">
                <p class="page__updated">
                    <?= sprintf(Theme::lang('page.updated', 'Updated %s'), $page->updated()) ?>
                </p>
                <ul class="page__actions">
                    <li>
                        <a class="highlight--hover-text" href="<?= url('/panel') ?>" title="Go to Panel Dashboard"><?= Theme::lang('dashboard', 'Dashboard')?></a>
                    </li>
                    <li>
                        <a class="highlight--hover-text" href="<?= Helpers::panelUrl($page, 'edit') ?>" title="Edit this page"><?= Theme::lang('page.edit', 'Edit Page')?></a>
                    </li>
                </ul>
            </nav>
        <?php endif ?>

    </div>
</article>
