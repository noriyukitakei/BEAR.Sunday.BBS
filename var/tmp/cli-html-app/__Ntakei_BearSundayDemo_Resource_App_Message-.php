<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Resource\App\Message();
$instance->setRenderer($singleton('BEAR\\Resource\\RenderInterface-', array('BEAR\\Resource\\ResourceObject', 'setRenderer', 'renderer')));
$instance->setMessageService($prototype('Ntakei\\BearSundayDemo\\Service\\MessageService-', array('Ntakei\\BearSundayDemo\\Resource\\App\\Message', 'setMessageService', 'messageService')));
return $instance;