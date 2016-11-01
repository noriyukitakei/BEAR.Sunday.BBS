<?php

namespace Ray\Di\Compiler;

$instance = new \Madapaja\TwigModule\TwigRenderer($singleton('Twig_Environment-'), null);
return $instance;