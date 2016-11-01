<?php

namespace Ray\Di\Compiler;

$instance = new \Ray\WebFormModule\VndErrorHandler($singleton('Doctrine\\Common\\Annotations\\Reader-'));
return $instance;