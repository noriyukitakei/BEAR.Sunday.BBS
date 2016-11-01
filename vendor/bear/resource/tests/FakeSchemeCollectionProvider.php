<?php
/**
 * This file is part of the _package_ package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Resource;

use Ray\Di\InjectorInterface;
use Ray\Di\ProviderInterface;

class FakeSchemeCollectionProvider implements ProviderInterface
{
    /**
     * @var InjectorInterface
     */
    private $injector;

    public function __construct(InjectorInterface $injector)
    {
        $this->injector = $injector;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        $scheme = (new SchemeCollection)
            ->scheme('app')->host('self')->toAdapter(new AppAdapter($this->injector, 'FakeVendor\Sandbox', 'Resource\App'))
            ->scheme('page')->host('self')->toAdapter(new AppAdapter($this->injector, 'FakeVendor\Sandbox', 'Resource\Page'))
            ->scheme('nop')->host('self')->toAdapter(new FakeNop);

        return $scheme;
    }
}
