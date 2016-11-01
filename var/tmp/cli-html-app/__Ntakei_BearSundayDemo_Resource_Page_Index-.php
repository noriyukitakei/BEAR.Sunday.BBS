<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Resource\Page\Index();
$instance->setRenderer($singleton('BEAR\\Resource\\RenderInterface-', array('BEAR\\Resource\\ResourceObject', 'setRenderer', 'renderer')));
$instance->setResource($singleton('BEAR\\Resource\\ResourceInterface-', array('Ntakei\\BearSundayDemo\\Resource\\Page\\Index', 'setResource', 'resource')));
return $instance;