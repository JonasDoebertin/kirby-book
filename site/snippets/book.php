<section class="book">
    <div class="book__wrap">
        <?php snippet('book/header') ?>
        <?php snippet('book/page') ?>
    </div>
    <?php if ($prev = $page->prevArticle()): ?>
        <a class="book__previous" href="<?= $prev->url() ?>" aria-role="navigation" aria-label="">
            <i class="fa fa-angle-left"></i>
        </a>
    <?php endif ?>
    <?php if ($next = $page->nextArticle()): ?>
        <a class="book__next" href="<?= $next->url() ?>" aria-role="navigation" aria-label="">
            <i class="fa fa-angle-right"></i>
        </a>
    <?php endif ?>
</section>
