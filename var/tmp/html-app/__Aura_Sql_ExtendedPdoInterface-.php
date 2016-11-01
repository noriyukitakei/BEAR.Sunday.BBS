<?php

namespace Ray\Di\Compiler;

$instance = new \Aura\Sql\ExtendedPdo('mysql:dbname=bbs;host=127.0.0.1', 'root', 'sios3744', array(), array());
return $instance;