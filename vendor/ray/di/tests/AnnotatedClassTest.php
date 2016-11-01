<?php

namespace Ray\Di;

use Doctrine\Common\Annotations\AnnotationReader;

class AnnotatedClassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AnnotatedClass
     */
    protected $annotatedClass;

    public function setUp()
    {
        parent::setUp();
        $this->annotatedClass = new AnnotatedClass(new AnnotationReader);
    }

    public function testInvoke()
    {
        $newInstance = $this->annotatedClass->getNewInstance(new \ReflectionClass(FakeCar::class));
        $this->assertInstanceOf(NewInstance::class, $newInstance);
        $container = new Container;
        (new Bind($container, FakeTyreInterface::class))->to(FakeTyre::class);
        (new Bind($container, FakeEngineInterface::class))->to(FakeEngine::class);
        (new Bind($container, FakeHandleInterface::class))->toProvider(FakeHandleProvider::class);
        (new Bind($container, FakeMirrorInterface::class))->annotatedWith('right')->to(FakeMirrorRight::class);
        (new Bind($container, FakeMirrorInterface::class))->annotatedWith('left')->to(FakeMirrorRight::class);
        (new Bind($container, FakeGearStickInterface::class))->toProvider(FakeGearStickProvider::class);
        $car = $newInstance($container);
        /* @var $car FakeCar */
        $this->assertInstanceOf(FakeCar::class, $car);
        $this->assertInstanceOf(FakeTyre::class, $car->frontTyre);
        $this->assertInstanceOf(FakeTyre::class, $car->rearTyre);
        $this->assertInstanceOf(FakeLeatherGearStick::class, $car->gearStick);
        $this->assertNull($car->hardtop);
    }

    /**
     * @dataProvider classProvider
     */
    public function testAnnotatedByAnnotation($class)
    {
        $newInstance = $this->annotatedClass->getNewInstance(new \ReflectionClass($class));
        $container = new Container;
        (new Bind($container, FakeMirrorInterface::class))->annotatedWith(FakeLeft::class)->to(FakeMirrorLeft::class);
        (new Bind($container, FakeMirrorInterface::class))->annotatedWith(FakeRight::class)->to(FakeMirrorRight::class);
        $handleBar = $newInstance($container);
        /* @var $handleBar FakeHandleBar */
        $this->assertInstanceOf(FakeMirrorLeft::class, $handleBar->leftMirror);
        $this->assertInstanceOf(FakeMirrorRight::class, $handleBar->rightMirror);
    }

    public function classProvider()
    {
        return [
            [FakeHandleBar::class],
            [FakeHandleBarQualifier::class]
        ];
    }
}
