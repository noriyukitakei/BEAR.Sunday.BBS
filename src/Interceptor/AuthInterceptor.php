<?php
namespace Ntakei\BearSundayDemo\Interceptor;

use Ray\Aop\MethodInvocation;
use Ray\Aop\MethodInterceptor;
use Aura\Auth\AuthFactory;
use Ntakei\BearSundayDemo\Inject\AuthServiceInject;

class AuthInterceptor implements MethodInterceptor
{

    use AuthServiceInject;

    public function invoke(MethodInvocation $invocation)
    {

        if (!$this->authService->isLogin()) {
            $this->authService->unauthorized($invocation->getThis());
        }

        $result = $invocation->proceed();

        return $result;

    }

}
?>
