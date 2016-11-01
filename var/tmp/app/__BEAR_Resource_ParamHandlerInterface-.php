<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\ResourceParamHandler($singleton('Doctrine\\Common\\Annotations\\Reader-'), $injector());
return $instance;