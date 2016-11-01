<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\Linker($prototype('Doctrine\\Common\\Annotations\\Reader-'), $singleton('BEAR\\Resource\\InvokerInterface-'), $singleton('BEAR\\Resource\\FactoryInterface-'));
return $instance;