<?php

namespace Ray\Di\Compiler;

$instance = new \Ntakei\BearSundayDemo\Module\App($singleton('BEAR\\Sunday\\Extension\\Router\\RouterInterface-', array('BEAR\\Sunday\\Extension\\Application\\AbstractApp', '__construct', 'router')), $prototype('BEAR\\Sunday\\Extension\\Transfer\\TransferInterface-'), $singleton('BEAR\\Resource\\ResourceInterface-'), $prototype('BEAR\\Sunday\\Extension\\Error\\ErrorInterface-'));
return $instance;