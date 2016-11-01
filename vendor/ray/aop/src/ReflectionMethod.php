<?php
/**
 * This file is part of the Ray.Aop package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\Aop;

final class ReflectionMethod extends \ReflectionMethod implements Reader
{
    /**
     * @var WeavedInterface
     */
    private $object;

    /**
     * @var string
     */
    private $method;

    /**
     * Set dependencies
     *
     * @param WeavedInterface   $object
     * @param \ReflectionMethod $method
     */
    public function setObject(WeavedInterface $object, \ReflectionMethod $method)
    {
        $this->object = $object;
        $this->method = $method->getName();
    }

    /**
     * @return ReflectionClass
     */
    public function getDeclaringClass()
    {
        $originalClass = (new \ReflectionClass($this->object))->getParentClass()->getName();
        $class =  new ReflectionClass($originalClass);
        $class->setObject($this->object);

        return $class;
    }

    /**
     * {@inheritdoc}
     */
    public function getAnnotations()
    {
        $annotations = unserialize($this->object->methodAnnotations);
        if (array_key_exists($this->method, $annotations)) {
            return $annotations[$this->method];
        }

        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAnnotation($annotationName)
    {
        $annotations = $this->getAnnotations();
        if (array_key_exists($annotationName, $annotations)) {
            return $annotations[$annotationName];
        }

        return null;
    }
}
