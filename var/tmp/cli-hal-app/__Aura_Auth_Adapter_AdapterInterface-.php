<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Module\AuraAuthPdoAdaptorProvider(array('DB_DSN' => 'mysql:dbname=bbs;host=127.0.0.1', 'DB_USERNAME' => 'root', 'DB_PASSWORD' => 'sios3744'));
return $instance->get();