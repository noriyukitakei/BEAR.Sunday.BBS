<?php

use BEAR\Resource\Module\ResourceModule;
use BEAR\Resource\ResourceInterface;
use BEAR\Resource\ResourceObject;
use Ray\Di\Injector;

$loader = require dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';
$loader->add('', __DIR__);

/* @var $resource \BEAR\Resource\Resource */
$resource = (new Injector(new ResourceModule('/')))->getInstance(ResourceInterface::class);

$result = $resource->get->object(new User)->withQuery(['id' => 1])->eager->request();
/* @var $result ResourceObject */

print "code:{$result->code}" . PHP_EOL;

print 'headers:' . PHP_EOL;
print_r($result->headers) . PHP_EOL;

print 'body:' . PHP_EOL;
print_r($result->body) . PHP_EOL;

//    code:200
//    headers:
//    Array
//    (
//    )
//    body:
//    Array
//    (
//        [name] => Aramis
//        [age] => 16
//        [blog_id] => 1
//    )
