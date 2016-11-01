<?php

namespace Ray\Di\Compiler;

$instance = new \Ray\AuraSessionModule\SessionProvider();
return $instance->get();