<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\EmbedInterceptor($singleton('BEAR\\Resource\\ResourceInterface-'), $prototype('Doctrine\\Common\\Annotations\\Reader-'));
return $instance;