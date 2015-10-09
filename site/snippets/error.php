<section class="error">
    <div class="error__wrap">

        <?php if ($page->logo()->isNotEmpty()): ?>
            <img class="error__logo" src="<?= $page->logo()->toFile()->url() ?>" alt="<?= $page->title() ?>" />
        <?php endif ?>
        <h1 class="error__headline">
            <?= $page->headline()->or($page->title())->html() ?>
        </h1>

        <div class="error__content">
            <?= $page->text()->kirbytext() ?>
        </div>

    </div>
</section>
