<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Sunday\Module\Resource;

use BEAR\Resource\Annotation\AppName;
use BEAR\Resource\Module\EmbedResourceModule;
use BEAR\Resource\Module\ResourceClientModule;
use Ray\Di\AbstractModule;

class ResourceModule extends AbstractModule
{
    const DEFAULT_APP_NAME = 'BEAR\Sunday';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind()->annotatedWith(AppName::class)->toInstance(self::DEFAULT_APP_NAME);
        $this->install(new ResourceClientModule);
        $this->install(new EmbedResourceModule);
    }
}
