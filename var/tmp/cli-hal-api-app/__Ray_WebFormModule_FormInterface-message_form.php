<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Form\MessageForm();
$instance->setBaseDependencies($prototype('Aura\\Input\\BuilderInterface-'), $prototype('Aura\\Filter\\FilterFactory-'), $prototype('Aura\\Html\\HelperLocatorFactory-'));
$instance->postConstruct();
return $instance;