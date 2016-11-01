<?php

namespace Ray\Di\Compiler;

$instance = new \Ray\WebFormModule\AntiCsrf($singleton('Aura\\Session\\Session-', array('Ray\\WebFormModule\\AntiCsrf', '__construct', 'session')), null);
return $instance;