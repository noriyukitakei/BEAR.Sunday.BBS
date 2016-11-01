<?php
namespace Ntakei\BearSundayDemo\Resource\Page;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;
use Madapaja\TwigModule\TwigRenderer;
use Ntakei\BearSundayDemo\Form\LoginForm;
use Ntakei\BearSundayDemo\Inject\AuthServiceInject;
use Ntakei\BearSundayDemo\Dto\User;
use Ray\WebFormModule\Annotation\FormValidation;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;
use Ray\WebFormModule\FormInterface;
use Aura\Auth\AuthFactory;
use Aura\Auth\Verifier\PasswordVerifier;
use Aura\Auth\Exception;
use Ntakei\BearSundayDemo\Inject\LoggerInject;
use Ntakei\BearSundayDemo\Annotation\Log;

class Login extends ResourceObject
{

    use ResourceInject;
    use AuthServiceInject;
    use LoggerInject;

    protected $loginForm;

    /**
     * @Inject
     * @Named("login_form")
     */
    public function __construct(FormInterface $loginForm)
    {
        $this->loginForm = $loginForm;

    }

    /**
     * @Log
     */
    public function onGet()
    {
        $this['login_form'] = $this->loginForm;
        return $this;

    }

    /**
     * @FormValidation(form="loginForm", onFailure="onPostValidationFailed")
     */
    public function onPost($id,$password)
    {

        $user = new User();
        $user->setId($id);
        $user->setPassword($password);

        try {
            $this->authService->login($user);
        } catch(Exception $e) {
            $this->logger->info($id."Authentication Failure");
            $this->loginForm->addErrors("IDまたはパスワードが違います。");
            $this->loginForm->setId($id);
            $this->loginForm->setPassword($password);
            return $this->onGet();
        }

        $this->headers['Location'] = "/messages";

        return $this;
    }

    public function onPostValidationFailed($id,$password)
    {
        $this->loginForm->setId($id);
        $this->loginForm->setPassword($password);

        foreach($this->loginForm->getInputNames() as $value)
        {
            $this->loginForm->addErrors($this->loginForm->error($value));
        }

        return $this->onGet();
    }
}
