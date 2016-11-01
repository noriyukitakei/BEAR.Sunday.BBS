<?php
namespace Ntakei\BearSundayDemo\Service;
use Ntakei\BearSundayDemo\Dto\User;
use BEAR\Resource\ResourceObject;

interface AuthService
{

    public function login(User $user);

    public function getUserName();

    public function isLogin();

    public function unauthorized(ResourceObject $ro);
}
?>

