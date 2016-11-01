<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\QueryRepository\CacheInterceptor($singleton('BEAR\\QueryRepository\\QueryRepositoryInterface-'), $singleton('BEAR\\QueryRepository\\EtagSetterInterface-'), $prototype('Doctrine\\Common\\Annotations\\Reader-'));
return $instance;