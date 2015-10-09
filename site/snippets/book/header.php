<header class="book__header">
    <ul class="actions">

        <li class="actions__item  actions__item--left  actions__item--sidebar">
            <a class="actions__link  js-action-toggle-sidebar" href="#" title="<?= Theme::lang('action.menu', 'Toggle menu')?>">
                <i class="fa fa-bars"></i>
            </a>
        </li>

        <li class="actions__item  actions__item--left  actions__item--theme">
            <a class="actions__link  js-dropdown-toggle" href="#" title="<?= Theme::lang('action.theme', 'Theme settings')?>">
                <i class="fa fa-font"></i>
            </a>
            <ul class="dropdown">
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  smaller-text  js-theme-toggle" data-toggle="size" data-value="down" title="<?= Theme::lang('dropdown.theme.decrease.hint', 'Decrease font size')?>">
                        <?= Theme::lang('dropdown.theme.decrease', 'A')?>
                    </a>
                </li>
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  larger-text  js-theme-toggle" data-toggle="size" data-value="up" title="<?= Theme::lang('dropdown.theme.increase.hint', 'Increase font size')?>">
                        <?= Theme::lang('dropdown.theme.increase', 'A')?>
                    </a>
                </li>
                <li class="dropdown__item--divider"></li>
                <li class="dropdown__item">
                    <a href="#" class="dropdown__link  serif  js-theme-toggle" data-toggle="font" data-value="serif" title="<?= Theme::lang('dropdown.theme.serif.hint', 'Switch to serif font')?>">
                        <?= Theme::lang('dropdown.theme.serif', 'Serif')?>
                    </a>
                </li>
                <li class="dropdown__item">
                    <a href="#" class="dropdown__link  sans-serif  js-theme-toggle" data-toggle="font" data-value="sans-serif" title="<?= Theme::lang('dropdown.theme.sansserif.hint', 'Switch to sans serif font')?>">
                        <?= Theme::lang('dropdown.theme.sansserif', 'Sans Serif')?>
                    </a>
                </li>
                <li class="dropdown__item--divider"></li>
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  js-theme-toggle" data-toggle="color" data-value="white" title="<?= Theme::lang('dropdown.theme.normal.hint', 'Switch to normal theme')?>">
                        <?= Theme::lang('dropdown.theme.normal', 'Normal')?>
                    </a>
                </li>
                <li class="dropdown__item  dropdown__item--half">
                    <a href="#" class="dropdown__link  js-theme-toggle" data-toggle="color" data-value="sepia" title="<?= Theme::lang('dropdown.theme.sepia.hint', 'Switch to sepia theme')?>">
                        <?= Theme::lang('dropdown.theme.sepia', 'Sepia')?>
                    </a>
                </li>
            </ul>
        </li>

        <li class="actions__item  actions__item--right  actions__item--share">
            <a class="actions__link  js-dropdown-toggle" href="#" title="<?= Theme::lang('action.share', 'Share')?>">
                <i class="fa fa-share"></i>
            </a>
            <ul class="dropdown  dropdown--left">
                <li class="dropdown__item">
                    <a class="dropdown__link" href="<?= $page->share('facebook') ?>" target="_blank" title="<?= Theme::lang('dropdown.share.facebook.hint', 'Share on Facebook')?>">
                        <?= Theme::lang('dropdown.share.facebook', 'Facebook')?>
                    </a>
                </li>
                <li class="dropdown__item">
                    <a class="dropdown__link" href="<?= $page->share('twitter') ?>" target="_blank" title="<?= Theme::lang('dropdown.share.twitter.hint', 'Share on Twitter')?>">
                        <?= Theme::lang('dropdown.share.twitter', 'Twitter')?>
                    </a>
                </li>
                <li class="dropdown__item">
                    <a class="dropdown__link" href="<?= $page->share('googleplus') ?>" target="_blank" title="<?= Theme::lang('dropdown.share.googleplus.hint', 'Share on Google+')?>">
                        <?= Theme::lang('dropdown.share.googleplus', 'Google+')?>
                    </a>
                </li>
            </ul>
        </li>

        <li class="actions__item  actions__item--right  actions__item--print">
            <a class="actions__link  js-action-print" href="<?= $site->page('printable')->url() ?>" title="<?= Theme::lang('action.print', 'Print')?>">
                <i class="fa fa-print"></i>
            </a>
        </li>

        <li>
            <h1 class="book__title  highlight--text">
                <a href="<?= $site->url() ?>"><?= $site->title() ?></a>
            </h1>
        </li>

    </ul>
</header>
