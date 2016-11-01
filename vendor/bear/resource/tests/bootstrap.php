<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require dirname(__DIR__).'/vendor/autoload.php';
/* @var $loader \Composer\Autoload\ClassLoader */
AnnotationRegistry::registerLoader([$loader, 'loadClass']);

$_ENV['TMP_DIR'] = __DIR__.'/tmp';
$unlink = function ($path) use (&$unlink) {
    foreach (glob(rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR . '*') as $file) {
        is_dir($file) ? $unlink($file) : unlink($file);
        @rmdir($file);
    }
};
$unlink($_ENV['TMP_DIR']);
register_shutdown_function(function () use ($unlink) {
    $unlink($_ENV['TMP_DIR']);
});
