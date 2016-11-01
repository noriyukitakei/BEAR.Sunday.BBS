<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Package\Provide\Router\CliRouter($singleton('BEAR\\Sunday\\Extension\\Router\\RouterInterface-original'), null, null);
$instance->setStdIn('/tmp/stdin-3446592769zfdmrK');
return $instance;