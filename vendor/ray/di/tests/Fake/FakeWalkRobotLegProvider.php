<?php

namespace Ray\Di;

class FakeWalkRobotLegProvider implements ProviderInterface
{
    /**
     * @var InjectionPoint
     */
    private $ip;

    public function __construct(InjectionPointInterface $ip)
    {
        $this->ip = $ip;
    }

    public function get()
    {
        $varName = $this->ip->getParameter()->getName();
        if ($varName === 'leftLeg') {
            return new FakeLeftLeg;
        }
        if ($varName === 'rightLeg') {
            return new FakeRightLeg;
        }

        throw new \InvalidArgumentException('Unexpected var name for LegInterface: ' . $varName);
    }
}
