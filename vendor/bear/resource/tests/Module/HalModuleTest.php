<?php

namespace Module;

use BEAR\Resource\ResourceInterface;
use FakeVendor\Sandbox\Module\AppModule;
use Ray\Di\Injector;

class HalModuleTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testConfigure()
    {
        $resource = (new Injector(new AppModule))->getInstance(ResourceInterface::class);
        // request
        $news = $resource
            ->get
            ->uri('app://self/news')
            ->withQuery(['date' => 'today'])
            ->request();
        $expect = <<<EOT
{"weather":{"today":"the weather of today is sunny"},"headline":"40th anniversary of Rubik's Cube invention.","sports":"Pieter Weening wins Giro d'Italia.","user":{"id":2,"name":"Aramis","age":16,"blog_id":12}}
EOT;
        $this->assertSame($expect, (string) $news);
    }
}
