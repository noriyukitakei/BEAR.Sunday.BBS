<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Interceptor\AuthInterceptor();
$instance->setAuthService($singleton('Ntakei\\BearSundayDemo\\Service\\AuthService-'));
return $instance;