<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\QueryRepository\HttpCache($singleton('Doctrine\\Common\\Cache\\CacheProvider-BEAR\\RepositoryModule\\Annotation\\Storage', array('BEAR\\QueryRepository\\HttpCache', '__construct', 'kvs')));
return $instance;