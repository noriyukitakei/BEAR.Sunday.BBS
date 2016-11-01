<?php

namespace Ray\Di\Compiler;

$instance = new \Twig_Environment($prototype('Twig_LoaderInterface-twig_loader'), array());
return $instance;