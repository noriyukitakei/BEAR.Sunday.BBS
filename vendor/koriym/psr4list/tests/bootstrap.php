<?php

$loader = require dirname(__DIR__) . '/vendor/autoload.php';
/** @var $loader \Composer\Autoload\ClassLoader */
$loader->addPsr4('FakeVendor\FakePackage\\', __DIR__ . '/Fake/src');
