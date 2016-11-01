<?php

namespace FakeVendor\Sandbox\Resource\App\Restbucks;

use BEAR\Resource\Annotation\Link;
use BEAR\Resource\ResourceObject;

class Menu extends ResourceObject
{
    private $menu = [];

    public function __construct()
    {
        $this->menu = ['coffee' => 300, 'latte' => 400];
    }

    /**
     * @Link(rel="order", href="app://self/restbucks/order?drink={drink}", method="")
     */
    public function onGet($drink = null)
    {
        if ($drink === null) {
            $this->body = $this->menu;

            return $this;
        }
        $this['drink'] = $drink;
        $this['price'] = $this->menu[$drink];

        return $this;
    }
}
