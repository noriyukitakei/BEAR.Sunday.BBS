<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Service\AuthServiceImpl();
$instance->setAdaptor($singleton('Aura\\Auth\\Adapter\\AdapterInterface-', array('Ntakei\\BearSundayDemo\\Service\\AuthServiceImpl', 'setAdaptor', 'adaptor')));
return $instance;