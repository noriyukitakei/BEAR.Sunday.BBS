<?php

namespace FakeVendor\Sandbox\Resource\App\Bird;

use BEAR\Resource\Annotation\Link;
use BEAR\Resource\ResourceObject;

class Canary extends ResourceObject
{
    public $links = [
        'friend' => 'app://self/bird/friend'
    ];

    public $body = [
        'name' => 'chill kun'
    ];

    /**
     * @Link(rel="friend", href="app://self/bird/friend")
     */
    public function onGet()
    {
        return $this;
    }
}
