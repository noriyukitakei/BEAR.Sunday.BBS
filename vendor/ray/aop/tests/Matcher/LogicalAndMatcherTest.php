<?php

namespace Ray\Aop\Matcher;

use Ray\Aop\FakeAnnotateClass;
use Ray\Aop\FakeMatcher;

class LogicalAndMatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testMatchesClass()
    {
        $class = new \ReflectionClass(FakeAnnotateClass::class);
        $isMatched = (new LogicalAndMatcher)->matchesClass($class, [new FakeMatcher(true, true), new FakeMatcher(true, true)]);

        $this->assertTrue($isMatched);
    }

    public function testMatchesClassFalse()
    {
        $class = new \ReflectionClass(FakeAnnotateClass::class);
        $isMatched = (new LogicalAndMatcher)->matchesClass($class, [new FakeMatcher(true, true), new FakeMatcher(true, false)]);

        $this->assertFalse($isMatched);
    }

    public function testMatchesClassThreeConditions()
    {
        $class = new \ReflectionClass(FakeAnnotateClass::class);
        $isMatched = (new LogicalAndMatcher)->matchesClass($class, [new FakeMatcher(true, true), new FakeMatcher(true, true), new FakeMatcher(true, false)]);

        $this->assertFalse($isMatched);
    }

    public function testMatchesMethod()
    {
        $method = new \ReflectionMethod(FakeAnnotateClass::class, 'getDouble');
        $isMatched = (new LogicalAndMatcher)->matchesMethod($method, [new FakeMatcher(true, true), new FakeMatcher(true, true)]);

        $this->assertTrue($isMatched);
    }
}
