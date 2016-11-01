<?php 
use Ntakei\BearSundayDemo\Dto\Message;
use Ntakei\BearSundayDemo\Annotation\Log;
use Ray\AuraSqlModule\AuraSqlInject;class Ntakei_BearSundayDemo_Service_MessageServiceImpl_JkUpM3c extends Ntakei\BearSundayDemo\Service\MessageServiceImpl implements Ray\Aop\WeavedInterface
{
    private $isIntercepting = true;
    public $bind;
    public $methodAnnotations = 'a:3:{s:10:"addMessage";a:1:{s:36:"Ntakei\\BearSundayDemo\\Annotation\\Log";O:36:"Ntakei\\BearSundayDemo\\Annotation\\Log":0:{}}s:13:"modifyMessage";a:1:{s:36:"Ntakei\\BearSundayDemo\\Annotation\\Log";O:36:"Ntakei\\BearSundayDemo\\Annotation\\Log":0:{}}s:10:"setAuraSql";a:1:{s:16:"Ray\\Di\\Di\\Inject";O:16:"Ray\\Di\\Di\\Inject":1:{s:8:"optional";b:0;}}}';
    public $classAnnotations = 'a:0:{}';
    /**
     * @Log
     */
    function addMessage($message)
    {
        if (isset($this->bindings[__FUNCTION__]) === false) {
            return call_user_func_array('parent::' . __FUNCTION__, func_get_args());
        }
        if ($this->isIntercepting === false) {
            $this->isIntercepting = true;
            return call_user_func_array('parent::' . __FUNCTION__, func_get_args());
        }
        $this->isIntercepting = false;
        $invocationResult = (new \Ray\Aop\ReflectiveMethodInvocation($this, new \ReflectionMethod($this, __FUNCTION__), new \Ray\Aop\Arguments(func_get_args()), $this->bindings[__FUNCTION__]))->proceed();
        $this->isIntercepting = true;
        return $invocationResult;
    }
    /**
     * @Log
     */
    function modifyMessage($message)
    {
        if (isset($this->bindings[__FUNCTION__]) === false) {
            return call_user_func_array('parent::' . __FUNCTION__, func_get_args());
        }
        if ($this->isIntercepting === false) {
            $this->isIntercepting = true;
            return call_user_func_array('parent::' . __FUNCTION__, func_get_args());
        }
        $this->isIntercepting = false;
        $invocationResult = (new \Ray\Aop\ReflectiveMethodInvocation($this, new \ReflectionMethod($this, __FUNCTION__), new \Ray\Aop\Arguments(func_get_args()), $this->bindings[__FUNCTION__]))->proceed();
        $this->isIntercepting = true;
        return $invocationResult;
    }
}