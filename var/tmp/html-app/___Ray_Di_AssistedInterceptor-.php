<?php

namespace Ray\Di\Compiler;

$instance = new \Ray\Di\AssistedInterceptor($injector(), $singleton('Ray\\Di\\MethodInvocationProvider-'));
return $instance;