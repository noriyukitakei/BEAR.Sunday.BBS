<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei_BearSundayDemo_Resource_Page_Messages_EyAwRyQ($prototype('Ray\\WebFormModule\\FormInterface-message_form', array('Ntakei\\BearSundayDemo\\Resource\\Page\\Messages', '__construct', 'messageForm')));
$instance->setRenderer($singleton('BEAR\\Resource\\RenderInterface-', array('BEAR\\Resource\\ResourceObject', 'setRenderer', 'renderer')));
$instance->setResource($singleton('BEAR\\Resource\\ResourceInterface-', array('Ntakei\\BearSundayDemo\\Resource\\Page\\Messages', 'setResource', 'resource')));
$instance->bindings = array('onGet' => array($singleton('Ntakei\\BearSundayDemo\\Interceptor\\AuthInterceptor-')), 'onPost' => array($singleton('Ray\\WebFormModule\\AuraInputInterceptor-'), $singleton('Ntakei\\BearSundayDemo\\Interceptor\\AuthInterceptor-')), 'onPostValidationFailed' => array($singleton('Ntakei\\BearSundayDemo\\Interceptor\\AuthInterceptor-')));
return $instance;