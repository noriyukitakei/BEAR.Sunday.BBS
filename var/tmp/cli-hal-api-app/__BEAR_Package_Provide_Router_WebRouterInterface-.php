<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Package\Provide\Router\WebRouter('app://self', $singleton('BEAR\\Package\\Provide\\Router\\HttpMethodParamsInterface-'));
return $instance;