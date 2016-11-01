<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Package\Provide\Router\RouterCollectionProvider($prototype('BEAR\\Sunday\\Extension\\Router\\RouterInterface-primary_router', array('BEAR\\Package\\Provide\\Router\\RouterCollectionProvider', '__construct', 'router')), $singleton('BEAR\\Package\\Provide\\Router\\WebRouterInterface-'));
return $instance->get();