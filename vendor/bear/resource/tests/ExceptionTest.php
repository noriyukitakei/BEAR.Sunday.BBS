<?php

namespace BEAR\Resource;

use BEAR\Resource\Exception\BadRequestException;
use BEAR\Resource\Exception\ResourceNotFoundException;
use BEAR\Resource\Exception\ServerErrorException;

class ExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testBadRequestExceptionCode()
    {
        $this->assertSame((new BadRequestException)->getCode(), Code::BAD_REQUEST);
        $this->assertSame((new BadRequestException('', 1))->getCode(), 1);
    }

    public function testResourceNotFoundExceptionCode()
    {
        $this->assertSame((new ResourceNotFoundException)->getCode(), Code::NOT_FOUND);
        $this->assertSame((new ResourceNotFoundException('', 1))->getCode(), 1);
    }

    public function testServerErrorExceptionCode()
    {
        $this->assertSame((new ServerErrorException)->getCode(), Code::ERROR);
        $this->assertSame((new ServerErrorException('', 1))->getCode(), 1);
    }
}
