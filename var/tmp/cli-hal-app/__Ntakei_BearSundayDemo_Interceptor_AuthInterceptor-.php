<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Interceptor\AuthInterceptor();
$instance->setUnauthenticatedService($singleton('Ntakei\\BearSundayDemo\\Service\\UnauthenticatedService-'));
return $instance;