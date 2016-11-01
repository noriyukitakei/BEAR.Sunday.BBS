<?php

namespace Ray\Di\Compiler;

$instance = new \Doctrine\Common\Annotations\CachedReader($prototype('Doctrine\\Common\\Annotations\\Reader-annotation_reader'), $singleton('Doctrine\\Common\\Cache\\Cache-', array('Doctrine\\Common\\Annotations\\CachedReader', '__construct', 'cache')), false);
return $instance;