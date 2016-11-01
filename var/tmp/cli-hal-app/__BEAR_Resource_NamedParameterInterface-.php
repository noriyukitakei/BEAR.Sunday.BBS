<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\NamedParameter($singleton('Doctrine\\Common\\Cache\\Cache-'), $prototype('BEAR\\Resource\\ParamHandlerInterface-'));
return $instance;