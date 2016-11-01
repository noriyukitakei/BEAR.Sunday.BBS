<?php

namespace Ray\Di;

use Ray\Di\Exception\NotFound;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    public function testNew()
    {
        $module = new FakeInstanceBindModule;
        $this->assertInstanceOf(AbstractModule::class, $module);
    }

    public function testInstall()
    {
        $module = new FakeInstallModule;
        $this->assertInstanceOf(AbstractModule::class, $module);
    }

    public function testToInvalidClass()
    {
        $this->setExpectedException(NotFound::class);
        new FakeToBindInvalidClassModule;
    }

    public function testRename()
    {
        $module = new FakeRenameModule(new FakeToBindModule);
        $instance = $module->getContainer()->getInstance(FakeRobotInterface::class, 'original');
        $this->assertInstanceOf(FakeRobotInterface::class, $instance);
    }

    public function testConstructorCallModule()
    {
        $module = new FakelNoConstructorCallModule;
        $container = $module->getContainer();
        $this->assertInstanceOf(Container::class, $container);
    }
}
