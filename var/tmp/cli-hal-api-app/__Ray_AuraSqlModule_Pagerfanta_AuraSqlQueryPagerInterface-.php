<?php

namespace Ray\Di\Compiler;

$instance = new \Ray\AuraSqlModule\Pagerfanta\AuraSqlQueryPager($prototype('Pagerfanta\\View\\ViewInterface-'), array());
return $instance;