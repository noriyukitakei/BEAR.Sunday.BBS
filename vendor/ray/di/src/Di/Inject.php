<?php
/**
 * This file is part of the Ray.Di package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\Di\Di;

/**
 * Annotates your class methods into which the Injector should inject values
 *
 * @Annotation
 * @Target("METHOD")
 */
final class Inject implements InjectInterface
{
    /**
     * If true, and the appropriate binding is not found, the Injector will skip injection of this method or field rather than produce an error.
     *
     * @var bool
     */
    public $optional = false;

    /**
     * {@inheritDoc}
     */
    public function isOptional()
    {
        return $this->optional;
    }
}
