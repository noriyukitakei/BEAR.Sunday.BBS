<?php

namespace Ray\Di\Compiler;

$instance = new \Twig_Environment($prototype('Twig_LoaderInterface-twig_loader'), array('debug' => false, 'cache' => '/var/beardemo/tmp'));
return $instance;