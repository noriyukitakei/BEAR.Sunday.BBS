<?php
/**
 * This file is part of the Ray.Aop package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\Aop\Matcher;

use Ray\Aop\AbstractMatcher;

class LogicalAndMatcher extends AbstractMatcher
{
    /**
     * {@inheritdoc}
     */
    public function matchesClass(\ReflectionClass $class, array $arguments)
    {
        $isAnd = true;
        foreach ($arguments as $matcher) {
            /* @var $matcher AbstractMatcher */
            $isAnd = $isAnd && $matcher->matchesClass($class, $matcher->getArguments());
        }

        return $isAnd;
    }

    /**
     * {@inheritdoc}
     */
    public function matchesMethod(\ReflectionMethod $method, array $arguments)
    {
        $isAnd = true;
        foreach ($arguments as $matcher) {
            /* @var $matcher AbstractMatcher */
            $isAnd = $isAnd && $matcher->matchesMethod($method, $matcher->getArguments());
        }

        return $isAnd;
    }
}
