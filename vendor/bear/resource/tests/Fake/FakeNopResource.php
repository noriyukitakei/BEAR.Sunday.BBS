<?php

namespace BEAR\Resource;

class FakeNopResource extends ResourceObject
{
    public $time;

    public function __construct()
    {
        $this->time = microtime(true);
    }

    public function onGet($a, $b)
    {
        return [$a, $b];
    }
}
