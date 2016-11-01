<?php

namespace Ray\Di\Compiler;

$instance = new \Ray\WebFormModule\InputValidationInterceptor($singleton('Doctrine\\Common\\Annotations\\Reader-'), $singleton('Ray\\WebFormModule\\FailureHandlerInterface-vnd_error'));
return $instance;