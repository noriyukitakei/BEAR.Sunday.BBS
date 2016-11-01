<?php 
use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;
use Madapaja\TwigModule\TwigRenderer;
use Ntakei\BearSundayDemo\Form\MessageForm;
use Ray\WebFormModule\Annotation\FormValidation;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;
use Ray\WebFormModule\FormInterface;class Ntakei_BearSundayDemo_Resource_Page_Messages_JYFCUWQ extends Ntakei\BearSundayDemo\Resource\Page\Messages implements Ray\Aop\WeavedInterface
{
    private $isIntercepting = true;
    public $bind;
    public $methodAnnotations = 'a:4:{s:11:"__construct";a:2:{s:16:"Ray\\Di\\Di\\Inject";O:16:"Ray\\Di\\Di\\Inject":1:{s:8:"optional";b:0;}s:15:"Ray\\Di\\Di\\Named";O:15:"Ray\\Di\\Di\\Named":1:{s:5:"value";s:12:"message_form";}}s:6:"onPost";a:1:{s:43:"Ray\\WebFormModule\\Annotation\\FormValidation";O:43:"Ray\\WebFormModule\\Annotation\\FormValidation":3:{s:8:"antiCsrf";b:0;s:9:"onFailure";s:22:"onPostValidationFailed";s:4:"form";s:11:"messageForm";}}s:11:"setRenderer";a:1:{s:16:"Ray\\Di\\Di\\Inject";O:16:"Ray\\Di\\Di\\Inject":1:{s:8:"optional";b:1;}}s:11:"setResource";a:1:{s:16:"Ray\\Di\\Di\\Inject";O:16:"Ray\\Di\\Di\\Inject":1:{s:8:"optional";b:0;}}}';
    public $classAnnotations = 'a:0:{}';
    function onGet($q1 = null, $q2 = null)
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
     * @FormValidation(form="messageForm", onFailure="onPostValidationFailed")
     */
    function onPost($id, $title, $author, $comment)
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
    function onPostValidationFailed($id, $title, $author, $comment)
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