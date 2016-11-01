<?php
namespace Ntakei\BearSundayDemo\Service;

use Ntakei\BearSundayDemo\Dto\User;
use Ntakei\BearSundayDemo\Inject\AuraAuthAdaptorInject;
use Aura\Auth\AuthFactory;
use BEAR\Resource\ResourceObject;

class AuthServiceImpl implements AuthService
{
    use AuraAuthAdaptorInject;

    public function login(User $user)
    {
        $auth_factory = new AuthFactory($_COOKIE);
        
        $auth = $auth_factory->newInstance();
        
        $login_service = $auth_factory->newLoginService($this->adaptor);
        
        $login_service->login($auth, array(
            'username' => $user->getId(),
            'password' => $user->getPassword(),
            )
        );

    }

    public function getUserName()
    {
        $auth_factory = new AuthFactory($_COOKIE);
        
        $auth = $auth_factory->newInstance();

        return $auth->getUserName();
    }

    public function isLogin()
    {

        $auth_factory = new AuthFactory($_COOKIE);
        
        $auth = $auth_factory->newInstance();
        
        return $auth->isValid();

    }

    public function unauthorized(ResourceObject $ro)
    {
        $ro->headers['Location'] = "/login";
    }
}
?>

