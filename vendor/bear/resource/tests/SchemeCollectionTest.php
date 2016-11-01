<?php

namespace BEAR\Resource;

use BEAR\Resource\Exception\SchemeException;

class SchemeCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SchemeCollection
     */
    private $scheme;

    protected function setUp()
    {
        parent::setUp();
        $this->scheme = new SchemeCollection;
    }

    public function testScheme()
    {
        $this->scheme->scheme('app')->host('self')->toAdapter(new FakeNop);
        $adapter = $this->scheme->getAdapter(new Uri('app://self/'));
        $this->assertInstanceOf(FakeNop::class, $adapter);
    }

    public function testInvalidScheme()
    {
        $this->setExpectedException(SchemeException::class);
        $this->scheme->getAdapter(new Uri('app://self/'));
    }
}
