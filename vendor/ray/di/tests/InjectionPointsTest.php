<?php

namespace Ray\Di;

class InjectionPointsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InjectionPoints
     */
    protected $injectionPoints;

    public function setup()
    {
        parent::setUp();
        $this->injectionPoints = (new InjectionPoints)->addMethod('setTires')->addOptionalMethod('setHardtop');
    }

    public function testNew()
    {
        $this->assertInstanceOf(InjectionPoints::class, $this->injectionPoints);
    }

    public function testInvoke()
    {
        $car = new FakeCar(new FakeEngine);
        $setterMethods = $this->injectionPoints->__invoke($car);
        $this->assertInstanceOf(SetterMethods::class, $setterMethods);

        return $setterMethods;
    }

    /**
     * @depends testInvoke
     */
    public function testSetterMethod(SetterMethods $setterMethod)
    {
        $car = new FakeCar(new FakeEngine);
        $container = (new FakeCarModule)->getContainer();
        $setterMethod($car, $container);
        $this->assertInstanceOf(FakeTyre::class, $car->frontTyre);
        $this->assertInstanceOf(FakeTyre::class, $car->rearTyre);
        $this->assertInstanceOf(FakeHardtop::class, $car->hardtop);
    }

    /**
     * @depends testInvoke
     */
    public function testSetterMethodOptional(SetterMethods $setterMethod)
    {
        $car = new FakeCar(new FakeEngine);
        // no hardtop installed with this module
        $container = (new FakeOpenCarModule)->getContainer();
        $setterMethod($car, $container);
        $this->assertInstanceOf(FakeTyre::class, $car->frontTyre);
        $this->assertInstanceOf(FakeTyre::class, $car->rearTyre);
        $this->assertNull($car->hardtop);
    }
}
