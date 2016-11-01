<?php

namespace Ray\WebFormModule;

use Ray\Di\Injector;
use Ray\WebFormModule\Exception\ValidationException;

class VndErrorHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FakeController
     */
    private $controller;

    public function setUp()
    {
        parent::setUp();
        $this->controller = (new Injector(new FakeVndErrorModule, __DIR__ . '/tmp'))->getInstance(FakeController::class);
    }

    public function testValidationException()
    {
        $this->setExpectedException(ValidationException::class);
        $this->controller->createAction('');
    }

    public function testValidationExceptionError()
    {
        try {
            $this->controller->createAction('');
        } catch (ValidationException $e) {
            $vndError = (string) $e->error;
            $this->assertSame('{
    "message": "Validation failed",
    "path": "",
    "validation_messages": {
        "name": [
            "Name must be alphabetic only."
        ]
    }
}', $vndError);
        }
    }

    public function testVndErrorAnnotation()
    {
        /** @var $controller FakeControllerVndError */
        $controller = (new Injector(new FakeVndErrorModule))->getInstance(FakeControllerVndError::class);
        try {
            $controller->createAction('');
        } catch (ValidationException $e) {
            $vndError = (string) $e->error;
            $this->assertSame('{
    "message": "foo validation failed",
    "path": "/path/to/error",
    "logref": "a1000",
    "validation_messages": {
        "name": [
            "Name must be alphabetic only."
        ]
    }
}', $vndError);
        }
    }
}
