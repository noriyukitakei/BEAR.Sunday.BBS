<?php

namespace FakeVendor\Sandbox\Resource\App;

use BEAR\Resource\ResourceObject;

class Index extends ResourceObject
{
    public function onGet()
    {
        return 'get';
    }
}
