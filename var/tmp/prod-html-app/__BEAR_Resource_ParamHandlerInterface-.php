<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\ResourceParamHandler($prototype('Doctrine\\Common\\Annotations\\Reader-'), $injector());
return $instance;