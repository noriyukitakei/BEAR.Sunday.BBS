<?php

namespace Ray\Di;

use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;
use Ray\Di\Di\PostConstruct;
use Ray\Di\FakeGearStickInject;

class FakeCar implements FakeCarInterface
{
    public $engine;

    public $hardtop;

    public $frontTyre;

    public $rearTyre;

    public $isConstructed = false;

    public $rightMirror;

    public $leftMirror;

    public $spareMirror;

    /**
     * @var FakeHandle
     */
    public $handle;

    public $gearStick;

    /**
     * @Inject
     */
    public function setTires(FakeTyreInterface $frontTyre, FakeTyreInterface $rearTyre)
    {
        $this->frontTyre = $frontTyre;
        $this->rearTyre = $rearTyre;
    }

    /**
     * @Inject(optional=true)
     */
    public function setHardtop(FakeHardtopInterface $hardtop)
    {
        $this->hardtop = $hardtop;
    }

    /**
     * @Inject
     * @Named("rightMirror=right,leftMirror=left")
     */
    public function setMirrors(FakeMirrorInterface $rightMirror, FakeMirrorInterface $leftMirror)
    {
        $this->rightMirror = $rightMirror;
        $this->leftMirror = $leftMirror;
    }

    /**
     * @Inject
     * @Named("right")
     */
    public function setSpareMirror(FakeMirrorInterface $rightMirror)
    {
        $this->spareMirror = $rightMirror;
    }

    /**
     * @Inject
     */
    public function setHandle(FakeHandleInterface $handle)
    {
        $this->handle = $handle;
    }

    /**
     * @FakeGearStickInject("leather")
     */
    public function setGearStick(FakeGearStickInterface $stick)
    {
        $this->gearStick = $stick;
    }

    /**
     * Inject annotation at constructor is just for human, not mandatory.
     */
    public function __construct(FakeEngineInterface $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @PostConstruct
     */
    public function postConstruct()
    {
        $isEngineInstalled = $this->engine instanceof FakeEngine;
        $isTyreInstalled = $this->frontTyre instanceof FakeTyre;
        if ($isEngineInstalled && $isTyreInstalled) {
            $this->isConstructed = true;
        }
    }
}
