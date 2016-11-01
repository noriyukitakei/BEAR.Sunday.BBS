<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\Linker($singleton('Doctrine\\Common\\Annotations\\Reader-'), $singleton('BEAR\\Resource\\InvokerInterface-'), $singleton('BEAR\\Resource\\FactoryInterface-'));
return $instance;