<?php
namespace Ntakei\BearSundayDemo\Module;

use Ray\Di\ProviderInterface;
use Aura\Auth\AuthFactory;
use Aura\Auth\Verifier\PasswordVerifier;
use Ray\Di\Di\Named;

class AuraAuthPdoAdaptorProvider implements ProviderInterface
{

    private $dbSetting;

    /**
     * @Named("dbSetting=db_setting")
     */
    public function __construct($dbSetting)
    {
        $this->dbSetting = $dbSetting;
    }

    public function get()
    {
        session_start();

        $auth_factory = new AuthFactory($_COOKIE);

        $DB_DSN = $this->dbSetting["DB_DSN"];
        $DB_USERNAME = $this->dbSetting["DB_USERNAME"];
        $DB_PASSWORD = $this->dbSetting["DB_PASSWORD"];
        
        $pdo = new \PDO($DB_DSN, $DB_USERNAME,$DB_PASSWORD);
        
        $cols = array(
            'id',
            'password',
        );
        $from = 'users';
        
        $hash = new PasswordVerifier('sha1');
        
        return $auth_factory->newPdoAdapter($pdo, $hash, $cols, $from);
    }

}


?>
