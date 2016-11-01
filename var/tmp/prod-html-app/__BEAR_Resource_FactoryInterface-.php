<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\Factory($singleton('BEAR\\Resource\\SchemeCollectionInterface-', array('BEAR\\Resource\\Factory', '__construct', 'scheme')));
$instance->setSchemeCollection($singleton('BEAR\\Resource\\SchemeCollectionInterface-', array('BEAR\\Resource\\Factory', 'setSchemeCollection', 'scheme')));
return $instance;