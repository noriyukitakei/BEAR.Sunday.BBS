<?php

namespace Ray\Aop;

/**
 * @Ray\Aop\FakeResource
 */
class FakeAnnotateClassNoName
{
    public $a = 0;

    /**
     * @Ray\Aop\FakeMarker3
     * @FakeMarker2
     * @FakeMarker
     */
    public function getDouble($a)
    {
        return $a * 2;
    }

    public function returnSame($a)
    {
    }
}
