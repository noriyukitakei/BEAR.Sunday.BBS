<?php

namespace Restbucks\Resource\App;

use BEAR\Resource\Annotation\Link;
use BEAR\Resource\ResourceObject;
use BEAR\Resource\Uri;
use Ray\Di\Di\Scope;

class Menu extends ResourceObject
{
    private $menu = [];

    /**
     * @param Resource $resource
     */
    public function __construct()
    {
        $this->menu = ['coffee' => 300, 'latte' => 400];
    }

    /**
     * Menu
     *
     * @param string $drink
     *
     * @return \testworld\ResourceObject\RestBucks\Menu
     *
     * @Link(rel="order", href="app://self/Order?drink={drink}")
     */
    public function onGet($drink = null)
    {
        if ($drink === null) {
            $this->body = $this->menu;

            return $this;
        }
        $this->links['order'] = new Uri('app://self/Order', ['drink' => $drink]);
        $this->body['drink'] = $drink;
        $this->body['price'] = $this->menu[$drink];

        return $this;
    }
}
