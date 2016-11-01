<?php

namespace Ray\Di;

class FakeToBindingWithoutConstructorModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new ToModule);
        $this->override(new InstanceBindModuleOneTo3);
    }
}
