<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Sunday\Module\Annotation;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\Cache;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;

class DoctrineAnnotationModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind(Cache::class)->annotatedWith('annotation_cache')->to(ArrayCache::class)->in(Scope::SINGLETON);
        $this->bind(Reader::class)->annotatedWith('annotation_reader')->to(AnnotationReader::class)->in(Scope::SINGLETON);
        $this->bind(Reader::class)->toConstructor(CachedReader::class, 'reader=annotation_reader,cache=annotation_cache')->in(Scope::SINGLETON);
    }
}
