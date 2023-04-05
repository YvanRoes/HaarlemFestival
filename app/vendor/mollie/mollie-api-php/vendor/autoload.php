<?php

// scoper-composer-autoload.php @generated by PhpScoper

$loader = require_once __DIR__.'/composer-autoload.php';

// Aliases for the whitelisted classes. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#class-whitelisting
if (!class_exists('ComposerAutoloaderInit5c46c28ba7cb354bf3f26c79ad4cc281', false) && !interface_exists('ComposerAutoloaderInit5c46c28ba7cb354bf3f26c79ad4cc281', false) && !trait_exists('ComposerAutoloaderInit5c46c28ba7cb354bf3f26c79ad4cc281', false)) {
    spl_autoload_call('_PhpScoper4c156ffd8c04\ComposerAutoloaderInit5c46c28ba7cb354bf3f26c79ad4cc281');
}

// Functions whitelisting. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#functions-whitelisting
if (!function_exists('database_write')) {
    function database_write() {
        return \_PhpScoper4c156ffd8c04\database_write(...func_get_args());
    }
}
if (!function_exists('database_read')) {
    function database_read() {
        return \_PhpScoper4c156ffd8c04\database_read(...func_get_args());
    }
}
if (!function_exists('printOrders')) {
    function printOrders() {
        return \_PhpScoper4c156ffd8c04\printOrders(...func_get_args());
    }
}

return $loader;
