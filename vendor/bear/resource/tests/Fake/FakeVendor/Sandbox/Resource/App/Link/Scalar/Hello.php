<?php
namespace FakeVendor\Sandbox\Resource\App\Link\Scalar;

use BEAR\Resource\ResourceObject;

class Hello extends ResourceObject
{
    public function onGet($name)
    {
        return "hell {$name}";
    }
}
