<?php

spl_autoload_register(static function ($classname) {
    include str_replace(
        '\\',
        '/',
        sprintf('%s/src/%s.php', __DIR__, $classname),
    );
});
