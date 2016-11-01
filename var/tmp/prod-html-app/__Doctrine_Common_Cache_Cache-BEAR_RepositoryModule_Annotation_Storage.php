<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Package\Context\Provider\FilesystemCacheProvider(unserialize('O:20:"BEAR\\AppMeta\\AppMeta":4:{s:4:"name";s:21:"Ntakei\\BearSundayDemo";s:6:"appDir";s:13:"/var/beardemo";s:6:"tmpDir";s:35:"/var/beardemo/var/tmp/prod-html-app";s:6:"logDir";s:21:"/var/beardemo/var/log";}'));
return $instance->get();