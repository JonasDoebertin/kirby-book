<?php

Kirbytext::$pre[] = function ($kirbytext, $value) {
    return Theme::applyReplacements($value);
};
