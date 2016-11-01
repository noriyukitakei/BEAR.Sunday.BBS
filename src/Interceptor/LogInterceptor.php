<?php
namespace Ntakei\BearSundayDemo\Interceptor;

use Ray\Aop\MethodInvocation;
use Ray\Aop\MethodInterceptor;
use Ntakei\BearSundayDemo\Dto\Dto;
use Ntakei\BearSundayDemo\Inject\LoggerInject;

class LogInterceptor implements MethodInterceptor
{

    use LoggerInject;

    public function invoke(MethodInvocation $invocation)
    {
       $this->logger->info(get_class($invocation->getThis()).'.'.$invocation->getMethod()->getName().' start');

        foreach ($invocation->getArguments() as $arg) {
            if ($arg instanceof Dto && method_exists($arg,'__toString')) {
                $this->logger->addInfo($arg);
            }
        }

        try {
            $result = $invocation->proceed();
        } catch (\Exception $e) {
            $this->logger->addError($e->getTraceAsString());
            throw $e;
        }

       $this->logger->addInfo(get_class($invocation->getThis()).'.'.$invocation->getMethod()->getName().' end');

        return $result;

    }

}

?>
