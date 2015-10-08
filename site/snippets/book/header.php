<header class="book__header">

    <a class="action  action--left  js-action-toggle-sidebar" href="#" title="<?= Theme::lang('action.menu', 'Toggle menu')?>">
        <i class="fa fa-bars"></i>
    </a>

    <a class="action  action--left  js-dropdown-toggle" href="#" title="<?= Theme::lang('action.theme', 'Theme settings')?>">
        <i class="fa fa-font"></i>
        <ul class="dropdown">
            <li class="dropdown__item  dropdown__item--half  smaller-text  js-theme-toggle" data-toggle="size" data-value="down" title="<?= Theme::lang('dropdown.theme.decrease.hint', 'Decrease font size')?>">
                <?= Theme::lang('dropdown.theme.decrease', 'A')?>
            </li>
            <li class="dropdown__item  dropdown__item--half  larger-text  js-theme-toggle" data-toggle="size" data-value="up" title="<?= Theme::lang('dropdown.theme.increase.hint', 'Increase font size')?>">
                <?= Theme::lang('dropdown.theme.increase', 'A')?>
            </li>
            <li class="dropdown__item--divider"></li>
            <li class="dropdown__item  serif  js-theme-toggle" data-toggle="font" data-value="serif" title="<?= Theme::lang('dropdown.theme.serif.hint', 'Switch to serif font')?>">
                <?= Theme::lang('dropdown.theme.serif', 'Serif')?>
            </li>
            <li class="dropdown__item  sans-serif  js-theme-toggle" data-toggle="font" data-value="sans-serif" title="<?= Theme::lang('dropdown.theme.sansserif.hint', 'Switch to sans serif font')?>">
                <?= Theme::lang('dropdown.theme.sansserif', 'Sans Serif')?>
            </li>
            <li class="dropdown__item--divider"></li>
            <li class="dropdown__item  dropdown__item--half  js-theme-toggle" data-toggle="color" data-value="white" title="<?= Theme::lang('dropdown.theme.normal.hint', 'Switch to normal theme')?>">
                <?= Theme::lang('dropdown.theme.normal', 'Normal')?>
            </li>
            <li class="dropdown__item  dropdown__item--half  js-theme-toggle" data-toggle="color" data-value="sepia" title="<?= Theme::lang('dropdown.theme.sepia.hint', 'Switch to sepia theme')?>">
                <?= Theme::lang('dropdown.theme.sepia', 'Sepia')?>
            </li>
        </ul>
    </a>

    <a class="action  action--right  js-dropdown-toggle" href="#" title="<?= Theme::lang('action.share', 'Share')?>">
        <i class="fa fa-share"></i>
        <ul class="dropdown  dropdown--left">
            <li class="dropdown__item" title="<?= Theme::lang('dropdown.share.facebook.hint', 'Share on Facebook')?>">
                <?= Theme::lang('dropdown.share.facebook', 'Facebook')?>
            </li>
        </ul>
    </a>

    <a class="action  action--right  js-action-print" href="javascript:window.print()" title="<?= Theme::lang('action.print', 'Print')?>">
        <i class="fa fa-print"></i>
    </a>

    <h1 class="book__title  highlight--text">
        <a href="<?= $site->url() ?>"><?= $site->title() ?></a>
    </h1>

</header>
