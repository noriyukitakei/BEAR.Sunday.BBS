<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\NamedParameter($singleton('Doctrine\\Common\\Cache\\Cache-', array('BEAR\\Resource\\NamedParameter', '__construct', 'cache')), $prototype('BEAR\\Resource\\ParamHandlerInterface-'));
return $instance;