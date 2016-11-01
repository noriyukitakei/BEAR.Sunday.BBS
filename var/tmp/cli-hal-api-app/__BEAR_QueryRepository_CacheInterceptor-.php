<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\QueryRepository\CacheInterceptor($singleton('BEAR\\QueryRepository\\QueryRepositoryInterface-'), $singleton('BEAR\\QueryRepository\\EtagSetterInterface-'), $singleton('Doctrine\\Common\\Annotations\\Reader-'));
return $instance;