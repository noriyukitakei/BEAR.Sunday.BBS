<?php

namespace Ray\Aop\Matcher;

use Ray\Aop\FakeAnnotateClass;
use Ray\Aop\FakeMatcher;

class LogicalOrMatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testMatchesClass()
    {
        $class = new \ReflectionClass(FakeAnnotateClass::class);
        $isMatched = (new LogicalOrMatcher)->matchesClass($class, [new FakeMatcher, new FakeMatcher(false)]);

        $this->assertTrue($isMatched);
    }

    public function testMatchesClassFalse()
    {
        $class = new \ReflectionClass(FakeAnnotateClass::class);
        $isMatched = (new LogicalOrMatcher)->matchesClass($class, [new FakeMatcher, new FakeMatcher(false)]);

        $this->assertTrue($isMatched);
    }

    public function testMatchesClassThreeConditions()
    {
        $class = new \ReflectionClass(FakeAnnotateClass::class);
        $isMatched = (new LogicalOrMatcher)->matchesClass($class, [new FakeMatcher(false), new FakeMatcher(false), new FakeMatcher]);
        $this->assertTrue($isMatched);
    }

    public function testLogicalOrNotMatch()
    {
        $class = new \ReflectionClass(FakeAnnotateClass::class);
        $isMatched = (new LogicalOrMatcher)->matchesClass($class, [new FakeMatcher(true, false), new FakeMatcher(true, false), new FakeMatcher(true, false)]);
        $this->assertFalse($isMatched);
    }

    public function testMatchesMethod()
    {
        $method = new \ReflectionMethod(FakeAnnotateClass::class, 'getDouble');
        $isMatched = (new LogicalOrMatcher)->matchesMethod($method, [new FakeMatcher, new FakeMatcher]);

        $this->assertTrue($isMatched);
    }

    public function testMatchesMethodFalse()
    {
        $method = new \ReflectionMethod(FakeAnnotateClass::class, 'getDouble');
        $isMatched = (new LogicalOrMatcher)->matchesMethod($method, [new FakeMatcher(false), new FakeMatcher(false)]);

        $this->assertFalse($isMatched);
    }

    public function testMatchesMethodMoreThanTwoMatch()
    {
        $method = new \ReflectionMethod(FakeAnnotateClass::class, 'getDouble');
        $isMatched = (new LogicalOrMatcher)->matchesMethod($method, [new FakeMatcher(false), new FakeMatcher(false), new FakeMatcher(false), new FakeMatcher(true)]);

        $this->assertTrue($isMatched);
    }
}
