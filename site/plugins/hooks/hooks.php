<?php

kirby()->hook('panel.page.create', function ($page) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.page.update', function ($page) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.page.delete', function ($page) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.page.sort', function ($page) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.page.hide', function ($page) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.page.move', function ($page) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.file.upload', function ($file) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.file.replace', function ($file) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.file.rename', function ($file) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.file.update', function ($file) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.file.sort', function ($file) {
    EPubExporter::clearCache();
});

kirby()->hook('panel.file.delete', function ($file) {
    EPubExporter::clearCache();
});
