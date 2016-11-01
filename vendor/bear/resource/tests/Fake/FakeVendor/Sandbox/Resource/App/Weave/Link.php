<?php

namespace FakeVendor\Sandbox\Resource\App\Weave;

use BEAR\Resource\ResourceObject;

class Link extends ResourceObject
{
    /**
     * @Log
     */
    public function onGet($animal)
    {
        return "Like a {$animal} to a honey pot.";
    }

    /**
     * @return string
     */
    public function onLinkView(ResourceObject $resource)
    {
        return "<html>$resource->body</html>";
    }
}
