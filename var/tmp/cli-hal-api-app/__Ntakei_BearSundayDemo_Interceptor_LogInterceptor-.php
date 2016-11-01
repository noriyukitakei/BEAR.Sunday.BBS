<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Interceptor\LogInterceptor();
$instance->setLogger($singleton('Psr\\Log\\LoggerInterface-', array('Ntakei\\BearSundayDemo\\Interceptor\\LogInterceptor', 'setLogger', 'logger')));
return $instance;