<?php
/**
 * This file is part of the Ray.AuraSessionModule package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\AuraSessionModule;

use Aura\Session\Session;

trait AuraSessionInject
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * @param Session $session
     *
     * @\Ray\Di\Di\Inject
     */
    public function setSession(Session $session)
    {
        $this->session = $session;
    }
}
