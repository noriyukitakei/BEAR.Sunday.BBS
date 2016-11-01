<?php
namespace Ntakei\BearSundayDemo\Module;


use Madapaja\TwigModule\TwigModule;
use Ray\Di\AbstractModule;
use BEAR\Package\Provide\Router\AuraRouterModule;

class HtmlModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new TwigModule());

        $appDir = dirname(dirname(__DIR__));
        $paths = [$appDir . '/var/twig/'];
        $this->bind()->annotatedWith(TwigPaths::class)->toInstance($paths);        

    }

}
