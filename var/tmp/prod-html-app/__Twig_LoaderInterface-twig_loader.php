<?php

namespace Ray\Di\Compiler;

$instance = new \Twig_Loader_Filesystem(array('/var/beardemo/var/twig'));
return $instance;