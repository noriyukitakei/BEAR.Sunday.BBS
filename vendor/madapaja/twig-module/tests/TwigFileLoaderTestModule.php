<?php

namespace Madapaja\TwigModule;

use Ray\Di\AbstractModule;

class TwigFileLoaderTestModule extends AbstractModule
{
    private $paths;

    public function __construct(array $paths = []) {
        $this->paths = $paths;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new TwigModule($this->paths));
    }
}
