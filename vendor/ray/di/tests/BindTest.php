<?php

namespace Ray\Di;

use Ray\Di\Exception\InvalidProvider;
use Ray\Di\Exception\InvalidType;
use Ray\Di\Exception\NotFound;

class BindTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Bind
     */
    private $bind;

    protected function setUp()
    {
        parent::setUp();
        $this->bind = new Bind(new Container, FakeTyreInterface::class);
    }
    public function testGetBound()
    {
        $this->bind->to(FakeTyre::class);
        $bound = $this->bind->getBound();
        $this->assertInstanceOf(Dependency::class, $bound);
    }

    public function testToString()
    {
        $this->assertSame('Ray\Di\FakeTyreInterface-' . NAME::ANY, (string) $this->bind);
    }

    public function testInvalidToTest()
    {
        $this->setExpectedException(Notfound::class);
        $this->bind->to('invalid-class');
    }

    public function testInvalidToProviderTest()
    {
        $this->setExpectedException(Notfound::class);
        $this->bind->toProvider('invalid-class');
    }

    public function testInValidInterfaceBinding()
    {
        $this->setExpectedException(NotFound::class);
        new Bind(new Container, 'invalid-interface');
    }

    public function testUntargetedBind()
    {
        $container = new Container;
        $bind = new Bind($container, FakeEngine::class);
        unset($bind);
        $container = $container->getContainer();
        $this->assertArrayHasKey(FakeEngine::class . '-' . Name::ANY, $container);
    }

    public function testUntargetedBindSingleton()
    {
        $container = new Container;
        $bind = (new Bind($container, FakeEngine::class))->in(Scope::SINGLETON);
        unset($bind);
        $dependency1 = $container->getInstance(FakeEngine::class, Name::ANY);
        $dependency2 = $container->getInstance(FakeEngine::class, Name::ANY);
        $this->assertSame(spl_object_hash($dependency1), spl_object_hash($dependency2));
    }

    public function testToConstructor()
    {
        $container = new Container;
        $container->add((new Bind($container, ''))->annotatedWith('tmp_dir')->toInstance('/tmp'));
        $container->add((new Bind($container, FakeLegInterface::class))->annotatedWith('left')->to(FakeLeftLeg::class));
        $container->add((new Bind($container, FakeRobotInterface::class))->toConstructor(FakeToConstructorRobot::class, 'tmpDir=tmp_dir,leg=left'));
        $instance = $container->getInstance(FakeRobotInterface::class, Name::ANY);
        /* @var $instance FakeToConstructorRobot */
        $this->assertInstanceOf(FakeLeftLeg::class, $instance->leg);
        $this->assertSame('/tmp', $instance->tmpDir);
    }

    public function testToConstructorWithMethodInjection()
    {
        $container = new Container;
        $container->add((new Bind($container, ''))->annotatedWith('tmp_dir')->toInstance('/tmp'));
        $container->add((new Bind($container, FakeLegInterface::class))->annotatedWith('left')->to(FakeLeftLeg::class));
        $container->add((new Bind($container, FakeEngineInterface::class))->to(FakeEngine::class));
        $container->add(
            (new Bind($container, FakeRobotInterface::class))->toConstructor(
                FakeToConstructorRobot::class,
                'tmpDir=tmp_dir,leg=left',
                (new InjectionPoints)->addMethod('setEngine')
            )
        );
        $instance = $container->getInstance(FakeRobotInterface::class, Name::ANY);
        /* @var $instance FakeToConstructorRobot */
        $this->assertInstanceOf(FakeEngine::class, $instance->engine);
    }

    public function testToValidation()
    {
        $this->setExpectedException(InvalidType::class);
        (new Bind(new Container, FakeHandleInterface::class))->to(FakeEngine::class);
    }

    public function testToProvider()
    {
        $this->setExpectedException(InvalidProvider::class);
        (new Bind(new Container, FakeHandleInterface::class))->toProvider(FakeEngine::class);
    }

    public function testBindProviderAsProvider()
    {
        $container = new Container;
        (new Bind($container, ProviderInterface::class))->annotatedWith('handle')->to(FakeHandleProvider::class);
        $instance = $container->getInstance(ProviderInterface::class, 'handle');
        $this->assertInstanceOf(FakeHandleProvider::class, $instance);
    }

    public function testBindProviderAsProviderInSingleton()
    {
        $container = new Container;
        (new Bind($container, ProviderInterface::class))->annotatedWith('handle')->to(FakeHandleProvider::class)->in(Scope::SINGLETON);
        $instance1 = $container->getInstance(ProviderInterface::class, 'handle');
        $instance2 = $container->getInstance(ProviderInterface::class, 'handle');
        $this->assertSame(spl_object_hash($instance1), spl_object_hash($instance2));
    }
}
