<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Package\Provide\Representation\HalRenderer($singleton('Doctrine\\Common\\Annotations\\Reader-'), $prototype('BEAR\\Sunday\\Extension\\Router\\RouterInterface-'));
return $instance;