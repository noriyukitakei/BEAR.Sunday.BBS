<?php

namespace Ray\Di\Compiler;

$instance = new \Ray\AuraSqlModule\Pagerfanta\AuraSqlPagerFactory($prototype('Ray\\AuraSqlModule\\Pagerfanta\\AuraSqlPagerInterface-'));
return $instance;