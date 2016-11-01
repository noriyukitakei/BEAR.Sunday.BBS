<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Resource\App\Messages();
$instance->setRenderer($singleton('BEAR\\Resource\\RenderInterface-', array('BEAR\\Resource\\ResourceObject', 'setRenderer', 'renderer')));
$instance->setMessageService($singleton('Ntakei\\BearSundayDemo\\Service\\MessageService-', array('Ntakei\\BearSundayDemo\\Resource\\App\\Messages', 'setMessageService', 'messageService')));
return $instance;