<?php
/**
 * This file is part of the Ray.WebFormModule package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\WebFormModule;

use Aura\Filter\FilterFactory;
use Aura\Html\HelperLocatorFactory;
use Aura\Input\AntiCsrfInterface;
use Aura\Input\Builder;
use Aura\Input\BuilderInterface;
use Aura\Input\Filter;
use Aura\Input\FilterInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\Reader;
use Ray\AuraSessionModule\AuraSessionModule;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;
use Ray\WebFormModule\Annotation\FormValidation;
use Ray\WebFormModule\Annotation\InputValidation;

class AuraInputModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new AuraSessionModule);
        $this->bind(Reader::class)->to(AnnotationReader::class)->in(Scope::SINGLETON);
        $this->bind(BuilderInterface::class)->to(Builder::class);
        $this->bind(FilterInterface::class)->to(Filter::class);
        $this->bind(AntiCsrfInterface::class)->to(AntiCsrf::class)->in(Scope::SINGLETON);
        $this->bind(FailureHandlerInterface::class)->to(OnFailureMethodHandler::class);
        $this->bind(FailureHandlerInterface::class)->annotatedWith('vnd_error')->to(VndErrorHandler::class)->in(Scope::SINGLETON);
        $this->bind(HelperLocatorFactory::class);
        $this->bind(FilterFactory::class);
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(InputValidation::class),
            [InputValidationInterceptor::class]
        );
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(FormValidation::class),
            [AuraInputInterceptor::class]
        );
    }
}
