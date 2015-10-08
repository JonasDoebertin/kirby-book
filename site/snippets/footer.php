            </div>
        <?= js('//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js') ?>
        <script>window.jQuery || document.write('<script src="<?= url('assets/js/jquery-2.1.4.min.js') ?>"><\/script>')</script>
        <?= js('assets/js/main.min.js') ?>

        <?= $site->tracking() ?>
        <?= $site->scripts() ?>
    </body>
</html>
