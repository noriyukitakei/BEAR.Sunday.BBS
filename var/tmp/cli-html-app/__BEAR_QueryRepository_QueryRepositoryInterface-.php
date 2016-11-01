<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\QueryRepository\QueryRepository($singleton('BEAR\\QueryRepository\\EtagSetterInterface-'), $singleton('Doctrine\\Common\\Cache\\CacheProvider-BEAR\\RepositoryModule\\Annotation\\Storage'), $singleton('Doctrine\\Common\\Annotations\\Reader-'), array('short' => 60, 'medium' => 3600, 'long' => 86400, 'never' => 0));
return $instance;