<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Package\Provide\Router\CliRouter($singleton('BEAR\\Sunday\\Extension\\Router\\RouterInterface-original', array('BEAR\\Package\\Provide\\Router\\CliRouter', '__construct', 'router')), null, null);
$instance->setStdIn('/tmp/stdin-3446592769QyjiO3');
return $instance;