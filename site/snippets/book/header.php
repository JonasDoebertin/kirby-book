<header class="book__header">

    <a class="action  action--left  js-action-toggle-sidebar" href="#">
        <i class="fa fa-bars"></i>
    </a>

    <a class="action  action--left  js-dropdown-toggle" href="#">
        <i class="fa fa-font"></i>
        <ul class="dropdown">
            <li class="dropdown__item  dropdown__item--half  smaller-text  js-theme-toggle" data-toggle="size" data-value="down">A</li>
            <li class="dropdown__item  dropdown__item--half  larger-text  js-theme-toggle" data-toggle="size" data-value="up">A</li>
            <li class="dropdown__item--divider"></li>
            <li class="dropdown__item  serif  js-theme-toggle" data-toggle="font" data-value="serif" title="Switch to a serif font.">
                    Serif
            </li>
            <li class="dropdown__item  sans-serif  js-theme-toggle" data-toggle="font" data-value="sans-serif" title="Switch to a sans serif font.">
                Sans Serif
            </li>
            <li class="dropdown__item--divider"></li>
            <li class="dropdown__item  dropdown__item--half  js-theme-toggle" data-toggle="color" data-value="white">Normal</li>
            <li class="dropdown__item  dropdown__item--half  js-theme-toggle" data-toggle="color" data-value="sepia">Sepia</li>
        </ul>
    </a>

    <a class="action  action--right  js-action-toggle-share" href="#">
        <i class="fa fa-share"></i>
    </a>

    <a class="action  action--right  js-action-print" href="javascript:window.print()">
        <i class="fa fa-print"></i>
    </a>

    <h1 class="book__title  highlight--text">
        <a href="<?= $site->url() ?>"><?= $site->title() ?></a>
    </h1>

</header>
