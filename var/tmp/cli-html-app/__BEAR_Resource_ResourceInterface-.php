<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\Resource($singleton('BEAR\\Resource\\FactoryInterface-'), $singleton('BEAR\\Resource\\InvokerInterface-'), $singleton('BEAR\\Resource\\AnchorInterface-'), $singleton('BEAR\\Resource\\LinkerInterface-'));
return $instance;