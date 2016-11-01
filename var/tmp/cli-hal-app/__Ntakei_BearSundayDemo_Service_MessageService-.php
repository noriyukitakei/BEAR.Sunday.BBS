<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei_BearSundayDemo_Service_MessageServiceImpl_JkUpM3c();
$instance->setAuraSql($singleton('Aura\\Sql\\ExtendedPdoInterface-'));
$instance->bindings = array('addMessage' => array($singleton('Ntakei\\BearSundayDemo\\Interceptor\\LogInterceptor-')), 'modifyMessage' => array($singleton('Ntakei\\BearSundayDemo\\Interceptor\\LogInterceptor-')));
return $instance;