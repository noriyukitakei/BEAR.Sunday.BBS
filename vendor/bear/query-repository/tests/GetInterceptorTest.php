<?php

namespace BEAR\QueryRepository;

use BEAR\Resource\Module\ResourceModule;
use BEAR\Resource\ResourceClientFactory;
use BEAR\Resource\ResourceFactory;
use BEAR\Resource\ResourceInterface;
use Ray\Di\Injector;

class GetInterceptorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResourceInterface
     */
    private $resource;

    public function setUp()
    {
        $this->resource = (new Injector(new QueryRepositoryModule(new ResourceModule('FakeVendor\HelloWorld'))))->getInstance(ResourceInterface::class);

        parent::setUp();
    }

    public function testInvoke()
    {
        $user = $this->resource->get->uri('app://self/user')->withQuery(['id' => 1])->eager->request();
        // put
        $expect = 'Last-Modified';
        $this->assertArrayHasKey($expect, $user->headers);
        $time = $user['time'];
        // get
        $user = $this->resource->get->uri('app://self/user')->withQuery(['id' => 1])->eager->request();
        $this->assertArrayHasKey($expect, $user->headers);
        $expect = $time;
        $this->assertSame($expect, $user['time']);
    }
}
