<?php

namespace FakeVendor\HelloWorld\Resource\App;

use BEAR\QueryRepository\HttpCacheInject;
use BEAR\RepositoryModule\Annotation\Cacheable;
use BEAR\RepositoryModule\Annotation\Purge;
use BEAR\Resource\ResourceObject;

/**
 * @Cacheable
 */
class Unmatch extends ResourceObject
{
    /*
     * for injection test
     */
    use HttpCacheInject;

    public function onGet($id, $unused)
    {
        return $this;
    }

    /**
     * @Purge(uri="app://self/user/friend?user_id={id}")
     */
    public function onPut($id, $name, $age)
    {
        return $this;
    }
}
