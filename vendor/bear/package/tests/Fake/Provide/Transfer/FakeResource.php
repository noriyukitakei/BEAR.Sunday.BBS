<?php

namespace BEAR\Package\Provide\Transfer;

use BEAR\Resource\ResourceObject;

class FakeResource extends ResourceObject
{
    public function onGet($a)
    {
        return $a;
    }
}
