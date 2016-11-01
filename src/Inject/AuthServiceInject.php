<?php
namespace Ntakei\BearSundayDemo\Inject;

use Ntakei\BearSundayDemo\Service\AuthService;
use Ray\Di\Di\Inject;

trait AuthServiceInject
{
    protected $authService;

    /**
     * @Inject
     */
    public function setAuthService(AuthService $authService) 
    {
        $this->authService = $authService;
    }
}

