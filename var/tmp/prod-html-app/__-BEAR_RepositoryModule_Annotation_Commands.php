<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\QueryRepository\CommandsProvider($singleton('BEAR\\QueryRepository\\QueryRepositoryInterface-'), $prototype('Doctrine\\Common\\Annotations\\Reader-'), $singleton('BEAR\\Resource\\ResourceInterface-'));
return $instance->get();