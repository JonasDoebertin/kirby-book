<header class="book__header">
    <ul class="actions">

        <li class="actions__item  actions__item--left  actions__item--sidebar">
            <a class="actions__link  js-action-toggle-sidebar" href="#" title="<?= Theme::lang('action.menu', 'Toggle menu')?>" data-no-pjax>
                <i class="fa fa-bars"></i>
            </a>
        </li>

        <li class="actions__item  actions__item--left  actions__item--theme">
            <a class="actions__link  js-dropdown-toggle" href="#" title="<?= Theme::lang('action.theme', 'Theme settings')?>" data-no-pjax>
                <i class="fa fa-font"></i>
            </a>
            <ul class="dropdown">
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  smaller-text  js-theme-toggle" data-toggle="size" data-value="down" title="<?= Theme::lang('dropdown.theme.decrease.hint', 'Decrease font size')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.theme.decrease', 'A')?>
                    </a>
                </li>
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  larger-text  js-theme-toggle" data-toggle="size" data-value="up" title="<?= Theme::lang('dropdown.theme.increase.hint', 'Increase font size')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.theme.increase', 'A')?>
                    </a>
                </li>
                <li class="dropdown__item--divider"></li>
                <li class="dropdown__item">
                    <a href="#" class="dropdown__link  serif  js-theme-toggle" data-toggle="font" data-value="serif" title="<?= Theme::lang('dropdown.theme.serif.hint', 'Switch to serif font')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.theme.serif', 'Serif')?>
                    </a>
                </li>
                <li class="dropdown__item">
                    <a href="#" class="dropdown__link  sans-serif  js-theme-toggle" data-toggle="font" data-value="sans-serif" title="<?= Theme::lang('dropdown.theme.sansserif.hint', 'Switch to sans serif font')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.theme.sansserif', 'Sans Serif')?>
                    </a>
                </li>
                <li class="dropdown__item--divider"></li>
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  js-theme-toggle" data-toggle="color" data-value="white" title="<?= Theme::lang('dropdown.theme.normal.hint', 'Switch to normal theme')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.theme.normal', 'Normal')?>
                    </a>
                </li>
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  js-theme-toggle" data-toggle="color" data-value="sepia" title="<?= Theme::lang('dropdown.theme.sepia.hint', 'Switch to sepia theme')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.theme.sepia', 'Sepia')?>
                    </a>
                </li>
            </ul>
        </li>

        <li class="actions__item  actions__item--right  actions__item--share">
            <a class="actions__link  js-dropdown-toggle" href="#" title="<?= Theme::lang('action.share', 'Share')?>" data-no-pjax>
                <i class="fa fa-share"></i>
            </a>
            <ul class="dropdown  dropdown--left">
                <li class="dropdown__item">
                    <a class="dropdown__link" href="<?= $page->share('facebook') ?>" target="_blank" title="<?= Theme::lang('dropdown.share.facebook.hint', 'Share on Facebook')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.share.facebook', 'Facebook')?>
                    </a>
                </li>
                <li class="dropdown__item">
                    <a class="dropdown__link" href="<?= $page->share('twitter') ?>" target="_blank" title="<?= Theme::lang('dropdown.share.twitter.hint', 'Share on Twitter')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.share.twitter', 'Twitter')?>
                    </a>
                </li>
                <li class="dropdown__item">
                    <a class="dropdown__link" href="<?= $page->share('googleplus') ?>" target="_blank" title="<?= Theme::lang('dropdown.share.googleplus.hint', 'Share on Google+')?>" data-no-pjax>
                        <?= Theme::lang('dropdown.share.googleplus', 'Google+')?>
                    </a>
                </li>
            </ul>
        </li>

        <li class="actions__item  actions__item--right  actions__item--print">
            <a class="actions__link  js-dropdown-toggle" href="#" title="<?= Theme::lang('action.print', 'Print')?>" data-no-pjax>
                <i class="fa fa-print"></i>
            </a>
            <ul class="dropdown  dropdown--left">
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  js-print-page" title="<?= Theme::lang('dropdown.print.page.hint', 'Print the current page')?>" data-no-pjax>
                        <i class="fa fa-file-text"></i>
                    </a>
                </li>
                <li class="dropdown__item  dropdown__item--half">
                    <a href="<?= $site->page('printable')->url() ?>" class="dropdown__link" title="<?= Theme::lang('dropdown.print.book.hint', 'Print the complete book')?>" data-no-pjax>
                        <i class="fa fa-book"></i>
                    </a>
                </li>
                <?php if ($site->epub()->int() === 1): ?>
                    <li class="dropdown__item--divider"></li>
                    <li class="dropdown__item">
                        <a class="dropdown__link" href="<?= url('export/epub') ?>" title="<?= Theme::lang('dropdown.export.epub.hint', 'Download the complete book as ePub eBook file')?>" data-no-pjax>
                            <?= Theme::lang('dropdown.export.epub', 'Save as ePub')?>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </li>

        <li>
            <h1 class="book__title  highlight--text">
                <a href="<?= $site->url() ?>"><?= $site->title() ?></a>
            </h1>
        </li>

    </ul>
</header>
