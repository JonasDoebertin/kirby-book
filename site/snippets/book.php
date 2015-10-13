<section class="book">
    <div class="book__wrap">
        <?php snippet('book/header') ?>
        <?php snippet('book/page') ?>
    </div>
    <a class="book__previous" href="#" aria-role="navigation" aria-label=""><i class="fa fa-angle-left"></i></a>
    <?php if ($next = $page->nextArticle()): ?>
        <a class="book__next" href="<?= $next->url() ?>" aria-role="navigation" aria-label="">
            <i class="fa fa-angle-right"></i>
        </a>
    <?php endif ?>
</section>
