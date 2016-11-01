<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Sunday\Provide\Application;

use BEAR\Resource\Annotation\AppName;
use BEAR\Sunday\Extension\Application\AppInterface;
use BEAR\Sunday\Module\SundayModule;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind(AppInterface::class)->to(MinApp::class);
        $this->bind()->annotatedWith(AppName::class)->toInstance('BEAR\Sunday');
        $this->install(new SundayModule);
    }
}
