<div class="glance-widget">
    <ul class="nav nav-list sidebar-list">
        <li>
            <p>
                <i class="icon icon-left fa fa-file-text"></i>
                <span>Articles</span>
                <small class="marginalia shiv shiv-left shiv-white"><?= $articles ?></small>
            </p>
        </li>
        <li>
            <p>
                <i class="icon icon-left fa fa-folder-open"></i>
                <span>Chapters</span>
                <small class="marginalia shiv shiv-left shiv-white"><?= $chapters ?></small>
            </p>
        </li>
        <li>
            <p>
                <i class="icon icon-left fa fa-font"></i>
                <span>Total Words</span>
                <small class="marginalia shiv shiv-left shiv-white"><?= number_format($words) ?></small>
            </p>
        </li>
    </ul>
</div>
